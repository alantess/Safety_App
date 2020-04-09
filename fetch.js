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
                console.log('ajax call was success');
                $('#banner').html(data.alert);
            }
        });
    }



    // load_unseen_notification();
    // submit form and get new records
    
    // load new notifications
    $('#alert').on('click', function () {
        
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
        console.log('hello');
    }, 5000);


    // $('#dismiss').on('click',function (view2){
    //     $.ajax({
    //         url: "alert.php",
    //         type: "POST",
    //         data: {view2:view2},
    //         dataType: "json",
    //         success: function () {
    //             // console.log(data.alert);
    //             console.log('stopping alert system');
    //             $('#banner').hide();
    //         }
    //     });
    // });
});
