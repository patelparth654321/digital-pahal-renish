</main>
<!-- END MAIN -->

</div>
<!-- END WRAPPER -->

<!-- START LEFT NAVIGATION DRAWER -->
<aside class="fixed top-0 bottom-0 left-0 z-30 flex flex-col invisible w-full max-w-xs transition-all duration-300 ease-in-out -translate-x-full bg-white border-r border-gray-200 outline-none drawer" id="navigationDrawer" aria-labelledby="drawerRightLabel" aria-hidden="true" tabindex="-1">
  <div class="flex items-center justify-between px-4 py-6">
    <div class="flex items-center gap-3 pl-3">
      <a href="#" title="DigitalPahal" class="flex">
        <img class="w-auto h-8" src="{{ asset('images/logo.svg')}}" alt="DigitalPahal">
      </a>

      <span class="badge badge-white">
        <svg class="fill-primary-600" viewBox="0 0 6 6" aria-hidden="true">
          <circle cx="3" cy="3" r="3" />
        </svg>
        Client
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
          <img class="object-cover w-8 h-8 bg-gray-300 rounded-lg shrink-0" src="{{ getImagePath(getAccountantDetail(auth()->user()->added_by)->logo, 'accountant/logo')}}" alt="">
          <p class="flex-1 min-w-0 text-sm font-semibold text-gray-900 truncate">
            {{getAccountantDetail(auth()->user()->added_by)->company_name}}
          </p>
        </div>
      </div>

      <div class="p-3">
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
      </div>
    </div>

    <div class="flex-1 space-y-1">
      <!-- <a href="gst-documents.html" title="GST Documents" class="nav-link">
        <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
          <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
          <path d="M9 17l0 -5"></path>
          <path d="M12 17l0 -1"></path>
          <path d="M15 17l0 -3"></path>
        </svg>
        GST Documents
      </a> -->

      <!-- <a href="{{ route('dms')}}" title="DMS Documents" class="nav-link active">
        <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
          <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
          <path d="M9 17h6"></path>
          <path d="M9 13h6"></path>
        </svg>
        DMS Documents
      </a> -->
      <a href="{{route('members')}}" title="Members" class="nav-link {{ (\Request::route()->getName() == 'members') ? 'active' : '' }}">
        <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
          <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
          <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
          <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
        </svg>
        Members
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

      <a href="{{ route('client_profile')}}" title="Account & Settings" class="nav-link">
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
<!-- END LEFT NAVIGATION DRAWER -->