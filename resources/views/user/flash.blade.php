{{-- flash msg for users --}}
@if (Session::has('added_user'))
    <strong class="btn btn-success"> {{ Session::get('added_user') }}</strong>
@endif
@if (Session::has('updated_info'))
    <strong class="btn btn-success"> {{ Session::get('updated_info') }}</strong>
@endif
@if (Session::has('email_user'))
    <strong class="btn btn-success"> {{ Session::get('email_user') }}</strong>
@endif
@if (Session::has('password_user'))
    <strong class="btn btn-success"> {{ Session::get('password_user') }}</strong>
@endif
@if (Session::has('birthdate_user'))
    <strong class="btn btn-success"> {{ Session::get('birthdate_user') }}</strong>
@endif
@if (Session::has('phone_user'))
    <strong class="btn btn-success"> {{ Session::get('phone_user') }}</strong>
@endif
@if (Session::has('login_failed'))
    <strong class="btn btn-success"> {{ Session::get('login_failed') }}</strong>
@endif

{{-- flash msg for saved item cart --}}
@if (Session::has('saved_item_to_cart'))
    <strong class="btn btn-success"> {{ Session::get('saved_item_to_cart') }}</strong>
@endif
@if (Session::has('item_cart_updated'))
    <strong class="btn btn-success"> {{ Session::get('item_cart_updated') }}</strong>
@endif
@if (Session::has('item_cart_deleted'))
    <strong class="btn btn-success"> {{ Session::get('item_cart_deleted') }}</strong>
@endif

{{-- flash msg for saved order  --}}
@if (Session::has('saved_order'))
    <strong class="btn btn-success"> {{ Session::get('saved_order') }}</strong>
@endif
