$(document).ready(function () {
    // updating the view with notifications using ajax
    function load_unseen_notification(view = '') {
        $ .ajax({
            url: "alert.php",
            method: "POST",
            data: {view:view},
            dataType: "json",
            success: function (data) {
                
                $('#banner').html(data.alert);
            }
        });
    }
    load_unseen_notification();
    // submit form and get new records
    
    // load new notifications
    $('#alert').on('click', function () {
        // $('.count').html('');
        load_unseen_notification('yes');
        view = '';
    });

    setInterval(function () {
        load_unseen_notification();;
        console.log(hello);
    }, 5000);
});
