<!doctype html>
<html class="h-full bg-white scroll-pt-14 scroll-smooth" lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- FAVICON -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('favicon-32x32.png')); ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('favicon-16x16.png')); ?>">

  <!-- GOOGLE FONT / PUBLIC SANS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- CUSTOM CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">
  <!-- JQUERY -->
  <script src="<?php echo e(asset('plugins/jquery-3.4.1.min.js')); ?>"></script>

  <!-- PAGE TITLE -->
  <title>
    <?php echo $__env->yieldContent('title', 'Home'); ?> | <?php echo e(env('APP_NAME')); ?>

  </title>

</head>

<!-- Header -->
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- content -->
<?php echo $__env->yieldContent('content'); ?>

<!-- footer  -->
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- CUSTOM SCRIPT -->
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
</body>

</html><?php /**PATH /home/u239499167/domains/digitalpahal.com/public_html/resources/views/layouts/master.blade.php ENDPATH**/ ?>