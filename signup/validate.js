function Validator() {

    var fields;

    this.create = function() {
        var fields = document.getElementsByClassName('field');

        for (var i = 0; i < fields.length; i++) {
            fields[i].onblur = checkFieldHandler;
        }

        var form = document.getElementById('registrationForm');
        form.onsubmit = checkForm;
    }

    var checkFieldHandler = function() {
        checkField(this);
    }

    var checkField = function(field) {
        if (!field.value) {
            field.classList.add('error');
            return false;
        } else {
            field.classList.remove('error');

            if (field.id === 'email') {
                console.log('check email');
                var result = checkEmail(field.value);
            }
            return true;
        }
    }

    var checkEmail = function(email) {

        url = 'http://localhost:8080/php/unit8/email.php?e=' + email;

        var callback = function(response) {
            var data = JSON.parse(response);
            var status = data.status;

            var errorField = document.getElementById('emailError');

            if (status === 'duplicate') {
                errorField.textContent = 'We already have this email registered.';
                errorField.classList.remove('hidden');
            } else {
                errorField.classList.add('hidden');
            }
        }

        httpGetAsync(url, callback);
    }

    var checkForm = function() {

        var status = true;

        for (var i = 0; i < fields.length; i++) {
            status = status && checkField(fields[i]);
        }

        return false;
    }
}

function httpGetAsync(url, callback) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            callback(xmlHttp.responseText);
        }
    }
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

window.onload = function() {
    var validator = new Validator();

    validator.create();
}
