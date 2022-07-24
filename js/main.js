        //Авторизация
$('.send-button').click(function (e) {

    e.preventDefault();

    $(`input`).removeClass('error');
    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val();

    $.ajax({
        url: 'vendor/aut.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success: function (data) {

            if (data.status) {
                document.location.href = 'profile.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }
                $('.msg').removeClass('none').text(data.message);
            }


        }

    });
});

    //Регистрация
    $('.reg-button').click(function (e) {

        e.preventDefault();
    
        $(`input`).removeClass('error');
        let login = $('input[name="login"]').val(),
            password = $('input[name="password"]').val(),
            confpass = $('input[name="confpass"]').val(),
            email = $('input[name="email"]').val(),
            name = $('input[name="name"]').val();    
        $.ajax({
            url: 'vendor/check.php',
            type: 'POST',
            dataType: 'json',
            data: {
                login: login,
                password: password,
                confpass: confpass,
                email: email,
                name: name
            },
            success: function (data) {
    
                if (data.status) {
                    document.location.href = 'index.php';
                } else {
    
                    if (data.type === 1) {
                        data.fields.forEach(function (field) {
                            $(`input[name="${field}"]`).addClass('error');
                        });
                    }
                    $('.msg').removeClass('none').text(data.message);
                }
    
    
            }
    
        });
    });