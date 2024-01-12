$(function(){
  /*
   * For the sake keeping the code clean and the examples simple this file
   * contains only the plugin configuration & callbacks.
   * 
   * UI functions ui_* can be located in: demo-ui.js
   */
  $('#drag-and-drop-zone').dmUploader({ //
    url: config.route+'/upload-document',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
    auto: true,
    queue: false,
    extraData:function() {
      return {
      document_type:$("#document_type").val(),
      month:$('#month').val(),
      year:$('#year').val(),
      category:$("input[name='category']:checked").val(),
      bank:$('#bank').val(),
      sub_type:$('#sub_type').val(),
      parent_docuent:$('#parent_docuent').val(),
      password:$('#password').val(),
      client_id: $('#client_id').val()
      }
    },
    
    maxFileSize: 3000000, // 3 Megs 
    onDragEnter: function(){
      // Happens when dragging something over the DnD area
      this.addClass('active');
    },
    onDragLeave: function(){
      // Happens when dragging something OUT of the DnD area
      this.removeClass('active');
    },
    onInit: function(){
      // Plugin is ready to use
      ui_add_log('Penguin initialized :)', 'info');
    },
    onComplete: function(){
      // All files in the queue are processed (success or error)
      ui_add_log('All pending tranfers finished');
    },
    onNewFile: function(id, file){
      // When a new file is added using the file selector or the DnD area
      ui_add_log('New file added #' + id);
      ui_multi_add_file(id, file);
    },
    onBeforeUpload: function(id){
      // about tho start uploading a file
      ui_add_log('Starting the upload of #' + id);
     // ui_multi_update_file_status(id, 'uploading', 'Uploading...');
      ui_multi_update_file_progress(id, 0, '', true);
    },
    onUploadCanceled: function(id) {
      // Happens when a file is directly canceled by the user.
      ui_multi_update_file_status(id, 'warning', 'Canceled by User');
      ui_multi_update_file_progress(id, 0, 'warning', false);
    },
    onUploadProgress: function(id, percent){
      // Updating file progress
      ui_multi_update_file_progress(id, percent);
    },
    onUploadSuccess: function(id, data){
      toastr.success(data.message);
      ui_multi_update_file_progress(id, 100, 'success', false);
      setTimeout(function() { window.location.reload(); }, 3000);
    },
    onUploadError: function(id, data){
      console.log(id, data.responseJSON);
      toastr.error(data.responseJSON.message);
      ui_multi_update_file_progress(id, 0, 'danger', false);  
      $('#uploaderFile'+id).remove();
    },
    onFallbackMode: function(){
      // When the browser doesn't support this plugin :(
      ui_add_log('Plugin cant be used here, running Fallback callback', 'danger');
    },
    onFileSizeError: function(file){
      ui_add_log('File \'' + file.name + '\' cannot be added: size excess limit', 'danger');
    }
  });
  $('#btnApiStart').on('click', function(evt){
    evt.preventDefault();

    $('#drag-and-drop-zone').dmUploader('start');
  });
});