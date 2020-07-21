$(document).ready(function(){

 /* jQuery.validator.addMethod("extension", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
}, 'Please enter a valid email address.');
*/
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

   
});


//login form validation
$(document).ready(function(){
 
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  var link = $('body').data('baseurl');
 
  $("form[name='auths']").validate({
    
    rules: {

      email: {
        required: true,
        //email: true
      },
      password: {
        required: true,
      }
    },

    messages: {
   
      password: {
        required: lang.required,
      },
      email: {
        required: lang.required,
        //email: lang.enter_valid_email,
      },
    },

    submitHandler: function(form) {
        form.submit();
    }
  });  

  $("form[name='forgot-auth']").validate({
    
    rules: {

      email: {
        required: true,
        email: true
      },
    },

    messages: {
   
      email: {
        required: lang.required,
        email: lang.enter_valid_email,
      },
    },

    submitHandler: function(form) {
        form.submit();
    }
  });


  //change password
  $("form[name='reset-auth']").validate({
      rules: {
          verification_code:{
              required : true,
           },
          password: {
              required: true,
              maxlength: 20,
              minlength: 6,
          },
          confirm_password: {
              required: true,
              minlength: 6,
              maxlength: 20,
              equalTo: "#password",
          },
      },
      messages: {
       
        verification_code: {
              required: lang.VARIFY_CODE,
          },
          password: {
              required: lang.required,
              maxlength: lang.password_max_length,
              minlength: lang.password_min_length,
          },
          confirm_password: {
              required: lang.required,
              equalTo:   lang.equalTo,
              minlength: lang.confirm_password_min_length,
              maxlength: lang.confirm_password_max_length, 
          },
      }, 
  });


//change password
    $("#changepassword_form").validate({

        rules: {
            password:{
                required : true,
                maxlength : 20,
                minlength : 5
             },
            newPassword: {
                required: true,
                maxlength: 20,
                minlength: 6
            },
            confirmPassword: {
                required: true,
                maxlength: 20,
                minlength: 6,
                equalTo: "#newPassword"
            },
        },
        messages: {

          password: {
                required: "Please enter password field.",

                maxlength: "New Password maximum length should be 20 character.",

                minlength: "Your password must be at least 6 characters long."
            },

            newPassword: {
                required: "Please enter new password field.",
                maxlength: "New Password maximum length should be 20 character.",
                minlength: "Your password must be at least 5 characters long."
            },

        confirmPassword: {
          required: "Please enter confirm password field.",
          equalTo:   "New password and confirm password do not match.",
          minlength: "Confirm Password minimum length should be 6 character.",
          maxlength: "Confirm Password maximun length should be 20 character.",
         
      },
    },
//          
    });

/*-----------------------------------------------*/
//   For addEditUser (ADMIN)
    $("form[name='addEditUser']").validate({
    
    rules: {

      first_name: {
        required: true
      },

      last_name: {
        required: true
      },

      password: {
        required : true,
        maxlength : 20,
        minlength : 5
     },

     confirm_password: {
        required: true,
        minlength: 6,
        maxlength: 20,
        equalTo: "#password"
    },

    email: {
        required: true,
        email: true,
        remote: {
          type: 'post',
          url: SITEURL + '/admin/check_email',
          data: {
            'email': function () {
                return $('#email').val()
            },
            'tbl': 'users',
            'id': $('#userId').val(),
          },
          dataType: 'json'
        }
      },

    mobile_number: {
        required: true,
        number: true,
        minlength: 10,
        remote: {
          type: 'post',
          url: SITEURL + '/admin/check_mobile',
          data: {
            'mobile_number': function () {
                return $('#mobile_number').val()
            },
            'tbl': 'users',
            'id': $('#userId').val(),
          },
          dataType: 'json'
        }
      },

    security_question_id: {
      required: true,
    },

    security_answer: {
      required: true
    },

    role: {
      required: true
    },

    dob: {
      required: true
    },
    avatar: {
        required: function (element) {
            return $("#old_path").val() == '';
        },
        accept: "png|jpe?g|bmp",
        filesize:   10240
    }, 

    },

    messages: {
   
      email: {
        required: "Please enter email.",
        email: "Please enter a valid email address.",
        remote: "Oops! Looks like the email already exists."
      },
      first_name: {
        required: "Please enter first name.",
      },
      last_name: {
        required: "Please enter last name.",
      },
      password: {
        required: "Please enter password",
        maxlength: "Password maximum length should be 20 character.",
        minlength: "Your password must be at least 6 characters long."
      },
      confirm_password: {
        required: "Please enter password.",
        equalTo:   "Password and confirm password do not match.",
        minlength: "Confirm Password minimum length should be 6 character.",
        maxlength: "Confirm Password maximun length should be 20 character.",
      },
      mobile_number: {
        required: "Please enter mobile number",
        minlength: "Your mobile number must be at least 10 characters long.",
        number: "mobile number accepts only numeric value.",
        remote: "Oops! Looks like the contact number already exists."
      },
      security_question_id: {
        required: "Please select security question number."
      },
      security_answer: {
        required: "Please enter security answer."
      },
      role: {
        required: "Please select role."
      },
      dob: {
        required: "Please enter Date Of Birth."
      },
      avatar: {
          required: "Please select user image",
          accept: "File must be PNG,JPG,BMP image format only",
          filesize: "File must be PNG,JPG,BMP and less than 2MB"
      },

    },
    errorPlacement: function(error, element) {
        error.insertAfter(element);
    },
    submitHandler: function(form) {
        form.submit();
    }
  });


/*-----------------------------------------------*/
// For addEditCompanies (ADMIN)

$("form[name='addEditCompanies']").validate({
    
    rules: {

      title: {
        required: true
      },

      owner_name: {
        required: true
      },

    email: {
      required: true,
      email: true
    },

    contact_number_1: {
      required: true,
      number: true,
      minlength: 10
      
    },
    contact_number_2: {
      required: true,
      number: true,
      minlength: 10
      
    },

    address: {
      required: true,
    },

    tin_number: {
      required: true
    },

    gst_number: {
      required: true
    },

    country: {
      required: true
    },

    state: {
      required: true
    },

    city: {
      required: true
    },

    postal_code: {
      required: true
    },

    description: {
      required: true
    }

    },

    messages: {
   
     title: {
        required: "Please enter title.",
      },
      owner_name: {
        required: "Please enter owner name.",
      },
      email: {
        required: "Please enter email.",
        email: "Please enter a valid email address."
      },
      contact_number_1: {
        required: "Please enter mobile number.",
        minlength: "Your mobile number must be at least 10 characters long.",
        number: "mobile number accepts only numeric value."
      },
      contact_number_1: {
        required: "Please enter alternate number.",
        minlength: "Your mobile number must be at least 10 characters long.",
        number: "mobile number accepts only numeric value."
      },
      address: {
        required: "Please enter address."
      },
      tin_number: {
        required: "Please enter tin number."
      },
      gst_number: {
        required: "Please select gst number."
      },
      country: {
        required: "Please select country."
      },
      state: {
        required: "Please select state."
      },
      city: {
        required: "Please select city."
      },
      postal_code: {
        required: "Please enter postal code."
      },
      description: {
        required: "Please enter description."
      },

    },

    submitHandler: function(form) {
        form.submit();
    }
  });


/*-----------------------------------------------*/
//   For addEditVouchers (ADMIN)
    $("form[name='addEditVouchers']").validate({
    
    rules: {

      bill_number: {
        required: true
      },

      reciept_number: {
        required: true
      },
      payment_mode: {
        required: true
      },

      remark: {
        required: true
      },
       credit: {
        required: true
      },

      debit: {
        required: true
      },

    },

    messages: {
   
      bill_number: {
        required: "Please enter bill number.",
      },
      reciept_number: {
        required: "Please enter reciept number.",
      },
      payment_mode: {
        required: "Please select payment mode.",
      },
      remark: {
        required: "Please enter remark.",
      },
      credit: {
        required: "Please enter credit.",
      },
      debit: {
        required: "Please enter debit.",
      },

    },

    submitHandler: function(form) {
        form.submit();
    }
  });

/*-----------------------------------------------*/
// For addEditCompanies (ADMIN)

$("form[name='addEditCategories']").validate({
    
    rules: {

      title: {
        required: true
      },
      description: {
        required: true
      },
      image: {
        required: function (element) {
            return $("#old_path").val() == '';
        },
        //extension: "png|jpe?g|bmp",
        filesize:   10240
    }, 
     
    },

    messages: {
   
     title: {
        required: "Please enter title.",
      },
      description: {
        required: "Please enter description."
      },
      image: {
          required: "Please select category image",
          //extension: "File must be PNG,JPG,BMP image format only",
          filesize: "File must be PNG,JPG,BMP and less than 2MB"
      },
     
    },

    submitHandler: function(form) {
        form.submit();
    }
  });

/*-----------------------------------------------*/
// For addEditCountry (ADMIN)

$("form[name='addEditCountry']").validate({
    
    rules: {

      sortname: {
        required: true,
        maxlength: 3
      },
      name: {
        required: true
      },
      phonecode: {
        required: true,
        number: true
      }
     
    },

    messages: {
   
     sortname: {
        required: "Please enter short name.",
        maxlength: "Short name maximun length should be 3 character.",
      },
      name: {
        required: "Please enter name."
      },
      phonecode :{
        required: "Please enter phone code.",
        number: "Phone code accepts only numeric value.",
      }
     
    },

    submitHandler: function(form) {
        form.submit();
    }
  });

/*-----------------------------------------------*/
// For addEditQuestion (ADMIN)

$("form[name='addEditQuestion']").validate({
    
    rules: {

      title: {
        required: true,
      }
    },

    messages: {
   
     title: {
        required: "Please enter title.",
      }
    },

    submitHandler: function(form) {
        form.submit();
    }
  });


/*-----------------------------------------------*/
// For addEditSlider (ADMIN)

$("form[name='addEditSlider']").validate({
    
    rules: {

      title: {
        required: true
      },
      description: {
        required: true
      },
      image: {
        required: function (element) {
            return $("#old_path").val() == '';
        },
        //extension: "png|jpe?g|bmp",
        filesize:   10240
    }, 
     
    },

    messages: {
   
     title: {
        required: "Please enter title.",
      },
      description: {
        required: "Please enter description."
      },
      image: {
          required: "Please select category image",
          //extension: "File must be PNG,JPG,BMP image format only",
          filesize: "File must be PNG,JPG,BMP and less than 2MB"
      },
     
    },

    submitHandler: function(form) {
        form.submit();
    }
  });

/*-----------------------------------------------*/
// For subcategoryForm (ADMIN)

$("form[name='subcategoryForm']").validate({
    
    rules: {

      parent_id: {
        required: true
      },
      title: {
        required: true
      },
      description: {
        required: true
      },
      image: {
        required: function (element) {
            return $("#old_path").val() == '';
        },
        //extension: "png|jpe?g|bmp",
        filesize:   10240
    }, 
     
    },

    messages: {
   
     parent_id: {
        required: "Please select category.",
      },
      title: {
        required: "Please enter title."
      },
      description: {
        required: "Please enter description."
      },
      image: {
          required: "Please select category image",
          //extension: "File must be PNG,JPG,BMP image format only",
          filesize: "File must be PNG,JPG,BMP and less than 2MB"
      },
     
    },

    submitHandler: function(form) {
        form.submit();
    }
  });

/*-----------------------------------------------*/
// For addEditLanguage (ADMIN)

$("form[name='addEditLanguage']").validate({
    
    rules: {

      name: {
        required: true
      },
      short_name: {
        required: true,
        maxlength: 3
      }
     
    },

    messages: {
   
     name: {
        required: "Please enter name.",
      },
      short_name: {
        required: "Please enter short name.",
        maxlength: "Short name maximun length should be 3 character.",
      }
     
    },

    submitHandler: function(form) {
        form.submit();
    }
  });



});

