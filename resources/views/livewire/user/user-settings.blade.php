<div>
    @include('user.flash')
    <div class="container-fluid">
        <br>
        <br>
        <br>
        <div class="row">


            @foreach ($info as $user_info)
                <br>
                <br>
                <br>
                <h6 class="text-center">Update <span class="alert alert-dark">{{ $user_info->name }}'s</span>
                    Info</h6>
                <br>
                <img src="{{ Storage::url($user_info->photo) }}" class="img-thumbnail" style="width: 150px;height:150px">
                <div class="col w-25" id="pills-tabContent">
                    <div class="col" id="pills-information" role="tabpanel" aria-labelledby="pills-information-tab">
                        <form wire:submit.prevent='update_name' method="post">
                            @csrf
                            <br><label class="form-check-label" for="name">Name</label> <br>
                            <input type='text' id="name" wire:model.debounce.500000ms='name'
                                class='form-control' placeholder='{{ $user_info->name }}'>
                            <br><label class="form-check-label" for="address">Address</label> <br>
                            <input type='text' id="address" wire:model.debounce.500000ms='address'
                                class='form-control' placeholder='{{ $user_info->address }}'><br>
                            <input type='submit' class='btn btn-primary' value='Update'>
                            @error('name')
                                <div class="btn btn-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('address')
                                <div class="btn btn-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </form>
                    </div>
                    <div class="col" id="pills-email" role="tabpanel" aria-labelledby="pills-email-tab">
                        <form wire:submit.prevent='update_email' method="post">
                            @csrf
                            <br><label class="form-check-label" for="email"><span class="fa fa-email"></span>
                                Email</label>
                            <br>
                            <input type='email' name="email" id="email" wire:model.debounce.500000ms='email'
                                class='form-control' placeholder='Email'>
                            <br><label class="form-check-label" for="re_type_email"><span class="fa fa-email"></span>
                                Re-Type
                                Email</label> <br>
                            <input type='email'name="re_type_email" id="re_type_email"
                                wire:model.debounce.500000ms='re_type_email' class='form-control'
                                placeholder='Re-Type Email'><br>
                            <input type='submit' class='btn btn-primary' value='Update'>
                            @error('email')
                                <div class="btn btn-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('re_type_email')
                                <div class="btn btn-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </form>
                    </div>
                    <div class="col" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab">
                        <form wire:submit.prevent='update_password' method="post">
                            @csrf
                            <br><label class="form-check-label" for="password">Password</label> <br>
                            <input type='password' name="password" id="password"
                                wire:model.debounce.500000ms='password' class='form-control' placeholder='Password'>
                            <br>
                            <br><label class="form-check-label" for="re_type_password">Re-Type Password</label> <br>
                            <input type='re_type_password' name="re_type_password" id="re_type_password"
                                wire:model.debounce.500000ms='re_type_password' class='form-control'
                                placeholder='Re-Type Password'> <br>
                            <input type='submit' class='btn btn-primary' value='Update'>
                            @error('password')
                                <div class="btn btn-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('re_type_password')
                                <div class="btn btn-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </form>
                    </div>
                    <div class="col" id="pills-birthdate" role="tabpanel" aria-labelledby="pills-birthdate-tab">
                        <form wire:submit.prevent='update_birthdate' method="post">
                            @csrf
                            <br><label class="form-check-label" for="birthdate">Birthdate</label> <br>
                            <input type='date' id="date" name="birthdate"
                                wire:model.debounce.500000ms='birthdate' class='form-control'>
                            <br>
                            <input type='submit' class='btn btn-primary' value='Update'>
                            @error('birthdate')
                                <div class="btn btn-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </form>
                    </div>
                    <div class="col" id="pills-phone" role="tabpanel" aria-labelledby="pills-phone-tab">
                        <form wire:submit.prevent='update_phone' method="post">
                            @csrf
                            <br><label class="form-check-label" for="phone">Phone</label> <br>
                            <input type='text' name="phone" id="phone" wire:model.debounce.500000ms='phone'
                                class='form-control' placeholder='Phone'>
                            <br><label class="form-check-label" for="re_type_phone">Re-Type Phone</label> <br>
                            <input type='text' name="re_type_phone" id="re_type_phone"
                                wire:model.debounce.500000ms='re_type_phone' class='form-control'
                                placeholder='Re-Type phone'><br>
                            <input type='submit' class='btn btn-primary' value='Update'>
                            @error('phone')
                                <div class="btn btn-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('re_type_phone')
                                <div class="btn btn-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </form>
                    </div>
                    <div class="col" id="pills-photo" role="tabpanel" aria-labelledby="pills-photo-tab">
                        <form wire:submit.prevent='update_photo' method="post">
                            @csrf
                            <br><label class="form-check-label" for="photo">Photo</label> <br>
                            <input type='file' name="photo" wire:model.debounce.500000ms='photo'
                                accept=".jpg,.png,.gif" class='form-control'><br>
                            <input type='submit' class='btn btn-primary' value='Update'>
                            @error('photo')
                                <div class="btn btn-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </form>
                    </div>
            @endforeach
        </div>
    </div>
</div>
</div>
