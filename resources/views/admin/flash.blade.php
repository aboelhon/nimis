{{-- flash msg for admins --}}
@if (Session::has('added_admin'))
    <strong class="btn btn-success"> {{ Session::get('added_admin') }}</strong>
@endif
@if (Session::has('info_admin'))
    <strong class="btn btn-success"> {{ Session::get('info_admin') }}</strong>
@endif
@if (Session::has('email_admin'))
    <strong class="btn btn-success"> {{ Session::get('email_admin') }}</strong>
@endif
@if (Session::has('password_admin'))
    <strong class="btn btn-success"> {{ Session::get('password_admin') }}</strong>
@endif
@if (Session::has('phone_admin'))
    <strong class="btn btn-success"> {{ Session::get('phone_admin') }}</strong>
@endif
@if (Session::has('photo_admin'))
    <strong class="btn btn-success"> {{ Session::get('photo_admin') }}</strong>
@endif
@if (Session::has('status_admin'))
    <strong class="btn btn-success"> {{ Session::get('status_admin') }}</strong>
@endif
@if (Session::has('username_admin'))
    <strong class="btn btn-success"> {{ Session::get('username_admin') }}</strong>
@endif
@if (Session::has('birthdate_admin'))
    <strong class="btn btn-success"> {{ Session::get('birthdate_admin') }}</strong>
@endif
@if (Session::has('deleted_admin'))
    <strong class="btn btn-success"> {{ Session::get('deleted_admin') }}</strong>
@endif
@if (Session::has('harddeleted_admin'))
    <strong class="btn btn-success"> {{ Session::get('harddeleted_admin') }}</strong>
@endif
@if (Session::has('restored_admin'))
    <strong class="btn btn-success"> {{ Session::get('restored_admin') }}</strong>
@endif

{{-- flash msg for categories --}}

@if (Session::has('added_category'))
    <strong class="btn btn-success"> {{ Session::get('added_category') }}</strong>
@endif
@if (Session::has('updated_category'))
    <strong class="btn btn-success"> {{ Session::get('updated_category') }}</strong>
@endif
@if (Session::has('deleted_category'))
    <strong class="btn btn-success"> {{ Session::get('deleted_category') }}</strong>
@endif
@if (Session::has('restored_category'))
    <strong class="btn btn-success"> {{ Session::get('restored_category') }}</strong>
@endif
@if (Session::has('harddeleted_category'))
    <strong class="btn btn-success"> {{ Session::get('harddeleted_category') }}</strong>
@endif

{{-- flash msg for items --}}

@if (Session::has('added_item'))
    <strong class="btn btn-success"> {{ Session::get('added_item') }}</strong>
@endif
@if (Session::has('updated_item'))
    <strong class="btn btn-success"> {{ Session::get('updated_item') }}</strong>
@endif
@if (Session::has('updated_photo'))
    <strong class="btn btn-success"> {{ Session::get('updated_photo') }}</strong>
@endif
@if (Session::has('updated_item_category'))
    <strong class="btn btn-success"> {{ Session::get('updated_item_category') }}</strong>
@endif
@if (Session::has('updated_item_department'))
    <strong class="btn btn-success"> {{ Session::get('updated_item_department') }}</strong>
@endif
@if (Session::has('updated_item_size'))
    <strong class="btn btn-success"> {{ Session::get('updated_item_size') }}</strong>
@endif
@if (Session::has('updated_item_quantity'))
    <strong class="btn btn-success"> {{ Session::get('updated_item_quantity') }}</strong>
@endif
@if (Session::has('updated_item_status'))
    <strong class="btn btn-success"> {{ Session::get('updated_item_status') }}</strong>
@endif
@if (Session::has('deleted_item'))
    <strong class="btn btn-success"> {{ Session::get('deleted_item') }}</strong>
@endif
@if (Session::has('harddeleted_item'))
    <strong class="btn btn-success"> {{ Session::get('harddeleted_item') }}</strong>
@endif
@if (Session::has('restored_item'))
    <strong class="btn btn-success"> {{ Session::get('restored_item') }}</strong>
@endif


{{-- flash msg for users --}}

@if (Session::has('added_user'))
    <strong class="btn btn-success"> {{ Session::get('added_user') }}</strong>
@endif
@if (Session::has('info_user'))
    <strong class="btn btn-success"> {{ Session::get('info_user') }}</strong>
@endif
@if (Session::has('email_user'))
    <strong class="btn btn-success"> {{ Session::get('email_user') }}</strong>
@endif
@if (Session::has('password_user'))
    <strong class="btn btn-success"> {{ Session::get('password_user') }}</strong>
@endif
@if (Session::has('phone_user'))
    <strong class="btn btn-success"> {{ Session::get('phone_user') }}</strong>
@endif
@if (Session::has('photo_user'))
    <strong class="btn btn-success"> {{ Session::get('photo_user') }}</strong>
@endif
@if (Session::has('status_user'))
    <strong class="btn btn-success"> {{ Session::get('status_user') }}</strong>
@endif
@if (Session::has('birthdate_user'))
    <strong class="btn btn-success"> {{ Session::get('birthdate_user') }}</strong>
@endif
@if (Session::has('deleted_user'))
    <strong class="btn btn-success"> {{ Session::get('deleted_user') }}</strong>
@endif
@if (Session::has('harddeleted_user'))
    <strong class="btn btn-success"> {{ Session::get('harddeleted_user') }}</strong>
@endif
@if (Session::has('restored_user'))
    <strong class="btn btn-success"> {{ Session::get('restored_user') }}</strong>
@endif
