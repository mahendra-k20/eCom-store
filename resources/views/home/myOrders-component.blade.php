 <div class="orders-container mt-5">

     <h2>My Orders</h2>

     @foreach ($orders as $order)
         <div class="order-card mt-3">
             <div class="order-img">
                 <img src="products/{{ $order->product->image }}" alt="Product Image">
             </div>
             <div class="order-details">
                 <h2>{{ $order->product->title }}</h2>
                 <p>Order ID: #GRFOID0{{ $order->id }}</p>
                 <p>Status:
                     @if ($order->status == 'Completed')
                         <span class="status"
                             style="background: #d4edda;color: #155724;border: 1px solid #c3e6cb;">{{ $order->status }}</span>
                     @else
                         <span class="status"
                             style="background: #fff3cd;color: #856404;border: 1px solid #ffeeba;">{{ $order->status }}</span>
                     @endif
                 </p>
             </div>
             <div class="order-meta">
                 <div class="order-price">₹{{ number_format($order->product->price, 2) }}</div>
                 <small class="text-muted">(Delivery Excluded)</small>

                 @if ($order->status == 'Completed')
                     <br><a class="text-success" href="{{ route('admin.print_pdf', $order->id) }}">Download Invoice</a>
                 @endif
             </div>
         </div>
     @endforeach

 </div>
