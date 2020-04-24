    <nav>
        <img src="img/Molto_Recipes_Logo.png" alt="icon" id="icon1">
        <img src="img/molto_logo.png" alt="icon" id="icon2">

        <a href="#" id="upload"><img src="img/arrow.png" alt="arrow"> Upload recipe</a>
        <input type="checkbox" id="menuToggle">
        <label for="menuToggle" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </label>
        <!-- LOGIN BUTTON -->
        <div class="loginDropdown">
            <button onclick="loginFunction()" class="loginDropbtn">Log in</button>
            <div id="loginmyDropdown" class="loginDropdown-content">
                <?php
                    if (isset($_SESSION['userId'])){
        echo '<form action="includes/logout.inc.php" method="post">
        <button type="submit" name="logout-submit">Logout</button>
    </form>';
    }else{
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
        </div>
        <ul id="leftList">
            <li>
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Help me</a>
            </li>
        </ul>

    </nav>

