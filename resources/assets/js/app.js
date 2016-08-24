$(document).ready(function () {
    PNotify.prototype.options.styling = "fontawesome";

    $('.navbar-toggle-sidebar').click(function () {
        $('.navbar-nav').toggleClass('slide-in');
        $('.side-body').toggleClass('body-slide-in');
        $('#search').removeClass('in').addClass('collapse').slideUp(200);
    });

    $('#search-trigger').click(function () {
        $('.navbar-nav').removeClass('slide-in');
        $('.side-body').removeClass('body-slide-in');
        $('.search-input').focus();
    });

    $(document).pjax('a[data-pjax]', '#pjax-container', {timeout: 5000});

    $(document).on('pjax:send', function () {
        $('#pjax-container').html(ajaxIcon())
    });

    $(document).on('pjax:complete ready', function () {
        call_pickadate();
        call_form_pjax();
        call_btn_delete();
        call_select2();
        call_pagination();
        call_datatable();
    });

});
function call_select2(){
    if ($(".select2") != undefined){
        $(".select2").select2();
    }
}
function call_form_pjax(){
    $("form[data-pjax]").submit(function(event){
        event.preventDefault();
        $(this).find(".icon-loading-btn").addClass('fa-spinner fa-spin');
        form_ajax($(this).serialize(), $(this).attr('action'), $(this).attr('method'));
    });
}

function call_pagination(){
    if ($('.pagination').length > 0){
        $('.pagination').find('a').attr('data-pjax','');
    }
}
function call_btn_delete(){
    $(".btn-delete").click(function(){
        var answer = areYouSure();
        if (answer) {
            var tr = $(this).closest('tr');
            tr.hide('slow');
        }
    });
}
function call_datatable(){
        if ($(".datatable") != undefined) {
            $(".datatable").DataTable();
        }
}
function call_pickadate() {
    if ($(".pickadate") != undefined) {
        $(".pickadate").pickadate({
            format: "yyyy/m/d"
        });
    }
}
function form_ajax(data, url, method='POST') {
    $.ajax({
        url: url,
        method: method,
        data: data,
        success: function () {
            console.log('AJAX OK');
            $(".icon-loading-btn").removeClass('fa-spinner fa-spin');

            var success_text = $("input[name='success_text']").val();
            if (success_text == undefined) {
                success_text = 'OK';
            }
            showNotify('success', success_text);
        },
        error: function (errors) {
            if (errors.reponseJSON != '') {
                // If has error from server. Get it!
                var err_str = '';
                $.each(errors.responseJSON, function (key, value) {
                    err_str += "<li>" + value + "</li>";
                });
                err_str = "<ul>" + err_str + "</ul>";
                $(".icon-loading-btn").removeClass('fa-spinner fa-spin');
                showNotify('error', err_str, 'Error!');
            }
            else {
                // Error from form defined
                var error_text = $("input[name='error_text']").val();

                if (typeof error_text == undefined) {
                    error_text = 'OK';
                }
                $(".icon-loading-btn").removeClass('fa-spinner fa-spin');
                showNotify('error', error_text);
            }
        }
    });
}


function showNotify(type, text, title = '') {
    switch (type) {
        case 'info':
            title = 'Updated!';
            break;
        case 'success':
            title = 'Success!';
            break;
        case 'error':
            title = 'Error!';
            break;
    }
    new PNotify({
        title: title,
        text: text,
        type: type
    });
    clearHiddenText();
}

function ajaxIcon() {
    var html = `
        <p style='text-align: center'>
            <img src='${url('img/loading.gif')}'>
        </p>
    `;
    return html;
}

function clearHiddenText() {
    $("input[name='success_text']").val('');
    $("input[name='info_text']").val('');
    $("input[name='error_text']").val('');
}

function areYouSure() {
    return window.confirm("DELETE THIS? IT CAN'T BE UNDONE");
}
