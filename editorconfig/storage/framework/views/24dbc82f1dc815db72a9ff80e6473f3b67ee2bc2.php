<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e("Clients"); ?>

<?php $__env->stopSection(); ?>
<section class="flex-1 py-6 overflow-y-auto">
<div class="min-h-full px-4 sm:px-6">

    <!-- START SEARCH & FILTERS -->
    <div class="flex flex-col gap-4 xl:gap-6 xl:justify-between xl:flex-row xl:items-center">
        <div class="flex items-center gap-4 xl:justify-start">
            <div class="flex-1 xl:flex-none">
                <label for="" class="sr-only">
                    Filter by Status
                </label>
                <div>
                    <select id="status" class="pl-3 pr-10 form-select">
                        <option value="">
                            Filter by Status
                        </option>
                        <option <?php echo e(isset($_GET['status']) && $_GET['status']=="1" ? "selected":""); ?> value="1">
                            Active
                        </option>
                        <option <?php echo e(isset($_GET['status']) && $_GET['status']=="0" ? "selected":""); ?> value="0">
                            Inactive
                        </option>
                    </select>
                </div>
            </div>

            <div class="flex-1 xl:flex-none">
                <label for="" class="sr-only">
                    Filter by Type
                </label>
                <div>
                    <select id="type" class="pl-3 pr-10 form-select">
                        <option value="">
                            Filter by Type
                        </option>
                        <option value="2" <?php echo e(isset($_GET['type']) && $_GET['type']=="2" ? "selected":""); ?>>
                            Only GST
                        </option>
                        <option value="1" <?php echo e(isset($_GET['type']) && $_GET['type']=="1" ? "selected":""); ?>>
                            Only DMS
                        </option>
                        <option value="1,2" <?php echo e(isset($_GET['type']) && $_GET['type']=="1,2" ? "selected":""); ?>>
                            GST & DMS
                        </option>
                    </select>
                </div>
            </div>
            <div class="flex-1 xl:flex-none">
                <label for="" class="sr-only">
                    Read Status
                </label>
                <div>
                    <select id="read_status" class="pl-3 pr-10 form-select">
                        <option value="">
                           All Read/Unread
                        </option>
                        <option value="read" <?php echo e(isset($_GET['read_status']) && $_GET['read_status']=="read" ? "selected":""); ?>>
                            Only Read
                        </option>
                        <option value="unread" <?php echo e(isset($_GET['read_status']) && $_GET['read_status']=="unread" ? "selected":""); ?>>
                            Only Unread
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-4 xl:justify-end sm:flex-row sm:items-center">
            <div class="flex-1 w-full xl:max-w-xs">
                <label for="searchClients" class="sr-only">
                    Search Clients
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                            <path d="M21 21l-6 -6"></path>
                        </svg>
                    </div>

                    <input type="search" id="searchKeyword" placeholder="Search by client name, company, phone or email..." value="<?php echo e(isset($_GET['search']) ? $_GET['search']: ''); ?>" class="pl-10 form-input">
                </div>
            </div>

            <div class="flex items-center gap-4">
                <!-- <a href="#" title="Bulk Clients" class="w-full btn btn-primary-light sm:w-auto" role="button" data-toggle="modal" data-target="#bulkClientsModal">
                    <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4c.96 0 1.84 .338 2.53 .901"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        <path d="M16 19h6"></path>
                        <path d="M19 16v6"></path>
                    </svg>
                    Bulk Clients
                </a> -->

                <a href="<?php echo e(route('add_client')); ?>" title="Add Client" class="w-full btn btn-primary sm:w-auto" role="button">
                    <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                        <path d="M16 19h6"></path>
                        <path d="M19 16v6"></path>
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                    </svg>
                    Add Client
                </a>
            </div>
        </div>
    </div>
    <!-- END SEARCH & FILTERS -->

    <div id="clientsView">
        <?php if($rows && count($rows) > 0): ?>
        <!-- START CLIENTS TABLE -->
        <div class="flow-root mt-6">
            <div class="overflow-x-auto border border-gray-200 rounded-lg shadow-sm">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 w-80 sm:w-auto cursor-pointer text-left text-xs font-semibold text-gray-500 whitespace-nowrap sm:pl-6 sort" data-sort="user-name">
                                User Name
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left cursor-pointer text-xs font-semibold hidden 2xl:table-cell whitespace-nowrap text-gray-500 sort" data-sort="company-name">
                                Company / Shop Name
                            </th>
                            <th scope="col" class="px-3 hidden sm:table-cell py-3.5 text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Contact Details
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-xs cursor-pointer font-semibold  hidden md:table-cell whitespace-nowrap text-gray-500 ">
                                Category
                            </th>
                            <th scope="col" class="px-3 py-3.5 hidden md:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Total Documents
                            </th>
                            <th scope="col" class="px-3 py-3.5 hidden md:table-cell text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                Unread Documents
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-xs  cursor-pointer font-semibold hidden xl:table-cell whitespace-nowrap text-gray-500 sort" data-sort="created-date">
                                Created On
                            </th>
                            <th scope="col" class="px-3 hidden xl:table-cell py-3.5 cursor-pointer text-left text-xs font-semibold whitespace-nowrap text-gray-500 sort" data-sort="status">
                                Status
                            </th>
                            <th scope="col" class="relative text-left text-xs font-semibold text-gray-500 whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200 list">
                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 whitespace-nowrap">
                            <a href="<?php echo e(route('view_client', ['id'=>$row['client_id']])); ?>">
                                <div class="flex items-center gap-3">
                                    <span class="avatar avatar-md">
                                        <?php echo e(getNameShort($row['name'])); ?>

                                    </span>
                                    <div>
                                        <span>
                                            <?php echo $row['name']; ?>

                                        </span>
                                        <span class="block mt-px text-xs font-normal text-gray-500 2xl:hidden">
                                            <?php echo $row['company_name']; ?>

                                        </span>
                                    </div>
                                </div>
                            </a>
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 2xl:table-cell whitespace-nowrap">
                                <?php echo $row['company_name']; ?>

                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 sm:table-cell whitespace-nowrap">
                                <?php echo $row['email']; ?><br><?php echo $row['phone']; ?>

                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 md:table-cell whitespace-nowrap">
                                <div class="flex items-center gap-1.5">
                                    <?php echo getUserCategoryType($row['type']); ?>

                                </div>
                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 2xl:table-cell whitespace-nowrap">
                            <?php echo $row['total_documents']; ?>

                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 2xl:table-cell whitespace-nowrap">
                            <?php echo $row['unread_documents']; ?>

                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 xl:table-cell whitespace-nowrap">
                                <?php echo dateFormat($row['created_at'], 'd M Y'); ?>

                            </td>
                            <td class="hidden px-3 py-4 text-sm text-gray-600 xl:table-cell whitespace-nowrap">
                                <?php echo getUserStatus($row['status']); ?>

                            </td>

                            <td class="relative py-4 pl-3 pr-4 whitespace-nowrap sm:pr-6">
                                <div class="flex items-center gap-4">
                                    <a href="javascript:void(0)" class="btn btn-icon btn-secondary-light btn-icon-transparent sendNotification" data-id="<?php echo e($row['client_id']); ?>" aria-label="Send Notification" data-microtip-position="top" role="tooltip" data-toggle="modal" data-target="#sendNotificationModal">
                                        <span class="sr-only">
                                            Send Notification
                                        </span>
                                        <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12.5 17h-8.5a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6a2 2 0 1 1 4 0a7 7 0 0 1 4 6v1">
                                            </path>
                                            <path d="M9 17v1a3 3 0 0 0 3.51 2.957"></path>
                                            <path d="M16 19h6"></path>
                                            <path d="M19 16v6"></path>
                                        </svg>
                                    </a>

                                    <a href="<?php echo e(route('view_client', ['id'=>$row['client_id']])); ?>" title="" class="btn btn-icon btn-secondary-light btn-icon-transparent" aria-label="View Client" data-microtip-position="top" role="tooltip">
                                        <span class="sr-only">
                                            View Client
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
        <!-- END CLIENTS TABLE -->

        <!-- START PAGINATION -->
        <div class="flex flex-col items-center mt-8 sm:mt-4 sm:flex-row sm:justify-between">
            <?php echo $rows->appends($_GET)->links(); ?>

        </div>
        <!-- END PAGINATION -->
        <?php else: ?>
        <!-- START EMPTY STATE -->
        <div class="flex items-center justify-center h-full p-12 text-center sm:p-16 sm:max-w-md sm:mx-auto">
            <div>
                <img class="w-auto mx-auto h-52" src="<?php echo e(asset('images/empty-clients.svg')); ?>" alt="">
                <p class="mt-4 text-lg font-bold text-gray-900">
                    No clients found
                </p>
                <p class="mt-2 text-sm font-normal leading-6 text-gray-600">
                    Velit officia consequat duis enim velit mollit. Exercitation veniam consequat.
                </p>
                <div class="mt-6">
                    <a href="<?php echo e(route('add_client')); ?>" title="Add Client" class="btn btn-primary" role="button">
                        <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                            <path d="M16 19h6"></path>
                            <path d="M19 16v6"></path>
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                        </svg>
                        Add Client
                    </a>
                </div>
            </div>
        </div>
        <!-- END EMPTY STATE -->
        <?php endif; ?>
    </div>

