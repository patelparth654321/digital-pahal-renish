<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title'); ?>
<?php echo e("Privacy Policy"); ?>

<?php $__env->stopSection(); ?>

<!-- START PAGE TITLE -->
<section class="py-12 bg-gradient-to-b from-gray-100 to-white sm:py-16 lg:py-20 xl:py-24">
  <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
    <div class="max-w-2xl mx-auto text-center lg:max-w-5xl">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl lg:text-5xl">
        We care about your privacy
      </h1>
      <p class="max-w-2xl mx-auto mt-4 text-base font-normal leading-7 text-gray-600 sm:mt-6 sm:text-lg sm:leading-8 lg:text-xl lg:leading-8">
        Your privacy is important to us. We respect your privacy regarding any information we may collect from you
        across our website.
      </p>
    </div>
  </div>
</section>
<!-- END PAGE TITLE -->

<!-- START CONTENT -->
<section class="pb-12 bg-white border-b border-gray-200 sm:pb-16 lg:pb-20 xl:pb-24">
  <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
    <article class="max-w-3xl mx-auto prose prose-base md:prose-lg prose-gray prose-headings:tracking-tight prose-a:text-primary-600 prose-headings:font-bold prose-blockquote:border-l-2 prose-blockquote:border-primary-600 prose-blockquote:text-3xl prose-blockquote:font-light prose-blockquote:leading-normal prose-blockquote:italic prose-figcaption:font-medium">
      <?php echo getConfigValueByKey('privacy_policy'); ?>

    </article>
  </div>
</section>
<!-- END CONTENT -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u239499167/domains/digitalpahal.com/public_html/resources/views/privacy.blade.php ENDPATH**/ ?>