$(document).ready(function () {

    // updating the view with notifications using ajax
    function load_unseen_notification(view = '',options) {

        $ .ajax({
            url: "emergency.php",
            type: "POST",
            data:{view:view,options:options},
            dataType: "json",
            success: function (data) {
                
                if(data.act == 'Y'){
                    console.log('ajax call was success');
                    $('#banner').html(data.alert);
                    console.log(data.act);
                    // if (data.cat == '0') {
                    //     delay = 0;
                    //     refresh(delay);
                    // } else if (delay.cat == '1') {
                    //     delay = 1;
                    //     refresh(delay);
                    // } else if (delay.cat == '2') {
                    //     delay = 2;
                    //     refresh(delay);
                    // }

                }else{
                    $('#banner').empty();
                   
                }
                
               
            }
        });
    }

   
    load_unseen_notification();


    $('#submitModal2').click(function(){

        var radioValue = $('form input:checked').val();
        if(radioValue == 'option1'){
            load_unseen_notification('YES','1');
        }else if(radioValue == 'option2'){
            load_unseen_notification('YES', '2');
        }else if(radioValue == 'option3'){
            load_unseen_notification('YES', '3');
        }else if(radioValue == 'option4'){
            load_unseen_notification('YES', '4');
        }else if(radioValue == 'option5'){
            load_unseen_notification('YES', '5');
        }else if(radioValue == 'option6'){
            
        }


        // load_unseen_notification('YES');
    });

    $('#emergency').click(function(){

        $.get("includes/getSessionInfo.php", function (data, status) {
            console.log(data.name);
            console.log(data.level);
            if(data.level == '1'){
                $('#dismissModal').show();
            }else{
                $('#dismissModal').hide();
            }


        },'json');
    });


    $('#dismissModal').click(function () {
        console.log('dismiss');
        // $('.count').html('');
        load_unseen_notification('NO');
    });

    // var shooter = 8200;
    // var fire = 9700;
    // var tornado = 9000;
    // var timedelay = 5000;
    
    setInterval(function () {
        load_unseen_notification();;
        console.log('setInterval again');
    },5000);

});


