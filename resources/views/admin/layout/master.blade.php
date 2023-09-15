
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @include('admin.layout.styles')
</head>
<body>
<section id="app">
    @include('admin.layout.header')

    <section class="container-fluid">
        <section class="row">
            <section class="col-md-2 p-0">
                @include('admin.layout.parshial.sidbar')
            </section>
            <section class="col-md-10 pb-3">
                @include('admin.layout.parshial.error')
                @yield('content')
            </section>
        </section>
    </section>
</section>
@include('admin.layout.scripts')

</body>
</html>