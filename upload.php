<?php
    session_start();
?>

<?php
 if (!(isset($_SESSION['userId']))){
     header('location: index.php?error=Please login!');
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
            <option value="valami">Snack</option>
            <option value="valami2">Snack</option>
            <option value="valami3">Snack</option>
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
        <input type="submit" value="Upload" id="upload-button" onclick="return validationForm()">
    </form>




    <script>
        var ingradientId = 0;

        function addIngradient() {
            var quantity = document.getElementById('quantity').value;
            var ingradient = document.getElementById('ingradient').value;
            var unit = document.forms["uploadForm"]["unit"].value;

            if (document.getElementById('select-cupunit').style.display == "none")
                var selectedUnit = document.getElementById("select-siunit").value;
            else
                var selectedUnit = document.getElementById("select-cupunit").value;

            var addingrad = document.createElement("span");
            addingrad.innerHTML = quantity + " " + selectedUnit + " " + ingradient;
            addingrad.id = "ingradient" + ingradientId;
            document.getElementById('ingradient-preview').appendChild(addingrad);
            ingradientId++;


            addingrad.onclick = function() {
                var deletedSpan = document.getElementById(this.id);
                deletedSpan.parentNode.removeChild(deletedSpan);
            };

            return false
        }


        var ones = 0;

        function rotate() {
            var plus = document.getElementById('plus');
            var plusButton = document.getElementById('plus-button');
            var tohide = document.getElementById("hideit");
            if (ones == 0) {
                plus.style.transform = 'rotate(45deg)';
                plus.style.transitionDuration = "0.2s";
                plusButton.style.backgroundColor = '#EE422F';
                plus.style.color = '#fff';
                tohide.style.display = "inline-block";
                ones = 1;
                return false;
            }
            if (ones == 1) {
                plus.style.transform = 'rotate(0deg)';
                plusButton.style.backgroundColor = '#fff';
                plus.style.color = '#EE422F';
                tohide.style.display = "none";
                ones = 0;
                return false;
            }
        }


        function setSelect() {
            var unit = document.forms["uploadForm"]["unit"].value;
            var siUnit = document.getElementById("select-siunit");
            var cupUnit = document.getElementById("select-cupunit");
            if (unit == "cup") {
                document.getElementById("select-siunit").style.display = "none";
                document.getElementById("select-cupunit").style.display = "inline-block";
            } else {
                document.getElementById("select-siunit").style.display = "inline-block";
                document.getElementById("select-cupunit").style.display = "none";
            }

        }

        //ADD STEP
        var stepCounter = 1;

        function addStep() {
            var addStep = document.createElement("textarea");
            var addSpan = document.createElement("span");
            addStep.id = "step" + stepCounter;

            stepCounter++;
            document.getElementById('step-preview').appendChild(addSpan).setAttribute('data-value', "Step" + stepCounter);
            stepCounter--;
            document.getElementById('step-preview').appendChild(addStep);
            var br = document.createElement("br");
            document.getElementById('step-preview').appendChild(br);

            stepCounter++;

            return false
        }

        //PLUS DOSE
        var dose = 3;

        function plusDose() {
            dose++;
            document.getElementById("input-dose").value = dose;
            document.getElementById("dose-number").innerHTML = dose;
            return false
        }

        function minusDose() {
            dose--;
            document.getElementById("input-dose").value = dose;
            document.getElementById("dose-number").innerHTML = dose;
            return false
        }

        //UPLOAD IMAGE
        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {
                $("div#preview-image").html("");
                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#preview-image-add').on('change', function() {
                imagesPreview(this, 'div#preview-image');
            });
        });

        var allIngradient = "";
        var allDescription = "";
        //VALIDATE FORM
        function validationForm() {
            var recipeName = document.forms["uploadForm"]["recipename"].value;
            //console.log(recipeName);

            //INGRADIENTS
            for (var i = 0; i < document.getElementById("ingradient-preview").childNodes.length; i++) {
                var temp = document.getElementById("ingradient-preview").childNodes[i];
                allIngradient = allIngradient + temp.innerText + ";";
            }
            document.forms["uploadForm"]["all-ingradient"].value = allIngradient;


            //STEPS
            for (var i = 0; i < document.getElementById("step-preview").childNodes.length; i++) {
                if (document.getElementById("step-preview").childNodes[i].type == "textarea") {
                    var temp = document.getElementById("step-preview").childNodes[i].value;
                    allDescription = allDescription + temp + ";";
                }
            }
            document.forms["uploadForm"]["all-description"].value = allDescription;

            if (document.forms["uploadForm"]["recipename"].value != "")
                return true


            return false
        }



        //DIFFICULTY
        var expert = document.getElementsByTagName("LABEL")[7];
        var hard = document.getElementsByTagName("LABEL")[6];
        var medium = document.getElementsByTagName("LABEL")[5];
        var easy = document.getElementsByTagName("LABEL")[4];

        function clickEasy() {
            expert.style.backgroundColor = "#fff";
            hard.style.backgroundColor = "#fff";
            medium.style.backgroundColor = "#fff";
            easy.style.backgroundColor = "#40B762";
            document.getElementById("easy-img").src = "img/whiteSpoon.png";
            document.getElementById("medium-img").src = "img/mediumSpoon.png";
            document.getElementById("hard-img").src = "img/hardSpoon.png";
            document.getElementById("expert-img").src = "img/expertSpoon.png";
        }

        function clickMedium() {
            expert.style.backgroundColor = "#fff";
            hard.style.backgroundColor = "#fff";
            medium.style.backgroundColor = "#F9CF58";
            easy.style.backgroundColor = "#fff";
            document.getElementById("easy-img").src = "img/easySpoon.png";
            document.getElementById("medium-img").src = "img/whiteSpoon.png";
            document.getElementById("hard-img").src = "img/hardSpoon.png";
            document.getElementById("expert-img").src = "img/expertSpoon.png";
        }

        function clickHard() {
            expert.style.backgroundColor = "#fff";
            hard.style.backgroundColor = "#F5874D";
            medium.style.backgroundColor = "#fff";
            easy.style.backgroundColor = "#fff";
            document.getElementById("easy-img").src = "img/easySpoon.png";
            document.getElementById("medium-img").src = "img/mediumSpoon.png";
            document.getElementById("hard-img").src = "img/whiteSpoon.png";
            document.getElementById("expert-img").src = "img/expertSpoon.png";
        }

        function clickExpert() {
            expert.style.backgroundColor = "#DE1F30";
            hard.style.backgroundColor = "#fff";
            medium.style.backgroundColor = "#fff";
            easy.style.backgroundColor = "#fff";
            document.getElementById("easy-img").src = "img/easySpoon.png";
            document.getElementById("medium-img").src = "img/mediumSpoon.png";
            document.getElementById("hard-img").src = "img/hardSpoon.png";
            document.getElementById("expert-img").src = "img/whiteSpoon.png";
        }

    </script>



    <!-- LOADER 
    <div class="loader-wrapper">
        <span class="loader"><img src="img/goldenspoonIcon.png" class="loader-inner"></span>
    </div> -->

    <!-- LOADER SCRIPT -->
    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut("slow");
        });

    </script>



    <!-- LOGIN DROPDOWN SCRIPT -->
    <script>
        /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
        function loginFunction() {
            document.getElementById("login-my-dropdown").classList.toggle("show");
        }

    </script>
</body>

</html>
