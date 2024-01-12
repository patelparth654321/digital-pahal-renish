@extends('layouts.master')
@section('content')
@section('title')
{{ "Inquiry Form" }}
@endsection

<!-- START PAGE TITLE -->
<section class="py-12 bg-gradient-to-b from-gray-100 to-white sm:py-16 lg:pt-20 xl:pt-24">
  <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
    <div class="max-w-2xl mx-auto text-center lg:max-w-5xl">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl lg:text-5xl">
        Inquiry Form
      </h1>
      <p class="max-w-2xl mx-auto mt-4 text-base font-normal leading-7 text-gray-600 sm:mt-6 sm:text-lg sm:leading-8 lg:text-xl lg:leading-8">
        Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis
        enim velit
        mollit.
      </p>
    </div>
  </div>
</section>
<!-- END PAGE TITLE -->

<!-- START CONTENT -->
<section class="pb-12 bg-white border-b border-gray-200 sm:pb-16 lg:pb-20 xl:pb-24">
  <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
    <form action="{{('inquiry')}}" method="POST" class="grid max-w-xl grid-cols-1 mx-auto sm:grid-cols-2 gap-x-6 gap-y-5">
      @csrf
      <div class="input-group sm:col-span-2">
        <label for="" class="required">
          Full Name
        </label>
        <div class="mt-1.5 input-wrapper">
          <input type="text" name="name" id="" placeholder="Enter your name" value="" class="form-input" required>
        </div>
      </div>

      <div class="input-group">
        <label for="" class="required">
          Email
        </label>
        <div class="mt-1.5 input-wrapper">
          <input type="email" name="email" id="" placeholder="Your email address" value="" class="form-input" required>
        </div>
      </div>

      <div class="input-group">
        <label for="" class="required">
          Phone
        </label>
        <div class="mt-1.5 input-wrapper">
          <input type="tel" name="phone" id="" placeholder="Your phone number" value="" class="form-input" required>
        </div>
      </div>

      <div class="input-group sm:col-span-2">
        <label for="" class="required">
          Company Name
        </label>
        <div class="mt-1.5 input-wrapper">
          <input type="text" name="company_name" id="" placeholder="Enter your company name" value="" class="form-input" required>
        </div>
      </div>

      <div class="input-group sm:col-span-2">
        <label for="" class="required">
          Address
        </label>
        <div class="mt-1.5 input-wrapper">
          <input type="text" name="address" id="" placeholder="Enter your address" value="" class="form-input" required>
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
      <div class="input-group sm:col-span-2 hidden" id="withGstInput">
        <label for="" class="required">
          GST Number
        </label>
        <div class="mt-1.5 input-wrapper">
          <input type="text" name="gst_number" id="gst_number" placeholder="Enter your GST number" value="" class="form-input">
        </div>
      </div>

      <div class="input-group sm:col-span-2">
        <label for="" class="required">
          Category
        </label>
        <div class="mt-1.5 input-wrapper">
          <select name="category" id="" class="form-select">
            <option value="">
              Select category
            </option>
            <option value="1">
              DMS
            </option>
            <option value="2">
              GST
            </option>
            <option value="1,2">
              Both
            </option>
          </select>
        </div>
      </div>

      <div class="sm:col-span-2">
        <button type="submit" class="w-full btn btn-primary">
          Submit
        </button>
      </div>
    </form>
  </div>
</section>
<!-- END CONTENT -->
<script>
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