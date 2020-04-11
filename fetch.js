$(document).ready(function () {

    // updating the view with notifications using ajax
    function load_unseen_notification(view = '') {

        // console.log('load unseen notification called');
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
                }else{
                    $('#banner').empty();
                }
                
            }
        });
    }

    // load_unseen_notification();
    // submit form and get new records
    
    // load new notifications
    $('#emergency').on('click', function () {
        
        // $('.count').html('');
        load_unseen_notification('YES');
    });

    $('#dismiss').click(function () {
        console.log('dismiss');
        // $('.count').html('');
        load_unseen_notification('NO');
       
    });

    setInterval(function () {
        load_unseen_notification();;
        console.log('setInterval again');
    }, 5000);


});
