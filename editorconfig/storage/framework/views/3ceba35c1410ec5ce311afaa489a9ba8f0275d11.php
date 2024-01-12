
<?php $__env->startSection('content'); ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->startSection('title'); ?>
<?php echo e("GST Documents"); ?>

<?php $__env->stopSection(); ?>

<!-- START CONTENT -->
<section class="flex-1 py-6 overflow-y-auto">
    <div class="min-h-full px-4 sm:px-6">

        <a href="<?php echo e($parent_id =='' ? route('view_client', ['id'=>$user->id]) : route('view_client_member', ['id'=>$user->id, 'parentid'=>$parent_id])); ?>" title="Back" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary-600 hover:text-primary-500 transition-all duration-150 hover:underline leading-6">
            <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M5 12l14 0"></path>
                <path d="M5 12l6 6"></path>
                <path d="M5 12l6 -6"></path>
            </svg>
            Back to Client Details
        </a>

        <div class="flex flex-col gap-4 mt-4 sm:gap-6 md:justify-between md:flex-row md:items-center">
            <div class="flex flex-col items-center gap-2 text-center sm:text-left sm:flex-row sm:justify-start sm:gap-3">
                <span class="avatar avatar-lg">
                    <?php echo e(getNameShort($user['name'])); ?>

                </span>
                <div>
                    <div class="flex flex-col items-center gap-2 sm:flex-row">
                        <h2 class="text-lg font-bold text-gray-900">
                            <?php echo e($user['name']); ?>

                        </h2>

                        <span class="badge badge-default-light">
                            <?php echo e(getGstType($user->gst_type)); ?>

                        </span>
                    </div>
                    <div class="flex items-center justify-center gap-2 mt-2 sm:mt-px sm:justify-start">
                        <span class="text-sm font-normal text-gray-600">
                            <?php echo e($user['company_name']); ?>

                        </span>
                        <span class="text-sm font-normal text-gray-600">
                            •
                        </span>
                        <span class="text-sm font-normal text-gray-600">
                            <?php echo e($user['gst_number']); ?>

                        </span>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-4 xl:justify-end sm:flex-row sm:items-center">
                <a href="<?php echo e($parent_id =='' ? route('accoutant_gst', ['client_id'=>$user->id]) : route('accoutant_gst', ['client_id'=>$user->id, 'parentid'=>$parent_id])); ?>" title="Import Data" class="w-full btn btn-primary-light sm:w-auto" role="button" data-toggle="modal" data-target="#bulkClientsModal">
                    <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 21h-7a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v8"></path>
                        <path d="M3 10h18"></path>
                        <path d="M10 3v18"></path>
                        <path d="M19 22v-6"></path>
                        <path d="M22 19l-3 -3l-3 3"></path>
                    </svg>
                    Import Data
                </a>

                <a tabindex="-1" data-toggle="modal" href="javascript:void(0)" data-target="#fileUploadModal" title="Switch Client" class="w-full btn btn-primary sm:w-auto" role="button" data-toggle="modal" data-target="#switchClientModal">
                    <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M16 3l4 4l-4 4"></path>
                        <path d="M10 7l10 0"></path>
                        <path d="M8 13l-4 4l4 4"></path>
                        <path d="M4 17l9 0"></path>
                    </svg>
                    Switch Client
                </a>
            </div>
        </div>

        <hr class="mt-6 border-gray-200">
        <!-- START SEARCH & FILTERS -->
        <div class="flex flex-col gap-4 mt-6 xl:gap-6 xl:justify-between xl:flex-row-reverse xl:items-center">
            <div class="flex flex-wrap items-center gap-4 xl:justify-end">

                <button type="button" onclick="downloadCsv()" class="btn btn-secondary">
                    <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                        <path d="M8 11h8v7h-8z"></path>
                        <path d="M8 15h8"></path>
                        <path d="M11 11v7"></path>
                    </svg>
                    CSV File
                </button>

                <button type="button" onclick="downloadJson()" class="btn btn-secondary">
                    <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10 12h-1v5h1"></path>
                        <path d="M14 12h1v5h-1"></path>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                    </svg>
                    JSON File
                </button>

                <div class="relative flex dropdown">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="true">
                        <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                            <path d="M10 13l-1 2l1 2"></path>
                            <path d="M14 13l1 2l-1 2"></path>
                        </svg>
                        Tally XML
                        <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 9l6 6l6 -6"></path>
                        </svg>
                    </button>

                    <div class="absolute right-0 z-30 invisible w-40 mt-1 transition-all duration-100 origin-top-right scale-95 bg-white rounded-lg shadow-lg opacity-0 pointer-events-none top-full ring-1 ring-gray-200 focus:outline-none dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <a href="#" title="" class="block px-4 py-2 text-sm font-medium text-gray-600 transition-all duration-150 hover:text-gray-900 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">
                                HSN Wise XML (M)
                            </a>

                            <a href="#" title="" class="block px-4 py-2 text-sm font-medium text-gray-600 transition-all duration-150 hover:text-gray-900 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">
                                Rate Wise XML (M)
                            </a>

                            <a href="#" title="" class="block px-4 py-2 text-sm font-medium text-gray-600 transition-all duration-150 hover:text-gray-900 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">
                                HSN Wise XML (Q)
                            </a>

                            <a href="#" title="" class="block px-4 py-2 text-sm font-medium text-gray-600 transition-all duration-150 hover:text-gray-900 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">
                                Rate Wise XML (Q)
                            </a>
                        </div>
                    </div>
                </div>

                <div class="relative flex dropdown">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="true">
                        <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                            <path d="M9 17h6"></path>
                            <path d="M9 13h6"></path>
                        </svg>
                        Accounting Summary
                        <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 9l6 6l6 -6"></path>
                        </svg>
                    </button>

                    <div class="absolute right-0 z-30 invisible mt-1 transition-all duration-100 origin-top-right scale-95 bg-white rounded-lg shadow-lg opacity-0 pointer-events-none w-60 top-full ring-1 ring-gray-200 focus:outline-none dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <a href="#" title="" class="block px-4 py-2 text-sm font-medium text-gray-600 transition-all duration-150 hover:text-gray-900 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">
                                HSN & Qty Wise Summary (M)
                            </a>

                            <a href="#" title="" class="block px-4 py-2 text-sm font-medium text-gray-600 transition-all duration-150 hover:text-gray-900 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">
                                Rate Wise Summary (M)
                            </a>

                            <a href="#" title="" class="block px-4 py-2 text-sm font-medium text-gray-600 transition-all duration-150 hover:text-gray-900 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">
                                HSN & Qty Wise Summary (Q)
                            </a>

                            <a href="#" title="" class="block px-4 py-2 text-sm font-medium text-gray-600 transition-all duration-150 hover:text-gray-900 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">
                                Rate Wise Summary (Q)
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4 xl:justify-start">


                <div class="flex-1 xl:flex-none">
                    <label for="" class="sr-only">
                        Filter by Month
                    </label>
                    <div>
                        <select name="" id="month_search" class="pl-3 pr-10 form-select">
                            <option value="">
                                Filter by Month
                            </option>

                            <?php $__currentLoopData = getMonths(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option <?php echo e((isset($_GET['month']) && $_GET['month']==$key) ? "selected" : ( !(isset($_GET['month'])) && $key == date('m') ? "selected":"")); ?> value="<?php echo e($key); ?>">
                                <?php echo e($value); ?>

                            </option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SEARCH & FILTERS -->

        <!-- START TABLE -->
        <div class="flow-root mt-6">
            <div class="overflow-x-auto border border-gray-200 rounded-lg shadow-sm">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 w-80 sm:w-auto  text-left text-xs font-semibold text-gray-500 whitespace-nowrap sm:pl-6">
                                Sr. No.
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold  whitespace-nowrap text-gray-500">
                                Particulars
                            </th>
                            <th scope="col" class="px-3  py-3.5 text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Voucher<br>Count
                            </th>
                            <th scope="col" class="px-3  py-3.5 text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Taxable<br>Amount
                            </th>
                            <th scope="col" class="px-3  py-3.5 text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Integrated<br>Tax Amount
                            </th>
                            <th scope="col" class="px-3  py-3.5 text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Central<br>Tax Amount
                            </th>
                            <th scope="col" class="px-3  py-3.5 text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                State<br>Tax Amount
                            </th>
                            <th scope="col" class="px-3  py-3.5 text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                CESS<br>Amount
                            </th>
                            <th scope="col" class="text-left text-xs font-semibold text-gray-500 whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
                                Invoice<br>Amount
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 list">

                        <tr>
                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 whitespace-nowrap">
                                1
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                B2B Invoices - 4A, 4B, 6B, 6C
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e($b2b['voucher']); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($b2b['taxable_amount'], 2)); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($b2b['integrated_tax'], 2)); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($b2b['central_tax'], 2)); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e($b2b['state_tax']); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($b2b['cess_amount'], 2)); ?>

                            </td>
                            <td class="py-4 pl-3 pr-4 text-sm text-gray-900 whitespace-nowrap sm:pr-6">
                                <?php echo e(round($b2b['invoice_amount'],2)); ?>

                            </td>
                        </tr>
                        <?php if($user->gst_type == 1 || ($user->gst_type == 2 && isset($_GET['month']) && in_array($_GET['month'], ["06", "09", "12", "03"]))): ?>
                        <tr>
                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 whitespace-nowrap">
                                2
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                B2C (Large) Invoices - 5A
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e($b2c_large['voucher']); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($b2c_large['taxable_amount'],2)); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($b2c_large['integrated_tax'],2)); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($b2c_large['central_tax'],2)); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($b2c_large['state_tax'],2)); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($b2c_large['cess_amount'],2)); ?>

                            </td>
                            <td class="py-4 pl-3 pr-4 text-sm text-gray-900 whitespace-nowrap sm:pr-6">
                                <?php echo e(round($b2c_large['invoice_amount'],2)); ?>

                            </td>
                        </tr>

                        <tr>
                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 whitespace-nowrap">
                                3
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                B2C (Others) - 7
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e($b2c['voucher']); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($b2c['taxable_amount'],2)); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($b2c['integrated_tax'],2)); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($b2c['central_tax'],2)); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($b2c['state_tax'],2)); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($b2c['cess_amount'],2)); ?>

                            </td>
                            <td class="py-4 pl-3 pr-4 text-sm text-gray-900 whitespace-nowrap sm:pr-6">
                                <?php echo e(round(($b2c['taxable_amount'] + $b2c['integrated_tax'] + $b2c['state_tax'] + $b2c['central_tax']),2)); ?>

                            </td>
                        </tr>

                        <tr>
                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 whitespace-nowrap">
                                4
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                Credit/Debit Notes (Registered) - 9B
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e($credit_notes['voucher']); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($credit_notes['taxable_amount'],2)); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($credit_notes['integrated_tax'],2)); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($credit_notes['central_tax'],2)); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($credit_notes['state_tax'],2)); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($credit_notes['cess_amount'],2)); ?>

                            </td>
                            <td class="py-4 pl-3 pr-4 text-sm text-gray-900 whitespace-nowrap sm:pr-6">
                                <?php echo e(round(($credit_notes['taxable_amount'] + $credit_notes['integrated_tax'] + $credit_notes['state_tax'] + $credit_notes['central_tax']),2)); ?>

                            </td>
                        </tr>
                        <?php endif; ?>

                        <tr class="bg-gray-50">
                            <td class="py-4 pl-4 pr-3 text-sm font-bold text-gray-900 sm:pl-6 whitespace-nowrap">
                                &nbsp;
                            </td>
                            <td class="px-3 py-4 text-sm font-bold text-gray-600 whitespace-nowrap">
                                Total
                            </td>
                            <td class="px-3 py-4 text-sm font-bold text-gray-600 whitespace-nowrap">
                                &nbsp;
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($total_amount['taxable_amount'],2)); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($total_amount['integrated_tax'],2)); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($total_amount['central_tax'],2)); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($total_amount['state_tax'],2)); ?>

                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <?php echo e(round($total_amount['cess_amount'],2)); ?>

                            </td>
                            <td class="py-4 pl-3 pr-4 text-sm text-gray-900 whitespace-nowrap sm:pr-6">
                                <?php echo e(round(($total_amount['invoice_amount']),2)); ?>

                            </td>
                        </tr>

                        <tr>
                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 whitespace-nowrap">
                                &nbsp;
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                HSN-wise summary of outward supplies
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                0
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                0
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                0
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                0
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                0
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                0
                            </td>
                            <td class="py-4 pl-3 pr-4 text-sm font-medium text-gray-600 whitespace-nowrap sm:pr-6">
                                0
                            </td>
                        </tr>

                        <tr>
                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 whitespace-nowrap">
                                &nbsp;
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                Documents Issued
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                &nbsp;
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                &nbsp;
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                &nbsp;
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                &nbsp;
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                &nbsp;
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                &nbsp;
                            </td>
                            <td class="py-4 pl-3 pr-4 text-sm font-medium text-gray-600 whitespace-nowrap sm:pr-6">
                                &nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td class="relative py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 whitespace-nowrap">
                                <input id="includeHsn" type="checkbox" class="absolute w-4 h-4 -mt-2 border-gray-300 rounded text-primary-600 left-4 top-1/2 focus:ring-primary-600">
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                Want to include HSN-wise summary data?
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                &nbsp;
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                &nbsp;
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                &nbsp;
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                &nbsp;
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                &nbsp;
                            </td>
                            <td class="px-3 py-4 text-sm font-medium text-gray-600 whitespace-nowrap">
                                &nbsp;
                            </td>
                            <td class="py-4 pl-3 pr-4 text-sm font-medium text-gray-600 whitespace-nowrap sm:pr-6">
                                &nbsp;
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END TABLE -->

        <!-- START BUTTONS -->
        <div class="flex-wrap items-center hidden gap-4 mt-6 lg:justify-end">
            <button type="button" class="btn btn-secondary">
                <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                    <path d="M8 11h8v7h-8z"></path>
                    <path d="M8 15h8"></path>
                    <path d="M11 11v7"></path>
                </svg>
                CSV File
            </button>

            <button type="button" class="btn btn-secondary">
                <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 12h-1v5h1"></path>
                    <path d="M14 12h1v5h-1"></path>
                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                </svg>
                JSON File
            </button>

            <div class="relative flex dropdown">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="true">
                    <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                        <path d="M10 13l-1 2l1 2"></path>
                        <path d="M14 13l1 2l-1 2"></path>
                    </svg>
                    Tally XML
                    <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M6 9l6 6l6 -6"></path>
                    </svg>
                </button>

                <div class="absolute right-0 z-30 invisible w-40 mt-1 transition-all duration-100 origin-top-right scale-95 bg-white rounded-lg shadow-lg opacity-0 pointer-events-none top-full ring-1 ring-gray-200 focus:outline-none dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        <a href="#" title="" class="block px-4 py-2 text-sm font-medium text-gray-600 transition-all duration-150 hover:text-gray-900 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">
                            HSN Wise XML (M)
                        </a>

                        <a href="#" title="" class="block px-4 py-2 text-sm font-medium text-gray-600 transition-all duration-150 hover:text-gray-900 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">
                            Rate Wise XML (M)
                        </a>

                        <a href="#" title="" class="block px-4 py-2 text-sm font-medium text-gray-600 transition-all duration-150 hover:text-gray-900 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">
                            HSN Wise XML (Q)
                        </a>

                        <a href="#" title="" class="block px-4 py-2 text-sm font-medium text-gray-600 transition-all duration-150 hover:text-gray-900 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">
                            Rate Wise XML (Q)
                        </a>
                    </div>
                </div>
            </div>

            <div class="relative flex dropdown">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="true">
                    <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                        <path d="M9 17h6"></path>
                        <path d="M9 13h6"></path>
                    </svg>
                    Accounting Summary
                    <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M6 9l6 6l6 -6"></path>
                    </svg>
                </button>

                <div class="absolute right-0 z-30 invisible mt-1 transition-all duration-100 origin-top-right scale-95 bg-white rounded-lg shadow-lg opacity-0 pointer-events-none w-60 top-full ring-1 ring-gray-200 focus:outline-none dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        <a href="#" title="" class="block px-4 py-2 text-sm font-medium text-gray-600 transition-all duration-150 hover:text-gray-900 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">
                            HSN & Qty Wise Summary (M)
                        </a>

                        <a href="#" title="" class="block px-4 py-2 text-sm font-medium text-gray-600 transition-all duration-150 hover:text-gray-900 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">
                            Rate Wise Summary (M)
                        </a>

                        <a href="#" title="" class="block px-4 py-2 text-sm font-medium text-gray-600 transition-all duration-150 hover:text-gray-900 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">
                            HSN & Qty Wise Summary (Q)
                        </a>

                        <a href="#" title="" class="block px-4 py-2 text-sm font-medium text-gray-600 transition-all duration-150 hover:text-gray-900 hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">
                            Rate Wise Summary (Q)
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BUTTONS -->

    </div>
