<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>Example Title</title>
    <meta name="author" content="Your Name">
    <meta name="description" content="Example description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="icon" type="image/x-icon" href="" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url(img/background-image.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: center center;
            font-family: 'Montserrat', sans-serif;
        }

        .left {
            float: left;
            color: #fff;
            width: 50%;
            height: 100vh;
            text-align: center;
        }

        .left img {
            width: 300px;
            margin-top: 200px;
            margin-bottom: 50px;
        }

        .left p {
            font-size: 35px;
            margin-bottom: 50px;
        }

        .left p#quote {
            font-size: 20px;
            margin-bottom: 0;
            font-style: italic;
        }

        .left p#signed {
            font-size: 15px;
        }

        .left a {
            color: #ff3d26;
            background-color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 25px;
            padding: 15px 50px;
            font-size: 25px;
        }

        .right {
            float: right;
            background-color: #fff;
            width: 50%;
            height: 100vh;
            text-align: center;
            border-top-left-radius: 50px;
            border-bottom-left-radius: 50px;
        }

        .right p#signup {
            color: #ff3d26;
            font-size: 60px;
            font-weight: bold;
            margin-top: 100px;
            margin-bottom: 60px;
        }

        input[type=text],
        input[type=email],
        input[type=password] {
            border: 1px solid #cecece;
            margin-bottom: 10px;
            height: 40px;
            width: 500px;
            padding: 10px;
            border-radius: 25px;
            font-size: 13px;
        }

        .right p#gender {
            color: #ff3d26;
            font-size: 25px;
        }

        button[type=submit] {
            color: #fff;
            background-color: #ff3d26;
            border: none;
            height: 50px;
            width: 200px;
            padding: 10px;
            margin-top: 100px;
            border-radius: 25px;
            font-size: 25px;
        }

        @media screen and (max-width: 1100px) {
            body {
                background-color: #fff;
                background: none;
            }

            .right {
                width: 100%;
                border-radius: 0;
                height: auto;
            }

            .left {
                display: none;
            }

            input[type=text],
            input[type=email],
            input[type=password] {
                width: 80%;
            }

    </style>
</head>

<body>

    <div class="left">
        <img src="img/Molto_Recipes_Logo_white.png" alt="whitelogo">
        <p>Join Us</p>
        <p id="quote">„Good recipe, good food”</p>
        <p id="signed">-Molto recipes</p>
        <a href="#">About Us</a>
    </div>
    <div class="right">
        <p id="signup">Sign Up</p>
        <form action="includes/signup.inc.php" method="POST">
            <input type="text" name="lastname" placeholder="Last name"><br>
            <input type="text" name="firstname" placeholder="First name"><br>
            <input type="text" name="uid" placeholder="Username"><br>
            <input type="email" name="mail" placeholder="E-mail"><br>
            <input type="password" name="pwd" placeholder="Password"><br>
            <input type="password" name="pwd-repeat" placeholder="Password again"><br>
            <p id="gender">Gender</p>
            <label for="man">Chef</label>
            <input type="radio" name="gender" id="man" value="man">
            <label for="woman">Female chef</label>
            <input type="radio" name="gender" id="woman" value="woman"><br>
            <button type="submit" name="signup-submit">Signup</button>
        </form>
    </div>
</body>

</html>
