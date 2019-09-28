<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<style>
    .block {
        width: 28%;
        margin: 8px;
        padding: 8px;
        display: inline-block;
    }

    #js-errors {
        color: red;
        font-weight: 700;
    }
</style>

<div class="block">
    <p>Sign In</p>
    <form action="{{ route('guest.sign_in') }}" method="post">
        @csrf
        <p>
            <input type="email" name="email" placeholder="Email">
        </p>
        <p>
            <input type="password" name="password" placeholder="Password">
        </p>
        <p>
            <button type="submit">Sign In</button>
        </p>
    </form>
</div>

<div class="block">
    <p>Sign Up</p>
    <form action="{{ route('guest.sign_up') }}" method="post" id="sign-up-form">
        @csrf
        <p>
            <input type="text" name="name" id="user-name" placeholder="ex. John Doe">
        </p>
        <p>
            <input type="email" name="email" id="user-email" placeholder="Email">
        </p>
        <p>
            <input type="password" name="password" id="user-pwd" placeholder="Password">
        </p>
        <p>
            <input type="password" name="password_confirmation" id="user-pwd-confirmation"
                   placeholder="Repeat Password">
        </p>

        <p id="js-errors"></p>

        <p>
            <button type="button" id="sign-up-btn">Sign Up</button>
        </p>
    </form>
</div>

<script>
    let errors = document.getElementById('js-errors');

    function applyStyle(element, attr, value) {
        element['style'][attr] = value;
    }

    function signUpFormValidation() {
        applyStyle(errors, 'display', 'none');
        errors.innerText = '';

        let form = document.getElementById('sign-up-form'),
            errorsList = [],
            name = document.getElementById('user-name').value,
            email = document.getElementById('user-email').value,
            pwd = document.getElementById('user-pwd').value,
            pwdConfirm = document.getElementById('user-pwd-confirmation').value;

        if (!name.length) {
            errorsList.push('Name can\'t be empty!');
        }
        if (!email.length) {
            errorsList.push('Email can\'t be empty!');
        }
        if (!pwd.length) {
            errorsList.push('Password can\'t be empty!');
        }
        if (!pwdConfirm.length) {
            errorsList.push('Password Confirmation can\'t be empty!');
        }
        if (pwd !== pwdConfirm) {
            errorsList.push('Passwords doesn\'t match!');
        }

        if (errorsList.length) {
            errors.appendChild(document.createElement('ul'));
            console.log(errors.childNodes[0]);
            for (let ei = 0; ei < errorsList.length; ei++) {
                let liElement = document.createElement('li');
                liElement.textContent = errorsList[ei];

                errors.childNodes[0]
                    .appendChild(
                        liElement
                    );
            }
            applyStyle(errors, 'display', 'block');

            return;
        }

        form.submit();
    }

    document.addEventListener('DOMContentLoaded', function () {
        applyStyle(errors, 'display', 'none');

        /** Adding a listener for the button **/
        document
            .getElementById('sign-up-btn')
            .addEventListener('click', signUpFormValidation);
    });
</script>

</body>
</html>
