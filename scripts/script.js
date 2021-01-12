let loginForm = document.forms.loginForm,
    signupForm = document.forms.signupForm;

document.querySelectorAll('.error').forEach(error => {
    error.remove();
});

if (loginForm) {
    loginForm.onsubmit = () => {

        document.querySelectorAll('.error').forEach(error => {
            error.previousElementSibling.classList.remove('input--invalid');
            error.remove();
            return false;
        });

        let formData = new FormData(loginForm);

        let errors;

        if (loginForm.login.value == '')  {
            printError('login', 'Поле не заполнено');
            return false;
        }
        if (loginForm.password.value == '') {
            printError('password', 'Поле не заполнено');
            return false;
        }

        let xhr = new XMLHttpRequest();
        xhr.responseType = "json";
        xhr.open("POST", `/controllers/login.php`);
        xhr.send(formData);

        xhr.onload = function () {
            let response = xhr.response;

            if (response['success'] == 'ok') window.location.href = '/user';
            if (Object.keys(response['error']).length != 0) {
                printError('login', response['error']['login']);
                printError('password', response['error']['password']);
            }
        }

        return false;
    }
}

if (signupForm) {
    signupForm.onsubmit = () => {

        document.querySelectorAll('.error').forEach(error => {
            error.previousElementSibling.classList.remove('input--invalid');
            error.remove();
            return false;
        });

        if (signupForm.login.value == '')  {
            printError('login', 'Поле не заполнено');
            return false;
        }
        if (signupForm.email.value == '')  {
            printError('email', 'Поле не заполнено');
            return false;
        }
        if (signupForm.password.value == '') {
            printError('password', 'Поле не заполнено');
            return false;
        }
        if (signupForm.confirm_password.value == '')  {
            printError('confirm_password', 'Поле не заполнено');
            return false;
        }

        if (signupForm.password.value != signupForm.confirm_password.value) {
            printError('password', 'Пароли не совпадают');
            printError('confirm_password', 'Пароли не совпадают');
            return false;
        }

        if (signupForm.email.value.indexOf('@') == -1) {
            printError('email', 'Введите вверный email');
            return false;
        }

        let formData = new FormData(signupForm);

        let xhr = new XMLHttpRequest();
        xhr.responseType = "json";
        xhr.open("POST", `../controllers/signup.php`);
        xhr.send(formData);

        xhr.onload = function () {
            let response = xhr.response;

            if (response['success'] == 'ok') window.location.href = '/login';
            else {
                printError('login', response['error']['login']);
                printError('email', response['error']['email']);
            }
        }

        return false;
    }
}

let printError = (nameInput, message) => {
    let error = document.createElement('p');

    error.classList.add('error');
    error.textContent = message;
    document.querySelector('[for="' + nameInput + '"]').appendChild(error);
    document.querySelector('[for="' + nameInput + '"] > .input').classList.add('input--invalid');
}

let deleteError = (nameInput) => {
    let input = document.querySelector('[for="' + nameInput + '"]');
    input.removeChild(document.querySelector('[for="' + nameInput + '"] > .error'));
}