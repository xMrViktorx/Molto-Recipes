
        function followStep(id) {
            document.getElementById(id).style.color = "red";
        }


        var favoriteIcon = document.getElementById("favorite-icon");
        favoriteIcon.addEventListener("click", function() {
            if (favoriteIcon.src == "http://localhost/Molto_Recepies/img/hearthIcon.png")
                favoriteIcon.src = "img/redHearth.png";
            else
                favoriteIcon.src = "img/hearthIcon.png";

        });


        //DOSE
        

        function minusDose() {
            if (dose > 1) {
                dose--;
                document.getElementById("dose-number").innerHTML = dose;
                x = document.getElementsByClassName("quantity");
                for (i = 0; i < x.length; i++) {
                    let values = x[i].innerHTML;
                    x[i].innerHTML = ((values / (dose + 1)) * dose).toFixed(1);
                }
            }
        }

        function plusDose() {
            dose++;
            document.getElementById("dose-number").innerHTML = dose;
            x = document.getElementsByClassName("quantity");
            for (i = 0; i < x.length; i++) {
                let values = x[i].innerHTML;
                x[i].innerHTML = ((values / (dose - 1)) * dose).toFixed(1);
            }
        }

        //RATE

        var ratedIndex = -1;


        $(document).ready(function() {

            $('.rating-icon').on('click', function() {
                var ratedIndex = parseInt($(this).data('index'));
                resetStarColors();
                setStarsOnClick(ratedIndex);
                saveToTheDB(ratedIndex);
            });
        });

        $('.rating-icon').mouseover(function() {
            resetStarColors();
            var currentIndex = parseInt($(this).data('index'));
            setStarsOver(currentIndex);
        });

        $('.rating-icon').mouseleave(function() {
            resetStarColors();
            setStarsLeave(currentstars);
        });

        function saveToTheDB(ratedIndex) {
            $.ajax({
                url: 'fetch.php',
                method: 'POST',
                cache: 'false',
                dataType: 'json',
                data: {
                    save: 1,
                    userid: userid,
                    recipeid: recipeid,
                    ratedIndex: ratedIndex
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function setStarsOver(currentstars) {
            for (var i = 0; i <= currentstars; i++) $('.rating-icon:eq(' + i + ')').attr("src", "img/easySpoon.png");
        }

        function setStarsLeave(currentstars) {
            for (var i = 0; i < currentstars2; i++) $('.rating-icon:eq(' + i + ')').attr("src", "img/goldenspoonIcon.png");
        }

        function resetStarColors() {
            $(".rating-icon").attr("src", "img/whiteSpoon.png");
        }

        function setStarsOnClick(ratedIndex) {
            for (var i = 0; i < (currentstars + ratedIndex + 1); i++) {
                $('.rating-icon:eq(' + i + ')').attr("src", "img/goldenspoonIcon.png");
            }
            if (currentstars == 0)
                currentstars2 = ratedIndex + 1;
            else
                currentstars2 = (currentstars + ratedIndex + 1) / 2;
        }