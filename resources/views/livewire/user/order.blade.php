<div>

    @include('user.error')
    @include('user.flash')
    <section class="main_cart_area">
        <div class="container">
            <div class="row">
                <div class="table-responsive">
                    <table
                        class="table table-striped-columns
						table-hover	
						table-borderless
						table-primary
						align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Order ID</th>
                                <th>Item name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Note</th>
                                <th>Country</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Post Code</th>
                                <th>Status</th>
                                <th>Date/Time</th>
                            </tr>
                        </thead>
                        @foreach ($user_orders as $order)
                            <tbody class="table-group-divider">
                                <tr class="table-primary">
                                    <td>{{ $order->id }}</td>
                                    <td>
                                        @foreach ($items->where('id', $order->item_id)->all() as $key)
                                            {{ $key->name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ $order->item_quantity }}
                                    </td>
                                    <td>
                                        {{ $order->item_price }}
                                    </td>
                                    <td>{{ $order->first_name . ' ' . $order->last_name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->notes }}</td>
                                    <td>{{ $order->country }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->city }}</td>
                                    <td>{{ $order->postcode }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
