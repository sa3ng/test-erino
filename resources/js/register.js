function checkPasswordInput() {
    // If passwords aren't the same, disable submit button
    if ($("#pass-register").val().normalize() != $("#re-pass-register").val().normalize()) {
        $("#pass-register").addClass("is-danger");
        $("#re-pass-register").addClass("is-danger");

        $('[name=error-pass]').removeClass("hidden");

        $("#register-submits").prop('disabled', true);
    } else {
        $("#pass-register").removeClass("is-danger");
        $("#re-pass-register").removeClass("is-danger");

        $("[name=error-pass]").addClass("hidden");

        $("#register-submits").prop('disabled', false);
    }
}

function noSpace() {
    id = "#" + this.id;

    value = $(id).val();

    console.log(id + " : " + value);

    $(id).val($(id).val().trim());
}

// JQuery Main
$(function () {

    // Trim on unfocus text area
    $('input').on('blur', function () {
        id = "#" + this.id;
        value = $(id).val();
        if (id != "#register-submits")
            $(id).val($(id).val().trim());
    });

    // Trim on demand per keystroke
    $('#pass-register').on('input', noSpace);
    $('#re-pass-register').on('input', noSpace);

    // Compare passwords per keystroke
    $('#pass-register').on('input', checkPasswordInput);
    $('#re-pass-register').on('input', checkPasswordInput);
});

