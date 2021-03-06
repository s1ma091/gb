$(document).ready(function () {
    console.dir('ua')
    if (!$.cookie('lang')) {
        $.cookie('lang', 'en')
    }
    $('[name="en"]').click(function () {
        $.cookie('lang', 'en')
        location.reload();

    })
    $('[name="ua"]').click(function () {
        $.cookie('lang', 'ua')
        location.reload();

    })
    var els = $('[translatable]');
    if ($.cookie('lang') == 'ua') {
        console.dir('ua')
        $(function () {
            $.getJSON('json/ua.json', function (data) {
                Array.prototype.map.call(els, function (element) {
                    if (element.innerText) {
                        element.innerText = data[element.innerText];
                    } else if (element.value) {
                        element.value = data[element.value];
                    } else {
                        element.placeholder = data[element.placeholder]
                    }
                    element.style.opacity = 1;


                })
            })
        })
    } else if ($.cookie('lang') == 'en') {
        $(function () {
            $.getJSON('json/en.json', function (data) {
                Array.prototype.map.call(els, function (element) {
                    if (element.innerText) {
                        element.innerText = data[element.innerText];
                    } else if (element.value) {
                        element.value = data[element.value];
                    } else {
                        element.placeholder = data[element.placeholder]
                    }
                    element.style.opacity = 1;
                })
            })

        })
    }
    $("#add-form").submit(function (e) {
        if ($("#addform-name").val() == '') {
            e.preventDefault();
            $('#name').text('Name required')
        } else {
            $('#name').text('')
        }
        if ($(".message").html() == '') {
            e.preventDefault();
            $('#message').text('Message required')
        } else {
            $('#message').text('')
        }
        if (!strings_isemail($("#addform-email").val())) {
            e.preventDefault();
            $('#email').text('Email required')
        } else {
            $('#email').text('')
        }
        if ($("#addform-verifycode").val() == '') {
            e.preventDefault();
            $('#addform-verifycode').next('.help-block').text('Write letters from image');
        } else {
            $('.help-block').text('');
        }
    });
    $('.cancelbtn').click(function () {
        header("Location:index.php")
    })
    $('#login').submit(function (e) {
        if ($("#loginform-username").val() == '' || $("#loginform-password").val() == '') {
            e.preventDefault();
        }
    })
});

function isValidUrl(url) {
    var objRE = /^(?:(?:https?|ftp|telnet):\/\/(?:[a-z0-9_-]{1,32}(?::[a-z0-9_-]{1,32})?@)?)?(?:(?:[a-z0-9-]{1,128}\.)+(?:com|net|org|mil|edu|arpa|ru|gov|biz|info|aero|inc|name|[a-z]{2})|(?!0)(?:(?!0[^.]|255)[0-9]{1,3}\.){3}(?!0|255)[0-9]{1,3})(?:\/[a-z0-9.,_@%&?+=\~\/-]*)?(?:#[^ \'\"&<>]*)?$/i;
    return objRE.test(url);
}

function strings_isemail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
$(".message").keyup(function () {
    return $("#addform-message").val($(".message").html());
})
$(".strong").mousedown(function () {
    getSelectEl()
    document.execCommand("bold", "false", "false");
    $(".message").keyup()
})
$(".italic").mousedown(function () {
    getSelectEl()
    document.execCommand("italic", "false", "false");
    $(".message").keyup()
})
$(".strike").mousedown(function (element) {
    getSelectEl()
    document.execCommand("strikeThrough", "false", "false");
    $(".message").keyup()
})
$(".link").mousedown(function () {
    $('#message').text('')
    getSelectEl()
    if (!isValidUrl(txt)) {
        $('#message').text('Add valid URL')
    } else {
        document.execCommand("createLink", "true", txt);
        $(".message").keyup();
        $('#addform-message').text('')
    }
})

function getSelectEl() {
    if (window.getSelection) {
        return txt = window.getSelection().toString();
    } else if (document.getSelection) {
        return txt = document.getSelection();
    } else if (document.selection) {
        return txt = document.selection.createRange().text;
    }
}