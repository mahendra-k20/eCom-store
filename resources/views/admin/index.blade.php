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

        <!-- Main dashboard-->
        @include('admin.dashboard')
        <!-- Main dashboard end-->
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
</body>

</html>
