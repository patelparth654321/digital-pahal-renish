<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title'); ?>
<?php echo e("DMS Documents"); ?>

<?php $__env->stopSection(); ?>
<!-- START TABS -->
<nav class="sticky inset-x-0 z-10 pt-1 bg-white border-b border-gray-200 top-[61px]">
  <div class="px-4 sm:px-6">
    <ul class="flex items-center w-full space-x-4 overflow-x-auto tabs" id="myTab" role="tablist">
      <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li class="tab-item" role="presentation">
        <button type="button" id="<?php echo e($row['key']); ?>-tab" class="tab_click tab-link <?php echo e((($key === array_key_first($rows) && !isset($_GET['type'])) || (isset($_GET['type']) && $_GET['type'] == $row['key']))? 'active': ''); ?>" data-toggle="tab" data-target="#<?php echo e($row['key']); ?>" role="tab" aria-controls="<?php echo e($row['key']); ?>" aria-selected="true">
          <?php echo e($row['title']); ?>

        </button>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>
  </div>
</nav>
<!-- END TABS -->

<!-- START CONTENT -->
<section class="flex-1 py-6 overflow-y-auto">
  <div class="min-h-full px-4 sm:px-6">
    <div class="pb-6 tab-content" id="myTabContent">
      <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="hidden transition-opacity duration-150 ease-linear bg-transparent opacity-0 tab-pane <?php echo e((($key === array_key_first($rows) && !isset($_GET['type'])) || (isset($_GET['type']) && $_GET['type'] == $row['key']))? 'show': ''); ?>" id="<?php echo e($row['key']); ?>" role="tabpanel" aria-labelledby="<?php echo e($row['key']); ?>-tab">
        <!-- START DOCUMENTS LIST -->
        <?php if($row['key'] =="gst_billing_documents"): ?>
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
                <option <?php echo e(isset($_GET['month']) && $_GET['month']==$key ? "selected":""); ?> value="<?php echo e($key); ?>">
                  <?php echo e($value); ?>

                </option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </select>
            </div>
          </div>


        </div>
        <?php endif; ?>
        <div class="space-y-4 <?php echo e($row['key'] =='gst_billing_documents'? 'mt-4':''); ?>">
          <?php $__currentLoopData = $row['subdocs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="transition-all duration-150 bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md">
            <div class="px-4 py-6">
              <div class="flex flex-col items-start gap-4 sm:flex-row sm:items-center sm:justify-between sm:gap-6">
                <div class="flex items-center flex-1 gap-4">
                  <img class="object-cover w-12 h-12 bg-gray-300 rounded-full shrink-0" src="<?php echo e(asset('images/icon-document.svg')); ?>" alt="">
                  <div class="flex-1 py-0.5 min-w-0">
                    <p class="text-base font-semibold text-gray-600">
                      <?php echo e($d['title']); ?>

                    </p>
                  </div>
                </div>

                <?php if(($row['key'] =="personal_documents" && count($d['uploaded_docs']) == 0) || $row['key'] !="personal_documents"): ?>
                <!--  -->
                <div class="flex items-center justify-end gap-4">
                  <button type="button" class="btn btn-sm btn-secondary upload_document_button" data-toggle="modal" data-target="#uploadSellDocumentsModal" parent-data-type="<?php echo e($row['key']); ?>" data-type="<?php echo e($d['key']); ?>" data-name="<?php echo e($d['title']); ?>">
                    <svg aria-hidden="true" class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                      <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                      <path d="M12 11v6"></path>
                      <path d="M9.5 13.5l2.5 -2.5l2.5 2.5"></path>
                    </svg>
                    Upload
                  </button>
                </div>
                <?php endif; ?>
              </div>
              <?php if($d['uploaded_docs'] && count($d['uploaded_docs']) > 0): ?>
              <div class="grid grid-cols-1 mt-4 sm:grid-cols-2 xl:grid-cols-3 gap-x-4 gap-y-3">

                <?php $__currentLoopData = $d['uploaded_docs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex items-start gap-6 p-3 text-gray-600 rounded-md bg-gray-50 ring-1 ring-inset ring-gray-500/10">
                  <div class="flex-1 min-w-0">
                    <?php if($ud['bank']): ?>
                    <span class="block text-sm font-semibold text-gray-900 truncate">
                      <?php echo e($ud['bank']); ?>

                    </span>
                    <?php endif; ?>
                    <span class="block text-sm font-medium text-gray-500 truncate">
                      <?php echo e($ud['document_name']); ?>

                    </span>
                  </div>

                  <div class="flex items-center justify-end gap-2">
                    <?php if($ud['category']): ?>
                    <span class="badge badge-white">
                      <?php echo e($ud['category']); ?><?php echo e($ud['category']=="With Pass"? (":".$ud['password']):""); ?>

                    </span>
                    <?php endif; ?>
                    <?php if($ud['month']): ?>
                    <span class="badge badge-white">
                      <?php echo e($ud['month']); ?>

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
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


      <div class="hidden transition-opacity duration-150 ease-linear bg-transparent opacity-0 tab-pane" id="gstBilling" role="tabpanel" aria-labelledby="gstbilling-tab">

      </div>
    </div>
  </div>
</section>
<!-- END CONTENT -->

<!-- START UPLOAD SELL DOCUMENTS MODAL -->
<div class="fixed inset-0 z-30 invisible w-full h-full overflow-hidden transition-all duration-200 ease-in-out outline-none opacity-0 modal" id="uploadSellDocumentsModal" aria-labelledby="fileUploadModalLabel" role="dialog" aria-hidden="true" tabindex="-1">
  <div class="fixed inset-0 z-10 invisible w-screen h-screen transition-opacity duration-200 ease-in-out bg-gray-600 opacity-0 pointer-events-none modal-overlay" tabindex="-1"></div>
  <form method="POST" enctype="multipart/form-data" action="">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="document_type" id="document_type" />
    <input type="hidden" id="parent_docuent" name="parent_docuent" />
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
            <div id="month_selection">
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


            <div class="grid grid-cols-1 gap-x-6 gap-y-5 sm:col-span-2">
              <div id="bank_selection">
                <label for="" class="required">
                  Bank Name
                </label>
                <div class="mt-1.5 input-wrapper">
                  <select name="bank" id="bank" class="pl-3 pr-10 form-select">
                    <option value="">
                      Select bank
                    </option>
                    <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($b['name']); ?>">
                      <?php echo e($b['name']); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </select>
                </div>
              </div>

              <div id="category_selection">
                <label for="" class="block text-sm  after:content-['*'] after:ml-0.5 after:text-error-500 font-medium leading-6 text-gray-900">
                  Select Category
                </label>

                <div class="flex items-center mt-2 gap-x-6 gap-y-4">
                  <div class="relative flex items-start">
                    <div class="flex items-center h-6">
                      <input type="radio" id="withPass" value="With Pass" checked name="category" class="form-options radio">
                    </div>
                    <div class="ml-3 text-sm leading-6">
                      <label for="withPass" class="font-medium text-gray-900">
                        With Pass
                      </label>
                    </div>
                  </div>

                  <div class="relative flex items-start">
                    <div class="flex items-center h-6">
                      <input type="radio" value="Without Pass" id="withoutPass" name="category" class="form-options radio">
                    </div>
                    <div class="ml-3 text-sm leading-6">
                      <label for="withoutPass" class="font-medium text-gray-900">
                        Without Pass
                      </label>
                    </div>
                  </div>
                </div>

                <div class="hidden mt-3" id="withPassInput">
                  <div>
                    <label for="" class="required">
                      Password
                    </label>
                    <div class="mt-1.5 input-wrapper">
                      <input type="text" id="password" name="password" class="form-input">
                    </div>
                  </div>
                </div>
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

          <!-- <div class="flex items-center justify-center gap-4 mt-4 sm:mt-6">
            <button type="button" id="closeModal" class="w-full btn btn-secondary" data-dismiss="modal" aria-label="Close Modal">
              Cancel
            </button>

            <button type="button" id="btnApiStart" class="w-full btn btn-primary">
              Upload
            </button>
          </div> -->
        </div>
      </div>
    </div>
  </form>
</div>
<input type="hidden" value="<?php echo e(isset($_GET['type']) ? $_GET['type']:''); ?>" id="selected_tab" />
<input id="client_id" value="<?php echo e(auth()->user()->id); ?>" type="hidden" />

<!-- END UPLOAD SELL DOCUMENTS MODAL -->
<script src="<?php echo e(asset('js/jquery.dm-uploader.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/demo-ui.js')); ?>"></script>
<script>
  // global app configuration object
  var config = {
    route: "<?php echo e(route('client_dashboard')); ?>"
  };
</script>
<script src="<?php echo e(asset('js/demo-config.js')); ?>"></script>
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
  $(document).click(function() {
    if ($("#withPass").is(":checked")) {
      $("#withPassInput").slideDown(200);
    } else {
      $("#withPassInput").slideUp(200);
    }
  });
  $(document).on('click', '.upload_document_button', function(e) {
    $('#document_type').val($(this).attr('data-type'));
    $('#exampleModalToggleLabel').html("Upload " + $(this).attr('data-name'));
    let parentType = $(this).attr('parent-data-type');
    $('#parent_docuent').val(parentType);
    $('#exampleModalToggleDescription').html("Upload the file");
    $('#month_selection').hide();
    $('#month').val("");
    $('#bank_selection').hide();
    $('#bank').val("");
    $('#category_selection').hide();
    $('#bank').removeProp('required');
    $('#month').removeProp('required');
    if (parentType == "gst_billing_documents") {
      $('#month').attr('required', true);
      $('#month_selection').show();
      $('#exampleModalToggleDescription').html("Select the month and upload the invoice.");
    }
    if ($(this).attr('data-type') == "bank_statement") {
      $('#bank').attr('required', true);
      $('#bank_selection').show();
      $('#category_selection').show();
      $('#exampleModalToggleDescription').html("Select your bank name and upload the files.");
    }
    if ($(this).attr('data-type') == "aadhaar_card") {
      $('#category_selection').show();
    }
  });
  $(document).on('click', '.tab_click', function(e) {
    let type = $(this).attr('data-target');
    type = type.replace('#', '');
    $('#selected_tab').val(type);
    const nextTitle = "DMS Documents";
    const nextState = {};
    const nextURL = "<?php echo e(route('dms')); ?>" + "?type=" + type;
    window.history.pushState(nextState, nextTitle, nextURL);
  })

  $(document).on('change', '#month_search', function(e) {
    let url = "<?php echo e(route('dms')); ?>?type=" + $('#selected_tab').val();
    url = url + "&month=" + $(this).val().trim();
    window.location.href = url;
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u239499167/domains/digitalpahal.com/public_html/resources/views/client/documents/dms.blade.php ENDPATH**/ ?>