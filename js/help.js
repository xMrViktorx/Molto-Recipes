        function hover1() {
            document.getElementById("help-icon1").src = "img/helpicons/logos/bakingwhite.png";
        }

        function blur1() {
            document.getElementById("help-icon1").src = "img/helpicons/logos/baking.png";
        }

        function hover2() {
            document.getElementById("help-icon2").src = "img/helpicons/logos/pinwhite.png";
        }

        function blur2() {
            document.getElementById("help-icon2").src = "img/helpicons/logos/pin.png";
        }

        function hover3() {
            document.getElementById("help-icon3").src = "img/helpicons/logos/pastawhite.png";
        }

        function blur3() {
            document.getElementById("help-icon3").src = "img/helpicons/logos/pasta.png";
        }

        function hover4() {
            document.getElementById("help-icon4").src = "img/helpicons/logos/eggwhite.png";
        }

        function blur4() {
            document.getElementById("help-icon4").src = "img/helpicons/logos/egg.png";
        }

        function hover5() {
            document.getElementById("help-icon5").src = "img/helpicons/logos/calcwhite.png";
        }

        function blur5() {
            document.getElementById("help-icon5").src = "img/helpicons/logos/calc.png";
        }

        function doSwap() {
            swapElements(document.getElementById("siunit"), document.getElementById("spoonunit"));

            document.getElementById('fromunit').id = 'tounit';
            document.getElementById('tounit').id = 'fromunit';
        }

        function swapElements(obj1, obj2) {

            var temp = document.createElement("div");

            obj1.parentNode.insertBefore(temp, obj1);

            obj2.parentNode.insertBefore(obj1, obj2);

            temp.parentNode.insertBefore(obj2, temp);

            temp.parentNode.removeChild(temp);

        }

        function doconvert() {

            var amount = document.getElementById("amount").value;

            var from = document.getElementById("fromunit").value;
            var to = document.getElementById("tounit").value;

            var final1;

            //tospoons
            if (from == "liter" && to == "cup") {
                final1 = 4.23 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "liter" && to == "tablespoon") {
                final1 = 67 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "liter" && to == "teaspoon") {
                final1 = 202.9 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "mililiter" && to == "cup") {
                final1 = 0.0042 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "mililiter" && to == "tablespoon") {
                final1 = 15 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "mililiter" && to == "teaspoon") {
                final1 = 5 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "kilogram" && to == "cup") {
                final1 = 1 / 0.2 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "kilogram" && to == "tablespoon") {
                final1 = 67.6 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "kilogram" && to == "teaspoon") {
                final1 = 202.88 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "gram" && to == "cup") {
                final1 = 0.1 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "gram" && to == "tablespoon") {
                final1 = 0.067 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "gram" && to == "teaspoon") {
                final1 = 0.234 * amount;
                final1 = final1.toFixed(2);
            }
            //tosiunits
            else if (from == "cup" && to == "liter") {
                final1 = 0.24 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "cup" && to == "mililiter") {
                final1 = 236.56 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "cup" && to == "kilogram") {
                final1 = 0.237 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "cup" && to == "gram") {
                final1 = 130.12 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "tablespoon" && to == "liter") {
                final1 = 0.015 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "tablespoon" && to == "mililiter") {
                final1 = 14.79 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "tablespoon" && to == "kilogram") {
                final1 = 0.0148 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "tablespoon" && to == "gram") {
                final1 = 12.78 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "teaspoon" && to == "liter") {
                final1 = 0.0049 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "teaspoon" && to == "mililiter") {
                final1 = 4.93 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "teaspoon" && to == "kilogram") {
                final1 = 0.0049 * amount;
                final1 = final1.toFixed(2);
            } else if (from == "teaspoon" && to == "gram") {
                final1 = 2.71 * amount;
                final1 = final1.toFixed(2);
            } else {
                final1 = "Error, please choose unit!";
            }
            if (final1 != "Error, please choose unit!") {
                document.getElementById("convertionvalue").innerHTML = final1 + " " + to + "s";
            } else {
                document.getElementById("convertionvalue").innerHTML = final1;
            }

        }
