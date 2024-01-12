<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title'); ?>
<?php echo e("GST Documents"); ?>

<?php $__env->stopSection(); ?>

<!-- START CONTENT -->
<section class="flex-1 py-6 overflow-y-auto">
    <div class="min-h-full px-4 sm:px-6">
        <a href="<?php echo e(route('view_member', ['id' => $data['id']])); ?>" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary-600 hover:text-primary-500 transition-all duration-150 hover:underline leading-6" title="Back">
            <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M5 12l14 0"></path>
                <path d="M5 12l6 6"></path>
                <path d="M5 12l6 -6"></path>
            </svg>
            Back to Member Detail
        </a>
        <!-- START NAME & ACTIONS -->
        <div class="flex flex-col gap-4 xl:gap-6 xl:justify-between xl:flex-row xl:items-center mt-3">
            <div class="flex flex-col items-center gap-2 sm:flex-row sm:justify-start sm:gap-3">
                <span class="avatar avatar-lg">
                    <?php echo e(getNameShort($data['name'])); ?>

                </span>
                <h2 class="text-xl font-bold text-gray-900">
                    <?php echo $data['name']; ?>

                </h2>
                <?php echo getUserStatus($data['status']); ?>

            </div>
            <div class="flex flex-col gap-4 sm:justify-start sm:flex-row sm:items-center xl:justify-end">
                <div class="flex items-center gap-4">
                    <div>
                        <label for="" class="sr-only">
                            Filter by Month
                        </label>
                        <div>
                            <select name="" id="month_search" class="form-select">
                                <option value="">
                                    Select month
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
        </div>
        <!-- END NAME & ACTIONS -->
        <div class="pb-6 tab-content" id="myTabContent">

            <div class="space-y-4 mt-4">
                <?php $__currentLoopData = $subdocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="transition-all duration-150 bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md">
                    <div class="px-4 py-6">
                        <div class="flex flex-col items-start gap-4 sm:flex-row sm:items-center sm:justify-between sm:gap-6">
                            <div class="flex items-center flex-1 gap-4">
                                <img class="object-cover w-12 h-12 bg-gray-300 rounded-full shrink-0" src="<?php echo e($d['icon'] ? (asset('images/document-logos/'.$d['icon'])) : asset('images/icon-document.svg')); ?>" alt="">
                                <div class="flex-1 py-0.5 min-w-0">
                                    <p class="text-base font-semibold text-gray-600">
                                        <?php echo e($d['title']); ?>

                                    </p>
                                    <p class="text-sm text-gray-600">Amount: <?php echo e(env('CURRENCY').$d['count']); ?></p>
                                </div>
                            </div>
                            <div class="relative flex dropdown">
                                <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="true">
                                    <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                        <path d="M12 11v6"></path>
                                        <path d="M9.5 13.5l2.5 -2.5l2.5 2.5"></path>
                                    </svg>
                                    Upload
                                    <svg aria-hidden="true" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M6 9l6 6l6 -6"></path>
                                    </svg>
                                </button>

                                <div class="absolute right-0 z-30 invisible w-40 mt-1 transition-all duration-100 origin-top-right scale-95 bg-white rounded-lg shadow-lg opacity-0 pointer-events-none top-full ring-1 ring-gray-200 focus:outline-none dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                    <div class="divide-y divide-gray-100">
                                        <div class="py-1" role="none">
                                            <?php $__currentLoopData = $d['sub_types']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="javascript:void(0)" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-150 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900 whitespace-nowrap upload_file" role="menuitem" tabindex="-1" data-toggle="modal" data-target="#fileUploadModal" sub-type="<?php echo e($st['key']); ?>" data-type="<?php echo e($d['key']); ?>" data-name="<?php echo e($d['title']); ?>">
                                                <?php echo e($st['title']); ?>

                                            </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($d['uploaded_docs'] && count($d['uploaded_docs']) > 0): ?>
                        <div class="grid grid-cols-1 mt-4 sm:grid-cols-2 xl:grid-cols-3 gap-x-4 gap-y-3">

                            <?php $__currentLoopData = $d['uploaded_docs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-start gap-6 p-3 text-gray-600 rounded-md bg-gray-50 ring-1 ring-inset ring-gray-500/10">
                                <div class="flex-1 min-w-0">
                                    <span class="block text-sm font-medium text-gray-500 truncate">
                                        <?php echo e($ud['document_name']); ?>

                                    </span>
                                </div>

                                <div class="flex items-center justify-end gap-2">
                                    <?php if($ud['sub_type']): ?>
                                    <span class="badge badge-white">
                                        <?php echo e(strtoupper($ud['sub_type'])); ?>

                                    </span>
                                    <?php endif; ?>
                                    <?php if($ud['year']): ?>
                                    <span class="badge badge-white">
                                        <?php echo e($ud['month'].'/'.$ud['year']); ?>

                                    </span>
                                    <?php endif; ?>

                                    <a href="javascript:void(0)" class="relative flex p-1 transition-all duration-150 rounded hover:ring-gray-300 ring-1 ring-transparent <?php echo e($ud['view_status'] =='1'? 'text-success-600': ''); ?>" aria-label="<?php echo e($ud['view_status'] =='0'? 'Not viewed yet': 'Viewed by Admin'); ?>" data-microtip-position="top" role="tooltip">
                                        <?php echo getViewStatus($ud['view_status']); ?>

                                    </a>
                                    <a href="<?php echo e(getImagePath($ud['document'], 'documents')); ?>" download="<?php echo e($ud['document_name']); ?>" class="relative flex p-1 transition-all duration-150 rounded text-primary-600 hover:text-primary-700 hover:bg-gray-200 hover:ring-gray-300 ring-1 ring-transparent" aria-label="Download" data-microtip-position="top" role="tooltip">
                                        <span class="sr-only">
                                            Download
                                        </span>
                                        <svg aria-hidden="true" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                            <path d="M7 11l5 5l5 -5"></path>
                                            <path d="M12 4l0 12"></path>
                                        </svg>
                                    </a>

                                    <button type="button" class="relative flex p-1 transition-all duration-150 rounded text-error-600 hover:text-error-700 hover:bg-gray-200 hover:ring-gray-300 ring-1 ring-transparent deleteData" aria-label="Delete" data-toggle="modal" data-target="#deleteConfirmationModal" data-id="<?php echo e($ud['id']); ?>" data-type="dms" data-refresh="true">
                                        <span class="sr-only">
                                            Delete
                                        </span>
                                        <svg aria-hidden="true" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 7l16 0"></path>
                                            <path d="M10 11l0 6"></path>
                                            <path d="M14 11l0 6"></path>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- END DOCUMENTS LIST -->
        </div>
    </div>
</section>
<!-- END CONTENT -->

<!-- START UPLOAD SELL DOCUMENTS MODAL -->
<div class="fixed inset-0 z-30 invisible w-full h-full overflow-hidden transition-all duration-200 ease-in-out outline-none opacity-0 modal" id="fileUploadModal" aria-labelledby="fileUploadModalLabel" role="dialog" aria-hidden="true" tabindex="-1">
    <div class="fixed inset-0 z-10 invisible w-screen h-screen transition-opacity duration-200 ease-in-out bg-gray-600 opacity-0 pointer-events-none modal-overlay" tabindex="-1"></div>
    <form method="POST" enctype="multipart/form-data" action="">
        <?php echo csrf_field(); ?>
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
                        Upload Sell Documents
                    </h5>
                    <p class="mt-1 text-sm font-normal text-gray-600" id="exampleModalToggleDescription">
                        Select the month and upload the invoice.
                    </p>
                </div>

                <div class="flex-1 px-4 pb-4 overflow-y-auto sm:px-6 sm:pb-6 grow">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                        <div id="start_month_selection">
                            <label for="" class="required">
                                Month
                            </label>
                            <div class="mt-1.5 input-wrapper">
                                <select name="month" id="month" class="pl-3 pr-10 form-select">
                                    <option value="">
                                        Select month
                                    </option>

                                    <?php $isDisabled = false; $currentMonth=date('m'); ?>
                                    <?php $__currentLoopData = getMonths(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key == $currentMonth + 01): ?> <?php $isDisabled=true; ?> <?php endif; ?>
                                    <option <?php echo e($isDisabled ? "disabled":""); ?> value="<?php echo e($key); ?>">
                                        <?php echo e($value); ?>

                                    </option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="" class="required">
                                Upload Invoice
                            </label>
                            <div class="mt-1.5 space-y-4">
                                <div class="flex justify-center px-6 py-10 transition-all duration-150 border border-gray-300 border-dashed rounded-lg bg-gray-25 hover:bg-gray-50" id="drag-and-drop-zone">
                                    <div class="text-center" id="file_upload_click">
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
                                                <input id="file-upload" name="file" type="file" class="sr-only" required>
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs leading-5 text-gray-600" id="file-name">PNG, JPG, PDF, DOC,CSV, EXCEL up to 10MB</p>
                                    </div>
                                </div>

                                <div class="bg-white border border-gray-200 rounded-lg">
                                    <ul class="list-unstyled p-2 d-flex flex-column col" id="files">
                                        <li class="text-muted text-center empty">No files uploaded.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<input type="hidden" value="" id="sub_type" />
<input type="hidden" value="<?php echo e($_GET['client_id']); ?>" id="client_id" />
<input type="hidden" value="" id="document_type" />
<!-- END UPLOAD SELL DOCUMENTS MODAL -->
<script src="<?php echo e(asset('js/jquery.dm-uploader.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/demo-ui.js')); ?>"></script>
<script>
    // global app configuration object
    var config = {
        route: "<?php echo e(route('client_dashboard')); ?>"
    };
</script>
<script src="<?php echo e(asset('js/gst-config.js')); ?>"></script>
<!-- File item template -->
<script type="text/html" id="files-template">
    <li class="media">
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
                        <div style="max-width:100%;">
                            <p class="text-sm font-medium text-gray-900" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                %%filename%%
                            </p>
                            <p class="text-sm font-normal text-gray-600">
                                %%filesize%%
                            </p>
                        </div>

                    </div>
                    <div class="progress flex items-center gap-4 mt-1">
                        <div class="relative w-full h-2 bg-gray-200 rounded-full">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary absolute inset-y-0 bg-primary-600 left-0 rounded-full" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                        <span class="text-sm font-medium text-gray-900 progress_percent">
                            0%
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </li>
</script>
<script>
    $(document).on('click', '.upload_file', function() {
        $('#sub_type').val($(this).attr('sub-type'));
        $('#document_type').val($(this).attr('data-type'));
        $('#exampleModalToggleLabel').html("Upload " + $(this).attr('data-name') + " Report");
    })
    $(document).on('change', '#month_search', function(e) {
        let url = "<?php echo e(route('gst')); ?>?client_id=<?php echo e($_GET['client_id']); ?>";
        url = url + "&month=" + $(this).val().trim();
        window.location.href = url;
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u239499167/domains/digitalpahal.com/public_html/resources/views/client/documents/gst.blade.php ENDPATH**/ ?>