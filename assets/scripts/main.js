$(document).ready(function () {

    $("#play").on("click", function () {

        $("#play").hide();
        $("#pause").show();

    });

    $("#pause").on("click", function () {

        $("#pause").hide();
        $("#play").show();

    });

    $("#vol").on("click", function () {

        $("#vol").hide();
        $("#vol-mute").show();

    });

    $("#vol-mute").on("click", function () {

        $("#vol-mute").hide();
        $("#vol").show();

    });

});