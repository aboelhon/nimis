@if ($errors->any())
    @foreach ($errors->all() as $error)
    <strong class="btn btn-danger text-center"> {{ $error }}</strong>
    @endforeach
@endif