</div>

<!-- START BULK CLIENTS MODAL -->
<div class="fixed inset-0 z-30 invisible w-full h-full overflow-hidden transition-all duration-200 ease-in-out outline-none opacity-0 modal" id="bulkClientsModal" aria-labelledby="fileUploadModalLabel" role="dialog" aria-hidden="true" tabindex="-1">
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
                    Bulk Upload Clients
                </h5>
                <p class="mt-1 text-sm font-normal text-gray-600">
                    Don't modify file headers, it may generate a mistake. Upload the same (xls) file provided as sample.
                </p>
            </div>

            <div class="flex-1 px-4 pb-4 overflow-y-auto sm:px-6 sm:pb-6 grow">
                <div class="pt-1">
                    <button type="button" class="btn btn-primary-light">
                        <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                            <path d="M7 11l5 5l5 -5"></path>
                            <path d="M12 4l0 12"></path>
                        </svg>
                        Sample Bulk Client File
                    </button>
                </div>

                <div class="grid grid-cols-1 mt-4 gap-x-6 gap-y-5">
                    <div class="flex justify-center px-6 py-10 transition-all duration-150 border border-gray-200 border-dashed rounded-lg bg-gray-25 hover:bg-gray-50">
                        <div class="text-center">
                            <svg aria-hidden="true" class="w-12 h-12 mx-auto text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                <path d="M12 11v6"></path>
                                <path d="M9.5 13.5l2.5 -2.5l2.5 2.5"></path>
                            </svg>
                            <div class="flex mt-4 text-sm leading-6 text-gray-600">
                                <label for="file-upload" class="relative font-semibold bg-white rounded-md cursor-pointer text-primary-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-primary-600 focus-within:ring-offset-2 hover:text-primary-500">
                                    <span>Upload a file</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-lg">
                        <div class="p-4">
                            <div class="flex items-start gap-4">
                                <div class="inline-flex items-center justify-center w-8 h-8 rounded-full shrink-0 bg-primary-50 text-primary-600">
                                    <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                    </svg>
                                </div>

                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between gap-4">
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">
                                                flipkart-may-2023.pdf
                                            </p>
                                            <p class="text-sm font-normal text-gray-600">
                                                200 KB
                                            </p>
                                        </div>

                                        <button type="button" class="p-1 -m-1 text-gray-600 transition-all duration-150 rounded-lg hover:text-error-600">
                                            <span class="sr-only">
                                                Delete
                                            </span>
                                            <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 7h16"></path>
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                <path d="M10 12l4 4m0 -4l-4 4"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="flex items-center gap-4 mt-1">
                                        <div class="relative w-full h-2 bg-gray-200 rounded-full">
                                            <div class="absolute inset-y-0 bg-primary-600 left-0 rounded-full w-[40%]"></div>
                                        </div>

                                        <span class="text-sm font-medium text-gray-900">
                                            40%
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center gap-4 mt-4 sm:mt-6">
                    <button type="button" class="w-full btn btn-secondary" data-dismiss="modal" aria-label="Close Modal">
                        Cancel
                    </button>

                    <button type="button" class="w-full btn btn-primary">
                        Upload
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END BULK CLIENTS MODAL -->
<?php echo $__env->make('accountant.clients.notification_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $(document).on('keypress', "#searchKeyword", function() {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            let url = "<?php echo e(route('clients')); ?>?search=" + $(this).val().trim();
            if ($("#type").val() != '') url = url + '&type=' + $("#type").val();
            if ($("#status").val() != '') url = url + '&status=' + $("#status").val();
            if ($("#read_status").val() != '') url = url + '&read_status=' + $("#read_status").val();
            window.location.href = url
        }
    });

    $(document).on('change', '#status', function(e) {
        let url = "<?php echo e(route('clients')); ?>";
        url = url + "?status=" + $(this).val().trim();
        if ($("#type").val() != '') url = url + '&type=' + $("#type").val();
        if ($("#searchKeyword").val() != '') url = url + '&search=' + $("#searchKeyword").val();
        if ($("#read_status").val() != '') url = url + '&read_status=' + $("#read_status").val();
        window.location.href = url;
    })

    $(document).on('change', '#type', function(e) {
        let url = "<?php echo e(route('clients')); ?>";
        url = url + "?type=" + $(this).val().trim();
        if ($("#status").val() != '') url = url + '&status=' + $("#status").val();
        if ($("#searchKeyword").val() != '') url = url + '&search=' + $("#searchKeyword").val();
        if ($("#read_status").val() != '') url = url + '&read_status=' + $("#read_status").val();
        window.location.href = url;
    })

    $(document).on('change', '#read_status', function(e) {
        let url = "<?php echo e(route('clients')); ?>";
        url = url + "?read_status=" + $(this).val().trim();
        if ($("#status").val() != '') url = url + '&status=' + $("#status").val();
        if ($("#searchKeyword").val() != '') url = url + '&search=' + $("#searchKeyword").val();
        if ($("#type").val() != '') url = url + '&type=' + $("#type").val();
        window.location.href = url;
    })

    $(document).on('click', '.sendNotification', function() {
         $('#to_ids').val($(this).attr('data-id'));
     });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('accountant.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u239499167/domains/digitalpahal.com/public_html/resources/views/accountant/clients/index.blade.php ENDPATH**/ ?>