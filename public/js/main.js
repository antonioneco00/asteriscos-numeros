var url = 'http://asteriscos-numeros.com.devel/';
var likeColor = 'dark';
var theme = localStorage.getItem('theme');

function themeDark() {
    localStorage.setItem('theme', 'dark');

    likeColor = 'white';

    $('.sun').attr('src', url + 'img/moon.png');
    $('.sun').addClass('moon').removeClass('sun');
    $('body').css('background-image', "url(" + url + "img/pattern-dark.svg)");
    $('#logo').attr('src', url + 'img/logo-dark.png');
    $('.navbar').addClass('navbar-dark bg-dark text-info').removeClass('navbar-light bg-light-grad');
    $('.dropdown-menu').addClass('dropdown-menu-dark');
    $('.card').addClass('bg-dark').removeClass('bg-light');
    $('.card-header').removeClass('bg-info text-light').addClass('bg-dark text-info');
    $('.card-header a').removeClass('text-light').addClass('text-info');
    $('.form-control').removeClass('bg-light').addClass('bg-gray-dark text-light');
    $('.form-select').addClass('bg-dark text-light');
    $('textarea').addClass('bg-dark text-light');
    $('.table').addClass('table-dark');
    $('.btn-grad').removeClass('btn-grad-light').addClass('btn-grad-dark');
    $('.card-body').addClass('bg-gray-dark text-light').removeClass('bg-light text-dark');
    $("span[style='color: #0000BB']").attr('style', 'color: #0dcaf0');
    $("span[style='color: #007700']").attr('style', 'color: #80e480');
    $("span[style='color: #DD0000']").attr('style', 'color: #ff3434');
    $('.card-footer').removeClass('light-blue').addClass('bg-dark text-light');
    $("nav[role='navigation'] a, nav[role='navigation'] span").removeClass('bg-white').addClass('bg-dark border-dark');
    $("nav[role='navigation'] span").addClass('text-light');
    $('.like-symbol').attr('src', url + 'img/like-white.png');
    $('.edit a img').attr('src', url + 'img/edit-blue.png');
    $('.delete a img').attr('src', url + 'img/delete-white.png');
    $('#theme').attr('onclick', 'themeLight()');
}

function themeLight() {
    localStorage.setItem('theme', 'light');

    likeColor = 'dark';

    $('.moon').attr('src', url + 'img/sun.png');
    $('.moon').addClass('sun').removeClass('moon');
    $('body').css('background-image', "url(" + url + "img/pattern.svg)");
    $('#logo').attr('src', url + 'img/logo.png');
    $('.navbar').addClass('navbar-light bg-light-grad').removeClass('navbar-dark bg-dark');
    $('.card').addClass('bg-light').removeClass('bg-dark');
    $('.card-header').removeClass('bg-dark text-info').addClass('bg-info text-light');
    $('.card-header a').removeClass('text-info').addClass('text-light');
    $('.form-control').removeClass('bg-gray-dark text-light').addClass('bg-light');
    $('.form-select').removeClass('bg-dark text-light');
    $('textarea').removeClass('bg-dark text-light');
    $('.table').removeClass('table-dark');
    $('.btn-grad').removeClass('btn-grad-dark').addClass('btn-grad-light');
    $('.card-body').addClass('bg-light text-dark').removeClass('bg-gray-dark text-light');
    $("span[style='color: #0dcaf0']").attr('style', 'color: #0000BB');
    $("span[style='color: #80e480']").attr('style', 'color: #007700');
    $("span[style='color: #ff3434']").attr('style', 'color: #DD0000');
    $('.card-footer').removeClass('bg-dark text-light').addClass('light-blue');
    $("nav[role='navigation'] a, nav[role='navigation'] span").removeClass('bg-dark border-dark').addClass('bg-white');
    $("nav[role='navigation'] span").removeClass('text-light');
    $('.like-symbol').attr('src', url + 'img/like-dark.png');
    $('.edit a img').attr('src', url + 'img/edit.png');
    $('.delete a img').attr('src', url + 'img/delete.png');
    $('#theme').attr('onclick', 'themeDark()');
}

if (theme == 'dark') {
    themeDark();
} else {
    themeLight();
}

$(document).ready(() => {
    $('body').show();

    function like() {
        $('.btn-like').unbind('click').click(function() {
            console.log('Like');

            $(this).find('.like-symbol').attr('src', url + 'img/like-blue.png');
            $(this).find('.like-symbol').addClass('remove-like-symbol').removeClass('like-symbol');
            $(this).addClass('btn-remove-like').removeClass('btn-like');

            $.ajax({
                url: url + 'like/' + $(this).data('id'),
                type: 'GET',
                success: function(response) {
                    console.log(response);
                }
            });

            removeLike();
        });
    }

    like();
    
    function removeLike() {
        $('.btn-remove-like').unbind('click').click(function() {
            console.log('Like eliminado');
            
            $(this).find('.remove-like-symbol').attr('src', url + 'img/like-' + likeColor + '.png');
            $(this).find('.remove-like-symbol').addClass('like-symbol').removeClass('remove-like-symbol');
            $(this).addClass('btn-like').removeClass('btn-remove-like');

            $.ajax({
                url: url + 'like/eliminar/' + $(this).data('id'),
                type: 'GET',
                success: function(response) {
                    console.log(response);
                }
            });

            like();
        });
    }
    
    removeLike();

    for (option of $('#type option')) {
        if (option.getAttribute('value') == $('#type').data('type')) {
            option.setAttribute('selected', 'true');
        }
    }

    for (option of $('#category option')) {
        if (option.getAttribute('value') == $('#category').data('category')) {
            option.setAttribute('selected', 'true');
        }
    }
});