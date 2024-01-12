<!doctype html>
<html class="h-full bg-white scroll-smooth" lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <!-- FAVICON -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('favicon-32x32.png')); ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('favicon-16x16.png')); ?>">

  <!-- GOOGLE FONT / PUBLIC SANS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap">

  <!-- PLUGINS -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('plugins/microtip/microtip.css')); ?>">

  <!-- CUSTOM CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">
  <script src="<?php echo e(asset('plugins/jquery-3.4.1.min.js')); ?>"></script>

  <!-- PAGE TITLE -->
  <title>
  <?php echo $__env->yieldContent('title', 'Dashboard'); ?> / Client / <?php echo e(env('APP_NAME')); ?>

  </title>

</head>
<!-- Header -->
<?php echo $__env->make('client.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- content -->
<?php echo $__env->yieldContent('content'); ?>

<!-- footer  -->
<?php echo $__env->make('client.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- START DELETE CONFIRMATION MODAL -->
<div class="fixed inset-0 z-30 invisible w-full h-full overflow-hidden transition-all duration-200 ease-in-out outline-none opacity-0 modal" id="deleteConfirmationModal" aria-labelledby="deleteConfirmationModalLabel" role="dialog" aria-hidden="true" tabindex="-1">
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

      <div class="px-4 pt-5 pb-4 sm:p-6">
        <div class="sm:flex sm:items-start">
          <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto rounded-full bg-error-100 sm:mx-0 sm:h-10 sm:w-10">
            <svg aria-hidden="true" class="w-6 h-6 text-error-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z">
              </path>
              <path d="M12 9v4"></path>
              <path d="M12 17h.01"></path>
            </svg>
          </div>

          <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
              Delete data
            </h3>
            <div class="mt-2">
              <p class="text-sm text-gray-600">
                Are you sure you want to delete this data? The data will be
                permanently removed from our servers forever. This action cannot be undone.
              </p>
            </div>
          </div>
        </div>

        <div class="flex flex-col gap-4 mt-5 sm:mt-4 sm:flex-row-reverse">
          <button type="button" id="confirmDelete" class="w-full btn btn-danger sm:w-auto">
            Yes, delete it
          </button>

          <button type="button" class="w-full btn btn-secondary sm:w-auto" data-dismiss="modal" aria-label="Close Modal">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END DELETE CONFIRMATION MODAL -->
<!-- JQUERY -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- CUSTOM SCRIPT -->
<script>
  // global app configuration object
  var config = {
    route: "<?php echo e(route('client_dashboard')); ?>"
  };
</script>
<script src="<?php echo e(asset('js/main.js')); ?>"></script>
<?php if(session('error')): ?>
<script>
  toastr.error("<?php echo e(session('error')); ?>");
</script>
<?php endif; ?>
<?php if(session('success')): ?>
<script>
  toastr.success("<?php echo \session('success'); ?>");
</script>
<?php endif; ?>
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    beforeSend: function() {
      $('.loader-overlay').show();
    },
    complete: function() {
      $('.loader-overlay').hide();
    },
    error: function(xhr, ajaxOptions, thrownError) {
      toastr.error(xhr.statusText);
    }
  });
</script>
</body>

</html><?php /**PATH /home/u239499167/domains/digitalpahal.com/public_html/resources/views/client/layouts/master.blade.php ENDPATH**/ ?>