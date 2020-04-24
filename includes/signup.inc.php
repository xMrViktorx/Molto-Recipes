<?php
    if(isset($_POST['signup-submit'])){
        
        require 'dbh.inc.php';
        $username = $_POST['uid'];
        $email = $_POST['mail'];
        $password = $_POST['pwd'];
        $passwordRepeat = $_POST['pwd-repeat'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        
        if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
            header("Location: ../signup.php?error=emptyfield&uid=".$username."&mail=".$email);
            exit();
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/".$username)){
            header("Location: ../signup.php?error=invalidmailuid");
            exit();
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../signup.php?error=invalidmail&uid=".$username);
            exit();
        }
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: ../signup.php?error=invaliduid&mail=".$email);
            exit();
        }
        else if ($password !==$passwordRepeat){
            header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email); //Vagy kell a & vagy nem
            exit();
        }
        else {
            $sql = "SELECT user_name FROM users WHERE user_name=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../signup.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if(resultCheck > 0 ) {
                    header("Location: ../signup.php?error=usertaken&mail=".$email);
                    exit();
                }
                else {
                    $sql = "INSERT INTO users (user_name, email, password, first_name, last_name, gender) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror2");
                    exit();
                }
                    else {
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        
                        mysqli_stmt_bind_param($stmt, "ssssss", $username, $email, $hashedPwd, $firstname, $lastname, $gender);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        header("Location: ../index.php");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
else {
    header("Location: ../signup.php");
    exit();
}
?>