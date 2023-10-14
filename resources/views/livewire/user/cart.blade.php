<div>
    @include('user.error')
    @include('user.flash')

    @if ($user_cart->isempty())
        <h1 class="alert alert-danger text-center">Sorry your cart is empty!</h1>
    @else
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Cart ID</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item Photo</th>
                        <th scope="col">Item Quantity</th>
                        <th scope="col">Item Price</th>
                        <th scope="col">Upate Quantity</th>
                        <th scope="col">Remove from cart</th>
                    </tr>
                </thead>
                @foreach ($user_cart as $cart)
                    <tbody>
                        <tr>
                            <td>{{ $cart->id }}</td>
                            <td>
                                @php
                                    $get_item = App\Models\Admin\Item::where('id', $cart->item_id)->first();
                                @endphp
                                {{ $get_item->name }}
                            </td>
                            <td>
                                @php
                                    $get_item = App\Models\Admin\Item::where('id', $cart->item_id)->first();
                                @endphp

                                @foreach ($get_item->photos as $item)
                                    <img src="{{ Storage::url($item->name) }}" style="height:50px;width:50px;">
                                @endforeach
                            </td>
                            <td>
                                <input type="text" class="form-control text-center" disabled
                                    value="{{ $cart->card_item_quantity }}">
                            </td>
                            <td>

                                @php
                                    $get_item = App\Models\Admin\Item::where('id', $cart->item_id)->first();
                                    echo $get_item->price * $cart->card_item_quantity;
                                @endphp

                            </td>
                            <td>
                                <form wire:submit.prevent='update_quantity({{ $cart->id }})' class="text-center">
                                    @csrf
                                    <input type="text" required class="form-control text-center"
                                        wire:model.debounce.150s='quantity'><br>
                                    <input type="submit" class="btn btn-primary text-center" value="Update">
                                    <div wire:loading wire:target='update_quantity({{ $cart->id }})'
                                        class="alert alert-info">
                                        Loading </div>
                                </form>
                            </td>
                            <td>
                                <button wire:click='delete_cart({{ $cart->id }})'
                                    class="btn btn-danger text-center">Remove</button>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    @endif
</div>
