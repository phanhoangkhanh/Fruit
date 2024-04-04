<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SFVN LOGIN</title>
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
    <div class="app">
        <div class="container-fluid p-0 h-100">
            <div class="row no-gutters h-100 full-height">
                <div class="col-lg-4 d-none d-lg-flex bg" 
                    style="background-image:url('https://media.istockphoto.com/id/529664572/vi/anh/n%E1%BB%81n-tr%C3%A1i-c%C3%A2y.jpg?s=612x612&w=0&k=20&c=h4Z8fodRES1ZpfPzCPrz60nNCEyxqQJKey6dnsSDH84=') ;
                    opacity: 0.7;">
                    <div class="d-flex h-100 p-h-40 p-v-15 flex-column justify-content-between">
                        
                        <div>
                            <h1 class="text-white m-b-20 font-weight-normal"></h1>
                            <p class="text-white font-size-16 lh-2 w-80 opacity-08"></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-white"></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 bg-white">
                    <div class="container h-100">
                        <div class="row no-gutters h-100 align-items-center">
                            <div class="col-md-8 col-lg-7 col-xl-6 mx-auto">
                                <h2>FRUIT OF SFVN</h2>
                                <p class="m-b-30">Please login the system.</p>
                            
                                <form method="post" role="form"  action="{{route('login')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="userName">Name:</label>
                                        <input type="text" class="form-control" id="code_user" placeholder="..." name="name">
                                        @error('name') <span class="form-control alert alert-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="password">Password:</label>
                                        <div class="row">
                                            <div class="col-md-11">
                                                <input type="password" class="form-control" id="password" placeholder="Password" name="password">                                                                                                                  
                                            </div>
                                            <div class="col-md-1">
                                                <i class="anticon anticon-eye toggle"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <button class="btn btn-primary">Login</button>
                                            <button class="btn btn-success" 
                                                type="button"
                                                data-toggle="modal" data-target=".bd-example-modal-lg">
                                                Register</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
    @livewire('register-modal', [], key('register-modal'))
    
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
</html>

<script>

    const toggle = document.querySelector(".toggle"),
          input = document.querySelector("#password");

          toggle.addEventListener("click", () =>{
              if(input.type ==="password"){
                input.type = "text";
                toggle.classList.replace("uil-eye-slash", "uil-eye");
              }else{
                input.type = "password";
              }
          })

</script>