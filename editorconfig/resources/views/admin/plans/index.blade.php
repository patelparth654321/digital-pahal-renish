@extends('admin.layouts.master')
@section('content')
@section('title')
    {{ "Subscription Plans" }}
@endsection
<div class="min-h-full px-4 sm:px-6">

    <!-- START PLANS -->
    <div class="grid grid-cols-1 gap-4 xl:grid-cols-3">
        @foreach($rows as $row)
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center justify-between gap-6">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-primary-50 text-primary-600">
                        <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                            </path>
                        </svg>
                    </div>

                    <a href="{{ route('edit_plan', ['id'=>$row['id']])}}" title="Edit Plan Details" class="btn-link">
                        <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                            <path d="M16 5l3 3"></path>
                        </svg>
                        Edit Details
                    </a>
                </div>

                <h2 class="mt-6 text-lg font-bold text-gray-900">
                    {{$row['name']}}
                </h2>
                <p class="mt-1 text-sm font-normal text-gray-600 line-clamp-2">
                {{$row['descriptions']}}
                </p>

                <div class="flex items-end gap-1.5 mt-6">
                    <p class="text-2xl font-bold text-gray-900">
                        {{env('CURRENCY').$row['price']}}
                    </p>
                    <p class="text-sm font-normal py-0.5 text-gray-600">
                        per month
                    </p>
                </div>

                <hr class="mt-6 border-gray-200">

                <ul class="mt-6 space-y-4 text-base font-normal text-gray-900">
                    @php 
                    $features = explode('|', $row['features']);
                    @endphp
                    @foreach($features as $f)
                    <li class="flex items-start gap-3">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                        {{$f}}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endforeach
        
    </div>
    <!-- END PLANS -->

</div>
@endsection