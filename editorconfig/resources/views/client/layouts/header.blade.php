<body class="h-full font-sans antialiased text-gray-900 bg-white lg:overflow-hidden">

  <!-- START WRAPPER -->
  <div class="relative flex flex-1 lg:h-screen">

    <!-- START SIDE NAVIGATION -->
    <aside class="bg-white w-[280px] shrink-0 overflow-y-auto space-y-4 hidden lg:flex">
      <div class="w-full px-4 py-6 space-y-6 lg:flex lg:flex-col">
        <div class="flex items-center gap-3 px-3">
          <a href="{{ route('landing_page') }}" title="DigitalPahal" class="flex">
            <img class="w-auto h-8" src="{{ asset('images/logo.svg')}}" alt="DigitalPahal">
          </a>

          <span class="badge badge-white">
            <svg class="fill-primary-600" viewBox="0 0 6 6" aria-hidden="true">
              <circle cx="3" cy="3" r="3" />
            </svg>
            Client
          </span>
        </div>

        <div class="bg-white border border-gray-200 divide-y divide-gray-200 rounded-lg">
          <div class="p-3">
          <a href="{{ route('client_dashboard') }}">
            <div class="flex items-center gap-3">
              <img class="object-cover w-8 h-8 bg-gray-300 rounded-lg shrink-0" src="{{ getImagePath(getAccountantDetail(auth()->user()->added_by)->logo, 'accountant/logo')}}" alt="">
              <p class="flex-1 min-w-0 text-sm font-semibold text-gray-900 truncate">
                {{getAccountantDetail(auth()->user()->added_by)->company_name}}
              </p>
            </div>
          </a>
          </div>

          <div class="p-3">
          <a href="{{ route('view_member', ['id'=>auth()->user()->id])}}">
            <div class="flex items-center gap-3">
              <div class="avatar avatar-default">
                {{getNameShort(auth()->user()->name)}}
              </div>
              <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-900 truncate">
                  {{auth()->user()->name}}
                </p>
                <p class="mt-px text-xs font-normal text-gray-500 truncate">
                  {{auth()->user()->client->company_name}}
                </p>
              </div>
            </div>
          </a>
          </div>
        </div>

        <div class="flex-1 space-y-1">
          <a href="{{route('members', ['type'=>'2'])}}" title="GST Documents" class="nav-link {{ (\Request::route()->getName() == 'members') && (isset($_GET['type']) && $_GET['type']=='2') ? 'active' : '' }}">
            <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
              <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
              <path d="M9 17l0 -5"></path>
              <path d="M12 17l0 -1"></path>
              <path d="M15 17l0 -3"></path>
            </svg>
            GST Members
            <!-- <span class="ml-auto badge badge-default-light">
              {{ getClientCount(auth()->user()->id, 2) }}
            </span> -->
          </a>

          <a href="{{route('members', ['type'=>'1'])}}" title="DMS Documents" class="nav-link {{ (\Request::route()->getName() == 'members') && (isset($_GET['type']) && $_GET['type']=='1') ? 'active' : '' }}">
            <svg aria-hidden="true" class="w-5 h-5 text-primary-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
              <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
              <path d="M9 17h6"></path>
              <path d="M9 13h6"></path>
            </svg>
            DMS Members
            <!-- <span class="ml-auto badge badge-default-light">
              {{ getClientCount(auth()->user()->id, 1) }}
            </span> -->
          </a>
          <a href="{{route('members')}}" title="Members" class="nav-link {{ (\Request::route()->getName() == 'members') && (!isset($_GET['type']) || (isset($_GET['type']) && $_GET['type']='1,2')) ? 'active' : '' }}">
            <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
              <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
              <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
            </svg>
            All Members
            <span class="ml-auto badge badge-default-light">
              {{ getClientCount(auth()->user()->id) }}
            </span>
          </a>
        </div>

        <div class="space-y-1">

          <!-- <a href="{{ route('client_help')}}" title="Help & Support" class="nav-link">
            <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
              <path d="M12 16v.01"></path>
              <path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483"></path>
            </svg>
            Help & Support
          </a> -->

          <a href="{{ route('client_profile')}}" title="Account & Settings" class="nav-link {{ (\Request::route()->getName() == 'client_profile') ? 'active' : '' }}">
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
            <button type="submit" class="nav-link danger">
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
            © DigitalPahal 2023
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
              <p class="hidden text-sm font-medium text-gray-600 md:inline">
                {{date('D, d M Y', strtotime(date('Y-m-d')))}}
              </p>

              <div class="hidden w-px h-4 bg-gray-300 md:inline"></div>

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
                            {{ getAccountantDetail(auth()->user()->added_by)->support_email_id }}
                          </li>

                          <li class="flex items-center gap-3">
                            <svg aria-hidden="true" class="w-5 h-5 text-primary-600 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                              </path>
                            </svg>
                            {{ getAccountantDetail(auth()->user()->added_by)->support_phone }}
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
                  @if(checkUnreadNotification(auth()->user()->id) > 0)
                  <span class="absolute top-0 right-0 block w-2 h-2 rounded-full bg-error-500 ring ring-white"></span>
                  @endif
                </button>

                <div class="absolute right-0 z-30 invisible mt-1 overflow-hidden transition-all duration-100 origin-top-right scale-95 bg-white rounded-lg shadow-lg opacity-0 pointer-events-none w-80 sm:w-96 top-full ring-1 ring-gray-200 focus:outline-none dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                  <div class="divide-y divide-gray-100">
                    <div class="divide-y divide-gray-100">
                      @foreach(getLastNotifications(auth()->user()->id) as $n)
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
                            @if($n['read_status'] ==0)
                            <span class="absolute top-0 right-0 block w-2 h-2 rounded-full bg-error-500 ring ring-white"></span>
                            @endif
                          </div>

                          <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900">
                              {!! $n['title'] !!}
                            </p>
                            <p class="mt-1 text-sm font-normal text-gray-600">
                              {!! $n['description'] !!}
                            </p>
                          </div>

                          <p class="text-sm font-medium text-gray-500">
                            {!! time_elapsed_string($n['created_at']) !!}
                          </p>
                        </div>
                      </div>
                      @endforeach
                    </div>

                    <a href="{{ route('client_notifications')}}" class="flex items-center justify-center px-4 py-2.5 transition-all duration-150 bg-gray-50 hover:bg-gray-100 text-gray-500 hover:text-gray-900 gap-1.5 text-sm font-medium">
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