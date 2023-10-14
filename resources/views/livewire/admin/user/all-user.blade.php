<div>

    @if ($allusers->count() < 1)
        <div class="text-center">
            <br><br><br>
            <h1 class="text-center btn btn-danger col-auto text-center">Sorry There are no users found</h1>
        </div>
    @else
        <div class="row">
            <div class="col">
                @include('admin.flash')
                @include('admin.error')
                {{ $allusers->links() }}

                <div class="table-responsive">
                    <table class="table table-secondary">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Birthdate</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Photo</th>
                                <th scope="col">role</th>
                                <th scope="col">status</th>
                                <th scope="col">by</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        @foreach ($allusers as $user)
                            <tbody>
                                <tr class="">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>****</td>
                                    <td>{{ $user->birthdate }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td><img style="height:70px;width:70px"
                                            src="{{ Storage::url($user->photo) }}"
                                            alt="">
                                    </td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>{{ $user->by }}</td>
                                    <td><a wire:click.prevent='getinfo({{ $user->id }})' class="btn btn-primary"><i
                                                class="fa fa-edit" aria-hidden="true"></i>
                                            Update</a></td>
                                    <td><a wire:click.prevent='softdeleteuser({{ $user->id }})'
                                            class="btn btn-danger"><i class="fa fa-remove" aria-hidden="true"></i>
                                            Delete</a></td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <br>
        <h1 class="text-center">Update {{ $name }} User Info</h1>
        <br>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-information-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-information" type="button" role="tab" aria-controls="pills-information"
                    aria-selected="true">Information</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-email-tab" data-bs-toggle="pill" data-bs-target="#pills-email"
                    type="button" role="tab" aria-controls="pills-email" aria-selected="false">Email</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-password-tab" data-bs-toggle="pill" data-bs-target="#pills-password"
                    type="button" role="tab" aria-controls="pills-password" aria-selected="false">Password</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-birthdate-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-birthdate" type="button" role="tab" aria-controls="pills-birthdate"
                    aria-selected="false">Birthdate</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-phone-tab" data-bs-toggle="pill" data-bs-target="#pills-phone"
                    type="button" role="tab" aria-controls="pills-phone" aria-selected="false">Phone</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-photo-tab" data-bs-toggle="pill" data-bs-target="#pills-photo"
                    type="button" role="tab" aria-controls="pills-photo" aria-selected="false">Photo</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-status-tab" data-bs-toggle="pill" data-bs-target="#pills-status"
                    type="button" role="tab" aria-controls="pills-status" aria-selected="false">Status</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-information" role="tabpanel"
                aria-labelledby="pills-information-tab">
                <form wire:submit.prevent='updatuserinfo' method="post">
                    @csrf
                    <br><label class="form-check-label" for="name">Name</label> <br>
                    <input type='text' id="name" wire:model.debounce.500000ms='name' class='form-control'
                        placeholder='Name'>
                    <br><label class="form-check-label" for="address">Address</label> <br>
                    <input type='text' id="address" wire:model.debounce.500000ms='address' class='form-control'
                        placeholder='Address'><br>
                    <input type='submit' class='btn btn-primary' value='Update'>
                </form>
            </div>
            <div class="tab-pane fade" id="pills-email" role="tabpanel" aria-labelledby="pills-email-tab">
                <form wire:submit.prevent='updateemail' method="post">
                    @csrf
                    <br><label class="form-check-label" for="email"><span class="fa fa-email"></span>
                        Email</label>
                    <br>
                    <input type='email' id="email" wire:model.debounce.500000ms='email' class='form-control'
                        placeholder='Email'>
                    <br><label class="form-check-label" for="re_type_email"><span class="fa fa-email"></span> Re-Type
                        Email</label> <br>
                    <input type='email' id="re_type_email" wire:model.debounce.500000ms='re_type_email'
                        class='form-control' placeholder='Re-Type Email'><br>
                    <input type='submit' class='btn btn-primary' value='Update'>
                </form>
            </div>
            <div class="tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab">
                <form wire:submit.prevent='updatepassword' method="post">
                    @csrf
                    <br><label class="form-check-label" for="password">Password</label> <br>
                    <input type='password' id="password" wire:model.debounce.500000ms='password'
                        class='form-control' placeholder='Password'> <br>
                    <br><label class="form-check-label" for="re_type_password">Re-Type Password</label> <br>
                    <input type='re_type_password' id="re_type_password"
                        wire:model.debounce.500000ms='re_type_password' class='form-control'
                        placeholder='Re-Type Password'> <br>
                    <input type='submit' class='btn btn-primary' value='Update'>
                </form>
            </div>
            <div class="tab-pane fade" id="pills-birthdate" role="tabpanel" aria-labelledby="pills-birthdate-tab">
                <form wire:submit.prevent='updatebirthdate' method="post">
                    @csrf
                    <br><label class="form-check-label" for="birthdate">Birthdate</label> <br>
                    <input type='date' id="date" name="birthdate" wire:model.debounce.500000ms='birthdate'
                        class='form-control'>
                    <br>
                    <input type='submit' class='btn btn-primary' value='Update'>
                </form>
            </div>
            <div class="tab-pane fade" id="pills-phone" role="tabpanel" aria-labelledby="pills-phone-tab">
                <form wire:submit.prevent='updatephone' method="post">
                    @csrf
                    <br><label class="form-check-label" for="phone">Phone</label> <br>
                    <input type='text' id="phone" wire:model.debounce.500000ms='phone' class='form-control'
                        placeholder='Phone'>
                    <br><label class="form-check-label" for="re_type_phone">Re-Type Phone</label> <br>
                    <input type='text' id="re_type_phone" wire:model.debounce.500000ms='re_type_phone'
                        class='form-control' placeholder='Re-Type phone'><br>
                    <input type='submit' class='btn btn-primary' value='Update'>
                </form>
            </div>
            <div class="tab-pane fade" id="pills-photo" role="tabpanel" aria-labelledby="pills-photo-tab">
                <form wire:submit.prevent='updatephoto' method="post">
                    @csrf
                    <br><label class="form-check-label" for="photo">Photo</label> <br>
                    <input type='file' id="" wire:model.debounce.500000ms='photo'
                        accept=".jpg,.png,.gif" class='form-control'><br>
                    <input type='submit' class='btn btn-primary' value='Update'>
                </form>
            </div>
            <div class="tab-pane fade" id="pills-status" role="tabpanel" aria-labelledby="pills-status-tab">
                <form wire:submit.prevent='updatestatus' method="post">
                    @csrf
                    <br><label class="form-check-label" for="phone">Status</label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model.debounce.500000ms='status'
                            name="status" id="active" value="active">
                        <label class="form-check-label" for="active">Active</label>
                        <br>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model.debounce.500000ms='status'
                            name="status" id="inactive" value="inactive">
                        <label class="form-check-label" for="inactive">Inactive</label>
                    </div> <br>
                    <input type='submit' class='btn btn-primary' value='Update'>
                </form>
            </div>
        </div>
    @endif

</div>
