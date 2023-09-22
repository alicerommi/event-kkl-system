$(document).ready(function () {
        // $('#city').select2();
          // for checking confirm box
          $('#policy_confirm').change(function() {
              if ($(this).is(':checked')) {
                $('#action_btn').removeClass('disabled-button');
              } else {
               $('#action_btn').addClass('disabled-button');
              }
        });
      //insert action
        $("#ticket_booking_form").submit(function(e){
          let form_data = $(this).serialize();
          $.ajax({
            'type': 'POST', 
            'url': 'actions/insert.php',
            'data': form_data,
            'dataType':'JSON',
            success: function (data) {

              if (data['success']==0){
                Swal.fire({
                  icon: 'error',
                  title: '',
                  text: data["msg"],
                   showConfirmButton: false, // Hide the "OK" button\
                   timer: 10000, // 10 seconds in milliseconds
                });
              }else{
                    $('#action_btn').addClass('disabled-button');
                   Swal.fire({
                      icon: 'success',
                      title: '',
                      text: data["msg"],
                       showConfirmButton: false, // Hide the "OK" button
                       timer: 10000, // 10 seconds in milliseconds
                  });
                    
                  $("#ticket_booking_form")[0].reset();

                }

            },
            error: function (xhr, status, error) {
              console.log('Error:', error);
            }
          });//end ajax call here
          e.preventDefault();
        });  //end ticket_booking_form here

        

        // for checking the phone exists or not
        $("#phone").on("input",function(){
                var phone = $(this).val().trim();
                $("#leaving_form_messages").empty();
                // Check if the length of the input exceeds 10 characters
                if (phone.length == 10) {
                    $.ajax({
                        'type': 'POST', 
                        'url': 'actions/fetch.php',
                        'data': {
                          'check_phone':1,
                          'phone':phone,
                        },
                        'dataType':'JSON',
                        success: function (data) {
                            if (data['success']==0){
                                let msg = '<div class="alert alert-warning text-center" id="warning" style="font-weight: 600;font-size: 20px;" style="direction:rtl">'+data['msg']+'</div>';
                                $("#leaving_form_messages").empty().append(msg);
                            }else{
                                $("#phone").attr('readonly',true);
                                $("#phone").attr('disabled',true);
                                let text_area= '<textarea class="mt-2 w-100 input-form" name="answer"  id="answer" required rows="3" maxlength="5000" placeholder="הקלד את תשובתך"></textarea>';
                                let msg = '<div class="alert alert-success text-center" style="font-weight: 600;font-size: 20px;" id="success" style="direction:rtl">'+data['msg']+'</div>';
                                $("#leaving_form_messages").empty().append(msg);
                                $("#ans_box").empty().append(text_area);
                                $("#btn_div").show();
                                //$("#leaving_form")[0].reset();
                            }
                      }  //end success here

                    });// end ajax here
                } 
        });  //end phone
        // Leaving page

           $("#leaving_form").submit(function(e){
                let phone = $("#phone").val().trim();
                let answer = $("#answer").val().trim();
                $.ajax({
                  'type': 'POST', 
                  'url': 'actions/insert.php',
                  'data': {
                    'save_leaving_form':1,
                    'phone':phone,
                    'answer':answer,
                  },
                  'dataType':'JSON',
                  success: function (data) {
                        if (data['success']==0){
                            let msg = '<div class="alert alert-warning text-center" id="warning"  style="direction:rtl; font-weight: 600;font-size: 20px;">'+data['msg']+'</div>';
                            $("#leaving_form_messages").empty().append(msg);
                        }else{
                            let msg = '<div class="alert alert-success text-center" id="success" style="direction:rtl; font-weight: 600;font-size: 20px;">'+data['msg']+'</div>';
                            $("#leaving_form_messages").empty().append(msg);
                            $(".fields").remove();
                            //$("#leaving_form")[0].reset();
                        }
                  },
                  error: function (xhr, status, error) {
                    console.log('Error:', error);
                  }
                });//end ajax call here
          e.preventDefault();
        });  //end ticket_booking_form here
    }); //end ready function here