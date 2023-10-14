<div>
    <div class='container'>
        <div class='row'>
            @if (Session::has('login_failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong> {{ Session::get('login_failed') }}</strong>
                </div>
            @endif
            <form wire:submit.prevent='login' method='post'>
                @csrf
                <br><input type='text' name='' wire:model='email' class='form-control' placeholder='Email'>
                <br><input type='text' name='' wire:model='password' class='form-control'
                    placeholder='password'>
                <br><input type='submit' name='' class='btn btn-primary' value='Login'>
            </form>
        </div>
    </div>
</div>
