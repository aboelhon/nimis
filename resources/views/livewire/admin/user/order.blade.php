<div>


    @include('user.error')
    @include('user.flash')



    @if ($orders->isempty())
        <h1 class="alert alert-danger text-center">Apologies,orders today !</h1>
    @else
        <section class="checkout_area">
            <div class="container">
                <form wire:submit.prevent='save_order'>
                    @csrf
                    <div class="row">
                        <div class="col-md-9 col-sm-8 col-xs-12">
                            <div class="checkout_left">
                                <h2>SHIPPING/Billing Address</h2>
                                <div class="dotted_line"></div>
                                <div class="checkout_form">
                                    <div class="country_select">
                                        <p>Country</p>
                                        <input wire:model.debounce.20000s='country' type="text">
                                    </div>
                                    <div class="c_name_box">
                                        <div class="c_name_box_left">
                                            <p>First Name <span>*</span></p>
                                            <input wire:model.debounce.20000s='first_name' type="text">
                                        </div>
                                        <div class="c_name_box_right">
                                            <p>Last Name <span>*</span></p>
                                            <input wire:model.debounce.20000s='last_name' type="text">
                                        </div>
                                    </div>
                                    <div class="c_address">
                                        <p>Address <span>*</span></p>
                                        <input wire:model.debounce.20000s='address' type="text"
                                            placeholder="Street Address">
                                    </div>
                                    <div class="c_state_box">
                                        <div class="c_state_box_left">
                                            <p>Town/City <span>*</span></p>
                                            <input wire:model.debounce.20000s='city' type="text">
                                        </div>
                                        <div class="c_state_box_right">
                                            <p>Postcode/Zip <span>*</span></p>
                                            <input wire:model.debounce.20000s='postcode' type="text" id="zipcode">
                                        </div>
                                    </div>
                                    <div class="c_mail_box">
                                        <div class="c_mail_box_left">
                                            <p>Email <span>*</span></p>
                                            <input wire:model.debounce.20000s='email' type="text" id="email">
                                        </div>
                                        <div class="c_mail_box_right">
                                            <p>Phone <span>*</span></p>

                                            <input wire:model.debounce.20000s='phone'id='phone' type="text">
                                        </div>
                                        <div class="s_order">
                                            <p>Order Notes <span>*</span></p>
                                            <textarea wire:model.debounce.20000s='notes' cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="checkout_right">
                                <h4>Review of Your Order</h4>
                                <div class="product_form_total">
                                    <div class="c_main_item">
                                        <p>Product</p>
                                        <span>Total</span>
                                    </div>
                                    @foreach ($user_cart as $cart)
                                        <div class="c_single_item">
                                            <p>
                                                @php
                                                    $get_item = App\Models\Admin\Item::where('id', $cart->item_id)->get();
                                                @endphp
                                                @foreach ($get_item as $item)
                                                    {{ $item->name }}
                                                    <input type="text" hidden disabled
                                                        wire:model.debounce.20000s='item_id'
                                                        value="{{ $item->id }}">
                                                    {{-- <input type="text" wire:model.debounce.20000s='item_ids.{{ $cart->item_id }}' value="{{ $cart->item_id }}"> --}}
                                                @endforeach
                                            </p>
                                            <span> {{ $item->price }} * {{ $cart->card_item_quantity }}</span>
                                        </div>
                                    @endforeach
                                    <div class="c_single_item sp_single_item">
                                        <p>Subtotal </p>
                                        <span>
                                            {{ $totalPrice }}
                                        </span>
                                    </div>
                                    <div class="c_single_item sp_single_item">
                                        <p>Shipping Charge</p>
                                        <span>50.00 L.E</span>
                                    </div>
                                    <div class="c_total_item sp_single_item">
                                        <p>Order Total</p>
                                        <span>{{ $totalPrice + 50 }}</span>
                                    </div>
                                    <div class="c_payment">
                                        <p>Select Payment Method</p>
                                        <select class="selectpicker sel_state">
                                            <option selected>Cash On Delivery</option>
                                        </select>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input wire:model.debounce.20000s='conf' type="checkbox"> I have Read & Accept <span>Terms & Conditions</span>
                                        </label>
                                    </div>
                                    <input type="submit" value="Place order now" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    @endif
</div>
