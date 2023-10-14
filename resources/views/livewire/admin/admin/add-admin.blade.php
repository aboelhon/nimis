<div>
    
    @include('admin.flash')
    @include('admin.error')
    <h1 class="text-center">Add Admin</h1>
    <hr>
    <form method='post' wire:submit.prevent='add_admin()'>
        @csrf
        <div class="row">
            <div class="col-auto">
                <br><label class="form-check-label" for="name">Name</label> <br>
                <input type='text' id="name" wire:model='name' class='form-control' placeholder='Name'>

                <br><label class="form-check-label" for="username">Username</label> <br>
                <input type='text' id="username" wire:model='username' class='form-control' placeholder='User Name'>

                <br><label class="form-check-label" for="email"><span class="fa fa-email"></span> Email</label> <br>
                <input type='email' id="email" wire:model='email' class='form-control' placeholder='Email'>

                <br><label class="form-check-label" for="password">Password</label> <br>
                <input type='password' id="password" wire:model='password' class='form-control' placeholder='password'>
            </div>
            <div class="col">
                <br><label class="form-check-label" for="birthdate">Birthdate</label> <br>
                <input type='date' id="birthdate" wire:model='birthdate' class='form-control'>

                <br><label class="form-check-label" for="address">Address</label> <br>
                <input type='text' id="address" wire:model='address' class='form-control' placeholder='Address'>

                <br><label class="form-check-label" for="phone">Phone</label> <br>
                <input type='text' id="phone" wire:model='phone' class='form-control' placeholder='phone'>

                <br><label class="form-check-label" for="phone">Status</label> <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model='status' name="status" id="active"
                        value="active">
                    <label class="form-check-label" for="active">Active</label>
                    <br>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model='status' name="status" id="inactive"
                        value="inactive">
                    <label class="form-check-label" for="inactive">Inactive</label>
                </div> <br>

                <br><label class="form-check-label" for="phone">Photo</label> <br>

                <input type='file' id="" wire:model='photo' accept=".jpg,.png,.gif"
                    class='form-control'><br>
            </div>
                <input type='submit' class='btn btn-primary ' value='Add'>
    </form>
</div> {{-- end of livewire component --}}
