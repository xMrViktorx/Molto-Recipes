<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Molto Recipes - Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="signup.css">
    <link rel="icon" type="image/x-icon" href="" />
</head>

<body>
    <div class="sign-up-section">
        <div class="sign-up-left">
            <img src="img/Molto_Recipes_Logo_white.png" alt="whitelogo">
            <p>Join Us</p>
            <p id="quote">„Good recipe, good food”</p>
            <p id="signed">-Molto recipes</p>
            <a href="#">About Us</a>
        </div>
        <div class="sign-up-right">
            <p id="sign-up">Sign Up</p>
            <form action="includes/signup.inc.php" method="POST" name="signupForm" onsubmit="return validateForm()">
                <input type="text" name="lastname" placeholder="Last name" required><br>
                <input type="text" name="firstname" placeholder="First name" required><br>
                <input type="text" name="uid" id="usern" placeholder="Username" required><br>
                <p id="usernameerror" style="color: #f00; text-align:left;"></p>
                <?php
                if(isset($_GET['error'])){
                    $errortype = $_GET['error'];
                    if($errortype=="username")
                    echo "<p style='color: #f00; text-align:left'>The username is already taken!</p>";
                }
                
                ?>
                <input type="email" name="mail" id="mail" placeholder="E-mail" required><br>
                <p id="emailerror" style="color: #f00; text-align:left;"></p>
                <?php
                if(isset($_GET['error'])){
                    $errortype = $_GET['error'];
                    if($errortype=="email")
                    echo "<p style='color: #f00; text-align:left'>The e-mail is already taken!</p>";
                }
                
                ?>
                <input type="password" name="pwd" placeholder="Password" required><br>
                <input type="password" name="pwd-repeat" id="pwdagain" placeholder="Password again" required><br>
                <p id="passworderror" style="color: #f00; text-align:left;"></p>
                <p id="gender">Gender</p>
                <label class="container">Chef
                    <input type="radio" name="gender" id="man" value="man" checked>
                    <span class="checkmark"></span>
                </label>
                <label class="container">Female chef
                    <input type="radio" name="gender" id="woman" value="woman">
                    <span class="checkmark"></span>
                </label><br>
                <button type="submit" name="signup-submit">Sign Up</button><br><br>
            </form>
        </div>
    </div>

    <script>
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

    </script>

</body>

</html>
