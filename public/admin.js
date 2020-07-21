 $(document).ready(function(){

  jQuery.validator.addMethod("extension", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
}, 'Please enter a valid email address.');

    $.validator.addMethod("customemail",
            function (value, element) {
                return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
            });

    $.validator.addMethod('decimal', function (value, element) {
        return this.optional(element) || /^((\d+(\\.\d{0,2})?)|((\d*(\.\d{1,2}))))$/.test(value);
    }, "");

   $.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z]+$/i.test(value);
   }, "Please enter letters");   

   //Initialize Select2 Elements
    if ($('.select2').length > 0) {
        $(".select2").select2();
    }

});

 setTimeout(function () {
    $(".alert").fadeOut("slow", function () {
        $(".alert").remove();
    });

}, 2000);

 $.ajaxSetup({
    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }

});

$(document).ready(function(){
     $('#defaultrange').daterangepicker({
           // opens: (App.isRTL() ? 'left' : 'right'),
            format: 'MM/DD/YYYY',
            separator: ' to ',
            showClear: true,
            startDate: moment(),
            endDate: moment(),
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                'Last 7 Days': [moment().subtract('days', 6), moment()],
                'Last 30 Days': [moment().subtract('days', 29), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
            },
            minDate: '01/01/2000',
            maxDate: '12/31/2050',
        },
            function (start, end) {
                $('#defaultrange input').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
            }
        );

        $('#defaultrange input').val(moment().format('DD/MM/YYYY') + ' - ' + moment().format('DD/MM/YYYY'));

        $('#clearDefaultrange').click(function () {
            $('#defaultrange input').val('');
        });

});

$(window).bind("load", function() {

   if ($("#language_load_id").length > 0) {

            getSubPage()
    }
    });

function getSubPage(){
    var target = $('#language_load_id :selected').attr('data-langValue');
    if(target != ''){
      $('body').find('#changLangDK').html('<i class="fa fa-language " aria-hidden="true"></i> ' + languageTextChange(target));
    }
    //var language_id = $('#language_load_id').val()
    var language_id = $('#language_load_id').val();
    var language_page = $('#language_load_page').val()
    var functionName = $('#functionName').val()
    var main_load_id = $('#main_load_id').val()
    $.ajax({
            url: SITEURL + '/admin/page-load',
            type: 'post',
            dataType: 'html',
            data: {
                language_id: language_id,
                language_page : language_page,
                functionName : functionName,
                main_load_id : main_load_id,

                },
            success: function (msg)
            {

                $('body').find('#setCatSubpage').html(msg);
                var show_translate_lang = $('body').find('#show_translate_lang').val();
                if(show_translate_lang != ''){
                    $('body').find('#btnTranslate').show();
                }else{
                    $('body').find('#btnTranslate').hide();
                }
                $('.select2').select2();
            }
        });
    }


function languageTextChange(target) {
    if(target == 'en'){
        return 'Translate English';
    }
    else if(target == 'de'){
        return 'Translate German';
    }else if(target == 'hi'){
        return 'Translate Hindi';
    }else if(target == 'fr'){
        return 'Translate French';
    }
}


