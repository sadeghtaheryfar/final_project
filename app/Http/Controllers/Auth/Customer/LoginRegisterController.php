<?php

namespace App\Http\Controllers\Auth\Customer;

use Carbon\Carbon;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\SMS\SmsService;
use App\Http\Requests\StoreLoginRegisterRequest;
use App\Http\Services\Message\Email\EmailService;
use App\Notifications\NewRegisterUser;

class LoginRegisterController extends Controller
{
    public function loginRegisterForm()
    {
        return view('auth.customer.login-register');
    }

    public function loginRegisterStore(StoreLoginRegisterRequest $request)
    {
        // tyoe 0 == email and tyoe 1 == phone number

        $inputs = $request->all();

        if (filter_var($inputs['id'], FILTER_VALIDATE_EMAIL)) {
            $type = 0;
            $user = User::where('email', $inputs['id'])->first();

            if (empty($user)) {
                $newUser['email'] = $inputs['id'];
            }
        } elseif (preg_match('/^(\+98|98|0)9\d{9}$/', $inputs['id'])) {
            $type = 1;

            $inputs['id'] = ltrim($inputs['id'], 0);
            $inputs['id'] = substr($inputs['id'], 0, 2) === '98' ? substr($inputs['id'], 2) : $inputs['id'];
            $inputs['id'] = str_replace('+98', '', $inputs['id']);

            $user = User::where('mobile', $inputs['id'])->first();

            if (empty($user)) {
                $newUser['mobile'] = $inputs['id'];
            }
        } else {
            $error = "شناسه کاربری شما نامعتبر است . ";
            return redirect()->route("auth.customer.login-register-form")->withErrors(['id' => $error]);
        }

        if (empty($user)) {
            $newUser['password'] = '951753258';
            $newUser['activation'] = 1;
            $user = User::create($newUser);
            $details = [
                'message' => 'یک کاربر جدید با موفقیت در سایت ثبت نام کرد .',
            ];
            $adminUsers = User::all()->where('user_type', 1);
            foreach ($adminUsers as $adminUser) {
                $adminUser->notify(new NewRegisterUser($details));
            }
        }

        $otpCode = rand(111111, 999999);
        $token = Str::random(60);
        $otpInputs = [
            'token' => $token,
            'user_id' => $user->id,
            'otp_code' => $otpCode,
            'login_id' => $inputs['id'],
            'type' => $type,
        ];

        Otp::create($otpInputs);

        if ($type === 1) {
            $smsService = new SmsService();
            $smsService->setFrom(Config::get('sms.otp_from'));
            $smsService->setTo(['0' . $user->mobile]);
            $smsService->setText($otpCode);
            $smsService->setIsFlash(true);


            $messageService = new MessageService($smsService);
        }

        if ($type === 0) {
            $emailService = new EmailService();
            $details = [
                'title' => 'ایمیل فعال سازی',
                'body' => "<H3>کد فعال سازی شما : $otpCode</H3>",
            ];

            $emailService->setDetails($details);
            $emailService->setFrom("tahryfrsadq@gmail.com", 'Amazone');
            $emailService->setSubjects('کد احراز هویت آمازون');
            $emailService->setTo($inputs['id']);

            $messageService = new MessageService($emailService);
        }

        $messageService->send();

        return redirect()->route('auth.customer.login-confirm-form', $token);
    }

    public function loginConfirmForm($token)
    {
        $otp = Otp::where('token', $token)->first();
        if (empty($otp)) {
            return redirect()->route('auth.customer.login-register-form')->withErrors(['id' => 'آدرس وارد شده نامعتبر است .']);
        } else {
            return view('auth.customer.login-confirm', compact('token', 'otp'));
        }
    }

    public function loginConfirmStore($token, StoreLoginRegisterRequest $request)
    {
        $inputs = $request->all();

        $otp = Otp::where('token', $token)->where('used', 0)->where('created_at', '>=', Carbon::now()->subMinute(5)->toDateTimeString())->first();

        if (empty($otp)) {
            $error = "آدرس وارد شده نامعتبر است . ";
            return redirect()->route("auth.customer.login-register-form")->withErrors(['id' => $error]);
        }

        if ($otp->otp_code !== $inputs['otp']) {
            $error = "کد تایید وارد شده معتبر نیست .";
            return redirect()->route("auth.customer.login-confirm-form", $token)->withErrors(['id' => $error]);
        }

        $otp->update(['used' => 1]);
        $user = $otp->user()->first();

        if ($otp->type == 1 && empty($user->mobile_verifyed_at)) {
            $user->update(['mobile_verifyed_at' => Carbon::now()]);
            $newUser['activation'] = 1;
        } else if ($otp->type == 0 && empty($user->email_verified_at)) {
            $user->update(['email_verified_at' => Carbon::now()]);
            $newUser['activation'] = 1;
        }

        Auth::login($user);

        return redirect()->route("home");
    }

    public function loginResendStore($token)
    {
        $otp = Otp::where('token', $token)->where('created_at', '<=', Carbon::now()->subMinute(5)->toDateTimeString())->first();


        if (empty($otp)) {
            $error = "آدرس وارد شده نامعتبر است . ";
            return redirect()->route("auth.customer.login-register-form")->withErrors(['id' => $error]);
        } else {
            $user = $otp->user->first();
            $otpCode = rand(111111, 999999);
            $token = Str::random(60);
            $otpInputs = [
                'token' => $token,
                'user_id' => $user->id,
                'otp_code' => $otpCode,
                'login_id' => $otp->login_id,
                'type' => $otp->type,
            ];

            Otp::create($otpInputs);

            if ($otp->type === 1) {
                $smsService = new SmsService();
                $smsService->setFrom(Config::get('sms.otp_from'));
                $smsService->setTo(['0' . $user->mobile]);
                $smsService->setText($otpCode);
                $smsService->setIsFlash(true);


                $messageService = new MessageService($smsService);
            }

            if ($otp->type === 0) {
                $emailService = new EmailService();
                $details = [
                    'title' => 'ایمیل فعال سازی',
                    'body' => "کد فعال سازی شما : $otpCode",
                ];

                $emailService->setDetails($details);
                $emailService->setFrom("tahryfrsadq@gmail.com", 'Amazone');
                $emailService->setSubjects('کد احراز هویت آمازون');
                $emailService->setTo($otp->login_id);

                $messageService = new MessageService($emailService);
            }

            $messageService->send();

            return redirect()->route('auth.customer.login-confirm-form', $token);
        }
    }


    public function destroy()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
