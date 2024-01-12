<body class="h-full font-sans antialiased text-gray-900 bg-white lg:overflow-hidden">

  <!-- START WRAPPER -->
  <div class="relative flex flex-1 lg:h-screen">

    <!-- START SIDE NAVIGATION -->
    <aside class="bg-white w-[280px] shrink-0 overflow-y-auto space-y-4 hidden lg:flex">
      <div class="w-full px-4 py-6 space-y-6 lg:flex lg:flex-col">
        <div class="flex items-center gap-3 px-3">
          <a href="<?php echo e(route('landing_page')); ?>" title="<?php echo e(env('APP_NAME')); ?>" class="flex">
            <img class="w-auto h-8" src="<?php echo e(asset('images/logo.svg')); ?>" alt="<?php echo e(env('APP_NAME')); ?>">
          </a>

          <span class="badge badge-white">
            <svg class="fill-primary-600" viewBox="0 0 6 6" aria-hidden="true">
              <circle cx="3" cy="3" r="3" />
            </svg>
            Accountants
          </span>
        </div>

        <div class="bg-white border border-gray-200 divide-y divide-gray-200 rounded-lg">
          <div class="p-3">
          <a href="<?php echo e(route('accountant_dashboard')); ?>">
            <div class="flex items-center gap-3">
              
                <img class="object-cover w-8 h-8 bg-gray-300 rounded-lg shrink-0" src="<?php echo e(getImagePath(auth()->user()->accountant()->first()->logo, 'accountant/logo')); ?>" alt="">
                <p class="flex-1 min-w-0 text-sm font-semibold text-gray-900 truncate">
                  <?php echo e(auth()->user()->accountant()->first()->company_name); ?>

                </p>
              
            </div>
            </a>
          </div>
        </div>

        <div class="space-y-1">
          <a href="<?php echo e(route('accountant_dashboard')); ?>" title="Dashboard" class="nav-link <?php echo e((\Request::route()->getName() == 'accountant_dashboard') ? 'active' : ''); ?>">
            <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z"></path>
              <path d="M3 10h18"></path>
              <path d="M10 3v18"></path>
            </svg>
            Dashboard
          </a>
        </div>

        <div class="flex-1">
          <p class="px-3 text-xs font-medium tracking-widest text-gray-500 uppercase">
            Manage
          </p>
          <div class="mt-3 space-y-1">
            <a href="<?php echo e(route('clients')); ?>" title="Clients" class="nav-link <?php echo e((\Request::route()->getName() == 'clients') ? 'active' : ''); ?>">
              <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
              </svg>
              Clients
              <span class="ml-auto badge badge-default-light">
                <?php echo e(getClientCount(auth()->user()->id)); ?>

              </span>
            </a>

            <!-- <a href="support-tickets.html" title="Support Tickets" class="nav-link">
              <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M4 14v-3a8 8 0 1 1 16 0v3"></path>
                <path d="M18 19c0 1.657 -2.686 3 -6 3"></path>
                <path d="M4 14a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z"></path>
                <path d="M15 14a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z"></path>
              </svg>
              Support Tickets
              <span class="ml-auto badge badge-default-light">
                2
              </span>
            </a> -->

            <a href="<?php echo e(route('send_notifications')); ?>" title="Send Notifications" class="nav-link <?php echo e((\Request::route()->getName() == 'send_notifications') ? 'active' : ''); ?>">
              <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12.5 17h-8.5a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6a2 2 0 1 1 4 0a7 7 0 0 1 4 6v1"></path>
                <path d="M9 17v1a3 3 0 0 0 3.51 2.957"></path>
                <path d="M16 19h6"></path>
                <path d="M19 16v6"></path>
              </svg>
              Send Notifications
            </a>
          </div>
        </div>

        <div class="space-y-1">
          <!-- <a href="plans-billing.html" title="Plans & Billing" class="nav-link">
            <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M3 5m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z"></path>
              <path d="M3 10l18 0"></path>
              <path d="M7 15l.01 0"></path>
              <path d="M11 15l2 0"></path>
            </svg>
            Plans & Billing
          </a> -->

          <!-- <a href="help.html" title="Help & Support" class="nav-link">
            <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
              <path d="M12 16v.01"></path>
              <path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483"></path>
            </svg>
            Help & Support
          </a> -->

          <a href="<?php echo e(route('accountant_settings')); ?>" title="Account & Settings" class="nav-link <?php echo e((\Request::route()->getName() == 'accountant_settings') ? 'active' : ''); ?>">
            <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
              <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
              <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
            </svg>
            Account & Settings
          </a>

          <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" title="" class="nav-link danger">
              <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                <path d="M9 12h12l-3 -3"></path>
                <path d="M18 15l3 -3"></path>
              </svg>
              Logout
            </button>
          </form>
        </div>


        <div class="flex items-center gap-2 px-3">
          <p class="text-xs font-medium text-gray-500">
            2023 © <?php echo e(env('APP_NAME')); ?>

          </p>
          <p class="text-xs font-medium text-gray-500">
            •
          </p>
          <p class="text-xs font-semibold text-gray-500">
            v.1.2.1
          </p>
        </div>
      </div>
    </aside>
    <!-- END SIDE NAVIGATION -->

    <!-- START MAIN -->
    <main class="flex-1 min-w-0 bg-white lg:flex lg:flex-col lg:border-l lg:border-gray-200">

      <!-- START HEADER -->
      <header class="sticky inset-x-0 top-0 z-20 py-3 bg-white border-b border-gray-200">
        <div class="px-4 sm:px-6">
          <div class="flex items-center justify-between gap-6">
            <div class="flex items-center justify-start gap-4">
              <div class="flex items-center lg:hidden">
                <button type="button" class="btn btn-icon btn-secondary-light" data-toggle="drawer" data-target="#navigationDrawer">
                  <span class="sr-only">
                    Menu
                  </span>
                  <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 6l16 0"></path>
                    <path d="M4 12l16 0"></path>
                    <path d="M4 18l16 0"></path>
                  </svg>
                </button>
              </div>

              <h1 class="flex-1 min-w-0 text-xl font-bold text-gray-900 truncate shrink-0">
                <?php echo $__env->yieldContent('title', 'Dashboard'); ?>
              </h1>
            </div>

            <div class="flex items-center justify-end gap-4">
              <p class="hidden text-sm font-medium text-gray-600 lg:inline">
                <?php echo e(date('D, d M Y', strtotime(date('Y-m-d')))); ?>

              </p>

              <!-- <div class="hidden w-px h-4 bg-gray-300 lg:inline"></div> -->

              <!-- <div class="hidden sm:flex sm:items-center sm:gap-4">
                <a href="plans-billing.html" title="Upgrade Plan" class="btn btn-sm btn-primary" role="button">
                  <svg aria-hidden="true" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M16 18a2 2 0 0 1 2 2a2 2 0 0 1 2 -2a2 2 0 0 1 -2 -2a2 2 0 0 1 -2 2zm0 -12a2 2 0 0 1 2 2a2 2 0 0 1 2 -2a2 2 0 0 1 -2 -2a2 2 0 0 1 -2 2zm-7 12a6 6 0 0 1 6 -6a6 6 0 0 1 -6 -6a6 6 0 0 1 -6 6a6 6 0 0 1 6 6z">
                    </path>
                  </svg>
                  Upgrade Plan
                </a>
              </div> -->
              <div class="hidden sm:flex sm:items-center">
                <div class="relative flex dropdown">
                  <button type="button" class="btn btn-sm btn-secondary-light dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="true">
                    Need Help?
                    <svg aria-hidden="true" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M6 9l6 6l6 -6"></path>
                    </svg>
                  </button>

                  <div class="absolute right-0 z-30 invisible w-64 mt-1 transition-all duration-100 origin-top-right scale-95 bg-white rounded-lg shadow-lg opacity-0 pointer-events-none top-full ring-1 ring-gray-200 focus:outline-none dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div class="divide-y divide-gray-100">
                      <div class="px-4 py-5" role="none">
                        <p class="text-sm font-semibold text-gray-900">
                          Talk with our team
                        </p>
                        <p class="mt-1 text-xs font-medium text-gray-900">
                          Here to support you every step of the way.
                        </p>

                        <ul class="mt-4 space-y-3 text-sm font-medium text-gray-900">
                          <li class="flex items-center gap-3">
                            <svg aria-hidden="true" class="w-5 h-5 text-primary-600 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z">
                              </path>
                              <path d="M3 7l9 6l9 -6"></path>
                            </svg>
                            <?php echo e(getConfigValueByKey('app_email')); ?>

                          </li>

                          <li class="flex items-center gap-3">
                            <svg aria-hidden="true" class="w-5 h-5 text-primary-600 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                              </path>
                            </svg>
                            <?php echo e(getConfigValueByKey('app_phone')); ?>

                          </li>
                        </ul>
                      </div>

                      <div class="px-4 py-5" role="none">
                        <!-- <p class="text-sm font-semibold text-gray-900">
                          Alternatively, you can also create a support ticket to resolve your queries.
                        </p> -->

                        <div class="mt-4">
                          <!-- <a href="help.html" title="" class="btn-link !text-primary-600">
                            Create a Support Ticket
                            <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M5 12l14 0"></path>
                              <path d="M13 18l6 -6"></path>
                              <path d="M13 6l6 6"></path>
                            </svg>
                          </a> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="relative flex dropdown">
                <button type="button" class="btn btn-icon btn-secondary-light dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="true">
                  <span class="sr-only">
                    Notifications
                  </span>
                  <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6">
                    </path>
                    <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                    <path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727"></path>
                    <path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727"></path>
                  </svg>
                  <?php if(checkUnreadNotification(auth()->user()->id) > 0): ?>
                  <span class="absolute top-0 right-0 block w-2 h-2 rounded-full bg-error-500 ring ring-white"></span>
                  <?php endif; ?>
                </button>

                <div class="absolute right-0 z-30 invisible mt-1 overflow-hidden transition-all duration-100 origin-top-right scale-95 bg-white rounded-lg shadow-lg opacity-0 pointer-events-none w-80 sm:w-96 top-full ring-1 ring-gray-200 focus:outline-none dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                  <div class="divide-y divide-gray-100">
                    <div class="divide-y divide-gray-100">
                      <?php $__currentLoopData = getLastNotifications(auth()->user()->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="px-4 py-5">
                        <div class="flex items-start gap-5">
                          <div class="relative inline-flex items-center justify-center w-8 h-8 rounded-full bg-primary-50 text-primary-600 shrink-0">
                            <svg aria-hidden="true" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6">
                              </path>
                              <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                              <path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727"></path>
                              <path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727"></path>
                            </svg>
                            <?php if($n['read_status'] ==0): ?>
                            <span class="absolute top-0 right-0 block w-2 h-2 rounded-full bg-error-500 ring ring-white"></span>
                            <?php endif; ?>
                          </div>

                          <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900">
                              <?php echo $n['title']; ?>

                            </p>
                            <p class="mt-1 text-sm font-normal text-gray-600">
                              <?php echo $n['description']; ?>

                            </p>
                          </div>

                          <p class="text-sm font-medium text-gray-500">
                            <?php echo time_elapsed_string($n['created_at']); ?>

                          </p>
                        </div>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <a href="<?php echo e(route('accountant_notifications')); ?>" class="flex items-center justify-center px-4 py-2.5 transition-all duration-150 bg-gray-50 hover:bg-gray-100 text-gray-500 hover:text-gray-900 gap-1.5 text-sm font-medium">
                      View All
                      <svg aria-hidden="true" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l14 0"></path>
                        <path d="M13 18l6 -6"></path>
                        <path d="M13 6l6 6"></path>
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- END HEADER -->

      <!-- START ALERT -->
      <?php
      $now = time(); // or your date as well
      $your_date = strtotime("2010-01-31");
      $datediff = strtotime(auth()->user()->accountant()->first()->plan_expiry_date) - time();
      ?>
      <?php if(round($datediff / (60 * 60 * 24)) <=15): ?>
      <div class="sticky inset-x-0  z-10 py-2 border-b bg-warning-50 border-warning-100 top-[61px]">
        <div class="px-4 sm:px-6">
          <div class="flex items-start justify-center gap-2 md:items-center">
            <svg aria-hidden="true" class="w-4 h-4 shrink-0 text-warning-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M11.94 2a2.99 2.99 0 0 1 2.45 1.279l.108 .164l8.431 14.074a2.989 2.989 0 0 1 -2.366 4.474l-.2 .009h-16.856a2.99 2.99 0 0 1 -2.648 -4.308l.101 -.189l8.425 -14.065a2.989 2.989 0 0 1 2.555 -1.438zm.07 14l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor"></path>
            </svg>
            <p class="text-sm font-medium text-warning-800">
              <span class="font-bold">
                Head up:
              </span>
              Your current plan will expire in <?php echo e(round($datediff / (60 * 60 * 24))); ?> days.
              <a href="plans-billing.html" title="" class="font-bold underline">
                Upgrade now
              </a>
              to keep your account active.
            </p>
          </div>
        </div>
      </div>
      <?php endif; ?>
      <!-- END ALERT -->
      <!-- START CONTENT --><?php /**PATH /home/u239499167/domains/digitalpahal.com/public_html/resources/views/accountant/layouts/header.blade.php ENDPATH**/ ?>