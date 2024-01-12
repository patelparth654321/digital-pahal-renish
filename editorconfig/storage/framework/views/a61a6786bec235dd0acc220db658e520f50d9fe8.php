<body class="h-full font-sans antialiased text-gray-900 bg-white selection:bg-primary-600 selection:text-white">

  <!-- START WRAPPER -->
  <div class="flex flex-col min-h-screen">

    <!-- START HEADER -->
    <header class="sticky inset-x-0 top-0 z-20 py-3 shadow-sm bg-white/80 backdrop-blur-lg">
      <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <div class="flex items-center justify-between">
          <div class="shrink-0">
            <a href="<?php echo e(route('landing_page')); ?>" title="<?php echo e(env('APP_NAME')); ?>"
              class="relative z-10 flex items-center justify-center md:justify-start shrink-0">
              <img class="w-auto h-8" src="<?php echo e(asset('images/logo.svg')); ?>" alt="<?php echo e(env('APP_NAME')); ?>">
            </a>
          </div>

          <nav class="hidden gap-8 md:items-center md:justify-center md:flex md:inset-x-0 md:absolute">
            <a href="#features" title=""
              class="text-sm font-medium text-gray-600 transition-all duration-150 hover:text-primary-600">
              Features
            </a>

            <a href="#faqs" title=""
              class="text-sm font-medium text-gray-600 transition-all duration-150 hover:text-primary-600">
              FAQs
            </a>

            <a href="#contactForm" title=""
              class="text-sm font-medium text-gray-600 transition-all duration-150 hover:text-primary-600">
              Contact Us
            </a>
            <a href="#mobileApp" title=""
              class="text-sm font-medium text-gray-600 transition-all duration-150 hover:text-primary-600">
              <b>Get Mobile App</b>
            </a>
          </nav>

          <div class="relative z-10">
            <a href="<?php echo e(route('inquiry')); ?>" title="" class="btn btn-sm btn-primary" role="button">
              Get Started Today
            </a>
            <a href="<?php echo e(route('login')); ?>" title="" class="btn btn-sm btn-primary" role="button">
              Login
            </a>
          </div>
        </div>
      </div>
    </header>
    <!-- END HEADER -->

    <!-- START MAIN -->
    <main class="flex-1">
<?php /**PATH /home/u239499167/domains/digitalpahal.com/public_html/resources/views/layouts/header.blade.php ENDPATH**/ ?>