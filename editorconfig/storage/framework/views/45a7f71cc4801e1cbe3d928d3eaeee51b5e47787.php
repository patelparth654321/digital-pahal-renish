<?php $__env->startSection('content'); ?>

<div class="min-h-full px-4 sm:px-6">

    <!-- START QUICK STATS -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex flex-row items-start gap-3">
                    <div class="shrink-0">
                        <svg aria-hidden="true" class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-sm font-medium text-gray-600">
                            Total Accountants
                        </h2>
                        <p class="mt-1 text-3xl font-bold text-gray-900">
                            <?php echo e($total_accountant); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex flex-row items-start gap-3">
                    <div class="shrink-0">
                        <svg aria-hidden="true" class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                            <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                            <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                            <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                            <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                            <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-sm font-medium text-gray-600">
                            Total Clients
                        </h2>
                        <p class="mt-1 text-3xl font-bold text-gray-900">
                            <?php echo e($total_client); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex flex-row items-start gap-3">
                    <div class="shrink-0">
                        <svg aria-hidden="true" class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                            <path d="M9 17h6"></path>
                            <path d="M9 13h6"></path>
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-sm font-medium text-gray-600">
                            Total Documents
                        </h2>
                        <p class="mt-1 text-3xl font-bold text-gray-900">
                            <?php echo e($total_documents); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex flex-row items-start gap-3">
                    <div class="shrink-0">
                        <svg aria-hidden="true" class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M15 5l0 2"></path>
                            <path d="M15 11l0 2"></path>
                            <path d="M15 17l0 2"></path>
                            <path d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2">
                            </path>
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-sm font-medium text-gray-600">
                        Active Accountants
                        </h2>
                        <p class="mt-1 text-3xl font-bold text-gray-900">
                            <?php echo e($total_support_tickets); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END QUICK STATS -->

    <!-- START ACCOUNTANTS LIST -->
    <div class="mt-4 overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="px-4 py-4 sm:px-6">
            <div class="flex items-center justify-between gap-4 sm:gap-6">
                <h2 class="text-base font-semibold text-gray-900 lg:text-lg">
                    Recently Created Accountants
                </h2>

                <a href="<?php echo e(route('accountants')); ?>" title="View All Accountants" class="btn-link">
                    View All
                    <svg aria-hidden="true" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 6l6 6l-6 6"></path>
                    </svg>
                </a>
            </div>
        </div>
        <?php if($latest_accoutants && count($latest_accoutants) > 0): ?>
        <div class="flow-root border-t border-gray-200">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 w-80 sm:w-auto text-left text-xs font-semibold text-gray-500 whitespace-nowrap sm:pl-6">
                                Company Name
                            </th>
                            <th scope="col" class="px-3 py-3.5 hidden xl:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Owner Name
                            </th>
                            <th scope="col" class="px-3 py-3.5 hidden sm:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Contact Details
                            </th>
                            <th scope="col" class="px-3 py-3.5 hidden md:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Category
                            </th>
                            <th scope="col" class="px-3 py-3.5 hidden xl:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Total Clients
                            </th>
                            <th scope="col" class="px-3 py-3.5 hidden 2xl:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Created On
                            </th>
                            <th scope="col" class="px-3 py-3.5 hidden xl:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Status
                            </th>
                            <th scope="col" class="relative text-left text-xs font-semibold text-gray-500 whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php $__currentLoopData = $latest_accoutants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 whitespace-nowrap company-name">
                                <div class="flex items-center gap-3">
                                    <img class="w-8 h-8 bg-gray-300 rounded-lg" src="<?php echo e(getImagePath($row['logo'], 'accountant/logo')); ?>" alt="">
                                    <div>
                                        <span>
                                            <?php echo $row['company_name']; ?>

                                        </span>
                                        <span class="block mt-px text-xs text-gray-500 xl:hidden">
                                            <?php echo $row['name']; ?>

                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 xl:table-cell whitespace-nowrap owner-name">
                                <?php echo $row['name']; ?>

                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 sm:table-cell whitespace-nowrap email-address phone-number">
                                <?php echo $row['email']; ?><br><?php echo $row['phone']; ?>

                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 md:table-cell whitespace-nowrap">
                                <div class="flex items-center gap-1.5">
                                    <?php echo getUserCategoryType($row['type']); ?>

                                </div>
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 xl:table-cell whitespace-nowrap total-clients">
                                <?php echo e($row['count_row']); ?>

                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 2xl:table-cell whitespace-nowrap created-date">
                                <?php echo dateFormat($row['created_at'], 'd M Y'); ?>

                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 2xl:table-cell whitespace-nowrap expire-date">
                                <?php echo dateFormat($row['plan_expiry_date'], 'd M Y'); ?>

                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 xl:table-cell whitespace-nowrap status">
                                <?php echo getUserStatus($row['status']); ?>

                            </td>

                            <td class="relative py-4 pl-3 pr-4 whitespace-nowrap sm:pr-6">
                                <div class="flex items-center gap-4">
                                    <a href="<?php echo e(route('view_accountant', ['id'=>$row['accountant_id']])); ?>" title="" class="btn btn-icon btn-secondary-light btn-icon-transparent" aria-label="View Accountant" data-microtip-position="top" role="tooltip">
                                        <span class="sr-only">
                                            View Accountant
                                        </span>
                                        <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php else: ?>
        <div class="p-12 text-center border-t border-gray-200 sm:p-16">
            <img class="w-auto mx-auto h-52" src="../images/empty-accoutants.svg" alt="">
            <p class="mt-5 text-lg font-bold text-gray-900">
                No accountants found
            </p>
            <p class="mt-2 text-sm font-normal text-gray-600 sm:max-w-xs sm:mx-auto">
                Velit officia consequat duis enim velit mollit. Exercitation veniam consequat.
            </p>
            <div class="mt-6">
                <a href="<?php echo e(route('add_accountant')); ?>" title="Add Accountant" class="btn btn-primary" role="button">
                    <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                        <path d="M16 19h6"></path>
                        <path d="M19 16v6"></path>
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                    </svg>
                    Add Accountant
                </a>
            </div>
        </div>
        <?php endif; ?>

    </div>
    <!-- END ACCOUNTANTS LIST -->

    <!-- START SUPPORT TICKETS -->
    <!-- END SUPPORT TICKETS -->

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u239499167/domains/digitalpahal.com/public_html/resources/views/admin/dashboard/index.blade.php ENDPATH**/ ?>