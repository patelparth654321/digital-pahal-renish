@extends('admin.layouts.master')
@section('content')
@section('title')
    {{ "Accountant Details" }}
@endsection
<div class="min-h-full px-4 sm:px-6">
  <a href="{{ route('accountants') }}" type="button" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary-600 hover:text-primary-500 transition-all duration-150 hover:underline leading-6" title="Back">
    <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
      <path d="M5 12l14 0"></path>
      <path d="M5 12l6 6"></path>
      <path d="M5 12l6 -6"></path>
    </svg>
    Back to Accountants
</a>
  <!-- START NAME & ACTIONS -->
  <div class="flex flex-col gap-4 xl:gap-6 xl:justify-between xl:flex-row xl:items-center mt-2">
    <div class="flex flex-col items-center gap-2 sm:flex-row sm:justify-start sm:gap-3">
      <img class="w-12 h-12 bg-gray-300 rounded-lg" src="{{ getImagePath($row->logo, 'accountant/logo') }}" alt="">
      <h2 class="text-xl font-bold text-gray-900">
        {!! $row['company_name'] !!}
      </h2>
      {!! getUserStatus($row['status']) !!}
    </div>

    <div class="flex flex-col gap-4 sm:justify-start sm:flex-row sm:items-center xl:justify-end">
      <div class="relative flex dropdown">
        <button type="button" class="w-full btn btn-secondary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="true">
          More
          <svg aria-hidden="true" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M6 9l6 6l6 -6"></path>
          </svg>
        </button>

        <div class="absolute right-0 z-30 invisible w-56 mt-1 transition-all duration-100 origin-top-right scale-95 bg-white rounded-lg shadow-lg opacity-0 pointer-events-none top-full ring-1 ring-gray-200 focus:outline-none dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
          <div class="divide-y divide-gray-100">
            <div class="py-1" role="none">
              <div class="flex items-start gap-2 px-4 py-2">
                <div class="flex-1 min-w-0">
                  <p class="text-sm font-medium text-gray-900">
                    {{ $row['status'] ==1? "Disable Accountant":"Enable Accountant" }}
                  </p>
                </div>

                <div class="relative">
                  <input type="checkbox" {{ $row['status'] ==1?'checked':'' }} class="opacity-0 sr-only peer changeStatus" id="showFullPrompt" data-id="{{ $row['accountant_id'] }}" data-type="accountants">
                  <label for="showFullPrompt" class="relative flex h-5 w-9 cursor-pointer items-center rounded-full bg-gray-400 px-0.5 outline-gray-400 transition-colors before:h-4 before:w-4 before:rounded-full before:bg-white before:shadow before:transition-transform before:duration-300 peer-checked:bg-success-500 peer-checked:before:translate-x-full peer-focus-visible:outline peer-focus-visible:outline-offset-2 peer-focus-visible:outline-gray-400 peer-checked:peer-focus-visible:outline-success-500">
                    <span class="sr-only">
                      Enable
                    </span>
                  </label>
                </div>
              </div>
            </div>

            <div class="py-1" role="none">
              <a href="{{ route('edit_accountant', ['id'=>$row['accountant_id']]) }}" title="" class="flex items-center gap-3 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-150 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900 whitespace-nowrap" role="menuitem" tabindex="-1">
                <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                  <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5"></path>
                  <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z"></path>
                </svg>
                Edit
              </a>

              <a href="javascript:void(0)" data-id="{{ $row['accountant_id'] }}" data-type="accountants" class="flex items-center gap-3 px-4 py-2 text-sm font-medium transition-all duration-150 text-error-600 hover:bg-error-50 hover:text-error-700 focus:outline-none focus:bg-error-50 focus:text-error-700 whitespace-nowrap deleteData" data-toggle="modal" data-target="#deleteConfirmationModal">
                <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M4 7h16"></path>
                  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                  <path d="M10 12l4 4m0 -4l-4 4"></path>
                </svg>
                Delete
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END NAME & ACTIONS -->

  <!-- START BUSINESS & OTHER DETAILS -->
  <div class="grid grid-cols-1 gap-4 mt-6 xl:grid-cols-2">
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
      <div class="px-4 py-5 sm:p-6">
        <h3 class="text-xs font-semibold tracking-widest text-gray-500 uppercase">
          Business details
        </h3>

        <div class="grid grid-cols-1 gap-6 mt-5 sm:grid-cols-5">
          <div class="flex items-start gap-3 sm:col-span-3">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
              <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
            </svg>
            <div>
              <p class="text-sm font-medium text-gray-600">
                Owner Name
              </p>
              <p class="mt-2 text-base font-medium text-gray-900">
                {!! $row['name'] !!}
              </p>
            </div>
          </div>

          <div class="flex items-start gap-3 sm:col-span-2">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M9 14l6 -6"></path>
              <circle cx="9.5" cy="8.5" r=".5" fill="currentColor"></circle>
              <circle cx="14.5" cy="13.5" r=".5" fill="currentColor"></circle>
              <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2"></path>
            </svg>
            <div>
              <p class="text-sm font-medium text-gray-600">
                GST Number
              </p>
              <p class="mt-2 text-base font-medium text-gray-900">
                {!! $row['gst_number'] !!}
              </p>
            </div>
          </div>

          <div class="flex items-start gap-3 sm:col-span-3">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
              <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>
            </svg>
            <div>
              <p class="text-sm font-medium text-gray-600">
                Address
              </p>
              <p class="mt-2 text-base font-medium text-gray-900">
                {!! $row['address'] !!}
              </p>
            </div>
          </div>

          <div class="flex items-start gap-3 sm:col-span-2">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <circle cx="8.5" cy="8.5" r="1" fill="currentColor"></circle>
              <path d="M4 7v3.859c0 .537 .213 1.052 .593 1.432l8.116 8.116a2.025 2.025 0 0 0 2.864 0l4.834 -4.834a2.025 2.025 0 0 0 0 -2.864l-8.117 -8.116a2.025 2.025 0 0 0 -1.431 -.593h-3.859a3 3 0 0 0 -3 3z">
              </path>
            </svg>
            <div>
              <p class="text-sm font-medium text-gray-600">
                Category
              </p>
              <div class="flex items-center gap-2 mt-2">
                {!! getUserCategoryType($row['type']) !!}
                <!-- <span class="text-sm font-medium text-gray-500">
                  Monthly
                </span> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
      <div class="px-4 py-5 sm:p-6">
        <h3 class="text-xs font-semibold tracking-widest text-gray-500 uppercase">
          Other details
        </h3>

        <div class="grid grid-cols-1 gap-6 mt-5 sm:grid-cols-5">
          <div class="flex items-start gap-3 sm:col-span-3">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path>
              <path d="M3 7l9 6l9 -6"></path>
            </svg>
            <div>
              <p class="text-sm font-medium text-gray-600">
                Email Address
              </p>
              <p class="mt-2 text-base font-medium text-gray-900">
                {!! $row['email'] !!}
              </p>
            </div>
          </div>

          <div class="flex items-start gap-3 sm:col-span-2">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
              </path>
            </svg>
            <div>
              <p class="text-sm font-medium text-gray-600">
                Mobile Number
              </p>
              <p class="mt-2 text-base font-medium text-gray-900">
                {!! $row['phone'] !!}
              </p>
            </div>
          </div>

          <div class="flex items-start gap-3 sm:col-span-3">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M12 4l-8 4l8 4l8 -4l-8 -4"></path>
              <path d="M4 12l8 4l8 -4"></path>
              <path d="M4 16l8 4l8 -4"></path>
            </svg>
            <div>
              <p class="text-sm font-medium text-gray-600">
                Subscription Plan
              </p>
              <div class="flex items-center gap-2 mt-2">
                <span class="badge badge-primary-light">
                  {!! $plan->name !!}
                </span>
                <!-- <span class="text-sm font-medium text-gray-500">
                  Monthly
                </span> -->
              </div>
            </div>
          </div>

          <div class="flex items-start gap-3 sm:col-span-2">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
              <path d="M12 12l3 2"></path>
              <path d="M12 7v5"></path>
            </svg>
            <div>
              <p class="text-sm font-medium text-gray-600">
                Created On
              </p>
              <p class="mt-2 text-base font-medium text-gray-900">
                {!! dateFormat($row['created_at'], 'd M Y') !!}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END BUSINESS & OTHER DETAILS -->

  <ul class="flex items-center w-full mt-6 space-x-4 overflow-x-auto border-b border-gray-200 tabs" id="myTab" role="tablist">
    <li class="tab-item" role="presentation">
      <button type="button" id="clients-tab" class="tab-link active" data-toggle="tab" data-target="#clients" role="tab" aria-controls="clients" aria-selected="true">
        Clients ({{ $clients_count }})
      </button>
    </li>

    <li class="tab-item" role="presentation">
      <button type="button" id="billing-tab" class="tab-link" data-toggle="tab" data-target="#billing" role="tab" aria-controls="billing" aria-selected="false">
        Plans & Billing
      </button>
    </li>
  </ul>

  <div class="pb-6 tab-content" id="myTabContent">
    <div class="hidden py-6 transition-opacity duration-150 ease-linear bg-transparent opacity-0 tab-pane show" id="clients" role="tabpanel" aria-labelledby="clients-tab">
      <!-- START SEARCH & FILTERS -->
      <div class="flex flex-col gap-4 xl:gap-6 xl:justify-between xl:flex-row xl:items-center">
        <div class="flex items-center gap-4 xl:justify-start">
          <div class="flex-1 xl:flex-none">
            <label for="" class="sr-only">
              Filter by Status
            </label>
            <div>
              <select id="status" class="pl-3 pr-10 form-select">
                <option value="">
                  Filter by Status
                </option>
                <option {{ isset($_GET['status']) && $_GET['status']=="1" ? "selected":""  }} value="1">
                  Active
                </option>
                <option {{ isset($_GET['status']) && $_GET['status']=="0" ? "selected":""  }} value="0">
                  Inactive
                </option>
              </select>
            </div>
          </div>

          <div class="flex-1 xl:flex-none">
            <label for="" class="sr-only">
              Filter by Type
            </label>
            <div>
              <select id="type" class="pl-3 pr-10 form-select">
                <option value="">
                  Filter by Type
                </option>
                <option value="2" {{ isset($_GET['type']) && $_GET['type']=="2" ? "selected":""  }}>
                  Only GST
                </option>
                <option value="1" {{ isset($_GET['type']) && $_GET['type']=="1" ? "selected":""  }}>
                  Only DMS
                </option>
                <option value="1,2" {{ isset($_GET['type']) && $_GET['type']=="1,2" ? "selected":""  }}>
                  GST & DMS
                </option>
              </select>
            </div>
          </div>
        </div>

        <div class="flex flex-col gap-4 xl:justify-end sm:flex-row sm:items-center">
          <div class="flex-1 w-full xl:max-w-xs">
            <label for="searchClients" class="sr-only">
              Search Clients
            </label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                  <path d="M21 21l-6 -6"></path>
                </svg>
              </div>

              <input type="search" id="searchKeyword" placeholder="Search by client name, company, phone or email..." value="{{ isset($_GET['search']) ? $_GET['search']: '' }}" class="pl-10 form-input">
            </div>
          </div>
        </div>
      </div>
      <!-- END SEARCH & FILTERS -->

      <div id="clientsView">
        @if($clients && count($clients) > 0)
        <!-- START CLIENTS TABLE -->
        <div class="flow-root mt-6">
          <div class="overflow-x-auto border border-gray-200 rounded-lg shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="py-3.5 pl-4 pr-3 w-80 sm:w-auto cursor-pointer text-left text-xs font-semibold text-gray-500 whitespace-nowrap sm:pl-6 sort" data-sort="user-name">
                    User Name
                  </th>
                  <th scope="col" class="px-3 py-3.5 text-left cursor-pointer text-xs font-semibold hidden 2xl:table-cell whitespace-nowrap text-gray-500 sort" data-sort="company-name">
                    Company / Shop Name
                  </th>
                  <th scope="col" class="px-3 hidden sm:table-cell py-3.5 text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                    Contact Details
                  </th>
                  <th scope="col" class="px-3 py-3.5 text-left text-xs cursor-pointer font-semibold  hidden md:table-cell whitespace-nowrap text-gray-500 ">
                    Category
                  </th>
                  <th scope="col" class="px-3 py-3.5 text-left text-xs  cursor-pointer font-semibold hidden xl:table-cell whitespace-nowrap text-gray-500 sort" data-sort="created-date">
                    Created On
                  </th>
                  <th scope="col" class="px-3 hidden xl:table-cell py-3.5 cursor-pointer text-left text-xs font-semibold whitespace-nowrap text-gray-500 sort" data-sort="status">
                    Status
                  </th>
                  <th scope="col" class="relative text-left text-xs font-semibold text-gray-500 whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
                  </th>
                </tr>
              </thead>

              <tbody class="bg-white divide-y divide-gray-200 list">
                @foreach($clients as $c)
                <tr>
                  <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 whitespace-nowrap">
                  <a href="{{ route('admin_view_client', ['id'=>$c['client_id']])}}" >
                    <div class="flex items-center gap-3">
                      <span class="avatar avatar-md">
                        {{ getNameShort($c['name']) }}
                      </span>
                      <div>
                        <span>
                          {!! $c['name'] !!}
                        </span>
                        <span class="block mt-px text-xs font-normal text-gray-500 2xl:hidden">
                          {!! $c['company_name'] !!}
                        </span>
                      </div>
                    </div>
                  </a>
                  </td>
                  <td class="hidden px-3 py-4 text-sm text-gray-600 2xl:table-cell whitespace-nowrap">
                    {!! $c['company_name'] !!}
                  </td>
                  <td class="hidden px-3 py-4 text-sm text-gray-600 sm:table-cell whitespace-nowrap">
                    {!! $c['email'] !!}<br>{!! $c['phone'] !!}
                  </td>
                  <td class="hidden px-3 py-4 text-sm text-gray-600 md:table-cell whitespace-nowrap">
                    <div class="flex items-center gap-1.5">
                      {!! getUserCategoryType($c['type']) !!}
                    </div>
                  </td>
                  <td class="hidden px-3 py-4 text-sm text-gray-600 xl:table-cell whitespace-nowrap">
                    {!! dateFormat($c['created_at'], 'd M Y') !!}
                  </td>
                  <td class="hidden px-3 py-4 text-sm text-gray-600 xl:table-cell whitespace-nowrap">
                    {!! getUserStatus($c['status']) !!}
                  </td>

                  <td class="relative py-4 pl-3 pr-4 whitespace-nowrap sm:pr-6">
                    <div class="flex items-center gap-4">

                      <a href="{{ route('admin_view_client', ['id'=>$c['client_id']])}}" title="" class="btn btn-icon btn-secondary-light btn-icon-transparent" aria-label="View Client" data-microtip-position="top" role="tooltip">
                        <span class="sr-only">
                          View Client
                        </span>
                        <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                          <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                          </path>
                        </svg>
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>

            </table>
          </div>
        </div>
        <!-- END CLIENTS TABLE -->

        <!-- START PAGINATION -->
        <div class="flex flex-col items-center mt-8 sm:mt-4 sm:flex-row sm:justify-between">
          {!! $clients->appends($_GET)->links() !!}
        </div>
        <!-- END PAGINATION -->
        @else
        <!-- START EMPTY STATE -->
        <div class="flex items-center justify-center h-full p-12 text-center sm:p-16 sm:max-w-md sm:mx-auto">
          <div>
            <img class="w-auto mx-auto h-52" src="{{ asset('images/empty-clients.svg')}}" alt="">
            <p class="mt-4 text-lg font-bold text-gray-900">
              No clients found
            </p>
            <p class="mt-2 text-sm font-normal leading-6 text-gray-600">
              Velit officia consequat duis enim velit mollit. Exercitation veniam consequat.
            </p>

          </div>
        </div>
        <!-- END EMPTY STATE -->
        @endif
      </div>
    </div>

    <div class="hidden py-6 transition-opacity duration-150 ease-linear bg-transparent opacity-0 tab-pane" id="billing" role="tabpanel" aria-labelledby="billing-tab">
      <!-- START PLAN DETAILS -->
      <div class="grid grid-cols-1 gap-5 xl:grid-cols-2">
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
          <div class="px-4 py-5 sm:p-6">
            <div class="flex flex-col gap-6 sm:justify-between sm:flex-row sm:items-center">
              <div>
                <div class="flex items-center gap-2">
                  <h2 class="text-lg font-semibold text-gray-900">
                    {!! $plan->name !!}
                  </h2>
                  <!-- <span class="badge badge-primary-light">
                    Monthly
                  </span> -->
                </div>
                <p class="mt-1 text-sm font-normal text-gray-600">
                  {!! $plan->descriptions !!}
                </p>
              </div>

              <div class="sm:text-right">
                <p class="text-3xl font-bold text-gray-900">
                  {!! env('CURRENCY').$plan->price !!}
                </p>
                <p class="text-sm font-normal text-gray-500">
                  /month
                </p>
              </div>
            </div>

            <p class="mt-6 text-sm font-medium text-gray-900">
              506 MB / 2 GB Used
            </p>
            <div class="flex items-center gap-4 mt-2">
              <div class="relative w-full h-3 bg-gray-200 rounded-full">
                <div class="absolute inset-y-0 bg-primary-600 left-0 rounded-full w-[40%]"></div>
              </div>

              <span class="text-sm font-medium text-gray-900">
                40%
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- END PLAN DETAILS -->

      <hr class="mt-8 border-gray-200">

      <!-- START BILLING & INVOICING -->
      <div class="mt-6">
        <div class="flex flex-col gap-4 sm:gap-6 sm:justify-between sm:flex-row sm:items-center">
          <div class="flex-1 min-w-0">
            <h3 class="text-lg font-semibold text-gray-900">
              Billing and invoicing
            </h3>
            <p class="mt-1 text-sm font-normal text-gray-600">
              Pick an account plan that fits your workflow.
            </p>
          </div>

          <button type="button" class="btn btn-secondary">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
              <path d="M7 11l5 5l5 -5"></path>
              <path d="M12 4l0 12"></path>
            </svg>
            Download all
          </button>
        </div>

        <div class="flow-root mt-6">
          <div class="overflow-x-auto border border-gray-200 rounded-lg shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="py-3.5 pl-4 pr-3 w-80 sm:w-auto text-left text-xs font-semibold text-gray-500 whitespace-nowrap sm:pl-6">
                    Invoice
                  </th>
                  <th scope="col" class="px-3 py-3.5 hidden xl:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                    Billing date
                  </th>
                  <th scope="col" class="px-3 py-3.5 hidden sm:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                    Status
                  </th>
                  <th scope="col" class="px-3 py-3.5 hidden sm:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                    Amount
                  </th>
                  <th scope="col" class="px-3 py-3.5  text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                    Plan
                  </th>
                  <th scope="col" class="relative text-left text-xs font-semibold text-gray-500 whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
                  </th>
                </tr>
              </thead>

              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                  <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 whitespace-nowrap">
                    <div class="flex items-center gap-3">
                      <div class="inline-flex items-center justify-center w-10 h-10 rounded-full shrink-0 bg-primary-50 text-primary-600">
                        <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                          <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                          </path>
                          <path d="M9 7l1 0"></path>
                          <path d="M9 13l6 0"></path>
                          <path d="M13 17l2 0"></path>
                        </svg>
                      </div>
                      <div>
                        <span>
                          Invoice #007
                        </span>
                        <span class="block mt-px text-xs text-gray-500 xl:hidden">
                          Dec 1, 2022
                        </span>
                      </div>
                    </div>
                  </td>
                  <td class="hidden px-3 py-4 text-sm text-gray-600 xl:table-cell whitespace-nowrap">
                    Dec 1, 2022
                  </td>
                  <td class="hidden px-3 py-4 text-sm text-gray-600 sm:table-cell whitespace-nowrap">
                    <span class="badge badge-success-light">
                      <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
                      </svg>
                      Paid
                    </span>
                  </td>
                  <td class="hidden px-3 py-4 text-sm text-gray-600 sm:table-cell whitespace-nowrap">
                    ₹1,967.56
                  </td>
                  <td class="px-3 py-4 text-sm text-gray-600 whitespace-nowrap">
                    <span class="badge badge-white">
                      Basic Plan
                    </span>
                  </td>
                  <td class="relative py-4 pl-3 pr-4 whitespace-nowrap sm:pr-6">
                    <div class="flex items-center gap-4">
                      <a href="#" title="" class="btn btn-icon btn-secondary-light btn-icon-transparent" aria-label="Download Invoice" data-microtip-position="top" role="tooltip">
                        <span class="sr-only">
                          Download Invoice
                        </span>
                        <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                          <path d="M7 11l5 5l5 -5"></path>
                          <path d="M12 4l0 12"></path>
                        </svg>
                      </a>
                    </div>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- END BILLING & INVOICING -->
    </div>
  </div>

</div>
<script>
  $(document).on('keypress', "#searchKeyword", function() {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
      let url = "{{ route('view_accountant', ['id'=>$row['accountant_id']]) }}?search=" + $(this).val().trim();
      if ($("#type").val() != '') url = url + '&type=' + $("#type").val();
      if ($("#status").val() != '') url = url + '&status=' + $("#status").val();
      window.location.href = url
    }
  });

  $(document).on('change', '#status', function(e) {
    let url = "{{ route('view_accountant', ['id'=>$row['accountant_id']]) }}";
    url = url + "?status=" + $(this).val().trim();
    if ($("#type").val() != '') url = url + '&type=' + $("#type").val();
    if ($("#searchKeyword").val() != '') url = url + '&search=' + $("#searchKeyword").val();

    window.location.href = url;
  })

  $(document).on('change', '#type', function(e) {
    let url = "{{ route('view_accountant', ['id'=>$row['accountant_id']]) }}";
    url = url + "?type=" + $(this).val().trim();
    if ($("#status").val() != '') url = url + '&status=' + $("#status").val();
    if ($("#searchKeyword").val() != '') url = url + '&search=' + $("#searchKeyword").val();
    window.location.href = url;
  })
</script>
@endsection