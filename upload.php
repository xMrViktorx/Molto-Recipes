<?php
    session_start();
?>

<?php
 if (!(isset($_SESSION['userId']))){
     header('location: index.php?error=please+login');
     exit();
 }
?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>Upload recipe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <!-- NAVBAR -->
    <?php
    require_once 'navbar.php';
    ?>
    <h1 id="upload-header">Upload Recipe</h1>
    <form action="upload_process.php" method="POST" name="uploadForm" id="form-upload" enctype="multipart/form-data">
        <p>Recipe name*</p>
        <input type="text" name="recipename" placeholder="Enter recipe name">
        <p>Ingradients*</p>
        <div id="ingradient-preview"></div>
        <div id="help-container">
            <button id="plus-button" onclick="return rotate()"><span id="plus">+</span></button>
            <div id="hideit" style="display: none;">
                <input type="text" name="all-ingradient" style="display: none;" placeholder="Ingradients">
                <input type="number" id="quantity" placeholder="Quantity">
                <input type="radio" name="unit" id="si" value="si" checked onclick="setSelect()"> <label for="si">SI units</label>
                <input type="radio" name="unit" id="cup" value="cup" onclick="setSelect()"> <label for="cup"> cup/spoon/teaspoon</label>
                <select id="select-siunit">
                    <option value="ml" autofocus>ml</option>
                    <option value="l">l</option>
                    <option value="dl">dl</option>
                </select>
                <select id="select-cupunit" style="display:none;">
                    <option value="cup" autofocus>cup</option>
                    <option value="spoon">spoon</option>
                    <option value="teaspoon">teaspoon</option>
                </select>
                <input type="text" id="ingradient" placeholder="Ingradient">
                <button class="add-button" onclick="return addIngradient()">Add</button>
            </div>
        </div>
        <p>Description steps*</p>
        <input type="text" name="all-description" style="display: none;" placeholder="Description steps">
        <div id="step-preview">
            <span id="first-step"></span>
            <textarea id="step0"></textarea><br>
        </div>
        <button onclick="return addStep()" id="step-button">Add step</button>
        <p>Dose*</p>
        <span onclick="return minusDose()" class="dose-button" style="padding: 5px 17px;">-</span>
        <input type="number" id="input-dose" name="inputDose" value="3" style="display: none">
        <span id="dose-text">This recipe is for <span id="dose-number">3</span> person.</span>
        <span onclick="return plusDose()" class="dose-button">+</span>
        <p>Photo(max 5)*</p>
        <div id="preview-image"></div>
        <label for="preview-image-add" id="image-label">Add image</label>
        <input type="file" name="image[]" multiple id="preview-image-add" style="display: none;">
        <div style="clear: both;"></div>
        <p>Category*</p>
        <select id="select-category" name="category">
            <option value="snack">snack</option>
            <option value="cookie">cookie</option>
            <option value="soup">soup</option>
            <option value="vegan">vegan</option>
            <option value="cake">cake</option>
            <option value="meat">meat</option>
            <option value="drink">drink</option>
            <option value="salad">salad</option>
            <option value="appetizer">appetizer</option>
            <option value="pasta">pasta</option>
            <option value="bread">bread & crescent</option>
        </select><br>
        <p>Difficulty*</p>
        <table>
            <tr>
                <td><label for="easy" class="diff-spoon" onclick="clickEasy()" style="border: 1px solid #40B762;"><img src="img/easySpoon.png" id="easy-img" alt="easySpoon"></label>
                    <input type="radio" name="difficulty" id="easy" value="easy" style="display: none;">
                </td>
                <td><label for="medium" class="diff-spoon" onclick="clickMedium()" style="border: 1px solid #F9CF58;"><img src="img/mediumSpoon.png" id="medium-img" alt="mediumSpoon"></label>
                    <input type="radio" name="difficulty" id="medium" value="medium" style="display: none;">
                </td>
                <td><label for="hard" class="diff-spoon" onclick="clickHard()" style="border: 1px solid #F5874D;"><img src="img/hardSpoon.png" id="hard-img" alt="hardSpoon"></label>
                    <input type="radio" name="difficulty" id="hard" value="hard" style="display: none;">
                </td>
                <td><label for="expert" class="diff-spoon" onclick="clickExpert()" style="border: 1px solid #DE1F30;"><img src="img/expertSpoon.png" id="expert-img" alt="expertSpoon"></label>
                    <input type="radio" name="difficulty" id="expert" value="expert" style="display: none;">
                </td>
            </tr>
            <tr>
                <td><label for="easy">EASY</label></td>
                <td><label for="medium">MEDIUM</label></td>
                <td><label for="hard">HARD</label></td>
                <td><label for="expert">EXPERT</label></td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Upload" id="upload-button" onclick="return validationForm()">
    </form>




    <script src="js/upload.js"></script>



    <div class="loader-wrapper">
        <span class="loader"><img src="img/goldenspoonIcon.png" class="loader-inner"></span>
    </div>

    <!-- LOADER SCRIPT -->
    <script src="js/loader.js"></script>

    <!-- LOGIN DROPDOWN SCRIPT -->
    <script src="js/loginDropdown.js"></script>
</body>

</html>
