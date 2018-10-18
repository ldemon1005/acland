var url = $('.currentUrl').text();
$("#form-1").validate({
    ignore: [],
    rules: {
        'name': {
            required: true,
        },
        'email': {
            required: true,
            email: true,
        },
        'phone': {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 11
        }
    },
    messages: {
        'name': {
            required: "Bạn vui lòng nhập họ và tên",
        },
        'email': {
            required: "Bạn vui lòng nhập email",
            email: "Email không đứng định dạng",
        },
        'phone': {
            required: 'Vui lòng nhập số điện thoại',
            number: 'Số điện thoại là một dãy số',
            minlength: 'Số điện thoại không được nhỏ hơn 10 ký tự',
            maxlength: 'Số điện thoại không được lớn hơn 11 ký tự'
        }
    },
    errorPlacement: function(error,element) {
        return true;
    }
});

$("#form-2").validate({
    ignore: [],
    rules: {
        'name': {
            required: true,
        },
        'email': {
            required: true,
            email: true,
        },
        'phone': {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 11
        }
    },
    messages: {
        'name': {
            required: "Bạn vui lòng nhập họ và tên",
        },
        'email': {
            required: "Bạn vui lòng nhập email",
            email: "Email không đứng định dạng",
        },
        'phone': {
            required: 'Vui lòng nhập số điện thoại',
            number: 'Số điện thoại là một dãy số',
            minlength: 'Số điện thoại không được nhỏ hơn 10 ký tự',
            maxlength: 'Số điện thoại không được lớn hơn 11 ký tự'
        }
    },
    errorPlacement: function(error,element) {
        return true;
    }
});

$("#form-3").validate({
    ignore: [],
    rules: {
        'name': {
            required: true,
        },
        'email': {
            required: true,
            email: true,
        },
        'phone': {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 11
        }
    },
    messages: {
        'name': {
            required: "Bạn vui lòng nhập họ và tên",
        },
        'email': {
            required: "Bạn vui lòng nhập email",
            email: "Email không đứng định dạng",
        },
        'phone': {
            required: 'Vui lòng nhập số điện thoại',
            number: 'Số điện thoại là một dãy số',
            minlength: 'Số điện thoại không được nhỏ hơn 10 ký tự',
            maxlength: 'Số điện thoại không được lớn hơn 11 ký tự'
        }
    },
    errorPlacement: function(error,element) {
        return true;
    }
});

$("#form-4").validate({
    ignore: [],
    rules: {
        'name': {
            required: true,
        },
        'phone': {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 11
        }
    },
    messages: {
        'name': {
            required: "Bạn vui lòng nhập họ và tên",
        },
        'phone': {
            required: 'Vui lòng nhập số điện thoại',
            number: 'Số điện thoại là một dãy số',
            minlength: 'Số điện thoại không được nhỏ hơn 10 ký tự',
            maxlength: 'Số điện thoại không được lớn hơn 11 ký tự'
        }
    },
    errorPlacement: function(error,element) {
        return true;
    }
});



function submit_form_1(){
    if($('#form-1').valid()) {
        $('#form-1').submit();
        window.open(url + '/local/storage/app/client/file/thu moi.pdf');
    }
}

function submit_form_2(){
    if($('#form-2').valid()) {
        $('#form-2').submit();
        window.open(url + '/local/storage/app/client/file/thu moi.pdf');
    }
}

function submit_form_3(){
    if($('#form-3').valid()) {
        $('#form-3').submit();
        window.open(url + '/local/storage/app/client/file/thu moi.pdf');
    }
}

function submit_form_4(){
    if($('#form-4').valid()) {
        $('#form-4').submit();
        window.open(url + '/local/storage/app/client/file/thu moi.pdf');
    }
}
