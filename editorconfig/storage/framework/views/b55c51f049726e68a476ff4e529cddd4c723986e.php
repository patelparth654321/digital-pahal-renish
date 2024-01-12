<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e("Notifications"); ?>

<?php $__env->stopSection(); ?>
<!-- START CONTENT -->
<section class="flex-1 py-6 overflow-y-auto">
  <div class="min-h-full px-4 sm:px-6">
    <?php if(count($unread) > 0 || count($read) > 0): ?>
    <div class="space-y-8">
      <?php if(count($unread) > 0): ?>
      <div class="">
        <div class="flex items-center justify-between gap-6">
          <h2 class="text-lg font-semibold text-gray-900">
            Unread Notifications
          </h2>

          <a href="<?php echo e(route('accountant_mark_as_read')); ?>" class="btn-link">
            <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M11.5 17h-7.5a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3c.016 .129 .037 .256 .065 .382">
              </path>
              <path d="M9 17v1a3 3 0 0 0 2.502 2.959"></path>
              <path d="M15 19l2 2l4 -4"></path>
            </svg>
            Mark all as read
</a>
        </div>

        <!-- START NOTIFICATIONS LIST -->
        <?php $__currentLoopData = $unread; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mt-4 space-y-4">
          <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-4 py-5 sm:p-6">
              <div class="flex items-start gap-5">
                <div class="relative inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-12 sm:h-12 bg-primary-50 text-primary-600 shrink-0">
                  <svg aria-hidden="true" class="w-4 h-4 sm:w-6 sm:h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6">
                    </path>
                    <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                    <path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727"></path>
                    <path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727"></path>
                  </svg>

                  <span class="absolute top-0 right-0 block w-3 h-3 rounded-full bg-error-500 ring ring-white"></span>
                </div>

                <div class="flex-1 min-w-0">
                  <p class="text-sm font-medium text-gray-900">
                    <?php echo $u['title']; ?>

                  </p>
                  <p class="mt-1 text-sm font-normal text-gray-600">
                    <?php echo $u['description']; ?>

                  </p>
                </div>

                <p class="text-sm font-medium text-gray-500">
                  <?php echo time_elapsed_string($u['created_at']); ?>

                </p>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- END NOTIFICATIONS LIST -->
      </div>

      <hr class="border-gray-200">
      <?php endif; ?>
      <?php if(count($read) > 0): ?>
      <div>
        <h2 class="text-lg font-semibold text-gray-900">
          Older Notifications
        </h2>

        <!-- START NOTIFICATIONS LIST -->
        <?php $__currentLoopData = $read; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mt-4 space-y-4">
          <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-4 py-5 sm:p-6">
              <div class="flex items-start gap-5">
                <div class="relative inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-12 sm:h-12 bg-primary-50 text-primary-600 shrink-0">
                  <svg aria-hidden="true" class="w-4 h-4 sm:w-6 sm:h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6">
                    </path>
                    <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                    <path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727"></path>
                    <path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727"></path>
                  </svg>
                </div>

                <div class="flex-1 min-w-0">
                  <p class="text-sm font-medium text-gray-900">
                    <?php echo $u['title']; ?>

                  </p>
                  <p class="mt-1 text-sm font-normal text-gray-600">
                    <?php echo $u['description']; ?>

                  </p>
                </div>

                <p class="text-sm font-medium text-gray-500">
                  <?php echo time_elapsed_string($u['created_at']); ?>

                </p>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- END NOTIFICATIONS LIST -->
      </div>
      <?php endif; ?>
    </div>
    <?php else: ?>
    <!-- START EMPTY STATE -->
    <div class="flex items-center justify-center h-full p-12 text-center sm:p-16 sm:max-w-md sm:mx-auto">
      <div>
        <img class="w-auto mx-auto h-52" src="<?php echo e(asset('images/empty-notifications.svg')); ?>" alt="">
        <p class="mt-4 text-lg font-bold text-gray-900">
          You have no notifications yet
        </p>
        <p class="mt-2 text-sm font-normal leading-6 text-gray-600">
          When your client upload documents or admin sends you a notification, it will show up here.
        </p>
      </div>
    </div>
    <!-- END EMPTY STATE -->
    <?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('accountant.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u239499167/domains/digitalpahal.com/public_html/resources/views/accountant/notifications.blade.php ENDPATH**/ ?>