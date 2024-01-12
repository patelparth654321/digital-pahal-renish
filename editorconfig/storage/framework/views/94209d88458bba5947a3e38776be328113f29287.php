<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title'); ?>
<?php echo e("Account & Settings"); ?>

<?php $__env->stopSection(); ?>
<!-- START TABS -->
<nav class="sticky inset-x-0 z-10 pt-1 bg-white border-b border-gray-200 top-[61px]">
    <div class="px-4 sm:px-6">
        <ul class="flex items-center w-full space-x-4 overflow-x-auto tabs" id="myTab" role="tablist">
            <li class="tab-item" role="presentation">
                <button type="button" id="profile-tab" class="tab-link active" data-toggle="tab" data-target="#profile" role="tab" aria-controls="profile" aria-selected="true">
                    Profile Details
                </button>
            </li>

            <li class="tab-item" role="presentation">
                <button type="button" id="password-tab" class="tab-link" data-toggle="tab" data-target="#password" role="tab" aria-controls="password" aria-selected="false">
                    Password
                </button>
            </li>
        </ul>
    </div>
</nav>
<!-- END TABS -->

<!-- START CONTENT -->
<section class="flex-1 py-6 overflow-y-auto">
    <div class="min-h-full px-4 sm:px-6">

        <div class="pb-6 tab-content" id="myTabContent">
            <div class="hidden transition-opacity duration-150 ease-linear bg-transparent opacity-0 tab-pane show" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                <div class="p-4 rounded-lg bg-warning-50 ring-1 ring-inset ring-warning-600/20">
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0">
                            <svg aria-hidden="true" class="w-4 h-4 text-warning-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M11.94 2a2.99 2.99 0 0 1 2.45 1.279l.108 .164l8.431 14.074a2.989 2.989 0 0 1 -2.366 4.474l-.2 .009h-16.856a2.99 2.99 0 0 1 -2.648 -4.308l.101 -.189l8.425 -14.065a2.989 2.989 0 0 1 2.555 -1.438zm.07 14l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor"></path>
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-warning-800">
                                To change your personal and business details, please contact your administrator.
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="mt-6 space-y-8 lg:mt-8">
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
                                    <input type="text" value="<?php echo e(auth()->user()->name); ?>" class="form-input" readonly>
                                </div>
                            </div>

                            <div class="input-group sm:col-span-2">
                                <label for="" class="required">
                                    Email Address
                                </label>
                                <div class="mt-1.5 input-wrapper">
                                    <input type="email" value="<?php echo e(auth()->user()->email); ?>" class="form-input" readonly>
                                </div>
                            </div>

                            <div class="input-group">
                                <label for="" class="required">
                                    Mobile Number
                                </label>
                                <div class="mt-1.5 input-wrapper">
                                    <input type="tel" value="<?php echo e(auth()->user()->phone); ?>" class="form-input" readonly>
                                </div>
                            </div>

                            <div class="input-group">
                                <label for="" class="">
                                    Alternate Mobile Number
                                </label>
                                <div class="mt-1.5 input-wrapper">
                                    <input type="tel" value="<?php echo e(auth()->user()->accountant->alternate_number); ?>" class="form-input" readonly>
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
                            <div class="input-group">
                                <label for="" class="required">
                                    Company Name
                                </label>
                                <div class="mt-1.5 input-wrapper">
                                    <input type="text" value="<?php echo e(auth()->user()->accountant->company_name); ?>" class="form-input" readonly>
                                </div>
                            </div>

                            <div class="input-group">
                                <label for="" class="required">
                                    GST Number
                                </label>
                                <div class="mt-1.5 input-wrapper">
                                    <input type="text" value="<?php echo e(auth()->user()->accountant->gst_number); ?>" class="form-input" readonly>
                                </div>
                            </div>

                            <div class="sm:col-span-2 input-group">
                                <label for="" class="required">
                                    Address
                                </label>
                                <div class="mt-1.5 input-wrapper">
                                    <input type="text" value="<?php echo e(auth()->user()->accountant->address); ?>" class="form-input" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END BUSINESS DETAILS -->

                    <hr class="border-gray-200">
                    <form action="<?php echo e(route('accountant_update_profile')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
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
                                    <input type="email" value="<?php echo e(auth()->user()->accountant->support_email_id); ?>" class="form-input" required name="support_email_id">
                                </div>
                            </div>

                            <div class="input-group">
                                <label for="" class="">
                                    Mobile Number
                                </label>
                                <div class="mt-1.5 input-wrapper">
                                    <input type="tel" value="<?php echo e(auth()->user()->accountant->support_phone); ?>" class="form-input" required name="support_phone">
                                </div>
                            </div>
                            <div class="sm:col-span-2 input-group">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>

                                <button onclick="history.back()" type="button" class="btn btn-secondary">
                                    Discard
                                </button>
                            </div>
                        </div>

                    </div>
                    </form>
                    <!-- END SUPPORT DETAILS -->
                </div>
            </div>

            <div class="hidden transition-opacity duration-150 ease-linear bg-transparent opacity-0 tab-pane" id="password" role="tabpanel" aria-labelledby="password-tab">
                <form action="<?php echo e(route('accountant_update_password')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="space-y-8">
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
                                <div class="input-group">
                                    <label for="">
                                        Old Password
                                    </label>
                                    <div class="mt-1.5 input-wrapper">
                                        <input type="password" name="old_password" class="form-input" required>
                                    </div>
                                </div>

                                <div class="input-group">
                                    <label for="">
                                        New Password
                                    </label>
                                    <div class="mt-1.5 input-wrapper">
                                        <input type="password" name="new_password" class="form-input" required>
                                    </div>
                                    <p class="text-default">
                                        Minimum 8 characters required
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- END PASSWORD -->

                        <hr class="border-gray-200">

                        <div class="flex flex-col gap-6 sm:gap-12 xl:gap-16 md:items-start md:flex-row">
                            <div class="w-full hidden md:max-w-[256px] md:block xl:max-w-xs shrink-0">
                                &nbsp;
                            </div>

                            <div class="flex flex-col flex-1 gap-4 sm:flex-row sm:items-center">
                                <button type="submit" class="btn btn-primary">
                                    Update Password
                                </button>

                                <button onclick="history.back()" type="button" class="btn btn-secondary">
                                    Discard
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- END CONTENT -->

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('accountant.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u239499167/domains/digitalpahal.com/public_html/resources/views/accountant/profile.blade.php ENDPATH**/ ?>