@extends('admin.layouts.master')
@section('content')
@section('title')
{{ "Add Accountant" }}
@endsection
<div class="min-h-full px-4 sm:px-6">
  <button onclick="history.back()" type="button" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary-600 hover:text-primary-500 transition-all duration-150 hover:underline leading-6" title="Back">
    <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
      <path d="M5 12l14 0"></path>
      <path d="M5 12l6 6"></path>
      <path d="M5 12l6 -6"></path>
    </svg>
    Back to Accountants
  </button>
  <form action="{{ route('add_update_accountant') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
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
        <div class="input-group sm:col-span-2">
          <label for="" class="required">
            Full Name
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="text" name="name" value="{{ old('name') }}" class="form-input" required>
          </div>
        </div>

        <div class="input-group sm:col-span-2">
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

        <div class="input-group">
          <label for="" class="">
            Alternate Mobile Number
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="tel" name="alternate_number" value="{{ old('alternate_number') }}" class="form-input">
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
        <div class="input-group sm:col-span-2">
          <div>
            <label for="" class="required">
              Company Logo (should in square format)
            </label>
            <div class="relative flex items-center gap-5 mt-2">
              <div class="flex-shrink-0 w-12 h-12 overflow-hidden rounded-lg ring-1 ring-gray-200">
                <img class="object-cover w-full h-full image_file" src="{{ asset('images/default-avatar.png')}}" alt="">
              </div>
              <div class="flex-1 file-input">
                <input type="file" name="logo" data-attr="logo" class="choose_file" accept="image/*">
                <label class="label" data-js-label style="max-width: 140px;">No file selected</label>
                <span class="button">Choose</span>
              </div>
              <a href="javascript:void(0)" class="btn btn-sm btn-danger-light remove" data-attr="logo">
                Remove
              </a>
            </div>
          </div>
        </div>

        <div class="sm:col-span-2 input-group">
          <label for="" class="required">
            Company Name
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-input" required>
          </div>
        </div>
        <div class=" input-group" id="category_selection">
          <label for="" class="block text-sm  after:content-['*'] after:ml-0.5 after:text-error-500 font-medium leading-6 text-gray-900">
            Do you have GST No. ?
          </label>

          <div class="flex items-center mt-2 gap-x-6 gap-y-4">
            <div class="relative flex items-start">
              <div class="flex items-center h-6">
                <input type="radio" value="0" checked name="is_gst" class="form-options radio">
              </div>
              <div class="ml-3 text-sm leading-6">
                <label for="withPass" class="font-medium text-gray-900">
                  No
                </label>
              </div>
            </div>

            <div class="relative flex items-start">
              <div class="flex items-center h-6">
                <input type="radio" value="1" id="withGst" name="is_gst" class="form-options radio">
              </div>
              <div class="ml-3 text-sm leading-6">
                <label for="withoutPass" class="font-medium text-gray-900">
                  Yes
                </label>
              </div>
            </div>
          </div>

        </div>
        <div class="hidden input-group" id="withGstInput">
          <label for="" class="required">
            GST Number
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="text" name="gst_number" id="gst_number" value="{{ old('gst_number') }}" class="form-input">
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

        <div class="input-group sm:col-span-2">
          <label for="" class="required">
            Aadhaar Card
          </label>
          <div class="mt-1.5 flex items-center gap-3">
            <div class="flex-shrink-0 w-12 h-12 overflow-hidden rounded-lg ring-1 ring-gray-200">
              <img class="object-cover w-full h-full image_file" src="{{ asset('images/default-avatar.png')}}" alt="">
            </div>
            <div class="flex-1 file-input">
              <input type="file" name="adhaar_card" data-attr="aadhaar" class="choose_file" accept="image/*">
              <label class="label" data-js-label style="max-width: 140px;">No file selected</label>
              <span class="button">Choose</span>
            </div>

            <a href="javascript:void(0)" class="btn btn-danger-light remove" data-attr="aadhaar">
              Remove
            </a>
          </div>
        </div>

        <div class="input-group sm:col-span-2">
          <label for="" class="required">
            PAN Card
          </label>
          <div class="mt-1.5 flex items-center gap-3">
            <div class="flex-shrink-0 w-12 h-12 overflow-hidden rounded-lg ring-1 ring-gray-200">
              <img class="object-cover w-full h-full image_file" src="{{ asset('images/default-avatar.png')}}" alt="">
            </div>
            <div class="flex-1 file-input">
              <input type="file" name="pan_card" data-attr="pan" class="choose_file" accept="image/*">
              <label class="label" data-js-label style="max-width: 140px;">No file selected</label>
              <span class="button">Choose</span>
            </div>

            <a href="javascript:void(0)" class="btn btn-danger-light remove" data-attr="pan">
              Remove
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- END BUSINESS DETAILS -->

    <hr class="border-gray-200">

    <!-- START SUPPORT DETAILS -->
    <div class="flex flex-col gap-6 md:gap-x-12 xl:gap-16 md:items-start md:flex-row">
      <div class="w-full md:max-w-[256px] xl:max-w-xs shrink-0">
        <h2 class="text-lg font-semibold text-gray-900">
          Support Details
        </h2>
        <p class="mt-1 text-sm font-normal text-gray-600">
          Update your email and manage your account
        </p>
      </div>

      <div class="grid flex-1 max-w-3xl grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
        <div class="input-group">
          <label for="" class="required">
            Email Address
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="email" name="support_email_id" value="{{ old('support_email_id') }}" class="form-input" required>
          </div>
        </div>

        <div class="input-group">
          <label for="" class="required">
            Mobile Number
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="tel" name="support_phone" value="{{ old('support_phone') }}" class="form-input" required>
          </div>
        </div>
      </div>
    </div>
    <!-- END SUPPORT DETAILS -->

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
              <input type="checkbox" id="dms" aria-describedby="dms-description" name="type[]" value="1" class="form-options checkbox">
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
          Update your email and manage your account
        </p>
      </div>

      <div class="grid flex-1 max-w-3xl grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
        <div class="input-group">
          <label for="" class="required">
            Password
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="password" name="password" value="{{ old('password') }}" class="form-input" required>
          </div>
        </div>
      </div>
    </div>
    <!-- END LOGIN DETAILS -->
    <hr class="border-gray-200">
    <!-- START SUBSCRIPTION DETAILS -->
    <div class="flex flex-col gap-6 md:gap-x-12 xl:gap-16 md:items-start md:flex-row">
      <div class="w-full md:max-w-[256px] xl:max-w-xs shrink-0">
        <h2 class="text-lg font-semibold text-gray-900">
          Subscription Details
        </h2>
        <p class="mt-1 text-sm font-normal text-gray-600">
          Update your plan and manage your account
        </p>
      </div>
      <div class="grid flex-1 max-w-3xl grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
        <div class="input-group">
          <label for="" class="required">
            Plan
          </label>
          <div class="mt-1.5 input-wrapper">
            <select name="plan_id" id="plan_id" class="form-input" required>
              <option value="">Select plan</option>
              @foreach($plans as $p)
              <option value="{{ $p['id'] }}">{{ $p['name'] }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <!-- <div class="grid flex-1 max-w-3xl grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
        <div class="input-group">
          <label for="" class="">
            Discount (in %)
          </label>
          <div class="mt-1.5 input-wrapper">
            <input type="number" name="discount" max="100" min="0" value="{{ old('discount') ? old('discount') : 0.00  }}" class="form-input">
          </div>
        </div>
      </div> -->
    </div>
    <!-- END SUBSCRIPTION DETAILS -->

    <div class="flex flex-col gap-6 sm:gap-12 xl:gap-16 md:items-start md:flex-row">
      <div class="w-full hidden md:max-w-[256px] md:block xl:max-w-xs shrink-0">
        &nbsp;
      </div>

      <div class="flex flex-col flex-1 gap-4 sm:flex-row sm:items-center">
        <button type="submit" class="btn btn-primary">
          Save Accountant
        </button>

        <button onclick="history.back()" type="button" class="btn btn-secondary">
          Discard
        </button>
      </div>
    </div>

  </form>

</div>
<script>
  $(document).on('change', '.choose_file', function(event) {
    var output = $(this).parent().parent().find('img')[0];
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  })
  $(document).on('click', '.remove', function() {
    let data = $(this).attr('data-attr');
    $(this).parent().find('.choose_file').val('');

    $(this).parent().find('.image_file').attr('src', "{{ asset('images/default-avatar.png')}}");
    $(this).parent().find('.label').html('No file seleted');
    $(this).parent().find('.file-input').removeClass('-chosen');
  });

  $(document).click(function() {
    if ($("#withGst").is(":checked")) {
      $("#withGstInput").slideDown(200);
      $('#gst_number').attr('required', true);
      $('#gst_number').attr('minlength', 15);
      $('#gst_number').attr('maxlength', 15);
    } else {
      $("#withGstInput").slideUp(200);
      $('#gst_number').removeAttr('required');
      $('#gst_number').removeAttr('minlength');
      $('#gst_number').removeAttr('maxlength');
    }
  });
</script>
@endsection