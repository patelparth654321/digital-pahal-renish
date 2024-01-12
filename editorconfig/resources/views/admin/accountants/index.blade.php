@extends('admin.layouts.master')
@section('title')
    {{ "Accountants" }}
@endsection
@section('content')
<div class="min-h-full px-4 sm:px-6">

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
        <label for="searchKeyword" class="sr-only">
          Search Accountants
        </label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
              <path d="M21 21l-6 -6"></path>
            </svg>
          </div>

          <input type="search" id="searchKeyword" placeholder="Search by accountant name, phone or company..." value="{{ isset($_GET['search']) ? $_GET['search']: '' }}" class="pl-10 form-input">
        </div>
      </div>

      <div class="flex items-center gap-4">
        <a href="{{ route('add_accountant') }}" title="Add Accountant" class="w-full btn btn-primary sm:w-auto" role="button">
          <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
            <path d="M16 19h6"></path>
            <path d="M19 16v6"></path>
            <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
          </svg>
          Add Accountant
        </a>
      </div>
    </div>
  </div>
  <!-- END SEARCH & FILTERS -->

  <div id="accountantsView">
    @if($rows && count($rows) > 0)
    <!-- START ACCOUNTANTS TABLE -->
    <div class="flow-root mt-6">
      <div class="overflow-x-auto border border-gray-200 rounded-lg shadow-sm">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="py-3.5 pl-4 pr-3 w-80 sm:w-auto cursor-pointer text-left text-xs font-semibold text-gray-500 whitespace-nowrap sm:pl-6 sort" data-sort="company-name">
                Company Name
              </th>
              <th scope="col" class="px-3 py-3.5 hidden xl:table-cell cursor-pointer text-left text-xs font-semibold whitespace-nowrap text-gray-500 sort" data-sort="owner-name">
                Owner Name
              </th>
              <th scope="col" class="px-3 py-3.5 hidden sm:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                Contact Details
              </th>
              <th scope="col" class="px-3 py-3.5 hidden md:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                Category
              </th>
              <th scope="col" class="px-3 py-3.5 hidden xl:table-cell cursor-pointer text-left text-xs font-semibold whitespace-nowrap text-gray-500 sort" data-sort="total-clients">
                Total Clients
              </th>
              <th scope="col" class="px-3 py-3.5 hidden 2xl:table-cell cursor-pointer text-left text-xs font-semibold whitespace-nowrap text-gray-500 sort" data-sort="created-date">
                Created On
              </th>
              <th scope="col" class="px-3 py-3.5 hidden 2xl:table-cell cursor-pointer text-left text-xs font-semibold whitespace-nowrap text-gray-500 sort" data-sort="expire-date">
                Expire On
              </th>
              <th scope="col" class="px-3 py-3.5 hidden xl:table-cell cursor-pointer text-left text-xs font-semibold whitespace-nowrap text-gray-500 sort" data-sort="status">
                Status
              </th>
              <th scope="col" class="relative text-left text-xs font-semibold text-gray-500 whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
              </th>
            </tr>
          </thead>

          <tbody class="bg-white divide-y divide-gray-200 list">
            @foreach($rows as $row)
            <tr>
              <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 whitespace-nowrap company-name">
              <a href="{{ route('view_accountant', ['id'=>$row['id']]) }}">
                <div class="flex items-center gap-3">
                
                  <img class="w-8 h-8 bg-gray-300 rounded-lg" src="{{ getImagePath($row->logo, 'accountant/logo') }}" alt="">
                  <div>
                    <span>
                      {!! $row['company_name'] !!}
                    </span>
                    <span class="block mt-px text-xs text-gray-500 xl:hidden">
                    {!! $row['name'] !!}
                    </span>
                  </div>
                
                </div>
                </a>
              </td>
              <td class="hidden px-3 py-4 text-sm text-gray-600 xl:table-cell whitespace-nowrap owner-name">
              {!! $row['name'] !!}
              </td>
              <td class="hidden px-3 py-4 text-sm text-gray-600 sm:table-cell whitespace-nowrap email-address phone-number">
              {!! $row['email'] !!}<br>{!! $row['phone'] !!}
              </td>
              <td class="hidden px-3 py-4 text-sm text-gray-600 md:table-cell whitespace-nowrap">
                <div class="flex items-center gap-1.5">
                    {!! getUserCategoryType($row['type']) !!}
                </div>
              </td>
              <td class="hidden px-3 py-4 text-sm text-gray-600 xl:table-cell whitespace-nowrap total-clients">
                {{ $row['count_row'] }}
              </td>
              <td class="hidden px-3 py-4 text-sm text-gray-600 2xl:table-cell whitespace-nowrap created-date">
              {!! dateFormat($row['created_at'], 'd M Y') !!}
              </td>
              <td class="hidden px-3 py-4 text-sm text-gray-600 2xl:table-cell whitespace-nowrap expire-date">
              {!! dateFormat($row['plan_expiry_date'], 'd M Y') !!}
              </td>
              <td class="hidden px-3 py-4 text-sm text-gray-600 xl:table-cell whitespace-nowrap status">
                {!! getUserStatus($row['status']) !!}
              </td>

              <td class="relative py-4 pl-3 pr-4 whitespace-nowrap sm:pr-6">
                <div class="flex items-center gap-4">
                  <a href="{{ route('view_accountant', ['id'=>$row['id']]) }}" title="" class="btn btn-icon btn-secondary-light btn-icon-transparent" aria-label="View Accountant" data-microtip-position="top" role="tooltip">
                    <span class="sr-only">
                      View Accountant
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
    <!-- END ACCOUNTANTS TABLE -->

    <!-- START PAGINATION -->
    <div class="flex flex-col items-center mt-8 sm:mt-4 sm:flex-row sm:justify-between">
      {!! $rows->appends($_GET)->links() !!}
     
    </div>
    <!-- END PAGINATION -->
    @else
       <!-- START EMPTY STATE -->
       <div class="flex items-center justify-center h-full p-12 text-center sm:p-16 sm:max-w-md sm:mx-auto">
            <div>
              <img class="w-auto h-56 mx-auto" src="../images/empty-accoutants.svg" alt="">
              <p class="mt-4 text-lg font-bold text-gray-900">
                No accountant found
              </p>
              <p class="mt-2 text-sm font-normal leading-6 text-gray-600">
                Velit officia consequat duis enim velit mollit. Exercitation veniam consequat.
              </p>
              <div class="mt-6">
                <a href="{{ route('add_accountant') }}" title="Add Accountant" class="btn btn-primary" role="button">
                  <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                    <path d="M16 19h6"></path>
                    <path d="M19 16v6"></path>
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                  </svg>
                  Add Accountant
                </a>
              </div>
            </div>
          </div>
          <!-- END EMPTY STATE -->
    @endif
  </div>

</div>
<script>
   $(document).on('keypress', "#searchKeyword", function() {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
      let url = '{{ route("accountants")}}?search=' + $(this).val().trim();
      if($("#type").val()!='') url = url + '&type='+$("#type").val();
      if($("#status").val()!='') url = url + '&status='+$("#status").val();
      window.location.href = url
    }
  });

  $(document).on('change', '#status', function(e) {
    let url ="{{ route('accountants') }}";
    url = url+"?status="+$(this).val().trim();
    if($("#type").val()!='') url = url + '&type='+$("#type").val();
    if($("#searchKeyword").val()!='') url = url + '&search='+$("#searchKeyword").val();
    
    window.location.href = url;
  })

  $(document).on('change', '#type', function(e) {
    let url ="{{ route('accountants') }}";
    url = url+"?type="+$(this).val().trim();
    if($("#status").val()!='') url = url + '&status='+$("#status").val();
    if($("#searchKeyword").val()!='') url = url + '&search='+$("#searchKeyword").val();
    window.location.href = url;
  })
</script>
@endsection