<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title'); ?>
<?php echo e("Thank you"); ?>

<?php $__env->stopSection(); ?>
<?php
header("refresh: 5;url=".route('landing_page'));
?>
<!-- START PAGE TITLE -->
<section class="py-12 bg-gradient-to-b from-gray-100 to-white sm:py-16 lg:py-20 xl:py-24">
  <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
    <div class="max-w-2xl mx-auto text-center lg:max-w-5xl">
      <img class="w-auto mx-auto h-52" src="<?php echo e(asset('images/thank-you.svg')); ?>" alt="">
      <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl lg:text-5xl">
        Thank you!
      </h1>
      <p class="max-w-2xl mx-auto mt-4 text-base font-normal leading-7 text-gray-600 sm:mt-6 sm:text-lg sm:leading-8 lg:text-xl lg:leading-8">
        We have received your message. Our team will contact you within 24 hours for further instruction to setup
        your account.
      </p>
    </div>
  </div>
</section>
<!-- END PAGE TITLE -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u239499167/domains/digitalpahal.com/public_html/resources/views/thank-you.blade.php ENDPATH**/ ?>