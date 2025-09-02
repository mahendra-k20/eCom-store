<div class="container category-section">
    <h4 class="display-4 text-white">Update Product</h4>
    <hr>
    <div class="card shadow-lg border-0 rounded-3 mt-5">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">{{ $product->title }}</h4>
        </div>
        <div class="card-body">
            <form class="product-form" action="{{ route('admin.update_product', base64_encode($product->id)) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Product Title -->
                <div class="mb-3">
                    <label for="product_title" class="form-label">Product Title</label>
                    <input type="text" class="form-control" id="product_title" name="product_title"
                        value="{{ $product->title }}" required>
                </div>

                <!-- Product Description -->
                <div class="mb-3">
                    <label for="product_description" class="form-label">Product Description</label>
                    <textarea class="form-control" id="product_description" name="product_description" rows="4" required>{{ $product->description }}</textarea>
                </div>

                <!-- Product Category -->
                <div class="mb-3">
                    <label for="product_category" class="form-label">Product Category</label>
                    <select class="form-select" id="product_category" name="product_category" required>
                        <option value="{{ $product->category }}" selected>{{ $product->category }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Product Price & Quantity -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="product_price" class="form-label">Product Price (₹)</label>
                        <input type="text" class="form-control" id="product_price" name="product_price"
                            min="0" step="0.01" value="{{ $product->price }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="product_quantity" class="form-label">Product Quantity</label>
                        <input type="number" class="form-control" id="product_quantity" name="product_quantity"
                            value="{{ $product->quantity }}" min="1" required>
                    </div>
                </div>

                <!-- Product Image -->
                <div class="mb-3">
                    <label for="product_image" class="form-label">Current Product Image</label><br>
                    <img height="200" src="/products/{{ $product->image }}" alt="Current Product image">
                </div>
                <div class="mb-3">
                    <label for="product_image" class="form-label">Update Product Image</label>
                    <input type="file" class="form-control" id="product_image" name="product_image" accept="image/*">
                </div>

                <!-- Submit Button -->
                <div class="d-grid mt-5">
                    <input class="btn btn-primary" type="submit" value="update Product">
                </div>

            </form>
        </div>
    </div>
</div>
