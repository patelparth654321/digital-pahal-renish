@extends('admin.layouts.master')
@section('content')
@section('title')
{{ (isset($_GET['parentid']) ? "Member": "Client"). " Details" }}
@endsection
<section class="flex-1 py-6 overflow-y-auto">
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
    <div class="flex flex-col gap-4 xl:gap-6 xl:justify-between xl:flex-row xl:items-center mt-3">
      <div class="flex flex-col items-center gap-2 sm:flex-row sm:justify-start sm:gap-3">
        <span class="avatar avatar-lg">
          {{ getNameShort($row['name']) }}
        </span>
        <h2 class="text-xl font-bold text-gray-900">
          {!! $row['name'] !!}
        </h2>
        {!! getUserStatus($row['status']) !!}
      </div>

    </div>
    <!-- END NAME & ACTIONS -->

    <!-- START PERSONAL & BUSINESS DETAILS -->
    <div class="grid grid-cols-1 gap-4 mt-6 xl:grid-cols-2">
      <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="px-4 py-5 sm:p-6">
          <h3 class="text-xs font-semibold tracking-widest text-gray-500 uppercase">
            Personal details
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

      <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="px-4 py-5 sm:p-6">
          <h3 class="text-xs font-semibold tracking-widest text-gray-500 uppercase">
            Business details
          </h3>

          <div class="grid grid-cols-1 gap-6 mt-5 sm:grid-cols-5">
            <div class="flex items-start gap-3 sm:col-span-3">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M3 21l18 0"></path>
                <path d="M9 8l1 0"></path>
                <path d="M9 12l1 0"></path>
                <path d="M9 16l1 0"></path>
                <path d="M14 8l1 0"></path>
                <path d="M14 12l1 0"></path>
                <path d="M14 16l1 0"></path>
                <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path>
              </svg>
              <div>
                <p class="text-sm font-medium text-gray-600">
                  Company / Shop Name
                </p>
                <p class="mt-2 text-base font-medium text-gray-900">
                  {!! $row['company_name'] !!}
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
                <path d="M3 4m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z"></path>
                <path d="M9 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                <path d="M15 8l2 0"></path>
                <path d="M15 12l2 0"></path>
                <path d="M7 16l10 0"></path>
              </svg>
              <div>
                <p class="text-sm font-medium text-gray-600">
                  PAN Card Number
                </p>
                <p class="mt-2 text-base font-medium text-gray-900">
                  {!! $row['pancard_number'] !!}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END PERSONAL & BUSINESS DETAILS -->
    <ul class="flex items-center w-full mt-6 space-x-4 overflow-x-auto border-b border-gray-200 tabs" id="myTab" role="tablist">
      <li class="tab-item" role="presentation">
        <button type="button" id="clients-tab" class="tab-link active" data-toggle="tab" data-target="#clients" role="tab" aria-controls="clients" aria-selected="true">
          Members ({{ count($members) }})
        </button>
      </li>

    </ul>
    <div class="pb-6 tab-content" id="myTabContent">
      <div class="hidden py-6 transition-opacity duration-150 ease-linear bg-transparent opacity-0 tab-pane show" id="clients" role="tabpanel" aria-labelledby="clients-tab">

        <div id="clientsView">
          @if($members && count($members) > 0)
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
                    
                  </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200 list">
                  @foreach($members as $c)
                  <tr>
                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 whitespace-nowrap">
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

                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- END CLIENTS TABLE -->
          @else
          <!-- START EMPTY STATE -->
          <div class="flex items-center justify-center h-full p-12 text-center sm:p-16 sm:max-w-md sm:mx-auto">
            <div>
              <img class="w-auto mx-auto h-52" src="{{ asset('images/empty-clients.svg')}}" alt="">
              <p class="mt-4 text-lg font-bold text-gray-900">
                No Member found
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
    </div>
    <!-- START DOCUMENTS LIST -->
    <ul class="flex items-center w-full mt-6 space-x-4 overflow-x-auto border-b border-gray-200 tabs" id="myTab" role="tablist">
      @foreach($docs as $key => $d)
      <li class="tab-item " role="presentation">
        <button type="button" id="{{$d['key']}}-tab" class="tab_click tab-link {{ (($key === array_key_first($docs) && !isset($_GET['type'])) || (isset($_GET['type']) && $_GET['type'] == $d['key']))? 'active': '' }}" data-toggle="tab" data-target="#{{$d['key']}}" role="tab" aria-controls="{{$d['key']}}" aria-selected="true">
          {{$d['title']}}
        </button>
      </li>
      @endforeach
    </ul>
    <!-- END DOCUMENTS LIST -->

    <div class="pb-6 tab-content" id="myTabContent">

      @foreach($docs as $key => $d)
      <div class="hidden py-6 transition-opacity duration-150 ease-linear bg-transparent opacity-0 tab-pane {{ (($key === array_key_first($docs) && !isset($_GET['type'])) || (isset($_GET['type']) && $_GET['type'] == $d['key']))? 'show': '' }}" id="{{$d['key']}}" role="tabpanel" aria-labelledby="{{$d['key']}}-tab">
        @if($d['key'] =="gst_billing_documents")
        <div class="flex items-center gap-4">
          <div>
            <label for="" class="sr-only">
              Filter by Month
            </label>
            <div>
              <select name="" id="month" class="form-select">
                <option value="">
                  Select month
                </option>
                @foreach (getMonths() as $key=>$value)
                <option {{ isset($_GET['month']) && $_GET['month']==$key ? "selected":""  }} value="{{$key}}">
                  {{$value}}
                </option>

                @endforeach

              </select>
            </div>
          </div>

          <div>
            <label for="" class="sr-only">
              Filter by Year
            </label>
            <div>
              <select name="" id="year" class="form-select">
                <option value="">
                  Select year
                </option>
                @php
                $date = date("Y"); //current year
                $date_range = range($date-5, $date+1);//get year range
                @endphp
                @foreach($date_range as $dr)
                <option {{ isset($_GET['year']) && $_GET['year']==$dr ? "selected":""  }} value="{{ $dr }}">
                  {{$dr}}
                </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        @endif
        <!-- START DOCUMENTS LIST -->
        <div class="{{ $d['key'] =='gst_billing_documents'? 'mt-4':'' }} space-y-4">
          @foreach($d['subdocs'] as $sd)
          <div class="transition-all duration-150 bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md">
            <div class="px-4 py-6">
              <div class="flex flex-col items-start gap-4 sm:flex-row sm:items-center sm:justify-between sm:gap-6">
                <div class="flex items-center flex-1 gap-4">
                  <img class="object-cover w-12 h-12 bg-gray-300 rounded-full shrink-0" src="{{ asset('images/icon-document.svg')}}" alt="">
                  <div class="flex-1 py-0.5 min-w-0">
                    <p class="text-base font-semibold text-gray-600">
                      {{$sd['title']}}
                    </p>
                  </div>
                </div>
              </div>
              @if($sd['uploaded_docs'] && count($sd['uploaded_docs']) > 0)
              <div class="grid grid-cols-1 mt-4 sm:grid-cols-2 xl:grid-cols-3 gap-x-4 gap-y-3">
                @foreach($sd['uploaded_docs'] as $ud)

                <div class="flex items-start gap-6 p-3 text-gray-600 rounded-md bg-gray-50 ring-1 ring-inset ring-gray-500/10">
                  <div class="flex-1 min-w-0">
                    @if($ud['bank'])
                    <span class="block text-sm font-semibold text-gray-900 truncate">
                      {{ $ud['bank'] }}
                    </span>
                    @endif
                    <span class="block text-sm font-medium text-gray-500 truncate">
                      {{ $ud['document_name'] }}
                    </span>
                  </div>

                  <div class="flex items-center justify-end gap-2">
                    @if($ud['bank'])
                    <span class="badge badge-white">
                      {{ $ud['category'] }}{{ $ud['category']=="With Pass"? (":".$ud['password']):"" }}
                    </span>
                    @endif
                    @if($ud['year'])
                    <span class="badge badge-white">
                      {{ $ud['month'].'/'.$ud['year'] }}
                    </span>
                    @endif

                    <a href="{{ getImagePath($ud['document'], 'documents') }}" download="{{ $ud['document_name'] }}" class="relative flex p-1 transition-all duration-150 rounded text-primary-600 hover:text-primary-700 hover:bg-gray-200 hover:ring-gray-300 ring-1 ring-transparent" aria-label="Download" data-microtip-position="top" role="tooltip">
                      <span class="sr-only">
                        Download
                      </span>
                      <svg aria-hidden="true" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                        <path d="M7 11l5 5l5 -5"></path>
                        <path d="M12 4l0 12"></path>
                      </svg>
                    </a>
                  </div>
                </div>

                @endforeach
              </div>
              @endif
            </div>
          </div>
          @endforeach
        </div>
        <!-- END DOCUMENTS LIST -->
      </div>
      @endforeach

    </div>
  </div>
  <input type="hidden" value="{{ isset($_GET['type']) ? $_GET['type']:'' }}" id="selected_tab" />
  <script>
    $(document).on('click', '.tab_click', function(e) {
      let type = $(this).attr('data-target');
      type = type.replace('#', '');
      $('#selected_tab').val(type);
      const nextTitle = "DMS Documents";
      const nextState = {};
      const nextURL = "{{ route('admin_view_client', ['id'=>$row['client_id']])}}" + "?type=" + type;
      window.history.pushState(nextState, nextTitle, nextURL);
    })
    $(document).on('change', '#year', function(e) {
      let url = "{{ route('admin_view_client', ['id'=>$row['client_id']])}}?type=" + $('#selected_tab').val();
      url = url + "&year=" + $(this).val().trim();
      if ($("#month").val() != '') url = url + '&month=' + $("#month").val();
      window.location.href = url;
    })
    $(document).on('change', '#month', function(e) {
      let url = "{{ route('admin_view_client', ['id'=>$row['client_id']])}}?type=" + $('#selected_tab').val();
      url = url + "&month=" + $(this).val().trim();
      if ($("#year").val() != '') url = url + '&year=' + $("#year").val();
      window.location.href = url;
    })
  </script>
  @endsection