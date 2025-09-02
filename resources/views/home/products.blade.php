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
                        <a href="">
                            <div class="img-box">
                                <img src="/products/{{ $product->image }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h6 class="mr-3">
                                    {{ $product->title }}
                                </h6>
                                <h6>
                                    Price
                                    <span>
                                        ₹{{ $product->price }}
                                    </span>
                                </h6>
                            </div>
                            <div class="new">
                                <span>
                                    {!! Str::limit($product->category, 3) !!}
                                </span>
                            </div>
                        </a>
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
