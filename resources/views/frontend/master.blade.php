<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title> Link My Heart @yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend-assets') }}/imgs/favicon2.png" type="image/x-icon">
    <!-- Template CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone.min.css">
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/style.css">

</head>

<body>

@yield('modals')

@include('frontend.include.header')

<main class="main">
    @yield('content')
</main>

@include('frontend.include.footer')

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        // Toggle the menu when the toggle button is clicked
        $('#homeMenuNavToogle').on('click', function(e) {
            e.stopPropagation(); // Prevent click from bubbling to the document
            $('#homeMobileNav').toggleClass('show');
        });

        // Hide the menu when clicking outside of it
        $(document).on('click', function(e) {
            if ($('#homeMobileNav').hasClass('show') && !$(e.target).closest('#homeMobileNav, #homeMenuNavToogle').length) {
                $('#homeMobileNav').removeClass('show');
            }
        });

        // Prevent menu from closing when clicking inside it
        $('#homeMobileNav').on('click', function(e) {
            e.stopPropagation(); // Prevent click from bubbling to the document
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const userId = urlParams.get('id');
    if (userId) {
        // Assuming you have a function like `loadChat(userId)` that triggers the chat
        loadChat(userId);
    }
});

</script>

@yield('customJs')

</body>

</html>
