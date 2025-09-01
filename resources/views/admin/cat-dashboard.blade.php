<div class="container category-section">
    <h4 class="display-4 text-white">Add Category</h4>
    <hr>
    <form class="category-form mt-5" action="{{ route('admin.add_category') }}" method="post">
        @csrf
        <input type="text" name="category" id="category">
        <input class="btn btn-primary" type="submit" value="Add Category">
    </form>
</div>

<div class="container category-table mt-5">
    <table>
        <thead>
            <tr>
                <th class="serial">Serial No.</th>
                <th class="category_name">Category Name</th>
                <th class="category_delete">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $serial = 0;
            @endphp
            @foreach ($categories as $category)
                <tr>
                    <td class="serial">{{ $serial = $serial + 1 }}</td>
                    <td class="category_name">{{ $category->category_name }}</td>
                    <td><a href="{{ route('admin.edit_category', base64_encode($category->id)) }}"
                            class="btn btn-success">Edit</a>
                        <a onclick="confirmation(event)" href="{{ route('admin.delete_category', $category->id) }}"
                            class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
