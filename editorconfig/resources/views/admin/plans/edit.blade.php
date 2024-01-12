@extends('admin.layouts.master')
@section('content')
@section('title')
    {{ "Edit Plan Details" }}
@endsection
<div class="min-h-full px-4 sm:px-6">
    <form>
        <div class="space-y-8">

            <!-- START PLAN DETAILS -->
            <div class="flex flex-col gap-6 md:gap-x-12 xl:gap-16 md:items-start md:flex-row">
                <div class="w-full md:max-w-[256px] xl:max-w-xs shrink-0">
                    <h2 class="text-lg font-semibold text-gray-900">
                        Plan Details
                    </h2>
                    <p class="mt-1 text-sm font-normal text-gray-600">
                        Update your email and manage your account
                    </p>
                </div>

                <div class="grid flex-1 max-w-3xl grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                    <div class="sm:col-span-2 input-group">
                        <label for="" class="required">
                            Plan Name
                        </label>
                        <div class="mt-1.5 input-wrapper">
                            <input type="text" name="name" value="{{ $row['name'] }}" class="form-input">
                        </div>
                    </div>

                    <div class="sm:col-span-2 input-group">
                        <label for="" class="required">
                            Description
                        </label>
                        <div class="mt-1.5 input-wrapper">
                            <textarea name="descriptions" class="resize-y form-input" rows="3">{{ $row['descriptions'] }}</textarea>
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="" class="required">
                            Price (in {{env('CURRENCY')}})
                        </label>
                        <div class="mt-1.5 input-wrapper">
                            <input type="number" name="price" value="{{ $row['price'] }}" class="form-input">
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PLAN DETAILS -->

            <hr class="border-gray-200">

            <!-- START FEATURES -->
            <div class="flex flex-col gap-6 md:gap-x-12 xl:gap-16 md:items-start md:flex-row">
                <div class="w-full md:max-w-[256px] xl:max-w-xs shrink-0">
                    <h2 class="text-lg font-semibold text-gray-900">
                        Features
                    </h2>
                    <p class="mt-1 text-sm font-normal text-gray-600">
                        Update your email and manage your account
                    </p>
                </div>

                <div class="grid flex-1 max-w-3xl grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                    @php
                    $features = explode('|', $row['features']);
                    @endphp
                    @for($i=0;$i < count($features); $i++) @if(($i+1)==count($features)) <div class="flex items-end gap-4 sm:col-span-2">
                        @endif
                        <div class="{{ ($i+1)==count($features)? 'flex-1':'sm:col-span-2'  }} input-group">
                            <label for="" class="">
                                Feature {{$i+1}}
                            </label>
                            <div class="mt-1.5 input-wrapper">
                                <input type="text" name="feature[]" id="feature_{{$i+1}}" value="{{ $features[$i] }}" class="form-input">
                            </div>
                        </div>

                        @if(($i+1)==count($features))
                        <button class="btn btn-secondary" id="add_more_features" aria-label="Add More Feature" data-microtip-position="top" role="tooltip">
                            <span class="sr-only">
                                Add Feature
                            </span>
                            <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                        </button>
                </div>
                @endif
                @endfor
            </div>
        </div>
        <!-- END FEATURES -->

        <div class="flex flex-col gap-6 sm:gap-12 xl:gap-16 md:items-start md:flex-row">
            <div class="w-full hidden md:max-w-[256px] md:block xl:max-w-xs shrink-0">
                &nbsp;
            </div>

            <div class="flex flex-col flex-1 gap-4 sm:flex-row sm:items-center">
                <button type="submit" class="btn btn-primary">
                    Save Changes
                </button>

                <button type="button" class="btn btn-secondary">
                    Discard
                </button>
            </div>
        </div>

        </div>
</form>
</div>
@endsection