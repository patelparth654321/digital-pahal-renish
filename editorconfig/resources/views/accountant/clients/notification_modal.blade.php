 <!-- START SEND NOTIFICATION MODAL -->
 <div class="fixed inset-0 z-30 invisible w-full h-full overflow-hidden transition-all duration-200 ease-in-out outline-none opacity-0 modal" id="sendNotificationModal" aria-labelledby="fileUploadModalLabel" role="dialog" aria-hidden="true" tabindex="-1">
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

             <div class="p-4 sm:p-6">
                 <h5 class="text-lg font-semibold text-gray-900" id="exampleModalToggleLabel">
                     Send Notification
                 </h5>
                 <p class="mt-1 text-sm font-normal text-gray-600">
                     Amet minim mollit non deserunt ullamco.
                 </p>
             </div>
             <form method="POST" enctype="multipart/form-data" action="{{ route('sendNotification') }}">
                 @csrf
                 <input type="hidden" name="to_ids" id="to_ids" value="" />
                 <div class="flex-1 px-4 pb-4 overflow-y-auto sm:px-6 sm:pb-6 grow">
                     <div class="grid grid-cols-1 gap-x-6 gap-y-5">
                         <div>
                             <label for="" class="required">
                                 Title
                             </label>
                             <div class="mt-1.5 input-wrapper">
                                 <input type="text" name="title" required class="form-input">
                             </div>
                         </div>

                         <div>
                             <label for="" class="required">
                                 Description
                             </label>
                             <div class="mt-1.5 input-wrapper">
                                 <textarea name="description" required class="resize-y form-input" rows="3"></textarea>
                             </div>
                         </div>

                         <div>
                             <label for="">
                                 Attachment
                             </label>
                             <div class="flex justify-center mt-1.5 px-6 py-10 transition-all duration-150 border border-gray-200 border-dashed rounded-lg bg-gray-25 hover:bg-gray-50">
                                 <div class="text-center">
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
                                             <input id="file-upload" name="attachment" type="file" class="sr-only">
                                         </label>
                                         <p class="pl-1">or drag and drop</p>
                                     </div>
                                     <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="flex items-center justify-center gap-4 mt-4 sm:mt-6">
                         <button type="button" class="w-full btn btn-secondary" data-dismiss="modal" aria-label="Close Modal">
                             Cancel
                         </button>

                         <button type="submit" class="w-full btn btn-primary">
                             Send
                         </button>
                     </div>
                 </div>
         </div>
     </div>
 </div>
 </div>
 <!-- END SEND NOTIFICATION MODAL -->
