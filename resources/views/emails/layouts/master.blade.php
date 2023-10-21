<!doctype html>
<html lang="fa" dir="rtl">

<head>

    @include('emails.layouts.head-tag')
    @yield('head-tag')

</head>

<body>
    <div class="container">
        <!-- start header -->
        @include('emails.layouts.header')
        <!-- end header -->


        <!-- start main one col -->
        <div class="content-email2" style="text-align: center;direction: rtl">
            @yield('content')
        </div>
        <!-- end main one col -->


        <!-- start footer -->
        @include('emails.layouts.footer')
        <!-- end footer -->
    </div>

</body>

</html>
