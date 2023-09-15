<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    @include('layout.styles')
    <title>@yield('title')</title>
</head>
<body>


    <!-- start header -->
        @include('layout.header')
    <!-- end header -->



    <!-- start main one col -->
        @yield('content')
    <!-- end main one col -->



    <!-- start body -->
    {{-- <section class="container-xxl body-container">
        <aside id="sidebar" class="sidebar">

        </aside>
        <main id="main-body" class="main-body">

        </main>
    </section>   --}}
    <!-- end body -->




    <!-- start footer -->
        @include('layout.footer')
    <!-- end footer -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    @include('layout.scripts')
</body>
</html>