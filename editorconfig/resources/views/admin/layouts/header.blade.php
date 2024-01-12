<body class="h-full font-sans antialiased text-gray-900 bg-white lg:overflow-hidden">

  <!-- START WRAPPER -->
  <div class="relative flex flex-1 lg:h-screen">

    <!-- START SIDE NAVIGATION -->
    <aside class="bg-white w-[280px] shrink-0 overflow-y-auto space-y-4 hidden lg:flex">
      <div class="w-full px-4 py-6 space-y-6 lg:flex lg:flex-col">
        <div class="flex items-center gap-3 px-3">
          <a href="{{ route('landing_page') }}" title="{{env('APP_NAME')}}" class="flex">
            <img class="w-auto h-8" src="{{ asset('images/logo.svg')}}" alt="{{env('APP_NAME')}}">
          </a>

          <span class="badge badge-white">
            <svg class="h-1.5 w-1.5 fill-primary-500" viewBox="0 0 6 6" aria-hidden="true">
              <circle cx="3" cy="3" r="3" />
            </svg>
            Admin
          </span>
        </div>

        <div class="space-y-1">
          <a href="{{ route('dashboard') }}" title="Dashboard" class="nav-link {{ (\Request::route()->getName() == 'dashboard') ? 'active' : '' }}">
            <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z"></path>
              <path d="M3 10h18"></path>
              <path d="M10 3v18"></path>
            </svg>
            Dashboard
          </a>
        </div>

        <div>
          <p class="px-3 text-xs font-medium tracking-widest text-gray-500 uppercase">
            View
          </p>
          <div class="mt-3 space-y-1">
            <a href="{{ route('accountants') }}" title="Accountants" class="nav-link {{ (\Request::route()->getName() == 'accountants') ? 'active' : '' }}">
              <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
              </svg>
              Accountants
            </a>
            <a href="{{ route('notifications') }}" title="Send Notifications" class="nav-link {{ (\Request::route()->getName() == 'notifications') ? 'active' : '' }}">
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

        <div class="flex-1">
          <p class="px-3 text-xs font-medium tracking-widest text-gray-500 uppercase">
            Manage
          </p>
          <div class="mt-3 space-y-1">
            <a href="{{ route('policies')}}" title="Policies" class="nav-link {{ (\Request::route()->getName() == 'policies') ? 'active' : '' }}">
              <svg aria-hidden="true" class="group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                <path d="M9 12h6"></path>
                <path d="M9 16h6"></path>
              </svg>
              Policies
            </a>

            <a href="{{ route('contactus')}}" title="Contact Us" class="nav-link {{ (\Request::route()->getName() == 'contactus') ? 'active' : '' }}">
              <svg aria-hidden="true" class="group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 4l-8 4l8 4l8 -4l-8 -4"></path>
                <path d="M4 12l8 4l8 -4"></path>
                <path d="M4 16l8 4l8 -4"></path>
              </svg>
              Contact Us
            </a>

            <a href="{{ route('enquiries')}}" title="Inquiries" class="nav-link {{ (\Request::route()->getName() == 'enquiries') ? 'active' : '' }}">
              <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M4 14v-3a8 8 0 1 1 16 0v3"></path>
                <path d="M18 19c0 1.657 -2.686 3 -6 3"></path>
                <path d="M4 14a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z"></path>
                <path d="M15 14a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z"></path>
              </svg>
              Inquiries
            </a>
          </div>
        </div>

        <div class="space-y-1">
          <a href="{{ route('admin_profile')}}" title="Account & Settings" class="nav-link {{ (\Request::route()->getName() == 'admin_profile') ? 'active' : '' }}">
            <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
              <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
              <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
            </svg>
            Account & Settings
          </a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
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

        <hr class="border-gray-200">

        <div class="grid grid-cols-2 gap-4 px-3">
          <a href="#" title="" class="flex text-xs font-medium text-gray-500 transition-all duration-200 hover:underline hover:text-gray-900">
            Privacy Policy
          </a>

          <a href="#" title="" class="flex text-xs font-medium text-gray-500 transition-all duration-200 hover:underline hover:text-gray-900">
            Terms of Service
          </a>

          <a href="#" title="" class="flex text-xs font-medium text-gray-500 transition-all duration-200 hover:underline hover:text-gray-900">
            DMS Policy
          </a>

          <a href="#" title="" class="flex text-xs font-medium text-gray-500 transition-all duration-200 hover:underline hover:text-gray-900">
            GST Data Policy
          </a>
        </div>

        <div class="px-3">
          <p class="text-xs font-medium text-gray-500">
            © {{env('APP_NAME')}} 2023
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
              @yield('title', 'Dashboard')
              </h1>
            </div>

            <div class="flex items-center justify-end gap-4">
              <p class="hidden text-sm font-medium text-gray-600 lg:inline">
                {{date('D, d M Y', strtotime(date('Y-m-d')))}}
              </p>

              <!-- <div class="hidden w-px h-4 bg-gray-300 lg:inline"></div> -->

              <!-- <button type="button" class="relative p-2 text-gray-600 transition-all duration-150 bg-gray-100 rounded-lg hover:bg-gray-200 hover:text-gray-900">
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
              </button> -->
            </div>
          </div>
        </div>
      </header>
      <!-- END HEADER -->

      <!-- START CONTENT -->
      <section class="flex-1 py-6 overflow-y-auto">