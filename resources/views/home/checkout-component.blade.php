 <div class="container">
     <div class="card shadow border-0 rounded-4 mt-5">
         <div class="card-body">
             <form action="{{ route('confirm_order') }}" method="POST">
                 @csrf
                 <div class="row">
                     <div class="col-md-6">
                         <!-- Name -->
                         <div class="form-group">
                             <label for="name">Full Name</label>
                             <input type="text" id="name" name="name" placeholder="Enter your full name"
                                 value="{{ Auth::User()->name }}" required>
                         </div>

                         <!-- Email -->
                         <div class="form-group">
                             <label for="email">Full Email</label>
                             <input type="text" id="email" name="email" placeholder="Enter your Email"
                                 value="{{ Auth::User()->email }}" required>
                         </div>

                         <!-- Address -->
                         <div class="form-group">
                             <label for="cust_address">Address</label>
                             <input type="text" id="cust_address" name="cust_address"
                                 placeholder="Enter your address" value="{{ Auth::User()->address }}" required>
                         </div>

                         <!-- Phone -->
                         <div class="form-group">
                             <label for="phone">Phone Number</label>
                             <input type="text" id="phone" name="phone" placeholder="Enter your phone number"
                                 value="{{ Auth::User()->phone }}" required>
                         </div>
                     </div>

                     <!-- Product details -->
                     <div class="col-md-6">
                         <div class="form-group">
                             <div class="cart-wrapper">
                                 <div class="cart-header">
                                     <div>Title</div>
                                     <div class="text-end ml-auto">Price</div>
                                 </div>
                                 @if ($count == 0)
                                     <div class="cart-item">No Items in the Cart.</div>
                                 @endif
                                 @php
                                     $sub_total = 0;
                                 @endphp
                                 @foreach ($carts as $cart)
                                     <div class="cart-item">
                                         <div class="cart-title">{{ $cart->product->title }}
                                             <a class="ml-2"
                                                 href="{{ route('remove_product', base64_encode($cart->id)) }}"
                                                 class="btn btn-outline-secondary btn-sm">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     fill="none" stroke="currentColor" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round">
                                                     <polyline points="3 6 5 6 21 6"></polyline>
                                                     <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"></path>
                                                     <path d="M10 11v6"></path>
                                                     <path d="M14 11v6"></path>
                                                     <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"></path>
                                                 </svg>
                                             </a>
                                         </div>
                                         <div class="cart-price">₹{{ number_format($cart->product->price, 2) }}</div>
                                     </div>
                                     @php
                                         $sub_total = $sub_total + $cart->product->price;
                                     @endphp
                                 @endforeach
                             </div>
                         </div>

                         <!-- Pricing Summary -->
                         <div class="checkout-pricing px-5">
                             {{-- <h5>Order Summary</h5> --}}
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
                         </div>

                         <!-- Submit -->
                         @if ($count > 0)
                             <div class="form-group mt-4">
                                 <input type="submit" class="btn btn-submit" value="Place Order">
                             </div>
                         @endif


                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>
