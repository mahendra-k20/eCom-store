<div class="container category-section">
    <h4 class="display-4 text-white">View Orders</h4>
    <hr>
</div>

<div class="container product-table mt-5">
    <table>
        <thead>
            <tr>
                <th>Customer Name</th>
                {{-- <th>Address</th> --}}
                <th>Phone No.</th>
                <th>Product Title</th>
                <th>Product Price</th>
                <th>Product Image</th>
                <th>Order Status</th>
                <th>Print PDF</th>
                {{-- <th>Change Status</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->name }}</td>
                    {{-- <td>{{ $order->cust_address }}</td> --}}
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->product->title }}</td>
                    <td>₹{{ number_format($order->product->price, 2) }}</td>
                    <td>
                        <img src="/products/{{ $order->product->image }}" alt="Product Image" width="80">
                    </td>
                    <td>
                        <p class="">{{ $order->status }}</p>
                        <small>
                            <a href="{{ route('admin.in_transit', $order->id) }}" class="text-warning"><em>In Transit</em>
                            </a>
                        </small>
                        /
                        <small>
                            <a href="{{ route('admin.completed', $order->id) }}" class="text-success"><em>Completed</em>
                            </a>
                        </small>
                    </td>
                    <td><a class="btn btn-outline-primary" href="{{ route('admin.print_pdf', $order->id) }}">Print
                            PDF</a></td>

                </tr>
            @endforeach
        </tbody>
    </table>

</div>
