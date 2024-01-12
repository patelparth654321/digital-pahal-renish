@extends('accountant.layouts.master')
@section('content')
@section('title')
    {{ "Edit Client" }}
@endsection
<section class="flex-1 py-6 overflow-y-auto">
<div class="min-h-full px-4 sm:px-6">
<button onclick="history.back()" type="button" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary-600 hover:text-primary-500 transition-all duration-150 hover:underline leading-6" title="Back">
    <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
      <path d="M5 12l14 0"></path>
      <path d="M5 12l6 6"></path>
      <path d="M5 12l6 -6"></path>
    </svg>
    Back to Clients
  </button>
  <form action="{{ route('add_update_client') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
    @csrf
    <input type="hidden" value="{{$row->client_id}}" name="user_id" />
    <!-- START PERSONAL DETAILS -->
    <div class="flex flex-col gap-6 md:gap-x-12 xl:gap-16 md:items-start md:flex-row">
      <div class="w-full md:max-w-[256px] xl:max-w-xs shrink-0">
        <h2 class="text-lg font-semibold text-gray-900">
          Personal Details
        </h2>
        <p class="mt-1 text-sm font-normal text-gray-600">
          Update your email and manage your account
        </p>
        <p class="mt-3 text-xs italic font-normal text-error-500">
          * required fields
        </p>
      </div>

      <div class="grid flex-1 max-w-3xl grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
        <div class="sm:col-span-2 input-group">
          <label for="" class="required">
            Full Name (as per legal documents)
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="text" name="name" value="{{ $row['name']}}" class="form-input" required>
          </div>
        </div>

        <div class="input-group">
          <label for="" class="required">
            Email Address
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="email" name="email" value="{{ $row['email']}}" class="form-input" required>
          </div>
        </div>

        <div class="input-group">
          <label for="" class="required">
            Mobile Number
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="tel" name="phone" value="{{ $row['phone']}}" class="form-input" required>
          </div>
        </div>
      </div>
    </div>
    <!-- END PERSONAL DETAILS -->

    <hr class="border-gray-200">

    <!-- START BUSINESS DETAILS -->
    <div class="flex flex-col gap-6 md:gap-x-12 xl:gap-16 md:items-start md:flex-row">
      <div class="w-full md:max-w-[256px] xl:max-w-xs shrink-0">
        <h2 class="text-lg font-semibold text-gray-900">
          Business Details
        </h2>
        <p class="mt-1 text-sm font-normal text-gray-600">
          Update your email and manage your account
        </p>
      </div>

      <div class="grid flex-1 max-w-3xl grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
        <div class="sm:col-span-2 input-group">
          <label for="" class="required">
            Company / Shop Name
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="text" name="company_name" value="{{ $row['company_name']}}" class="form-input" required>
          </div>
        </div>

        <div class="sm:col-span-2 input-group">
          <label for="" class="required">
            Address
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="text" name="address" value="{{ $row['address']}}" class="form-input" required>
          </div>
        </div>

        <div class="input-group">
          <label for="" class="">
            GST Number
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="text" name="gst_number" value="{{ $row['gst_number']}}" class="form-input">
          </div>
        </div>

        <div class="input-group">
          <label for="" class="required">
            PAN Card Number
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="text" name="pancard_number" value="{{ $row['pancard_number']}}" class="form-input" required>
          </div>
        </div>
      </div>
    </div>
    <!-- END BUSINESS DETAILS -->

    <hr class="border-gray-200">

    <!-- START CATEGORIES -->
    <div class="flex flex-col gap-6 md:gap-x-12 xl:gap-16 md:items-start md:flex-row">
      <div class="w-full md:max-w-[256px] xl:max-w-xs shrink-0">
        <h2 class="text-lg font-semibold text-gray-900">
          Categories
        </h2>
        <p class="mt-1 text-sm font-normal text-gray-600">
          Update your email and manage your account
        </p>
      </div>

      <div class="">
        <label for="" class="block text-sm  after:content-['*'] after:ml-0.5 after:text-error-500 font-medium leading-6 text-gray-900">
          Select Category
        </label>

        <div class="grid grid-cols-1 mt-2 sm:grid-cols-2 gap-x-6 gap-y-4">
          <div class="relative flex items-start">
            <div class="flex items-center h-6">
              <input type="checkbox" id="gst" {{ strpos($row['type'], '2') !== false? 'checked':'' }} aria-describedby="gst-description" name="type[]" value="2" class="form-options checkbox">
            </div>
            <div class="ml-3 text-sm leading-6">
              <label for="gst" class="font-medium text-gray-900">
                GST
              </label>
              <p id="gst-description" class="text-gray-500">
                Some description
              </p>
            </div>
          </div>

          <div class="relative flex items-start">
            <div class="flex items-center h-6">
              <input type="checkbox" id="dms" aria-describedby="dms-description" name="type[]" {{ strpos($row['type'], '1') !== false? 'checked':'' }} value="1" class="form-options checkbox">
            </div>
            <div class="ml-3 text-sm leading-6">
              <label for="dms" class="font-medium text-gray-900">
                DMS
              </label>
              <p id="dms-description" class="text-gray-500">
                Some description
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="{{ strpos($row['type'], '2') === false? 'hidden':'' }} input-group" id="gst_selection">
        <label for="" class="block text-sm  after:content-['*'] after:ml-0.5 after:text-error-500 font-medium leading-6 text-gray-900">
          Select GST type 
        </label>

        <div class="flex items-center mt-2 gap-x-6 gap-y-4">
          <div class="relative flex items-start">
            <div class="flex items-center h-6">
              <input type="radio" value="1" {{ $row['gst_type']== 1 ? 'checked':'' }} name="gst_type" class="form-options radio" id="monthly">
            </div>
            <div class="ml-3 text-sm leading-6">
              <label for="monthly" class="font-medium text-gray-900">
                Monthly
              </label>
            </div>
          </div>

          <div class="relative flex items-start">
            <div class="flex items-center h-6">
              <input type="radio" value="2" {{ $row['gst_type']== 2 ? 'checked':'' }} id="quarterly" name="gst_type" class="form-options radio">
            </div>
            <div class="ml-3 text-sm leading-6">
              <label for="quarterly" class="font-medium text-gray-900">
                Quarterly
              </label>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- END CATEGORIES -->

    <hr class="border-gray-200">

    <!-- START LOGIN DETAILS -->
    <div class="flex flex-col gap-6 md:gap-x-12 xl:gap-16 md:items-start md:flex-row">
      <div class="w-full md:max-w-[256px] xl:max-w-xs shrink-0">
        <h2 class="text-lg font-semibold text-gray-900">
          Login Details
        </h2>
        <p class="mt-1 text-sm font-normal text-gray-600">
          Keep Password empty if you don't want to update it.
        </p>
      </div>

      <div class="grid flex-1 max-w-3xl grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
        <div class="input-group">
          <label for="">
          Password
          </label>
          <div class="mt-1.5 input-wrapper">
          <input type="password" name="password" value="{{ old('password') }}" class="form-input">
          </div>
        </div>
      </div>
    </div>
    <!-- END LOGIN DETAILS -->

    <div class="flex flex-col gap-6 sm:gap-12 xl:gap-16 md:items-start md:flex-row">
      <div class="w-full hidden md:max-w-[256px] md:block xl:max-w-xs shrink-0">
        &nbsp;
      </div>

      <div class="flex flex-col flex-1 gap-4 sm:flex-row sm:items-center">
        <button type="submit" class="btn btn-primary">
          Save Client
        </button>

        <button type="button" onclick="history.back()" class="btn btn-secondary">
          Discard
        </button>
      </div>
    </div>

  </form>

</div>
<script>
  $(document).click(function() {
    if ($("#gst").is(":checked")) {
      $("#gst_selection").slideDown(200);
    } else {
      $("#gst_selection").slideUp(200);
    }
  });
</script>
@endsection