<div class="container cart-container mt-5">
    <div class="row g-4">
        <!-- Left Column: Cart Table -->
        <div class="col-lg-8">
            <div class="cart-table-wrapper bg-white p-4 rounded-3 shadow-sm">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="ps-3">Product</th>
                            <th scope="col" class="text-center">Price</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-end pe-3">Action</th>
                        </tr>
                        @if ($count == 0)
                            <tr>
                                <td class="text-center border-top" colspan="4">No Items in the Cart.</td>
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                        @php
                            $sub_total = 0;
                        @endphp
                        @foreach ($carts as $cart)
                            <tr class="cart-row">
                                <!-- Product Info -->
                                <td class="d-flex align-items-center gap-3 ps-3">
                                    <img src="/products/{{ $cart->product->image }}" alt="{{ $cart->product->title }}"
                                        class="rounded-3" style="width: 80px; height: 80px; object-fit: cover;">
                                    <div>
                                        <a class="text-dark"
                                            href="{{ route('product_details', base64_encode($cart->product->id)) }}">
                                            <h4 class="fw-semibold cart-title">{{ $cart->product->title }}
                                            </h4>
                                        </a>
                                        <small class="text-muted cat-title">Category:
                                            {{ $cart->product->category ?? 'General' }}</small>
                                    </div>
                                </td>

                                <!-- Price -->
                                <td class="text-center fw-medium price">
                                    ₹{{ number_format($cart->product->price, 2) }}
                                </td>

                                <!-- Quantity -->
                                <td class="text-center">
                                    <input type="number" class="form-control form-control-sm quantity-input mx-auto"
                                        value="1" min="1" style="width: 60px;">
                                </td>

                                <!-- Action -->
                                <td class="text-end pe-3">
                                    <a href="{{ route('remove_product', base64_encode($cart->id)) }}"
                                        class="btn btn-outline-secondary btn-sm">Remove</a>
                                </td>
                            </tr>
                            @php
                                $sub_total = $sub_total + $cart->product->price;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right Column: Order Summary -->
        <div class="col-lg-4 mt-4">
            <div class="order-summary">
                <h5>Order Summary</h5>
                <div class="summary-line">
                    <span>Subtotal</span>
                    <span>₹{{ number_format($sub_total, 2) }}</span>
                </div>
                <div class="summary-line">
                    <span>Shipping</span>
                    @php
                        if ($sub_total >= 2499 || $sub_total == 0) {
                            $shipping = 0;
                        } elseif ($sub_total >= 1499) {
                            $shipping = 50;
                        } else {
                            $shipping = 100;
                        }
                    @endphp
                    <span>₹{{ number_format($shipping, 2) }}</span>
                </div>
                <div class="summary-line summary-total">
                    <span>Total</span>
                    @php
                        $total = $sub_total + $shipping;
                    @endphp
                    <span>₹{{ number_format($total, 2) }}</span>
                </div>
                @if ($count > 0)
                    <a href="{{ route('checkout') }}" class="btn btn-dark w-100 rounded-pill mt-3 py-2">
                        Proceed to Checkout
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
