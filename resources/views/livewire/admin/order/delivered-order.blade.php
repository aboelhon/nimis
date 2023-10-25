<div>


    @include('admin.flash')
    @include('admin.error')

    <div class="table-responsive">
        <table
            class="table table-striped-columns
                    table-hover	
                    table-borderless
                    table-primary
                    align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>Order ID</th>
                    <th>Order's Owner</th>
                    <th>Item Price</th>
                    <th>Country</th>
                    <th>Full Name</th>
                    <th>Addresss</th>
                    <th>City</th>
                    <th>Post Code</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Notes</th>
                    <th>Status</th>
                    <th>By</th>
                    <th>Confirm Date/Time</th>
                    <th>Delete Order</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($delivered_orders as $order)
                    <tr class="table-primary" wire:key='{{ $order->id }}'>
                        <td>{{ $order->id }}</td>
                        <td>
                            @php
                                $x = $all_users->where('id', $order->user_id)->first();
                                echo $x['name'];
                            @endphp
                        </td>
                        <td>
                            @php
                                $x = $all_items->where('id', $order->item_id)->first();
                            @endphp
                            <a href="{{ route('productid', $x->slug) }}"
                                class="btn btn-outline-primary">{{ $x['name'] }}</a>
                        </td>
                        <td>
                            {{ $order->country }}
                        </td>
                        <td>
                            {{ $order->first_name . ' ' . $order->last_name }}
                        </td>
                        <td>
                            {{ $order->address }}
                        </td>
                        <td>
                            {{ $order->city }}
                        </td>
                        <td>
                            {{ $order->postcode }}
                        </td>
                        <td>
                            {{ $order->email }}
                        </td>
                        <td>
                            {{ $order->phone }}
                        </td>
                        <td>
                            {{ $order->notes }}
                        </td>
                        <td>
                            <span class="btn btn-success">Delivered</span>
                            <img class="img-thumbnail" style="height:50px;width:50px"
                                src="{{ asset('style/images/green-arrow.png') }}" alt="">
                        </td>
                        <td>
                            {{ $order->by }}
                        </td>
                        <td>
                            {{ $order->updated_at }}
                        </td>
                        <td>
                            <button type="button" wire:click.prevent='delete_order({{ $order->id }})'
                                class="btn btn-outline-danger">Delete
                                Order</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>






</div>
