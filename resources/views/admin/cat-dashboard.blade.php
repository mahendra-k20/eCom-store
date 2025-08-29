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
    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);

            swal({
                title: 'Are you sure to delete this',
                text: 'This will be the permanent action',
                icon: 'warning',
                buttons: true,
                dangerMode: true
            }).then((willCancel) => {
                if (willCancel) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</div>
