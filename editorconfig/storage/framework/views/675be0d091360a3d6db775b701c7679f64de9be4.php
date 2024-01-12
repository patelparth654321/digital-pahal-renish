<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e("Notifications"); ?>

<?php $__env->stopSection(); ?>
<section class="flex flex-1 min-h-0">
<div class="flex flex-col w-full bg-white md:max-w-xs 2xl:max-w-sm shrink-0">
    <div class="flex-1 overflow-y-auto">
        <ul class="divide-y divide-gray-200">
            <?php $__currentLoopData = $accountants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="flex items-center gap-3 p-4 sm:px-6">
                <input type="checkbox" class="form-options checkbox select_client" value="<?php echo e($c['accountant_id']); ?>">
                <div class="flex items-center gap-3">
                    <span class="avatar avatar-md">
                    <?php echo e(getNameShort($c['name'])); ?>

                    </span>
                    <div>
                        <span>
                        <?php echo e($c['name']); ?>

                        </span>
                        <span class="block mt-px text-xs font-normal text-gray-500">
                        <?php echo e($c['company_name']); ?>

                        </span>
                    </div>
                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
        </ul>
    </div>

    <div class="px-4 py-4 border-t border-gray-200 sm:px-6">
        <div class="flex items-center justify-between gap-6">
            <p class="text-sm font-medium text-gray-00">
                <span id="selected_count">0</span> accountants selected
            </p>

            <button id="sendNotification" type="button" class="btn btn-primary" data-toggle="modal" data-target="#sendNotificationModal" disabled>
                Send Notification
            </button>
        </div>
    </div>
</div>

<div class="flex-col flex-1 hidden min-w-0 bg-white border-l border-gray-200 md:flex">
    <div class="px-4 py-5 sm:p-6">
        <p class="text-base font-medium text-gray-600">
            Notifications History
        </p>
        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                <?php echo $n['title']; ?>

                            </p>
                            <p class="mt-1 text-sm font-normal text-gray-600">
                            <?php echo $n['description']; ?>

                            </p>
                        </div>

                        <p class="text-sm font-medium text-gray-500">
                            <?php echo e(time_elapsed_string($n['created_at'])); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
</section>
<?php echo $__env->make('admin.accountants.notification_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $(document).on('change', '.select_client', function(){
        let count = $("input[type='checkbox']:checked").length;
        $('#selected_count').html(count);
        if(count >=1){
            $('#sendNotification').removeAttr('disabled');
        }else{
            $('#sendNotification').attr('disabled', true); 
        }

    })

    $(document).on('click', '#sendNotification', function() {
         var selected = [];
         $('.select_client:checked').each(function() {
             selected.push($(this).val());
         });
         $('#to_ids').val(selected);
     });
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u239499167/domains/digitalpahal.com/public_html/resources/views/admin/accountants/notifications.blade.php ENDPATH**/ ?>