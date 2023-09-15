<nav class="navbar navbar-expand-lg navbar-dark bg-red">
    <a class="navbar-brand" href="{{ url("/") }}">PHP tutorial panel</a>
    <section class="collapse navbar-collapse" id="navbarSupportedContent"></section>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="text-decoration-none text-white bg-transparent border-0">logout</button>
    </form>
</nav>