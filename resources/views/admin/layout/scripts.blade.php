@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('sweetalert/sweetalert2.min.js') }}"></script>

@include('alerts.error')
@include('alerts.success')
@show