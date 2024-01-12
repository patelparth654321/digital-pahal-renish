@extends('admin.layouts.master')

@section('content')
@section('title')
    {{ "Policies" }}
@endsection
<!-- START CONTENT -->
<section class="flex-1 py-6 overflow-y-auto">
    <div class="min-h-full px-4 sm:px-6">

        <form action="{{ route('policies') }}" method="POST" id="submitForm" class="space-y-8">
            @csrf
            <!-- START PRIVACY POLICY -->
            <div class="flex flex-col gap-6 md:gap-x-12 xl:gap-16 md:items-start md:flex-row">
                <div class="w-full md:max-w-[256px] xl:max-w-xs shrink-0">
                    <h2 class="text-lg font-semibold text-gray-900">
                        Privacy Policy
                    </h2>
                    <p class="mt-1 text-sm italic font-normal text-gray-600">
                        Last updated on 10 May 2023
                    </p>
                </div>

                <div class="grid flex-1 grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                    <div class="input-group sm:col-span-2">
                        <label for="" class="">
                            Content
                        </label>
                        <div class="mt-1.5 input-wrapper">
                            <div id="toolbar"></div>
                            <div class="rounded-b-lg long-content" id="privacyContent"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PRIVACY POLICY -->

            <hr class="border-gray-200">

            <!-- START TERMS OF SERVICE -->
            <div class="flex flex-col gap-6 md:gap-x-12 xl:gap-16 md:items-start md:flex-row">
                <div class="w-full md:max-w-[256px] xl:max-w-xs shrink-0">
                    <h2 class="text-lg font-semibold text-gray-900">
                        Terms of Service
                    </h2>
                    <p class="mt-1 text-sm italic font-normal text-gray-600">
                        Last updated on 10 May 2023
                    </p>
                </div>

                <div class="grid flex-1 grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                    <div class="input-group sm:col-span-2">
                        <label for="" class="">
                            Content
                        </label>
                        <div class="mt-1.5 input-wrapper">
                            <div class="rounded-b-lg long-content" id="termsContent"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END TERMS OF SERVICE -->

            <hr class="border-gray-200">

            <!-- START DMS POLICY -->
            <div class="flex flex-col gap-6 md:gap-x-12 xl:gap-16 md:items-start md:flex-row">
                <div class="w-full md:max-w-[256px] xl:max-w-xs shrink-0">
                    <h2 class="text-lg font-semibold text-gray-900">
                        DMS Policy
                    </h2>
                    <p class="mt-1 text-sm italic font-normal text-gray-600">
                        Last updated on 10 May 2023
                    </p>
                </div>

                <div class="grid flex-1 grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                    <div class="input-group sm:col-span-2">
                        <label for="" class="">
                            Content
                        </label>
                        <div class="mt-1.5 input-wrapper">
                            <div class="rounded-b-lg long-content" id="dmsPolicyContent"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END DMS POLICY -->

            <hr class="border-gray-200">

            <!-- START GST DATA POLICY -->
            <div class="flex flex-col gap-6 md:gap-x-12 xl:gap-16 md:items-start md:flex-row">
                <div class="w-full md:max-w-[256px] xl:max-w-xs shrink-0">
                    <h2 class="text-lg font-semibold text-gray-900">
                        GST Data Policy
                    </h2>
                    <p class="mt-1 text-sm italic font-normal text-gray-600">
                        Last updated on 10 May 2023
                    </p>
                </div>

                <div class="grid flex-1 grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                    <div class="input-group sm:col-span-2">
                        <label for="" class="">
                            Content
                        </label>
                        <div class="mt-1.5 input-wrapper">
                            <div class="rounded-b-lg long-content" id="gstDataPolicyContent"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END GST DATA POLICY -->

            <div class="flex flex-col gap-6 sm:gap-12 xl:gap-16 md:items-start md:flex-row">
                <div class="w-full hidden md:max-w-[256px] md:block xl:max-w-xs shrink-0">
                    &nbsp;
                </div>

                <div class="flex flex-col flex-1 gap-4 sm:flex-row sm:items-center">
                    <button type="button" class="btn btn-primary submitClick">
                        Save Changes
                    </button>

                    <button type="button" class="btn btn-secondary">
                        Discard
                    </button>
                </div>
            </div>
            <input type="hidden" id="privacy_policy" name="privacy_policy" value="{!! getConfigValueByKey('privacy_policy') !!}"/>
            <input type="hidden" id="dms_policy" name="dms_policy" value="{!! getConfigValueByKey('dms_policy')  !!}" />
            <input type="hidden" id="gst_policy" name="gst_policy" value="{!! getConfigValueByKey('gst_policy') !!}" />
            <input type="hidden" id="terms_of_service" name="terms_of_service" value="{!! getConfigValueByKey('terms_of_service') !!}" />
        </form>

    </div>
</section>
<!-- END CONTENT -->
<script src="{{ asset('plugins/quill/quill.js')}}"></script>
<script>
    

    var quillPrivacy = new Quill('#privacyContent', {
        theme: "snow",
        placeholder: "Write content here...",
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                [{
                    'script': 'sub'
                }, {
                    'script': 'super'
                }],
                ['image'],
                [{
                    'header': 1
                }, {
                    'header': 2
                }],
            ]
        },
    });
    quillPrivacy.setContents(quillPrivacy.clipboard.convert("{!! getConfigValueByKey('privacy_policy') !!}"), 'silent');
    var quillTerm = new Quill('#termsContent', {
        theme: "snow",
        placeholder: "Write content here...",
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                [{
                    'script': 'sub'
                }, {
                    'script': 'super'
                }],
                ['image'],
                [{
                    'header': 1
                }, {
                    'header': 2
                }],
            ]
        },
    });
    quillTerm.setContents(quillTerm.clipboard.convert("{!! getConfigValueByKey('terms_of_service') !!}"), 'silent');
    var quillDms = new Quill('#dmsPolicyContent', {
        theme: "snow",
        placeholder: "Write content here...",
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                [{
                    'script': 'sub'
                }, {
                    'script': 'super'
                }],
                ['image'],
                [{
                    'header': 1
                }, {
                    'header': 2
                }],
            ]
        },
    });
    quillDms.setContents(quillDms.clipboard.convert("{!! getConfigValueByKey('dms_policy') !!}"), 'silent');
    var quillData = new Quill('#gstDataPolicyContent', {
        theme: "snow",
        placeholder: "Write content here...",
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                [{
                    'script': 'sub'
                }, {
                    'script': 'super'
                }],
                ['image'],
                [{
                    'header': 1
                }, {
                    'header': 2
                }],
            ]
        },
    });
    quillData.setContents(quillData.clipboard.convert("{!! getConfigValueByKey('gst_policy') !!}"), 'silent');
    
    $(document).on('click','.submitClick', function(){
        $('#privacy_policy').val(quillPrivacy.root.innerHTML);
        $('#terms_of_service').val(quillTerm.root.innerHTML);
        $('#dms_policy').val(quillDms.root.innerHTML);
        $('#gst_policy').val(quillData.root.innerHTML);
        $('#submitForm').trigger('submit');
    })
</script>

@endsection