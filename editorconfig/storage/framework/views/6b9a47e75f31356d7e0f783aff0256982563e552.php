<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title'); ?>
<?php echo e((isset($_GET['parentid']) ? "Member": "Client"). " Details"); ?>

<?php $__env->stopSection(); ?>
<section class="flex-1 py-6 overflow-y-auto">
  <div class="min-h-full px-4 sm:px-6">
    <button onclick="history.back()" type="button" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary-600 hover:text-primary-500 transition-all duration-150 hover:underline leading-6" title="Back">
      <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M5 12l14 0"></path>
        <path d="M5 12l6 6"></path>
        <path d="M5 12l6 -6"></path>
      </svg>
      Back to <?php echo e((isset($_GET['parentid']) ? "Member": "Client")); ?>

    </button>
    <!-- START NAME & ACTIONS -->
    <div class="flex flex-col gap-4 xl:gap-6 xl:justify-between xl:flex-row xl:items-center mt-3">
      <div class="flex flex-col items-center gap-2 sm:flex-row sm:justify-start sm:gap-3">
        <span class="avatar avatar-lg">
          <?php echo e(getNameShort($row['name'])); ?>

        </span>
        <h2 class="text-xl font-bold text-gray-900">
          <?php echo $row['name']; ?>

        </h2>
        <?php echo getUserStatus($row['status']); ?>

      </div>


    </div>
    <!-- END NAME & ACTIONS -->

    <!-- START PERSONAL & BUSINESS DETAILS -->
    <div class="grid grid-cols-1 gap-4 mt-6 xl:grid-cols-2">
      <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="px-4 py-5 sm:p-6">
          <h3 class="text-xs font-semibold tracking-widest text-gray-500 uppercase">
            Personal details
          </h3>

          <div class="grid grid-cols-1 gap-6 mt-5 sm:grid-cols-5">
            <div class="flex items-start gap-3 sm:col-span-3">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path>
                <path d="M3 7l9 6l9 -6"></path>
              </svg>
              <div>
                <p class="text-sm font-medium text-gray-600">
                  Email Address
                </p>
                <p class="mt-2 text-base font-medium text-gray-900">
                  <?php echo $row['email']; ?>

                </p>
              </div>
            </div>

            <div class="flex items-start gap-3 sm:col-span-2">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                </path>
              </svg>
              <div>
                <p class="text-sm font-medium text-gray-600">
                  Mobile Number
                </p>
                <p class="mt-2 text-base font-medium text-gray-900">
                  <?php echo $row['phone']; ?>

                </p>
              </div>
            </div>

            <div class="flex items-start gap-3 sm:col-span-3">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="8.5" cy="8.5" r="1" fill="currentColor"></circle>
                <path d="M4 7v3.859c0 .537 .213 1.052 .593 1.432l8.116 8.116a2.025 2.025 0 0 0 2.864 0l4.834 -4.834a2.025 2.025 0 0 0 0 -2.864l-8.117 -8.116a2.025 2.025 0 0 0 -1.431 -.593h-3.859a3 3 0 0 0 -3 3z">
                </path>
              </svg>
              <div>
                <p class="text-sm font-medium text-gray-600">
                  Category
                </p>
                <div class="flex items-center gap-2 mt-2">
                  <?php echo getUserCategoryType($row['type']); ?>

                </div>
              </div>
            </div>
            <div class="flex items-start gap-3 sm:col-span-2">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                <path d="M12 12l3 2"></path>
                <path d="M12 7v5"></path>
              </svg>
              <div>
                <p class="text-sm font-medium text-gray-600">
                  Created On
                </p>
                <p class="mt-2 text-base font-medium text-gray-900">
                  <?php echo dateFormat($row['created_at'], 'd M Y'); ?>

                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="px-4 py-5 sm:p-6">
          <h3 class="text-xs font-semibold tracking-widest text-gray-500 uppercase">
            Business details
          </h3>

          <div class="grid grid-cols-1 gap-6 mt-5 sm:grid-cols-5">
            <div class="flex items-start gap-3 sm:col-span-3">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M3 21l18 0"></path>
                <path d="M9 8l1 0"></path>
                <path d="M9 12l1 0"></path>
                <path d="M9 16l1 0"></path>
                <path d="M14 8l1 0"></path>
                <path d="M14 12l1 0"></path>
                <path d="M14 16l1 0"></path>
                <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path>
              </svg>
              <div>
                <p class="text-sm font-medium text-gray-600">
                  Company / Shop Name
                </p>
                <p class="mt-2 text-base font-medium text-gray-900">
                  <?php echo $row['company_name']; ?>

                </p>
              </div>
            </div>

            <div class="flex items-start gap-3 sm:col-span-2">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M9 14l6 -6"></path>
                <circle cx="9.5" cy="8.5" r=".5" fill="currentColor"></circle>
                <circle cx="14.5" cy="13.5" r=".5" fill="currentColor"></circle>
                <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2"></path>
              </svg>
              <div>
                <p class="text-sm font-medium text-gray-600">
                  GST Number
                </p>
                <p class="mt-2 text-base font-medium text-gray-900">
                  <?php echo $row['gst_number']; ?>

                </p>
              </div>
            </div>

            <div class="flex items-start gap-3 sm:col-span-3">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>
              </svg>
              <div>
                <p class="text-sm font-medium text-gray-600">
                  Address
                </p>
                <p class="mt-2 text-base font-medium text-gray-900">
                  <?php echo $row['address']; ?>

                </p>
              </div>
            </div>

            <div class="flex items-start gap-3 sm:col-span-2">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M3 4m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z"></path>
                <path d="M9 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                <path d="M15 8l2 0"></path>
                <path d="M15 12l2 0"></path>
                <path d="M7 16l10 0"></path>
              </svg>
              <div>
                <p class="text-sm font-medium text-gray-600">
                  PAN Card Number
                </p>
                <p class="mt-2 text-base font-medium text-gray-900">
                  <?php echo $row['pancard_number']; ?>

                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END PERSONAL & BUSINESS DETAILS -->
  </div>
  <input type="hidden" value="<?php echo e(isset($_GET['type']) ? $_GET['type']:''); ?>" id="selected_tab" />
  <script>
    $(document).on('click', '.tab_click', function(e) {
      let type = $(this).attr('data-target');
      type = type.replace('#', '');
      $('#selected_tab').val(type);
      const nextTitle = "DMS Documents";
      const nextState = {};
      const nextURL = "<?php echo e(route('view_client', ['id'=>$row['client_id']])); ?>" + "?type=" + type;
      window.history.pushState(nextState, nextTitle, nextURL);
    })
    $(document).on('change', '#year', function(e) {
      let url = "<?php echo e(route('view_client', ['id'=>$row['client_id']])); ?>?type=" + $('#selected_tab').val();
      url = url + "&year=" + $(this).val().trim();
      if ($("#month").val() != '') url = url + '&month=' + $("#month").val();
      window.location.href = url;
    })
    $(document).on('change', '#month', function(e) {
      let url = "<?php echo e(route('view_client', ['id'=>$row['client_id']])); ?>?type=" + $('#selected_tab').val();
      url = url + "&month=" + $(this).val().trim();
      if ($("#year").val() != '') url = url + '&year=' + $("#year").val();
      window.location.href = url;
    })
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('accountant.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u239499167/domains/digitalpahal.com/public_html/resources/views/accountant/clients/details.blade.php ENDPATH**/ ?>