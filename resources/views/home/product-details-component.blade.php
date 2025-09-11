 <div class="container product-container">
     <div class="row g-5">
         <div class="col-lg-5 col-md-5">
             <div class="product-image">
                 <img src="/products/{{ $products->image }}" class="img-fluid w-100" alt="Product">
             </div>
         </div>

         <div class="col-lg-6 col-md-6">
             <h1 class="product-title">{{ $products->title }}</h1>
             <div class="product-price">₹ {{ $products->price }}</div>
             <hr class="my-4">
             <p class="product-description">
                 {{ $products->description }}
             </p>
             <p class="product-desctiption">Category: <span class="text-danger">{{ $products->category }}</span></p>

             <p class="product-description">Available Quantity: <span
                     class="text-danger">{{ $products->quantity }}</span></p>
             <hr class="my-4">
             <a href="{{ route('add_cart', $products->id) }}" class="btn btn-lg btn-danger text-white">Add to Cart</a>
         </div>
     </div>
 </div>