</section>
<!-- END CONTENT -->

<!-- START SWITCH CLIENT MODAL -->
<div class="fixed inset-0 z-30 invisible w-full h-full overflow-hidden transition-all duration-200 ease-in-out outline-none opacity-0 modal" id="fileUploadModal" aria-labelledby="fileUploadModalLabel" role="dialog" aria-hidden="true" tabindex="-1">
    <div class="fixed inset-0 z-10 invisible w-screen h-screen transition-opacity duration-200 ease-in-out bg-gray-600 opacity-0 pointer-events-none modal-overlay" tabindex="-1"></div>

    <div class="relative z-20 flex items-center justify-center w-auto h-full p-4 transition-all duration-200 ease-in-out scale-75 pointer-events-none modal-dialog sm:mx-auto sm:w-full sm:max-w-xl">
        <div class="relative flex flex-col w-full max-h-full overflow-hidden bg-white border border-gray-200 shadow-xl outline-none pointer-events-auto rounded-xl sm:m-4" role="document">
            <div class="absolute top-0 right-0 hidden pt-4 pr-4 sm:block">
                <button type="button" class="text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none btn-close" data-dismiss="modal" aria-label="Close">
                    <span class="sr-only">
                        Close
                    </span>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M18 6l-12 12"></path>
                        <path d="M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="p-4 sm:p-6">
                <h5 class="text-lg font-semibold text-gray-900" id="exampleModalToggleLabel">
                    Select Client to switch
                </h5>
            </div>

            <div class="flex-1 px-4 pb-4 overflow-y-auto sm:px-6 sm:pb-6 grow">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                    <div id="start_client_selection" class="sm:col-span-2">
                        <label for="" class="required">
                            Client
                        </label>
                        <div class="mt-1.5 input-wrapper">
                            <select id="client" class="pl-3 pr-10 form-select select2">
                                <option value="">
                                    Select client
                                </option>

                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <option value="<?php echo e($c['id']); ?>">
                                    <?php echo e($c['name']); ?>

                                </option>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('.select2').select2();
    $('.select2').on('select2:select', function(e) {
        var data = e.params.data;
        let url = "<?php echo e(route('accoutant_data_summary', ['id'=>':id'])); ?>";
        url = url.replace(':id', data.id);
        window.location.href = url;
    });
    $(document).on('change', '#month_search', function(e) {
        let url = "<?php echo e(route('accoutant_data_summary', ['id'=>$user['id'], 'parentid'=>(isset($_GET['parentid'])? $_GET['parentid'] : '')])); ?>";
        url = url + "&month=" + $(this).val().trim();
        window.location.href = url;
    })

    function downloadCsv() {
        let url = "<?php echo e(route('downloadZip', ['id'=>$user->id,'gst_type'=>$user->gst_type,'month'=>(isset($_GET['month']) ? $_GET['month'] : '')])); ?>";
        if ($('#includeHsn').is(":checked")) {
            url = url + "&is_hsn=1";
        }
        url = url.replace(/&amp;/g, '&');
        window.location.href = url;
    }

    function downloadJson() {
        let url = "<?php echo e(route('downloadJson', ['id'=>$user->id,'gst_type'=>$user->gst_type,'month'=>(isset($_GET['month']) ? $_GET['month'] : '')])); ?>";
        if ($('#includeHsn').is(":checked")) {
            url = url + "&is_hsn=1";
        }
        url = url.replace(/&amp;/g, '&');
        window.location.href = url;
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('accountant.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u239499167/domains/digitalpahal.com/public_html/resources/views/accountant/clients/data-summary.blade.php ENDPATH**/ ?>