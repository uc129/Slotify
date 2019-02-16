$(document).ready(function () {

    $("#sign-up-link").click(function () {

        $("#sign-in-form").hide();
        $("#sign-up-form").show();


    });


    $("#sign-in-link").click(function () {

        $("#sign-up-form").hide();
        $("#sign-in-form").show();

    });

    $("#login_button").on("click", function () {

        $("#sign-in-form").show();
        $("#sign-up-form").hide();

    });

    $("#signup_button").on("click", function () {

        $("#sign-up-form").show();
        $("#sign-in-form").hide();


    })
});