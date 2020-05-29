// check empty email register join newsletter
function isEmptyEmail() {
    var email = document.getElementById('form-input__email').value;
    if (email == '' || email == null || email == undefined) {
        alert('Error! Email is not null!');
        return false;
    } else {
        return true;
    }
}

// up to quantity product
function quantityUp() {
    document.getElementById('input_quantity').value++;
}

function quantityDown() {
    var currentQuantity = document.getElementById('input_quantity').value;
    if(currentQuantity > 1) {
        document.getElementById('input_quantity').value--;
    } 
}
// up to quantity product - end

function currentQuantityCart() {

}

// Validate form login
function checkLogin() {
    var username = document.getElementById('username-login').value;
    var password = document.getElementById('password-login').value;

    flag = true;

    if (username.length < 5 || username == '' || username == null) {
        document.getElementById('username-login-error').style.display = 'inline';
        document.getElementById('username-login').style.borderColor = '#ff0000';
        document.getElementById('username-login').focus();
        flag = false;
    } else if (password.length < 5 || password == '' || password == null) {
        document.getElementById('password-login-error').style.display = 'inline';
        document.getElementById('password-login').style.borderColor = '#ff0000';
        document.getElementById('password-login').focus();
        flag = false;
    }

    if (flag == false) {
        return false;
    } else {
        return true;
    }
}

function checkUsernameLogin() {
    var username = document.getElementById('username-login').value;
    if(username.length < 5 || username == '' || username == null) {
        document.getElementById('username-login-error').style.display = 'inline';
        document.getElementById('username-login').style.borderColor = '#ff0000';
        document.getElementById('username-login').focus();
        return false;
    } else {
        document.getElementById('username-login-error').style.display = 'none';
        document.getElementById('username-login').style.borderColor = '#1dbfaf';
        return true;
    }
}

function checkPasswordLogin() {
    var password = document.getElementById('password-login').value;
    if(password.length < 5 || password == '' || password == null) {
        document.getElementById('password-login-error').style.display = 'inline';
        document.getElementById('password-login').style.borderColor = '#ff0000';
        document.getElementById('password-login').focus();
        return false;
    } else {
        document.getElementById('password-login-error').style.display = 'none';
        document.getElementById('password-login').style.borderColor = '#1dbfaf';
        return true;
    }
}
// Validate form login - end

// Validate form register
function checkRegister() {
    var name = document.getElementById('name').value;
    var phone = document.getElementById('phone').value;
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('password2').value;

    var flag = true;

    if (name == '' || name == null) {
        document.getElementById('name-error').style.display = 'inline';
        document.getElementById('name').style.borderColor = '#ff0000';
        document.getElementById('name').focus();
        flag = false;
    } else if (phone < 99999999 || phone > 9999999999) {
        document.getElementById('name-error').style.display = 'none';
        document.getElementById('phone-error').style.display = 'inline';
        flag = false;
    } else if (username == '' || username == null) {
        document.getElementById('name-error').style.display = 'none';
        document.getElementById('phone-error').style.display = 'none';
        document.getElementById('username-error').style.display = 'inline';
        flag = false;
    } else if (password == '' || password == null) {
        document.getElementById('name-error').style.display = 'none';
        document.getElementById('phone-error').style.display = 'none';
        document.getElementById('username-error').style.display = 'none';
        document.getElementById('password-error').style.display = 'inline';
        flag = false;
    } else if (confirmPassword == '' || confirmPassword != password) {
        document.getElementById('name-error').style.display = 'none';
        document.getElementById('phone-error').style.display = 'none';
        document.getElementById('username-error').style.display = 'none';
        document.getElementById('password-error').style.display = 'none';
        document.getElementById('password2-error').style.display = 'inline';
        flag = false;
    }

    if (flag == false) {
        return false;
    } else {
        return true;
    }
}

function checkName() {
    var name = document.getElementById('name').value;
    if(name.length < 5 || name == '' || name == null) {
        document.getElementById('name-error').style.display = 'inline';
        document.getElementById('name').style.borderColor = '#ff0000';
        document.getElementById('name').focus();
        return false;
    } else {
        document.getElementById('name-error').style.display = 'none';
        document.getElementById('name').style.borderColor = '#1dbfaf';
        return true;
    }
}

function checkPhone() {
    var phone = document.getElementById('phone').value;
    if(phone < 99999999 || phone > 9999999999) {
        document.getElementById('phone-error').style.display = 'inline';
        document.getElementById('phone').style.borderColor = '#ff0000';
        document.getElementById('phone').focus();
        return false;
    } else {
        document.getElementById('phone-error').style.display = 'none';
        document.getElementById('phone').style.borderColor = '#1dbfaf';
        return true;
    }
}

function checkUsername() {
    var username = document.getElementById('username').value;
    if(username.length < 5 || username == '' || username == null) {
        document.getElementById('username-error').style.display = 'inline';
        document.getElementById('username').style.borderColor = '#ff0000';
        document.getElementById('username').focus();
        return false;
    } else {
        document.getElementById('username-error').style.display = 'none';
        document.getElementById('username').style.borderColor = '#1dbfaf';
        return true;
    }
}

function checkPassword() {
    var password = document.getElementById('password').value;
    if(password.length < 5 || password == '' || password == null) {
        document.getElementById('password-error').style.display = 'inline';
        document.getElementById('password').style.borderColor = '#ff0000';
        document.getElementById('password').focus();
        return false;
    } else {
        document.getElementById('password-error').style.display = 'none';
        document.getElementById('password').style.borderColor = '#1dbfaf';
        return true;
    }
}

function checkConfirmPassword() {
    var password2 = document.getElementById('password2').value;
    var password = document.getElementById('password').value;

    if(password2 == '' || password2 != password) {
        document.getElementById('password2-error').style.display = 'inline';
        document.getElementById('password2').style.borderColor = '#ff0000';
        document.getElementById('password2').focus();
        return false;
    } else {
        document.getElementById('password2-error').style.display = 'none';
        document.getElementById('password2').style.borderColor = '#1dbfaf';
        return true;
    }
}
// Validate form register - end

// Validate form password recovery request
function checkEmailRequest() {
    var email = document.getElementById('email-request').value;

    if (email.length < 5 || email == '' || email == null) {
        document.getElementById('email-request-error').style.display = 'inline';
        document.getElementById('email-request').style.borderColor = '#ff0000';
        document.getElementById('email-request').focus();
    }
}
// Validate form password recovery request - end

// gototop
function goToTop() {
    if (window.jQuery) {
		//jQuery().animate(): để tạo hành động tùy chỉnh
		//Phương thức scrollTop() thiết lập hoặc trả về vị trí thanh cuộn dọc cho các phần tử được chọn.
        	jQuery('html,body').animate({ scrollTop: 0 }, 'slow');
    } else {
		//Phương thức scrollIntoView() cuộn phần tử được chỉ định vào vùng hiển thị của cửa sổ trình duyệt.
        document.getElementsByClassName('top')[0].scrollIntoView({
			behavior: 'smooth',  //xác định hình ảnh chuyển tiếp tự động
			block: 'start',		//chạy theo chiều dọc dừng ở đầu trang.
		});
		
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
}
