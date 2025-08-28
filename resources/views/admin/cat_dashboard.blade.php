<div class="container category-section">
    <h4 class="display-4 text-white">Add Category</h4>
    <hr>
    <form class="category-form mt-5" action="{{ route('admin.add_category') }}" method="post">
        @csrf
        <input type="text" name="category" id="category">
        <input class="btn btn-primary" type="submit" value="Add Category">
    </form>
</div>
