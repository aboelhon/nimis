<div>

    <div class='container'>
        <div class='row'>
            @include('user.error')

            @if (Auth::guard('user')->user()->created_at == Auth::guard('user')->user()->updated_at)
                <form wire:submit.prevent='active'>
                    @csrf
                    <h3>Active For First Time</h3>
                    <br><input type='text' wire:model='code' class='form-control' placeholder='Code'>
                    <br><input type='email' wire:model='email' class='form-control' placeholder='Email'>
                    <br><input type='submit' class='btn btn-primary' value='Active'>
                </form>
            @else
                <form wire:submit.prevent='update_email'>
                    @csrf
                    <h3>Update Email</h3>
                    <br><input type='text' wire:model='code' class='form-control' placeholder='Code'>
                    <br><input type='email' wire:model='email' class='form-control' placeholder='Email'>
                    <br><input type='submit' class='btn btn-primary' value='Active'>
                </form>
            @endif
        </div>

    </div>


</div>
