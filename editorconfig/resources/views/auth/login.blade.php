<!doctype html>
<html class="h-full bg-white scroll-pt-14 scroll-smooth" lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- FAVICON -->
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png')}}">

  <!-- GOOGLE FONT / PUBLIC SANS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- CUSTOM CSS -->
  <link rel="stylesheet" href="{{ asset('css/main.css')}}">

  <!-- PAGE TITLE -->
  <title>
    Login / {{env('aap_name')}}
  </title>

</head>

<body class="h-full font-sans antialiased text-gray-900 bg-white">

  <!-- START WRAPPER -->
  <div class="flex flex-col min-h-screen lg:flex-row">

    <div class="py-12 overflow-hidden lg:w-1/2 bg-primary-50 sm:py-16 xl:py-24">
      <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col justify-between max-w-md mx-auto">
          <div class="flex-1 text-center lg:text-left">
            <a href="{{ route('landing_page') }}" title="Back to Home" class="">
              <img class="w-auto h-8 mx-auto lg:h-10 lg:mx-0" src="{{asset('images/logo.svg')}}" alt="">
            </a>

            <p class="mt-8 text-2xl font-bold text-gray-900 sm:text-3xl lg:mt-12">
              Welcome to the community!
            </p>
            <p class="mt-2 text-base font-normal leading-7 text-gray-600 sm:text-lg sm:leading-8">
              Join 170+ creators, bloggers and makers and start publishing your content today
            </p>
          </div>

          <div class="hidden lg:block">
            <img class="w-full" src="{{ asset('images/login-illustration.svg')}}" alt="">
          </div>
        </div>
      </div>
    </div>

    <div class="grid py-12 overflow-hidden bg-white sm:py-16 xl:py-24 lg:w-1/2 place-items-center">
      <div class="px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-sm xl:max-w-md">
          <form action="{{ route('login')}}" method="POST" class="space-y-5">
            @csrf
            <div class="input-group">
              <label for="" class="required">
                Email/Phone
              </label>
              <div class="mt-1.5 input-wrapper">
                <input type="text" name="email" id="email" placeholder="Enter your email or phone" class="form-input" autocomplete="email" autofocus required>
              </div>
            </div>

            <div class="input-group">
              <label for="" class="required">
                Password
              </label>
              <div class="mt-1.5 input-wrapper">
                <input type="password" name="password" id="password" placeholder="Enter your password" class="form-input" autocomplete="current-password" required>
              </div>
            </div>

            <div>
              <a href="#" title="" class="text-sm font-semibold transition-all duration-150 text-primary-600 hover:text-primary-500 hover:underline">
                Forgot password
              </a>
            </div>

            <button type="submit" class="w-full btn btn-primary">
              Sign in
            </button>
          </form>

          <p class="mt-10 text-sm font-normal leading-6 text-center text-gray-600 sm:px-6">
            Signing up for a {{env('APP_NAME')}} account means you agree to the <a href="#" title="" class="text-primary-600 hover:underline">Privacy Policy</a> and <a href="#" title="" class="text-primary-600 hover:underline">Terms of Service</a>.
          </p>
        </div>
      </div>
    </div>

  </div>
  <!-- END WRAPPER -->

  <!-- JQUERY -->
  <script src="{{ asset('plugins/jquery-3.4.1.min.js')}}"></script>

  <!-- PLUGINS -->
  <script src="{{ asset('plugins/hide-show-password/hideShowPassword.min.js')}}"></script>

  <!-- CUSTOM SCRIPT -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="{{ asset('js/main.js')}}"></script>
  <script>
    $(function() {
      $('#password').hideShowPassword({
        show: false,
        innerToggle: true,
        toggle: {
          className: 'password-toggle'
        }
      });
    });
  </script>
@if(session('error'))
<script>
  toastr.error("{{session('error')}}");
</script>
@endif
@if (session('success'))
<script>
  toastr.success("{!! \session('success') !!}");
</script>
@endif
</body>

</html>