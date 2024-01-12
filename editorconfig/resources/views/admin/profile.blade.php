@extends('admin.layouts.master')
@section('content')
@section('title')
{{ "Account & Settings" }}
@endsection
<div class="min-h-full px-4 sm:px-6">
    <form method="POST" action="{{ route('admin_update_profile') }}">
        <div class="space-y-8">

            @csrf
            <!-- START PROFILE DETAILS -->
            <div class="flex flex-col gap-6 md:gap-x-12 xl:gap-16 md:items-start md:flex-row">
                <div class="w-full md:max-w-[256px] xl:max-w-xs shrink-0">
                    <h2 class="text-lg font-semibold text-gray-900">
                        My Profile
                    </h2>
                    <p class="mt-1 text-sm font-normal text-gray-600">
                        Update your email and manage your account
                    </p>
                </div>

                <div class="grid flex-1 max-w-3xl grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                    <div class="sm:col-span-2 input-group">
                        <label for="" class="required">
                            Email
                        </label>
                        <div class="mt-1.5 input-wrapper">
                            <input type="email" name="email" value="{{auth()->user()->email}}" class="form-input" required>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE DETAILS -->

            <hr class="border-gray-200">

            <!-- START PROFILE DETAILS -->
            <!-- <div class="flex flex-col gap-6 md:gap-x-12 xl:gap-16 md:items-start md:flex-row">
                <div class="w-full md:max-w-[256px] xl:max-w-xs shrink-0">
                    <h2 class="text-lg font-semibold text-gray-900">
                        Payment Link
                    </h2>
                    <p class="mt-1 text-sm font-normal text-gray-600">
                        Update your email and manage your account
                    </p>
                </div>

                <div class="grid flex-1 max-w-3xl grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                    <div class="sm:col-span-2 input-group">
                        <label for="" class="required">
                            Payment URL
                        </label>
                        <div class="mt-1.5 input-wrapper">
                            <input type="url" name="payment_url" value="{{ getConfigValueByKey('payment_url') }}" class="form-input">
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- END PROFILE DETAILS -->
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
                        <label for="" class="">
                            Email Address
                        </label>
                        <div class="mt-1.5 input-wrapper">
                            <input type="email" name="app_email" value="{{ getConfigValueByKey('app_email') }}" class="form-input">
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="" class="">
                            Mobile Number
                        </label>
                        <div class="mt-1.5 input-wrapper">
                            <input type="tel" name="app_phone" value="{{ getConfigValueByKey('app_phone') }}" class="form-input">
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SUPPORT DETAILS -->

            <hr class="border-gray-200">

            <!-- START PASSWORD -->
            <div class="flex flex-col gap-6 md:gap-x-12 xl:gap-16 md:items-start md:flex-row">
                <div class="w-full md:max-w-[256px] xl:max-w-xs shrink-0">
                    <h2 class="text-lg font-semibold text-gray-900">
                        Change Password
                    </h2>
                    <p class="mt-1 text-sm font-normal text-gray-600">
                        Manage your password
                    </p>
                </div>

                <div class="grid flex-1 max-w-3xl grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                    <div class="sm:col-span-2 input-group">
                        <label for="">
                            Old Password
                        </label>
                        <div class="mt-1.5 input-wrapper">
                            <input type="password" name="old_password" id="" placeholder="" value="" class="form-input">
                        </div>
                    </div>

                    <div class="sm:col-span-2 input-group">
                        <label for="">
                            New Password
                        </label>
                        <div class="mt-1.5 input-wrapper">
                            <input type="password" name="new_password" id="" placeholder="" value="" class="form-input">
                        </div>
                        <p class="text-default">
                            Minimum 8 characters required
                        </p>
                    </div>
                </div>
            </div>
            <!-- END PASSWORD -->

            <div class="flex flex-col gap-6 sm:gap-12 xl:gap-16 md:items-start md:flex-row">
                <div class="w-full hidden md:max-w-[256px] md:block xl:max-w-xs shrink-0">
                    &nbsp;
                </div>

                <div class="flex flex-col flex-1 gap-4 sm:flex-row sm:items-center">
                    <button type="submit" class="btn btn-primary">
                        Save Changes
                    </button>

                    <button onclick="history.back()" type="button" class="btn btn-secondary">
                        Discard
                    </button>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection