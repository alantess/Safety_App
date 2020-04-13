$(document).ready(function () {

    // updating the view with notifications using ajax
    function load_unseen_notification(view = '', options) {

        $.ajax({
            url: "emergency.php",
            type: "POST",
            data: { view: view, options: options },
            dataType: "json",
            success: function (data) {

                console.log(data.act)
                console.log(data.alert)
                console.log(data.cat)

                if (data.act == 'Y') {

                    console.log('ajax call was success');
                    
                    if(data.cat == '0' || data.cat == '1' || data.cat == '2'){
                        $('#banner').html(data.alert);
                        console.log(data.alert);
                    }else if(data.cat == '3'|| data.cat == '4' || data.cat =='5'){

                        console.log(data.alert);
                    }else if (data.cat == '6'){
                        console.log(data.comment)

                        // $('.dropdown-menu').append(
                            
                        //     '<p class="dropdown-itme">'+data.comment+'</p>'
                        // );
                    }
                   

                } else {
                    $('#banner').empty();

                }


            }
        });
    }


    load_unseen_notification();


    $('#submitModal2').click(function () {

        var radioValue = $('form input:checked').val();
        if (radioValue == 'option0') {
            load_unseen_notification('YES', '0');
        } else if (radioValue == 'option1') {
            load_unseen_notification('YES', '1');
        } else if (radioValue == 'option2') {
            load_unseen_notification('YES', '2');
        } else if (radioValue == 'option3') {
            load_unseen_notification('YES', '3');
        } else if (radioValue == 'option4') {
            load_unseen_notification('YES', '4');
        } else if (radioValue == 'option5') {
            load_unseen_notification('YES', '5');
        } 

        // load_unseen_notification('YES');
    });




    // $('#emergency').click(function(){
        
        
    // });
    

   
    $('#dismissModal').click(function () {
        console.log('dismiss');
        load_unseen_notification('NO', '6');
    });

    // var shooter = 8200;
    // var fire = 9700;
    // var tornado = 9000;
    // var timedelay = 5000;

    setInterval(function () {
        load_unseen_notification();;
        console.log('setInterval again');
    }, 5000);

});


