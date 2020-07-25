$(document).ready(function() {

    jQuery.validator.addMethod("KSA", function (value, element) {
        if (/^(0)[0-9]{9}/.test(value)) {
            return true;
        } else {
            return false;
        };
    }, "wrong KSA phone number");
    console.log('abdelhafz');
    $(".fancybox").fancybox();
    $('body').on('click','[id^=download_all_iamges-]', function() {
      var id = $(this).attr('id').split('-')[1];

          swal({
              title: lang.SURE,
              text:lang.WANT_DOWNLOAD_IMAGE,
              type: "warning",
              icon: "warning",
              buttons: [lang.CANCEL,lang.OK],
              dangerMode: true,
          }).then(function (value) {
            if(id != '' && value == 1){
              $.ajax({
                  url: SITEURL+'/admin/download-images',
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  method:'POST',
                  type:'json',
                  data: {id:id},
                  success:function(res){

                      if(res.success == 1){
                          var data = res.result;

                          var link = document.createElement('a');
                          link.setAttribute('download', '');
                          link.style.display = 'none';

                          document.body.appendChild(link);
                          for (var i = 0; i < data.length; i++) {
                              var image = SITEURL+'/public/'+data[i].image;

                              link.setAttribute('href', image);
                              link.click();
                          }

                          document.body.removeChild(link);
                      }
                  }
              });
            }
          });

    });
  });

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

  function removeImg(table,clm,id){
      console.log(table+" == "+clm+" == "+id);
      swal({
            title: lang.SURE,
            text: lang.delete_warning,
            icon: "warning",
            buttons: [lang.CANCEL, lang.OK ],
            dangerMode: true,
        }).then((value) => {
            if (value == 1) {
                $.post(SITEURL + '/admin/remove_image',{"table":table,"clm":clm,"id":id}, function(res) {
                   swal({title:lang.deleted, text:lang.successful_deleted, type:"success", buttons:lang.OK});
                   setTimeout(function(){ window.location.href = window.location.href; }, 1000);
                },'json');
            } else {
                swal({title:lang.Cancelled, text:lang.safe_record, type: "error",icon:"error",buttons:lang.OK});
            }
        });
  }

  $(document).ready(function (){

      var id = $("#userId").val();

      $("#show-div").show();
      if(id != '')
        $("#show-div").hide();

        $("#change-pass").click(function() {

          var lable = $("#change-pass").text().trim();

          if(lable == lang.CHANGE_PASS) {
            $("#change-pass").text(lang.REMOVE);
            $("#show-div").show();
          }
          else {
            $("#change-pass").text(lang.CHANGE_PASS);
            $("#show-div").hide();
          }

        });
    });


  $(document).ready(function(){

      var id = $("#userId").val();

      $("#addEditUser").validate({
        rules: {
           name :{
            required:  true,
          },
          email :{
            required:  true,
            email:true,
            remote:{
              url: SITEURL+"/check_email",
              type: "post",
              data:{
                id: id,
                tbl: 'users',
                email: function() {
                  return $( "#email" ).val();
                }
              }
            },
          },
          password :{
            required:  true,
            minlength: 6,
          },
          confirm_password :{
            required:  true,
            minlength: 6,
            equalTo: "#password",
          },
          mobile_number :{
            required:  true,
            number: true,
            minlength: 8,
            maxlength: 11,
            remote: {
              url: SITEURL+"/admin/check_mobile",
              type: "post",
              data: {
                id: id,
                tbl: 'users',
                mobile_number: function() {
                  return $( "#mobile_number" ).val();
                }
              }
            },
          },
          city_id:{
            required: true,
          },
          avatar: {
            //required: true,
            accept:"jpg,png,jpeg,gif",
          },
          user_type:{
            required: true,
          },
        },
        messages: {
          name: {
            required: lang.required,
          },
          email: {
            required: lang.required,
            email: lang.enter_valid_email,
            remote: lang.email_exists,
          },
          password: {
            required: lang.required,
            minlength: lang.password_min_length,
          },
          confirm_password: {
            required: lang.required,
            minlength: lang.confirm_password_min_length,
            equalTo: lang.equalTo,
          },
          mobile_number: {
            required: lang.required,
            number: lang.number,
            minlength: lang.mobile_length,
            maxlength: lang.mobile_length,
            remote: lang.mobile_number_exists,
          },
          city_id: {
            required: lang.required,
          },
          avatar: {
            //required: lang.please_select_image,
            accept: lang.VALID_IMAGE,
          },
          user_type: {
            required: lang.required,
          },
        },
        errorPlacement: function(error, element) {
         if(element.attr("name") == "avatar"){
            error.appendTo('em');
         }else if(element.attr("name") == "mobile_number"){
          error.insertAfter(element.parent());
         }else{
          error.insertAfter(element);
         }
       }
      })

      $("#addEditServicePro").validate({
        rules: {
          tax_record :{
            required:  true,
          },
          name :{
            required:  true,
          },
          commercial_record :{
            required:  true,
          },
          email :{
            required:  true,
            email:true,
          },
          password :{
            required:  true,
            minlength: 6,
          },
          confirm_password :{
            required:  true,
            minlength: 6,
            equalTo: "#password",
          },
          mobile_number :{
            required:  true,
            KSA:true,
            number: true,
            minlength: 8,
            maxlength: 11,
          },
          city_id:{
            required: true,
          },
          phone_number:{
            //required: true,
            number: true,
            minlength: 8,
            maxlength: 11,
          },
          name_en :{
            required:  true,
          },
          name_ar :{
            required:  true,
          },
          avatar: {
            //required: true,
            accept:"jpg,png,jpeg,gif",
          },
          logo: {
            //required: true,
            accept:"jpg,png,jpeg,gif",
          },
        },
        messages: {
          commercial_record: {
             required: lang.required,
          },
          name: {
            required: lang.required,
         },
          tax_record: {
            required: lang.required,
         },
          email: {
            required: lang.required,
            email: lang.enter_valid_email,
            remote: lang.email_exists,
          },
          password: {
            required: lang.required,
            minlength: lang.password_min_length,
          },
          confirm_password: {
            required: lang.required,
            minlength: lang.confirm_password_min_length,
            equalTo: lang.equalTo,
          },
          mobile_number: {
            required: lang.required,
            number: lang.number,
            minlength: lang.mobile_length,
            maxlength: lang.mobile_length,
            remote: lang.mobile_number_exists,
          },
          city_id: {
            required: lang.required,
          },
          phone_number: {
            //required: lang.required,
            number: lang.number,
            minlength: lang.phone_minlength,
            maxlength: lang.phone_maxlength,
          },
          name_en: {
            required: lang.required,
          },
          name_ar: {
            required: lang.required,
          },
          category_id: {
            required: lang.required,
          },
          subcategory_id: {
            required: lang.required,
          },
          /*delux_handover: {
            required: lang.required,
            number: lang.velid_data,
          },
          key_handover: {
            required: lang.required,
            number: lang.velid_data,
          },
          structure_covered: {
            required: lang.required,
            number: lang.velid_data,
          },
          structure_build: {
            required: lang.required,
            number: lang.velid_data,
          },
          fence: {
            //required: lang.required,
            number: lang.velid_data,
          },
          backyard: {
            //required: lang.required,
            number: lang.velid_data,
          },
          avg_rating: {
            required: lang.required,
          },
          no_of_review: {
            required: lang.required,
          },
          tank: {
            //: lang.required,
            number: lang.velid_data,
          },*/
          avatar: {
            //required: lang.please_select_image,
            accept: lang.VALID_IMAGE,
          },
          logo: {
            //required: lang.please_select_image,
            accept: lang.VALID_IMAGE,
          },
         /* description_ar: {
            required: lang.required,
          },
          description_en: {
            required: lang.required,
          },*/
         /* latitude: {
            required: lang.required,
          },
          longitude: {
            required: lang.required,
          },*/
        },
        errorPlacement: function(error, element) {
         if(element.attr("name") == "avatar"){
            error.appendTo('#avatarNote');
           } else if(element.attr("name") == "logo"){
            error.appendTo('#logoNote');
           }else if(element.attr("name") == "mobile_number" || element.attr("name") == "phone_number"){
            error.insertAfter(element.parent());
           }else{
            error.insertAfter(element);
           }
         }
      })

      /* BuildingType */
      $("#addEditBuildingType").validate({
        rules: {
          name_en:{
            required: true,
          },
          name_ar:{
            required: true,
          },
        },
        messages:{
          name_en: {
            required: lang.required,
          },
          name_ar: {
            required: lang.required,
          },
        },
      });

      /* ConstructionType */
      $("#addEditConstructionType").validate({
        rules: {
          name_en:{
            required: true,
          },
          name_ar:{
            required: true,
          },
        },
        messages:{
          name_en: {
            required: lang.required,
          },
          name_ar: {
            required: lang.required,
          },
        },
      });


      /*Categories*/
      $("#addEditCategories").validate({
          rules: {
              name_en:{
                  required: true,
              },
              name_ar:{
                  required: true,
              },
          },
          messages:{
              name_en: {
                  required: lang.required,
              },
              name_ar: {
                  required: lang.required,
              },
          },
      });

      /*SubCategories*/
     $("#addEditSubCategories").validate({
          rules: {
              category_id:{
                  required: true,
              },
              name_en:{
                  required: true,
              },
              name_ar:{
                  required: true,
              },
          },
          messages:{
              category_id: {
                  required: lang.required,
              },
              name_en: {
                  required: lang.required,
              },
              name_ar: {
                  required: lang.required,
              },
          },
          errorPlacement: function(error, element) {
              if (element.attr("name") == "category_id") {
                  element.parent().append(error);
              }else{
                  error.insertAfter(element);
              }
          },
      });

      /*City*/
      $("#addEditCity").validate({
        rules: {
           name_en :{
              required:  true,
           },
           name_ar :{
              required:  true,
           },
           phone_code :{
              required:  true,
           },
           currency :{
              required:  true,
           },
           latitude :{
              required:  true,
           },
           longitude :{
              required:  true,
           },
        },
        messages: {
           name_en: {
              required: lang.required,
           },
           name_ar: {
              required: lang.required,
           },
           phone_code: {
              required: lang.required,
           },
           currency: {
              required: lang.required,
           },
           latitude: {
              required: lang.required,
           },
           longitude: {
              required: lang.required,
           },
        },
      })

      /*Content*/
      $("#addEditContent").validate({
          rules: {
              title_en:{
                  required: true,
              },
              title_ar:{
                  required: true,
              },
              text_en:{
                  required: true,
              },
              text_ar:{
                  required: true,
              },
          },
          messages:{
              title_en: {
                  required: lang.required,
              },
              title_ar: {
                  required: lang.required,
              },
              text_en: {
                  required: lang.required,
              },
              text_ar: {
                  required: lang.required,
              },
          },
      });



    /* Services of Service-Provider */
    if($("#addEditServices").length > 0){


      $("#addEditServices").validate({
        rules: {
          service_provider_id:{
            required: true,
          },
          building_types_id:{
            required: true,

          },
          construction_type_id:{
            required: true,
            remote: {
              url: SITEURL+"/admin/check_service",
              type: "post",
              data: {
                id: $("#ServicesId").val(),
                tbl: 'services',
                service_provider_id: function() {
                  return $("#service_provider_id").val();
                },
                construction_type_id: function() {
                  return $( "#construction_type_id" ).val();
                },
                building_types_id: function() {
                  return $( "#building_types_id" ).val();
                },
              }
            },
          },
          price:{
            required: true,
            number: true,
          },
        },
        messages:{
          service_provider_id: {
            required: lang.PLEASE_SELECT_SERVICE_PROVIDER,
          },
          building_types_id: {
            required: lang.PLEASE_SELECT_BUILDING_TYPE,
          },
          construction_type_id: {
            required: lang.PLEASE_SELECT_CUNSTRUCTION_TYPE,
            remote: lang.service_exists,
          },
          price: {
            required: lang.required,
            number: lang.VALID_NUMBER,
          },
        },
      });
    }


      /* MarketPlace */
      $("#addEditMarketPlace").validate({
        rules: {
          building_types_id:{
            required: true,
          },
          construction_type_id:{
            required: true,
            remote: {
              url: SITEURL+"/admin/check_market_price",
              type: "post",
              data: {
                id: $("#market_price_id").val(),
                tbl: 'market_price',
                construction_type_id: function() {
                  return $( "#construction_type_id" ).val();
                },
                building_types_id: function() {
                  return $( "#building_type_id" ).val();
                },
              }
            },
          },
        },
        messages:{
          building_types_id: {
            required: lang.PLEASE_SELECT_BUILDING_TYPE,
          },
          construction_type_id: {
            required: lang.PLEASE_SELECT_CUNSTRUCTION_TYPE,
            remote: lang.already_exists,
          },
          price: {
            required: lang.required,
            number: lang.VALID_NUMBER,
          },
        },
      });


  });
