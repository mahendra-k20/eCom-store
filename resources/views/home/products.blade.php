<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Latest Products
            </h2>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="/products/{{ $product->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6 class="mr-3">
                                <a href="{{ route('product_details', base64_encode($product->id)) }}">
                                    {{ $product->title }}
                                </a>
                            </h6>
                            <h6>
                                Price
                                <span>
                                    ₹{{ $product->price }}
                                </span>
                            </h6>
                        </div>
                        <div class="product-details my-4 d-flex">
                            <a href="{{ route('product_details', base64_encode($product->id)) }}"
                                class="btn btn-danger text-white">Details</a>
                            <a href="{{ route('add_cart', $product->id) }}" class="btn btn-primary text-white ml-4">Add
                                to Cart</a>
                        </div>
                        <div class="new">
                            <span>
                                {{-- {!! Str::limit($product->category, 3) !!} --}}
                                new
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <div class="btn-box">
            <a href="">
                View All Products
            </a>
        </div> --}}
    </div>
</section>
