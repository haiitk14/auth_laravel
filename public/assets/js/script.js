$(document).ready(function() {
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "rtl": false,
      "positionClass": "toast-top-center",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": 300,
      "hideDuration": 1000,
      "timeOut": 3000,
      "extendedTimeOut": 1000,
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    submitFormModal();
    submitPost();
    submitDelete();
});

function FormatNumber(obj) {
    var strvalue;
    if (eval(obj)) strvalue = eval(obj).value;
    else strvalue = obj;
    var num;
    num = strvalue.toString().replace(/\$|\,/g, '');
    num = num.replace(".", "");
    if (isNaN(num)) num = "";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num * 100 + 0.50000000001);
    num = Math.floor(num / 100).toString();
    for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++) num = num.substring(0, num.length - (4 * i + 3)) + ',' + num.substring(num.length - (4 * i + 3));
    //return (((sign)?'':'-') + num);
    eval(obj).value = (((sign) ? '' : '-') + num);
}

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
    return true;
}

//submit post action
function submitPost() {
    $('.submit-post').click(function() {
        var id = $(this).data('id');
        var url = $(this).data('url');
        var data = {'id':id, '_token':$('meta[name="csrf-token"]').attr('content')};
        $.ajax({
            type: 'POST',
            url: url,
            data: data
        }).done(function (response) {
            toastr.success(response.message);
            setTimeout(function () {
                window.location.reload();
            }, 500);
        }).fail(function (response) {
            var errors = $.parseJSON(response.responseText);
            $.each(errors, function(index, value) {
                toastr.error(value);
            });
        }).always(function () {
            // console.log('completed');
            // $('.page-loading').hide();
        });
    });
}

//submit delete action
function submitDelete() {
  $('.submit-delete').click(function() {
        var id = $(this).data('id');
        var url = $(this).data('url');
        var data = {'id':id, '_token':$('meta[name="csrf-token"]').attr('content')};
        swal({
            title: "Warning!",
            text: "Are you sure delete?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancel',
            cancelButtonColor: '#d33',
            html: true
          },
          function(isConfirm) {
            if (isConfirm) {
              $.ajax({
                  type: 'DELETE',
                  url: url,
                  data: data
              }).done(function (response) {
                  toastr.success(response.message);
                  setTimeout(function () {
                      window.location.reload();
                  }, 500);
              }).fail(function (response) {
                  var errors = $.parseJSON(response.responseText);
                  $.each(errors, function(index, value) {
                      toastr.error(value);
                  });
              }).always(function () {
                  // console.log('completed');
                  // $('.page-loading').hide();
              });
            }
          });
          
          

        
    });
}

//submit form 
function submitFormModal() {
    $('.submit-form').safeform({
        timeout:2000,
        submit:function (event) {
            event.preventDefault();
            var $form = $(this);
            var action = $form.attr('action');
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: action,
                type: 'POST',
                dataType: 'html',
                data: formData,
                processData: false,
                contentType: false
            }).done(function (response) {
                var message = JSON.parse(response);
                $.each(message, function (index, value) {
                    toastr.success(value);
                });
                setTimeout(function () {
                    window.location.reload();
                }, 500);

            }).fail(function (response) {
                var errors = $.parseJSON(response.responseText);
                console.log(errors);
                $.each(errors.errors, function(index, value) {
                    toastr.error(value);
                });
            }).always(function () {
                console.log('completed');
            });

        }
    });
}