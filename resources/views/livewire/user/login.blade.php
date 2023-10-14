<div>
    <div class='container'>
        <div class='row'>
            @include('user.flash')
            @include('user.error')
            <form wire:submit.prevent='login'>
                @csrf
                <br><input type='email'  wire:model='email' class='form-control' placeholder='Email'>
                <br><input type='text' wire:model='password' minlength="6" class='form-control'
                    placeholder='Password'>
                <br><input type='submit'class='btn btn-primary' value='Login'>
            </form>
        </div>
    </div>
</div>
