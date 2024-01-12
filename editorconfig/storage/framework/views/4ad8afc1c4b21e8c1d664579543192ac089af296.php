<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title'); ?>
<?php echo e((isset($_GET['parentid']) ? "Member": "Client"). " Details"); ?>

<?php $__env->stopSection(); ?>
<section class="flex-1 py-6 overflow-y-auto">
  <div class="min-h-full px-4 sm:px-6">
    <a href="<?php echo e(isset($_GET['parentid']) ? route('view_client', ['id'=>$_GET['parentid']]) :  route('clients')); ?>" type="button" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary-600 hover:text-primary-500 transition-all duration-150 hover:underline leading-6" title="Back">
      <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M5 12l14 0"></path>
        <path d="M5 12l6 6"></path>
        <path d="M5 12l6 -6"></path>
      </svg>
      Back to <?php echo e((isset($_GET['parentid']) ? "Member": "Client")); ?>

    </a>
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

      <div class="flex flex-col gap-4 sm:justify-start sm:flex-row sm:items-center xl:justify-end">
        <a href="<?php echo e(route('accoutant_data_summary', ['id'=>$row['client_id'], 'parentid'=>(isset($_GET['parentid'])? $_GET['parentid'] : '')])); ?>" title="View Data Summary" class="btn btn-primary" role="button">
          View Data Summary
        </a>
        <a href="javascript:void(0)" title="" class="btn btn-secondary" role="button">
          <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M12.5 17h-8.5a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6a2 2 0 1 1 4 0a7 7 0 0 1 4 6v1">
            </path>
            <path d="M9 17v1a3 3 0 0 0 3.51 2.957"></path>
            <path d="M16 19h6"></path>
            <path d="M19 16v6"></path>
          </svg>
          Send Notification
        </a>

        <div class="relative flex dropdown">
          <button type="button" class="w-full btn btn-secondary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="true">
            More
            <svg aria-hidden="true" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M6 9l6 6l6 -6"></path>
            </svg>
          </button>

          <div class="absolute right-0 z-30 invisible w-56 mt-1 transition-all duration-100 origin-top-right scale-95 bg-white rounded-lg shadow-lg opacity-0 pointer-events-none top-full ring-1 ring-gray-200 focus:outline-none dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
            <div class="divide-y divide-gray-100">
              <div class="py-1" role="none">
                <div class="flex items-start gap-2 px-4 py-2">
                  <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900">
                      <?php echo e($row['status'] ==1? "Disable Client":"Enable Client"); ?>

                    </p>
                  </div>

                  <div class="relative">
                    <input type="checkbox" <?php echo e($row['status'] ==1?'checked':''); ?> class="opacity-0 sr-only peer changeStatus" id="showFullPrompt" data-id="<?php echo e($row['client_id']); ?>" data-type="clients">
                    <label for="showFullPrompt" class="relative flex h-5 w-9 cursor-pointer items-center rounded-full bg-gray-400 px-0.5 outline-gray-400 transition-colors before:h-4 before:w-4 before:rounded-full before:bg-white before:shadow before:transition-transform before:duration-300 peer-checked:bg-success-500 peer-checked:before:translate-x-full peer-focus-visible:outline peer-focus-visible:outline-offset-2 peer-focus-visible:outline-gray-400 peer-checked:peer-focus-visible:outline-success-500">
                      <span class="sr-only">
                        Enable
                      </span>
                    </label>
                  </div>
                </div>
              </div>

              <div class="py-1" role="none">
                <a href="<?php echo e(route('edit_client', ['id'=>$row['client_id']])); ?>" title="" class="flex items-center gap-3 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-150 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900 whitespace-nowrap" role="menuitem" tabindex="-1">
                  <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5"></path>
                    <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z"></path>
                  </svg>
                  Edit
                </a>

                <a href="javascript:void(0)" data-id="<?php echo e($row['client_id']); ?>" data-type="clients" class="flex items-center gap-3 px-4 py-2 text-sm font-medium transition-all duration-150 text-error-600 hover:bg-error-50 hover:text-error-700 focus:outline-none focus:bg-error-50 focus:text-error-700 whitespace-nowrap deleteData" data-toggle="modal" data-target="#deleteConfirmationModal">
                  <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 7h16"></path>
                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                    <path d="M10 12l4 4m0 -4l-4 4"></path>
                  </svg>
                  Delete
                </a>

                
                <a href="<?php echo e(route('client_personal_details', ['id'=>$row['client_id'], 'parentid'=>(isset($_GET['parentid']) ? $_GET['parentid'] :'')])); ?>" title="" class="flex items-center gap-3 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-150 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900 whitespace-nowrap" role="menuitem" tabindex="-1">
                  <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5"></path>
                    <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z"></path>
                  </svg>
                  View
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END NAME & ACTIONS -->



    <!-- START DOCUMENTS LIST -->
    <ul class="flex items-center w-full mt-6 space-x-4 overflow-x-auto border-b border-gray-200 tabs" id="myTab" role="tablist">
      <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li class="tab-item " role="presentation">
        <button type="button" id="<?php echo e($d['key']); ?>-tab" class="tab_click tab-link <?php echo e((($key === array_key_first($docs) && !isset($_GET['type'])) || (isset($_GET['type']) && $_GET['type'] == $d['key']))? 'active': ''); ?>" data-toggle="tab" data-target="#<?php echo e($d['key']); ?>" role="tab" aria-controls="<?php echo e($d['key']); ?>" aria-selected="true">
          <?php echo e($d['title']); ?>

        </button>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <!-- END DOCUMENTS LIST -->

    <div class="pb-6 tab-content" id="myTabContent">

      <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="hidden py-6 transition-opacity duration-150 ease-linear bg-transparent opacity-0 tab-pane <?php echo e((($key === array_key_first($docs) && !isset($_GET['type'])) || (isset($_GET['type']) && $_GET['type'] == $d['key']))? 'show': ''); ?>" id="<?php echo e($d['key']); ?>" role="tabpanel" aria-labelledby="<?php echo e($d['key']); ?>-tab">
        <?php if($d['key'] =="gst_billing_documents"): ?>
        <div class="flex items-center gap-4">
          <div>
            <label for="" class="sr-only">
              Filter by Month
            </label>
            <div>
              <select name="" id="month" class="form-select">
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

          <div>
            <label for="" class="sr-only">
              Filter by Year
            </label>
            <div>
              <select name="" id="year" class="form-select">
                <option value="">
                  Select year
                </option>
                <?php
                $date = date("Y"); //current year
                $date_range = range($date-5, $date+1);//get year range
                ?>
                <?php $__currentLoopData = $date_range; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php echo e(isset($_GET['year']) && $_GET['year']==$dr ? "selected":""); ?> value="<?php echo e($dr); ?>">
                  <?php echo e($dr); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <!-- START DOCUMENTS LIST -->
        <div class="<?php echo e($d['key'] =='gst_billing_documents'? 'mt-4':''); ?> space-y-4">
          <?php $__currentLoopData = $d['subdocs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="transition-all duration-150 bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md">
            <div class="px-4 py-6">
              <div class="flex flex-col items-start gap-4 sm:flex-row sm:items-center sm:justify-between sm:gap-6">
                <div class="flex items-center flex-1 gap-4">
                  <img class="object-cover w-12 h-12 bg-gray-300 rounded-full shrink-0" src="<?php echo e(asset('images/icon-document.svg')); ?>" alt="">
                  <div class="flex-1 py-0.5 min-w-0">
                    <p class="text-base font-semibold text-gray-600">
                      <?php echo e($sd['title']); ?>

                    </p>
                  </div>
                </div>
              </div>
              <?php if($sd['uploaded_docs'] && count($sd['uploaded_docs']) > 0): ?>
              <div class="grid grid-cols-1 mt-4 sm:grid-cols-2 xl:grid-cols-3 gap-x-4 gap-y-3">
                <?php $__currentLoopData = $sd['uploaded_docs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

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
                    <?php if($ud['bank']): ?>
                    <span class="badge badge-white">
                      <?php echo e($ud['category']); ?><?php echo e($ud['category']=="With Pass"? (":".$ud['password']):""); ?>

                    </span>
                    <?php endif; ?>
                    <?php if($ud['year']): ?>
                    <span class="badge badge-white">
                      <?php echo e($ud['month'].'/'.$ud['year']); ?>

                    </span>
                    <?php endif; ?>
                    <a href="javascript:void(0)" data-id="<?php echo e($ud['id']); ?>" data-type="clients/document" class="relative flex p-1 transition-all duration-150 rounded hover:ring-gray-300 ring-1 ring-transparent <?php echo e($ud['view_status'] =='0'? 'documentChangeStatus': 'text-success-600'); ?>" aria-label="<?php echo e($ud['view_status'] =='0'? 'Mark as Viewed': 'Already Viewed'); ?>" data-microtip-position="top" role="tooltip">
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

                    <button type="button" class="relative flex p-1 transition-all duration-150 rounded text-error-600 hover:text-error-700 hover:bg-gray-200 hover:ring-gray-300 ring-1 ring-transparent deleteData" data-toggle="modal" data-target="#deleteConfirmationModal" data-id="<?php echo e($ud['id']); ?>" data-type="clients/documents" data-refresh="true">
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

    </div>

    <?php if($row['added_by'] == auth()->user()->id && count($members) > 0): ?>
    <ul class="flex items-center w-full mt-6 space-x-4 overflow-x-auto border-b border-gray-200 tabs" id="myTab" role="tablist">
      <li class="tab-item" role="presentation">
        <button type="button" id="clients-tab" class="tab-link active" data-toggle="tab" data-target="#clients" role="tab" aria-controls="clients" aria-selected="true">
          Members (<?php echo e(count($members)); ?>)
        </button>
      </li>

    </ul>
    <div class="pb-6 tab-content" id="myTabContent">
      <div class="hidden py-6 transition-opacity duration-150 ease-linear bg-transparent opacity-0 tab-pane show" id="clients" role="tabpanel" aria-labelledby="clients-tab">

        <div id="clientsView">
          <?php if($members && count($members) > 0): ?>
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
                  <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>

                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 whitespace-nowrap">
                      <a href="<?php echo e(route('view_client_member', ['id'=>$c['client_id'], 'parentid'=>$row['client_id']])); ?>">
                        <div class="flex items-center gap-3">
                          <span class="avatar avatar-md">
                            <?php echo e(getNameShort($c['name'])); ?>

                          </span>
                          <div>
                            <span>
                              <?php echo $c['name']; ?>

                            </span>
                            <span class="block mt-px text-xs font-normal text-gray-500 2xl:hidden">
                              <?php echo $c['company_name']; ?>

                            </span>
                          </div>
                        </div>
                      </a>
                    </td>
                    </td>
                    <td class="hidden px-3 py-4 text-sm text-gray-600 2xl:table-cell whitespace-nowrap">
                      <?php echo $c['company_name']; ?>

                    </td>
                    <td class="hidden px-3 py-4 text-sm text-gray-600 sm:table-cell whitespace-nowrap">
                      <?php echo $c['email']; ?><br><?php echo $c['phone']; ?>

                    </td>
                    <td class="hidden px-3 py-4 text-sm text-gray-600 md:table-cell whitespace-nowrap">
                      <div class="flex items-center gap-1.5">
                        <?php echo getUserCategoryType($c['type']); ?>

                      </div>
                    </td>
                    <td class="hidden px-3 py-4 text-sm text-gray-600 xl:table-cell whitespace-nowrap">
                      <?php echo dateFormat($c['created_at'], 'd M Y'); ?>

                    </td>
                    <td class="hidden px-3 py-4 text-sm text-gray-600 xl:table-cell whitespace-nowrap">
                      <?php echo getUserStatus($c['status']); ?>

                    </td>

                    <td class="relative py-4 pl-3 pr-4 whitespace-nowrap sm:pr-6">
                      <div class="flex items-center gap-4">

                        <a href="<?php echo e(route('view_client_member', ['id'=>$c['client_id'], 'parentid'=>$row['client_id']])); ?>" title="" class="btn btn-icon btn-secondary-light btn-icon-transparent" aria-label="View Member" data-microtip-position="top" role="tooltip">
                          <span class="sr-only">
                            View Member
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
          <?php else: ?>
          <!-- START EMPTY STATE -->
          <div class="flex items-center justify-center h-full p-12 text-center sm:p-16 sm:max-w-md sm:mx-auto">
            <div>
              <img class="w-auto mx-auto h-52" src="<?php echo e(asset('images/empty-clients.svg')); ?>" alt="">
              <p class="mt-4 text-lg font-bold text-gray-900">
                No Member found
              </p>
              <p class="mt-2 text-sm font-normal leading-6 text-gray-600">
                Velit officia consequat duis enim velit mollit. Exercitation veniam consequat.
              </p>

            </div>
          </div>
          <!-- END EMPTY STATE -->
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php endif; ?>

   
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
<?php echo $__env->make('accountant.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u239499167/domains/digitalpahal.com/public_html/resources/views/accountant/clients/view.blade.php ENDPATH**/ ?>