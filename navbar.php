    <nav>
        <img src="img/Molto_Recipes_Logo.png" alt="icon" id="icon1">
        <img src="img/molto_logo.png" alt="icon" id="icon2">
        <a href="upload.php" id="upload"><img src="img/arrow.png" alt="arrow"> Upload recipe</a>
        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </label>
        <!-- LOGIN BUTTON -->
        <div class="login-dropdown">
                <?php
                    if (isset($_SESSION['userId'])){
                     require_once 'includes\dbh.inc.php';   
                if($result = $conn->query("SELECT first_name, last_name FROM `users` WHERE user_id='".$_SESSION['userId']."'")){
        $table = $result->fetch_all(MYSQLI_ASSOC);    
        $result->free();  
                }
                echo "<button onclick=\"loginFunction()\" class=\"login-dropbtn\">Logged in</button>";
                echo "<div id=\"login-my-dropdown\" class=\"login-dropdown-content\">";
                echo "<form action=\"includes/logout.inc.php\" id=\"logout-form\" method=\"post\">
                <p>".$table[0]['first_name']." ".$table[0]['last_name']."</p>
                <hr>
                <a href=\"favorites.php\">Favorites</a>
                <hr>
                <button type=\"submit\" name=\"logout-submit\">Logout</button>
                </form>";
    }else{
                echo "<button onclick=\"loginFunction()\" class=\"login-dropbtn\">Log in</button>";
                echo "<div id=\"login-my-dropdown\" class=\"login-dropdown-content\">";
                echo '<p id="loginp">Log in</p>
                <form action="includes/login.inc.php" method="post">
                <input type="text" name="mailuid" placeholder="Username"><br>
                <input type="password" name="pwd" placeholder="Password">
                <input type="submit" value="Log in" name="login-submit">
                </form>
                <div id="ordiv">
                <span id="orspan">OR</span>
                </div>
                <p>Don\'t have account?</p>
                <a href="signup.php">Sign up</a>';};
                ?>
            </div>
        <?php echo "</div>"; ?>
        <ul id="left-list">
            <li>
                <a href="index.php">Home</a>
                <a href="help.php">Help me</a>
                <a href="moltofridge.php">Fridge</a>
            </li>
        </ul>

    </nav>
