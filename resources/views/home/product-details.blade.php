<!DOCTYPE html>
<html>

<head>
    @include('home.head')
</head>

<body>
    <!-- hero area starts -->
    <div class="hero_area">
        <!-- header section starts -->

        @include('home.header')

        <!-- end header section -->
    </div>
    <!-- end hero area -->

    @include('home.product-details-component')

    <!-- footer section starts -->

    @include('home.footer')

    <!-- end footer section -->
</body>

</html>
