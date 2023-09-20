  $(document).ready(function () {
      
    //   $.ajax({
    //     'type': 'POST', 
    //     'url': 'actions/fetch.php',
    //     'data': {
    //       'get_cities': 1,
    //     },
    //     success: function (data) {
    //       $("#city_list").empty().append(data);
    //     },
    //     error: function (xhr, status, error) {
    //       console.log('Error:', error);
    //     }
    // });

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
                });
              }else{
                   Swal.fire({
                      icon: 'success',
                      title: '',
                      text: data["msg"],
                  });
                  $('#action_btn').addClass('disabled-button');
                  $("#ticket_booking_form")[0].reset();
                }

            },
            error: function (xhr, status, error) {
              console.log('Error:', error);
            }
          });//end ajax call here
          e.preventDefault();
        });  //end ticket_booking_form here

        // Leaving page

           $("#leaving_form").submit(function(e){
                let form_data = $(this).serialize();
                $.ajax({
                  'type': 'POST', 
                  'url': 'actions/insert.php',
                  'data': form_data,
                  'dataType':'JSON',
                  success: function (data) {
                        if (data['success']==0){
                            let msg = '<div class="alert alert-warning text-center" id="warning">'+data['msg']+'</div>';
                            $("#leaving_form_messages").empty().append(msg);
                        }else{
                            let msg = '<div class="alert alert-success text-center" id="success">'+data['msg']+'</div>';
                            $("#leaving_form_messages").empty().append(msg);
                            $("#leaving_form")[0].reset();
                        }
                  },
                  error: function (xhr, status, error) {
                    console.log('Error:', error);
                  }
                });//end ajax call here
          e.preventDefault();
        });  //end ticket_booking_form here



    }); //end ready function here

