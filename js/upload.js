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


    addingrad.onclick = function () {
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
$(function () {
    // Multiple images preview in browser
    var imagesPreview = function (input, placeToInsertImagePreview) {
        $("div#preview-image").html("");
        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function (event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#preview-image-add').on('change', function () {
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
