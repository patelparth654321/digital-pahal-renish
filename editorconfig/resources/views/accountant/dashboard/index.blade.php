@extends('accountant.layouts.master')
@section('content')
<section class="flex-1 py-6 overflow-y-auto">
<div class="min-h-full px-4 sm:px-6">

    <!-- START QUICK STATS -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex flex-row items-start gap-3">
                    <div class="shrink-0">
                        <svg aria-hidden="true" class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                            <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                            <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                            <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                            <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                            <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-sm font-medium text-gray-600">
                            Total Users
                        </h2>
                        <p class="mt-1 text-3xl font-bold text-gray-900">
                        {{ getClientCount(auth()->user()->id) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex flex-row items-start gap-3">
                    <div class="shrink-0">
                        <svg aria-hidden="true" class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                            <path d="M9 17h6"></path>
                            <path d="M9 13h6"></path>
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-sm font-medium text-gray-600">
                            Total Documents
                        </h2>
                        <p class="mt-1 text-3xl font-bold text-gray-900">
                        {{ $total_documents }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex flex-row items-start gap-3">
                    <div class="shrink-0">
                        <svg aria-hidden="true" class="w-8 h-8 text-success-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                            <path d="M9 15l2 2l4 -4"></path>
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-sm font-medium text-gray-600">
                            Documents Reviewed
                        </h2>
                        <p class="mt-1 text-3xl font-bold text-gray-900">
                            {{$reviewed_document}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex flex-row items-start gap-3">
                    <div class="shrink-0">
                        <svg aria-hidden="true" class="w-8 h-8 text-error-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                            <path d="M11 14h1v4h1"></path>
                            <path d="M12 11h.01"></path>
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-sm font-medium text-gray-600">
                            Documents Not Reviewed
                        </h2>
                        <p class="mt-1 text-3xl font-bold text-gray-900">
                            {{$pending_document}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END QUICK STATS -->

    <!-- START CLIENTS -->
    <div class="mt-4 overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="px-4 py-4 sm:px-6">
            <div class="flex items-center justify-between gap-4 sm:gap-6">
                <h2 class="text-base font-semibold text-gray-900 lg:text-lg">
                    Recently Created Clients
                </h2>

                <a href="{{ route('clients') }}" title="View All Clients" class="btn-link">
                    View All
                    <svg aria-hidden="true" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 6l6 6l-6 6"></path>
                    </svg>
                </a>
            </div>
        </div>
        @if($clients && count($clients) > 0)
        <div class="flow-root border-t border-gray-200">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 w-80 sm:w-auto text-left text-xs font-semibold text-gray-500 whitespace-nowrap sm:pl-6">
                                User Name
                            </th>
                            <th scope="col" class="px-3 py-3.5 hidden 2xl:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Company / Shop Name
                            </th>
                            <th scope="col" class="px-3 py-3.5 hidden sm:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Contact Details
                            </th>
                            <th scope="col" class="px-3 py-3.5 hidden md:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Category
                            </th>
                            <th scope="col" class="px-3 py-3.5 hidden md:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Total Documents
                            </th>
                            <th scope="col" class="px-3 py-3.5 hidden md:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Unread Documents
                            </th>
                            <th scope="col" class="px-3 py-3.5 hidden xl:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Created On
                            </th>
                            <th scope="col" class="px-3 py-3.5 hidden xl:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Status
                            </th>
                            <th scope="col" class="relative text-left text-xs font-semibold text-gray-500 whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($clients as $row)
                        <tr>
                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <span class="avatar avatar-md">
                                        {{ getNameShort($row['name']) }}
                                    </span>
                                    <div>
                                        <span>
                                            {!! $row['name'] !!}
                                        </span>
                                        <span class="block mt-px text-xs font-normal text-gray-500 2xl:hidden">
                                        {!! $row['company_name'] !!}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 2xl:table-cell whitespace-nowrap">
                            {!! $row['company_name'] !!}
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 sm:table-cell whitespace-nowrap">
                            {!! $row['email'] !!}<br>{!! $row['phone'] !!}
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 md:table-cell whitespace-nowrap">
                                <div class="flex items-center gap-1.5">
                                {!! getUserCategoryType($row['type']) !!}
                                </div>
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 2xl:table-cell whitespace-nowrap">
                            {!! $row['total_documents'] !!}
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 2xl:table-cell whitespace-nowrap">
                            {!! $row['unread_documents'] !!}
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 xl:table-cell whitespace-nowrap">
                            {!! dateFormat($row['created_at'], 'd M Y') !!}
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 xl:table-cell whitespace-nowrap">
                            {!! getUserStatus($row['status']) !!}
                            </td>

                            <td class="relative py-4 pl-3 pr-4 whitespace-nowrap sm:pr-6">
                                <div class="flex items-center gap-4">
                                    <a href="javascript:void(0)" class="btn btn-icon btn-secondary-light btn-icon-transparent sendNotification" data-id="{{ $row['client_id'] }}" aria-label="Send Notification" data-microtip-position="top" role="tooltip" data-toggle="modal" data-target="#sendNotificationModal">
                                        <span class="sr-only">
                                            Send Notification
                                        </span>
                                        <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12.5 17h-8.5a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6a2 2 0 1 1 4 0a7 7 0 0 1 4 6v1">
                                            </path>
                                            <path d="M9 17v1a3 3 0 0 0 3.51 2.957"></path>
                                            <path d="M16 19h6"></path>
                                            <path d="M19 16v6"></path>
                                        </svg>
                                    </a>

                                    <a href="{{ route('view_client', ['id'=>$row['client_id']])}}" title="" class="btn btn-icon btn-secondary-light btn-icon-transparent" aria-label="View Client" data-microtip-position="top" role="tooltip">
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
        @else
        <div class="p-12 text-center border-t border-gray-200 sm:p-16">
              <img class="w-auto mx-auto h-52" src="{{ asset('images/empty-clients.svg')}}" alt="">
              <p class="mt-5 text-lg font-bold text-gray-900">
                No clients found
              </p>
              <p class="mt-2 text-sm font-normal text-gray-600 sm:max-w-xs sm:mx-auto">
                Velit officia consequat duis enim velit mollit. Exercitation veniam consequat.
              </p>
              <div class="mt-6">
                <a href="{{ route('add_client') }}" title="Add Client" class="btn btn-primary" role="button">
                  <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                    <path d="M16 19h6"></path>
                    <path d="M19 16v6"></path>
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                  </svg>
                  Add Client
                </a>
              </div>
            </div>
        @endif
    </div>
    <!-- END CLIENTS -->

</div>
@include('accountant.clients.notification_modal')

<script>
    $(document).on('click', '.sendNotification', function() {
         $('#to_ids').val($(this).attr('data-id'));
     });
</script>
@endsection