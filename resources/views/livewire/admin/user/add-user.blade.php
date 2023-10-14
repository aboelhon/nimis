<div>
    @include('admin.error')
    @include('admin.flash')
    <h1 class="text-center">Register</h1>
    <hr>

    <form wire:submit.prevent='add_user()'>
        @csrf
        <div class="row">
            <div class="col">
                <br><label class="form-check-label" for="name">Full Name</label> <br>
                <input type='text' id="name" wire:model='name' class='form-control' placeholder='Full Name'>

                <br><label class="form-check-label" for="email"><span class="fa fa-email"></span>
                    Email</label>
                <br>
                <input type='email' id="email" wire:model='email' class='form-control' placeholder='Email'>

                <br><label class="form-check-label" for="password">Password</label> <br>
                <input type='password' id="password" wire:model='password' class='form-control' placeholder='Password'>

                <br><label class="form-check-label" for="repassword">Retype password</label> <br>
                <input type='password' id="repassword" wire:model='re_type_password' class='form-control'
                    placeholder='Retype password'> <br>
            </div>
            <div class="col">
                <br><label class="form-check-label" for="birthdate">Birthdate</label> <br>
                <input type='date' id="birthdate" wire:model='birthdate' class='form-control'>

                <br><label class="form-check-label" for="address">Address</label> <br>
                <input type='text' id="address" wire:model='address' class='form-control' placeholder='Address'>

                <br><label class="form-check-label" for="phone">Phone</label> <br>
                <input type='tel' id="phone" wire:model='phone' class='form-control' placeholder='phone'>

                <br><label class="form-check-label" for="phone">Photo</label> <br>

                <input type='file' id="" wire:model='photo' accept=".jpg,.png,.gif"
                    class='form-control'><br>
            </div>
            <input type='submit' class='btn btn-primary' value='Register'>
        </div> {{-- end row --}}
    </form>

</div>
