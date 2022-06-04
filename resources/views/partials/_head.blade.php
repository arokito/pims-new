<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>{{ config('app.name') }}</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="{{ config('app.name') }}">
<meta name="author" content="Aron">
<meta name="description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
<meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
<link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://demo.themesberg.com/volt-pro">
<meta property="og:title" content="{{ config('app.name') }}">
<meta property="og:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
<meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
<meta property="twitter:title" content="{{ config('app.name') }}">
<meta property="twitter:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
<meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

<!-- Favicon -->
{{-- <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}"> --}}
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('assets/img/favicon/site.webmanifest') }}">
<link rel="mask-icon" href="{{ asset('assets/img/favicon/safari-pinned-tab.svg') }}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<!-- Sweet Alert -->
<link type="text/css" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

<!-- Notyf -->
<link type="text/css" href="{{ asset('vendor/notyf/notyf.min.css') }}" rel="stylesheet">

<!-- Volt CSS -->
<link type="text/css" href="{{ asset('css/volt.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('css/custom-datatable.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('css/custom.css') }}" rel="stylesheet">


{{-- Datatable css --}}

{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css"> --}}


{{-- Jquery --}}
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<link rel="stylesheet" type="text/css" 
href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">

<style>
    #iphone {
        z-index: -2;
    }

    #iphone img {
        z-index: -1;
    }

    .demo-page-1 {
        position: absolute;
        float: left;
        margin-top: -400px;
        margin-left: 160px;
        z-index: 1;
    }
    .demo-page-1 p {
        margin: 0;
        padding: 0;
        font-size: 13px;
    }

    .demo-page-2 {
        position: absolute;
        float: left;
        margin-top: -400px;
        margin-left: 160px;
        z-index: 1;
    }
    .demo-page-2 p {
        margin: 0;
        padding: 0;
        font-size: 13px;
    }

    .demo-page-3 {
        position: absolute;
        float: left;
        margin-top: -400px;
        margin-left: 160px;
        z-index: 1;
    }
    .demo-page-3 p {
        margin: 0;
        padding: 0;
        font-size: 13px;
    }

    .demo-page-4 {
        position: absolute;
        float: left;
        margin-top: -400px;
        margin-left: 160px;
        z-index: 1;
    }
    .demo-page-4 p {
        margin: 0;
        padding: 0;
        font-size: 13px;
    }

    .demo-page-5 {
        position: absolute;
        float: left;
        margin-top: -400px;
        margin-left: 160px;
        z-index: 1;
    }
    .demo-page-5 p {
        margin: 0;
        padding: 0;
        font-size: 13px;
    }

    .demo-page-6 {
        position: absolute;
        float: left;
        margin-top: -400px;
        margin-left: 160px;
        z-index: 1;
    }
    .demo-page-6 p {
        margin: 0;
        padding: 0;
        font-size: 13px;
    }

    .jumbotron.text-center {
    height: 17em;
}

input.form-control.col-md-6 {
    width: 50%;
    margin-right: 1em;
    display: inline;
}

div#notes {
    margin-top: 2%;
    width: 98%;
    margin-left: 1%;
}

@media (min-width: 991px) {
	.col-md-9.col-sm-12 {
    	margin-left: 12%;
	}
}
</style>