<div class="container category-section">
    <h4 class="display-4 text-white">View Products</h4>
    <hr>
</div>

<div class="container product-table mt-5">
    <table>
        <thead>
            <tr>
                <th class="serial">Sr No.</th>
                <th class="image">Image</th>
                <th class="title">Product Title</th>
                <th class="price">Price</th>
                <th class="description">Description</th>
                <th class="category">Category</th>
                <th class="quantity">Quantity</th>
                <th class="delete">Delete</th>
            </tr>
        </thead>
        <tbody>
            @php
                $serial = 0;
            @endphp
            @foreach ($product as $products)
                <tr>
                    <td class="serial">{{ $serial = $serial + 1 }}</td>
                    <td class="image">
                        <img width="70" src="/products/{{ $products->image }}" alt="Product image">
                    </td>
                    <td class="title">{{ $products->title }}</td>
                    <td class="price">₹ {{ $products->price }} /-</td>
                    {{-- <td class="descripton">{{ substr($products->description, 0, 80) }}...</td> --}}
                    <td class="descripton">{!! Str::limit($products->description, 80) !!}...</td>
                    <td class="category">{{ $products->category }}</td>
                    <td class="quantity">{{ $products->quantity }}</td>
                    <td><a onclick="confirmation(event)" href="{{ route('admin.delete_product', $products->id) }}"
                            class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination mt-5">
        {{ $product->onEachSide(1)->links() }}
    </div>
</div>
