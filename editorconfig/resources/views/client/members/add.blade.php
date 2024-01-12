@extends('client.layouts.master')
@section('content')
@section('title')
    {{ "Add Member" }}
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
    Back to Members
  </button>

  <form action="{{ route('add_update_member') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
    @csrf

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
            <input type="text" name="name" value="{{ old('name') }}" class="form-input" required>
          </div>
        </div>

        <div class="input-group">
          <label for="" class="required">
            Email Address
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="email" name="email" value="{{ old('email') }}" class="form-input" required>
          </div>
        </div>

        <div class="input-group">
          <label for="" class="required">
            Mobile Number
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="tel" name="phone" value="{{ old('phone') }}" class="form-input" required>
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
            <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-input" required>
          </div>
        </div>

        <div class="sm:col-span-2 input-group">
          <label for="" class="required">
            Address
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="text" name="address" value="{{ old('address') }}" class="form-input" required>
          </div>
        </div>

        <div class="input-group">
          <label for="" class="">
            GST Number
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="text" name="gst_number" value="{{ old('gst_number') }}" class="form-input">
          </div>
        </div>

        <div class="input-group">
          <label for="" class="required">
            PAN Card Number
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="text" name="pancard_number" value="{{ old('pancard_number') }}" class="form-input" required>
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
              <input type="checkbox" id="gst" aria-describedby="gst-description" name="type[]" value="2" class="form-options checkbox">
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
              <input type="checkbox" id="dms" aria-describedby="dms-description" name="type[]" value="1" class="form-options checkbox" checked>
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
      <div class="hidden input-group" id="gst_selection">
        <label for="" class="block text-sm  after:content-['*'] after:ml-0.5 after:text-error-500 font-medium leading-6 text-gray-900">
          Select GST type 
        </label>

        <div class="flex items-center mt-2 gap-x-6 gap-y-4">
          <div class="relative flex items-start">
            <div class="flex items-center h-6">
              <input type="radio" value="1" checked name="gst_type" class="form-options radio" id="monthly">
            </div>
            <div class="ml-3 text-sm leading-6">
              <label for="monthly" class="font-medium text-gray-900">
                Monthly
              </label>
            </div>
          </div>

          <div class="relative flex items-start">
            <div class="flex items-center h-6">
              <input type="radio" value="2" id="quarterly" name="gst_type" class="form-options radio">
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

    <div class="flex flex-col gap-6 sm:gap-12 xl:gap-16 md:items-start md:flex-row">
      <div class="w-full hidden md:max-w-[256px] md:block xl:max-w-xs shrink-0">
        &nbsp;
      </div>

      <div class="flex flex-col flex-1 gap-4 sm:flex-row sm:items-center">
        <button type="submit" class="btn btn-primary">
          Save Client
        </button>

        <button onclick="history.back()" type="button" class="btn btn-secondary">
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