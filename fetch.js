$(document).ready(function () {

    // updating the view with notifications using ajax
    function load_unseen_notification(view = '') {

        // console.log('load unseen notification called');
        $ .ajax({
            url: "alert.php",
            type: "POST",
            data:{view:view},
            dataType: "json",
            success: function (data) {
                console.log(data.alert);
                $('#banner').html(data.alert);
            }
        });
    }



    // load_unseen_notification();
    // submit form and get new records
    
    // load new notifications
    $('#alert').on('click', function () {
        
        // $('.count').html('');
        load_unseen_notification('yes');
    });

    setInterval(function () {
        load_unseen_notification();;
        console.log('hello');
    }, 5000);

    $('#dismiss').on('click',function (){
        $.ajax({
            url: "alert.php",
            type: "POST",
            data: { alert: 'alertOFF' },
            dataType: "json",
            success: function () {
                // console.log(data.alert);
                $('#banner').hide();
            }
        });
    });
});
