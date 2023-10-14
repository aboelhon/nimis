@if ($errors->any())
    @foreach ($errors->all() as $error)
    <strong class="btn btn-danger"> {{ $error }}</strong>
    @endforeach
@endif
