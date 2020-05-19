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
            $sql = "SELECT user_name FROM users WHERE user_name=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../signup.php?error=sqlerror");
                exit();
            }
            else {
                $sql = "SELECT user_name FROM users WHERE user_name='".$username."'";
                $result = $conn->query($sql);
                if($result->num_rows >= 1) {
                    header("Location: ../signup.php?error=username");
                    exit();
                }
                $sql = "SELECT email FROM users WHERE email='".$email."'";
                $result = $conn->query($sql);
                if($result->num_rows >= 1) {
                    header("Location: ../signup.php?error=email");
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
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
else {
    header("Location: ../signup.php");
    exit();
}
?>
