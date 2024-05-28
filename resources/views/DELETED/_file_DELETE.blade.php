// formDelete.submit(function(e) {
    //     e.preventDefault();
    
    //     $.ajax({
    //         url: $(this).attr('action'),
    //         type: "DELETE",
    //         success: function(response) {
    //             // alertSuccess("{{ __('file.deleted') }}");
    //         },
    //         error: function(response) {
    //             // alertError(response);
    //         }
    //     });
    // });
    
    
    // function formatDelete (id) {
    //     const formDelete = $('#{{ $formDelete }}');
    //     let tempAction = formDelete.attr('action');
    //     formDelete.attr('action', tempAction.replace("idTemp", id));
    
    //     const downloadLink = formDelete.find('.download-link');
    //     let tempLink = downloadLink.attr('href');
    //     downloadLink.attr('href', tempLink.replace("idTemp", id));
    // }
    
    // function alertSuccess(message) {
    //     const alert = $('#{{ $type }}-alert');
    //     alert.removeClass('alert-danger').addClass('alert-success').show();
    //     alert.find('ul').html('');
    //     alert.find('ul').append('<li>' + message + '</li>');
    // }