function changLangValueFunction() {
  
    var target = $('#language_load_id :selected').attr('data-langValue');
    $.each($("input.changLangValueClass"), function(){  
        var columnId =  $(this).attr('id')
         $.ajax({
            url: SITEURL+'/admin/changeLanguage',
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'post',
            dataType: 'json',
            data:{ target:target, message: $(this).val() },

            success: function (msg)
            {
                console.log(msg.sentences[0].trans);
                $("#"+columnId).val(msg.sentences[0].trans);
                
            }
        });
    });


    $.each($("textarea.changLangValueClass"), function(){      
        var columnId =  $(this).attr('id')
         $.ajax({
            url: SITEURL+'/admin/changeLanguage',
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'post',
            dataType: 'json',
            data:{ target:target, message: $(this).text() },

            success: function (msg)
            {
                console.log(msg.sentences[0].trans);
                 $("#"+columnId).text(msg.sentences[0].trans);
                
            }
        });
    });
}
 function getChangeData(main_id, put_id, put_select_value, change_id = null, change_select_value = null){
    var table_name = $('#'+main_id).attr('data-table');
    var id = $('#'+main_id).val();


    $.ajax({
                url: SITEURL + '/admin/get-all-data',
                type: 'post',
                dataType: 'json',
                data: {
                    id: id,
                    table_name: table_name,
                    find_id :main_id
                },
                success: function (msg)
                {
                    if (msg.success == true) {
                        var opt = '<option value="">'+ put_select_value+' </option>';
                        $.each(msg.result, function (i, item) {
                            opt += '<option value="' + item.id + '">' + item.name + '</option>';
                        });
                        $('#'+put_id).html(opt);

                        var htm = '<option value="">'+ change_select_value+'</option>';
                        $('#'+change_id).html(htm);
                    } else
                    {

                        var opt = '<option value="">'+ put_select_value+'</option>';
                        $('#'+put_id).html(opt);

                        var htm = '<option value="">'+ change_select_value+'</option>';
                        $('#'+change_id).html(htm);
                    }
                }
            });

 }


 function deleteData(url , table = null, multipleImage = null) {
    /* multipleImage :- this variable use for only remove dropzone images  */
    var row = $(this).closest("tr").get(0);
    swal({
            title: lang.SURE,
            text: lang.delete_warning,
            icon: "warning",
            buttons: [lang.CANCEL, lang.OK ],
            dangerMode: true,
        }).then((value) => {
            if (value == 1) {
                swal({title:lang.deleted, text:lang.successful_deleted, type:"success", buttons:lang.OK});
                $.post(SITEURL + '/admin/' + url, function(data) {
                    if (data == 1) { //In case if data is deleted
                        if(table != ''){
                            var oTable = $('#'+table).dataTable(); // JQuery dataTable function to delete the row from the table
                        //oTable.fnDeleteRow(oTable.fnGetPosition(row));// JQuery dataTable function to delete the row from the table
                            oTable.fnDraw(false);
                        }
                        if(multipleImage != ''){
                            $('#imgSrc_' + multipleImage).hide("slow");
                        }
                    } else
                        alert(data);
                });

            } else {
                swal({title:lang.Cancelled, text:lang.safe_record, type: "error",icon:"error",buttons:lang.OK});
            }
        });
}

function readURL(input, id = '#blah', a_id = '#blah_anchor') {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        //By Pankaj Gawande       
        //input.files[0].name
        $("#no_selected_"+input.id).html("File Selected");
        
        reader.onload = function (e) {
            $(id)
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            $(a_id) .attr('href', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function readLogoURL(input, id = '#blah1', a_id = '#blah_anchor1') {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        $("#no_selected_"+input.id).html("File Selected");
        reader.onload = function (e) {
            $(id)
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            $(a_id) .attr('href', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}




//login form validation
$(function() {

 //Date picker
$('.datepicker').datepicker({
  autoclose: true,
  format: 'yyyy/m/d'
})

 $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

 if ($("#update-profile").length > 0) {
    $("#update-profile").validate({
    
    rules: {
      name: {
        required: true,
        maxlength: 50
      },

       mobile_number: {
            required: true,
            number:true,
            minlength: 8,
            maxlength:13,
        },
        email: {
                maxlength: 50,
                email: true,
                customemail: true,
            }, 
         
    },
    messages: {
      
      name: {
        required: lang.required,
        maxlength: lang.name_length
      },
      mobile_number: {
        required: lang.required,
        minlength: lang.mobile_length,
        number: lang.VALID_NUMBER,
        maxlength: lang.mobile_length,
      },
      email: {
          email: lang.required,
          customemail: lang.enter_valid_email,
          maxlength: lang.email_length,
        },
      
},
    
    submitHandler: function(form) {
      form.submit();
    }
    });
  }


//change password
if ($("#change-password").length > 0) {
 $("#change-password").validate({
    rules: {
        password:{
            required : true,
            maxlength : 20,
            minlength : 6
         },
        new_password: {
            required: true,
            maxlength: 20,
            minlength: 6
        },
        confirm_password: {
            required: true,
            maxlength: 20,
            minlength: 6,
            equalTo: "#new_password"
        },
    },
    messages: {

      password: {
            required: lang.required,
            maxlength: lang.password_max_length,
            minlength: lang.password_min_length
        },

        new_password: {
            required: lang.required,
            maxlength: lang.password_max_length,
            minlength: lang.password_min_length
        },

    confirm_password: {
      required: lang.required,
      equalTo:   lang.equalTo,
      minlength: lang.confirm_password_min_length,
      maxlength: lang.confirm_password_max_length,
     
      },
    },
    //          
    });
}

//this bracket top function
});