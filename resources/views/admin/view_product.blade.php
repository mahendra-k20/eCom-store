<!DOCTYPE html>
<html>

<head>
    @include('admin.head')
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->

        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Products</h2>
                </div>
            </div>
            @include('admin.viewproduct-dashboard')
        </div>

        <!-- Main dashboard-->

        <!-- Main dashboard end-->
    </div>
    <!-- JavaScript files-->
    @include('admin.js')


</body>

</html>
