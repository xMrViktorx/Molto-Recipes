        function validateForm() {
            var email = document.forms["signupForm"]["mail"].value;
            var username = document.forms["signupForm"]["uid"].value;
            var password = document.forms["signupForm"]["pwd"].value;
            var passwordRepeat = document.forms["signupForm"]["pwd-repeat"].value;

            var emailReg = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
            var usernameReg = /^[a-zA-Z0-9]*$/;

            var emailResult = emailReg.test(email);
            if (emailResult == false) {
                document.getElementById("emailerror").innerHTML = "E-mail is not valid!";
                mail.style.borderColor = "red";
                return false
            }

            if (!usernameReg.test(username)) {
                document.getElementById("usernameerror").innerHTML = "Username is not valid!";
                usern.style.borderColor = "red";
                return false
            }

            if (password != passwordRepeat) {
                document.getElementById("passworderror").innerHTML = "Password and Password again is not equal!";
                pwdagain.style.borderColor = "red";
                return false
            }
        }
