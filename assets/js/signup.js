// const forms = document.getElementById('form')
const username = document.getElementById('username')
const email = document.getElementById('email')
const password = document.getElementById('password')
const password2 = document.getElementById('password2')
const btnSignup = document.getElementById('btn-signup')
var success = false;

btnSignup.addEventListener('click', e => {
	e.preventDefault();

	checkInputs();
    if (success) {
        $.ajax({
            url: './backend.php?action=signup',
            type: 'POST',
            data: {
                username: username.value,
                email: email.value,
                password: password.value
            },
        success: function(data) {
            data = JSON.parse(data);
            if (data.status)
            {
                alert(data.message);
                window.location.href = './';
                return;
            }
            alert(data.message);
        },
        error: function(data) {
            
        }
        });
    }
});

function checkInputs() {
    success = true;
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();

    if (usernameValue === '') {
        setErrorFor(username, 'Tên đăng nhập không thể để trống')
        success = false
    } else {
        setSuccessFor(username);
    }

    if(emailValue === '') {
		setErrorFor(email, 'Email không thể để trống');
        success = false
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Email không hợp lệ');
        success = false
	} else {
		setSuccessFor(email);
	}
	
	if(passwordValue === '') {
		setErrorFor(password, 'Mật khẩu không thể để trống');
        success = false
	} else {
		setSuccessFor(password);
	}
	
	if(password2Value === '') {
		setErrorFor(password2, 'Nhập lại mật khẩu không thể để trống');
        success = false
	} else if(passwordValue !== password2Value) {
		setErrorFor(password2, 'Nhập lại mật khẩu không đúng');
        success = false
	} else{
		setSuccessFor(password2);
	}
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'element form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'element form-control success';
}
	
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

const btnLogin = document.getElementById('btn-login');
const inpUser = document.getElementById('inp-user');
const inpPass = document.getElementById('inp-pass');

btnLogin.addEventListener('click', e => {
	e.preventDefault();

	$.ajax({
        url: './backend.php?action=login',
        type: 'POST',
        data: {
            username: inpUser.value,
            password: inpPass.value
        },
        success: function(data) {
            data = JSON.parse(data);
            if (data.status)
            {
                alert(data.message);
                window.location.href = './';
                return;
            }
            alert(data.message);
        }
    });
});