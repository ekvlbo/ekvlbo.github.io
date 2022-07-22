$('.button').click(function (e) {

    e.preventDefault();
    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val();

    $.ajax({
        URL: 'vendor/aut.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success (data) {

            if (data.status) {
                document.location.href = '/profile.php'
            } else {
                $('.msg').removeClass(t, 'none').text(data.message);
            }
                
        }

    });
});