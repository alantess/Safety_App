$(document).ready(function () {

    // updating the view with notifications using ajax
    function load_unseen_notification(view = '') {

        var level;

        $ .ajax({
            url: "emergency.php",
            type: "POST",
            data:{view:view},
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
    // submit form and get new records
    
    // load new notifications
    // $('#emergency').on('click', function () {
        
    //     // $('.count').html('');
    //     load_unseen_notification('YES');
    // });

    $('#dismiss').click(function () {
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


