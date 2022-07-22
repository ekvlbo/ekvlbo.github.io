$("#send").on("click", function() {
    var login = $("#login").val().trim();
    var password = $("#password").val().trim();
    var confpass = $("#confpass").val().trim();
    var email = $("#email").val().trim();
    var name = $("#name").val().trim();

    $.ajax({
        URL: 'validation-form/check.php',
        type: 'POST',
        dataType: 'json', 
        data: {
            login: login,
            password: password,
            confpass: confpass,
            email: email,
            name: name
        }, success: function () {
            $('p.out'). text('Данные отправлены');
        }
    })

    if(login.length < 6 || login.length > 6 ) {
            $("#errorMess").text("Недопустимая длина логина");
            return false;
    } else if (password.length != 2 || password != /^[A-Za-Z0-9]+$/i.test(password)) {
        $("#errorMess").text("Пароль должен состоять из 6 символов, наличие букв и цифр");
            return false;
    } else if (confpass != password) {
        $("#errorMess").text("Пароли не совпадают!");
            return false;
    } else if (email != /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/i.test(email)) {
        $("#errorMess").text("Введите корректный e-mail");
            return false;
    } else if (name.length != 2 || name != /^[a-Za-z]+$/i.test(name)) {
        $("#errorMess").text("Name должен состоять из 2 букв");
            return false;
    } 

});