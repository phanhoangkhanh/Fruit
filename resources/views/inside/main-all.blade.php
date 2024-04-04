<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MAIN_COONTROL</title>
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/3.4.0/introjs.min.css" integrity="sha512-631ugrjzlQYCOP9P8BOLEMFspr5ooQwY3rgt8SMUa+QqtVMbY/tniEUOcABHDGjK50VExB4CNc61g5oopGqCEw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

    <link rel="stylesheet" type="text/css" href="/vendor/core/base/vendors/winbox/winbox.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/core/base/vendors/tagsinput/tagsinput.css">
    <link rel="stylesheet" type="text/css" href="/vendor/core/base/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/core/base/css/app.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/core/base/vendors/multiselect/multi-select.dist.css">
    <link rel="stylesheet" type="text/css" href="/vendor/core/base/vendors/winbox/winbox.min.css">
    <link rel="stylesheet" type="text/css" href="/vendor/core/base/css/crm.css">
    <link rel="stylesheet" type="text/css" href="/vendor/core/base/vendors/select2/select2.css">
    @stack('style')
</head>
<body>

    @include('inside.header')

    <div class="main-content">

        @hasSection('page.header')
            <div class="page-header">
                <h2 class="header-title">@yield('page.header')</h2>
            </div>
        @endif

        @yield('content')
    </div>

    @include('inside.footer')


    @livewireScripts
    
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script src="{{ asset('vendor/core/base/js/crm.js?v=1.0.0.7') }}"></script>
    <script src="{{ asset('vendor/core/base/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/core/base/vendors/multiselect/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('vendor/core/base/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('vendor/core/base/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/core/base/js/app.min.js') }}"></script>
    <script src="{{ asset('vendor/core/base/vendors/multiselect/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('vendor/core/base/vendors/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/core/base/js/cleave.min.js') }}"></script>
    <script src="{{ asset('vendor/core/base/js/vendors.min.js') }}"></script>
    <script src="{{ asset('vendor/core/base/vendors/tagsinput/tagsinput.js') }}"></script>
    <script src="{{ asset('vendor/core/base/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('vendor/core/base/vendors/select2/select2.min.js') }}"></script>
    @stack('scripts')
</body>
