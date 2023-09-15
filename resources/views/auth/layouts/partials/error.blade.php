

@if ($errors->any())
<div class="alert-danger">
    @foreach ( $errors->all() as $error )

    <small class="form-text text-denger"> {{ $error }}</small>

    @endforeach

</div>
    
@endif
