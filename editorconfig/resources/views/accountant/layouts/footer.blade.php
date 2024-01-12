</section>
<!-- END CONTENT -->
</main>
<!-- END MAIN -->

</div>
<!-- END WRAPPER -->

<!-- START LEFT NAVIGATION DRAWER -->
<aside class="fixed top-0 bottom-0 left-0 z-30 flex flex-col invisible w-full max-w-xs transition-all duration-300 ease-in-out -translate-x-full bg-white border-r border-gray-200 outline-none drawer" id="navigationDrawer" aria-labelledby="drawerRightLabel" aria-hidden="true" tabindex="-1">
  <div class="flex items-center justify-between px-4 py-6">
    <div class="flex items-center gap-3 pl-3">
      <a href="#" title="{{env('APP_NAME')}}" class="flex">
        <img class="w-auto h-8" src="{{ asset('images/logo.svg')}}" alt="{{env('APP_NAME')}}">
      </a>

      <span class="badge badge-white">
        <svg class="fill-primary-600" viewBox="0 0 6 6" aria-hidden="true">
          <circle cx="3" cy="3" r="3" />
        </svg>
        Accountants
      </span>
    </div>

    <!-- close button -->
    <button type="button" class="text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none btn-close" data-dismiss="drawer" aria-label="Close">
      <span class="sr-only">
        Close
      </span>
      <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M18 6l-12 12"></path>
        <path d="M6 6l12 12"></path>
      </svg>
    </button>
  </div>

  <div class="flex flex-col justify-between flex-1 px-4 pb-6 space-y-6 overflow-y-auto grow">
    <div class="bg-white border border-gray-200 divide-y divide-gray-200 rounded-lg">
      <div class="p-3">
        <div class="flex items-center gap-3">
          <img class="object-cover w-8 h-8 bg-gray-300 rounded-lg shrink-0" src="{{ getImagePath(auth()->user()->accountant()->first()->logo, 'accountant/logo') }}" alt="">
          <p class="flex-1 min-w-0 text-sm font-semibold text-gray-900 truncate">
          {{auth()->user()->accountant()->first()->company_name}}
          </p>
        </div>
      </div>
    </div>

    <div class="space-y-1">
      <a href="{{ route('accountant_dashboard')}}" title="Dashboard" class="nav-link active">
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
        <a href="{{route('clients')}}" title="Clients" class="nav-link">
          <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
          </svg>
          Clients
          <span class="ml-auto badge badge-default-light">
            {{ getClientCount(auth()->user()->id) }}
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

        <a href="{{ route('send_notifications') }}" title="Send Notifications" class="nav-link">
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

      <a href="account-settings.html" title="Account & Settings" class="nav-link">
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

    <div class="flex items-center gap-2 px-3">
      <p class="text-xs font-medium text-gray-500">
        2023 © {{env('APP_NAME')}}
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
<!-- END LEFT NAVIGATION DRAWER -->