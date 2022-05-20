var screen_1076 = window.matchMedia("(max-width: 1076px)");
var screen_490 = window.matchMedia("(max-width: 490px)");

if (screen_1076.matches) {
    var btn_grad_light = $('.btn-grad-light');

    $('#tutorial .btn-grad-light').remove();
    $('#tutorial').append(btn_grad_light);
}

if (screen_490.matches) {
    $('#category, #type').removeClass('form-select-index').addClass('w-100');
}