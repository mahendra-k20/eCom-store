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

<script src="{{ asset('/adminasset/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/adminasset/vendor/popper.js/umd/popper.min.js') }}"></script>
<script src="{{ asset('/adminasset/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/adminasset/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
<script src="{{ asset('/adminasset/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('/adminasset/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('/adminasset/js/charts-home.js') }}"></script>
<script src="{{ asset('/adminasset/js/charts-home.js') }}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
    integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
