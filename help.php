<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Molto Recipes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="help_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <script src="js/help.js"></script>


</head>

<body>
    <!-- NAVBAR -->
    <?php
    require_once 'navbar.php';
    ?>

    <!-- TITLE PAGE -->
    <div class="title-page">
        <br><br><br><br>


        <img id="moltologo" src="img/Molto_Recipes_Logo.png">


        <p id="cookinghelper">- COOCKING HELP -</p>
    </div>
    <div id="menuk">
        <div class="container">
            <button onmouseover="hover1();" onmouseout="blur1();" type="button" class="text-left btn btn-outline-danger btn-lg btn-block red-background" data-toggle="collapse" data-target="#demo"><img id="help-icon1" src="img/helpicons/logos/baking.png">Baking symbols on oven</button>
            <div id="demo" class="collapse">


                <table style="width:100%">
                    <tr>
                        <td><img id="bakingsymbol" src="img/helpicons/Fan-oven-300x264.png"></td>
                        <td>
                            <p id="title">1. Fan oven</p> A fan in a circle represents an oven that uses a fan to distribute heat generated from a circular element that surrounds the fan. Ideally, the heat distribution should be even, so that it doesn’t matter where the food is placed in the oven, it cooks perfectly every time.

                            Fan ovens are designed to heat up faster, reduce cooking time and decrease energy consumption. Fan ovens are great for baking multiple trays at a time (biscuits, cupcakes and muffins on the top, middle and lower shelves respectively). They’re also recommended if you like your meat cooked the ‘chefy’ way, tender on the outside and rare on the inside.<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td><img id="bakingsymbol" src="img/helpicons/Conventional-oven-300x265.png"></td>
                        <td>
                            <p id="title">2. Conventional heating</p> The symbol for conventional heating is two lines, one at the top and one at the bottom of a square. The lines represent the two heating elements used, one at the top and one at bottom of the oven. Instead of a fan, the heat is diffused by natural convection. Use the conventional heating mode for roasting meat and vegetables or baking cakes.<br><br>
                        </td>
                    </tr>

                    <tr>
                        <td><img id="bakingsymbol" src="img/helpicons/Bottom-element-300x268.png"></td>
                        <td>
                            <p id="title">3. Bottom element heat</p> The symbol is a single line at the bottom of a square, which represents the lower heating element in use. This method is ideal for baking something that requires a crispy base such as pizza. It is also used for baking a casserole.<br><br>
                        </td>
                    </tr>

                    <tr>
                        <td><img id="bakingsymbol" src="img/helpicons/Bottom-element-with-grill-300x266.png"></td>
                        <td>
                            <p id="title">4. Bottom element heating with grill</p> The symbol for this function is the zigzag (grill) line at the top and a straight line at the bottom of a square. It’s a good function to use for cooking pies, quiches, and crisping pizzas.<br><br>
                        </td>
                    </tr>

                    <tr>
                        <td><img id="bakingsymbol" src="img/helpicons/Grill-with-fan-300x267.png"></td>
                        <td>
                            <p id="title"> 5. Fan with grill</p> The symbol is the zigzag line at the top of a square with the fan symbol underneath. The fan distributes the heat, while the grill roasts from the top. The grill cycles on and off to maintain the temperature setting. This method is ideal for cooking meat and poultry.<br><br>
                        </td>
                    </tr>

                    <tr>
                        <td><img id="bakingsymbol" src="img/helpicons/Grill-300x264.png"></td>
                        <td>
                            <p id="title"> 6. Grill</p> The symbol is simply a zigzag line at the top of a square. Using the full grill allows you to cook food for virtually your whole family plus guests. There may also be a half-grill setting, which means only the centre of the grill element gets hot. You’ll need to place food dead centre to get even cooking. Grills ate great for crisping and browning food, so use yours to make toast or toasted sandwiches, melt and brown cheese on lasagne and make delectable mushroom steaks.<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td><img id="bakingsymbol" src="img/helpicons/Oven-light-300x268.png"></td>
                        <td>
                            <p id="title"> 7. Oven light</p> Rather obviously, the symbol is a light bulb in a square. Some ovens cook with the light on automatically so you can see progress easily, but other ovens have a light switch so that you have to turn it on and off to see what’s potting.<br><br>
                        </td>
                    </tr>

                    <tr>
                        <td><img id="bakingsymbol" src="img/helpicons/defrost-oven.png"></td>
                        <td>
                            <p id="title"> 8. Oven defrosting</p> Not all ovens have a defrost function, but if yours does, you’ll see it on the symbol that looks like a snowflake above a drop of water. In this mode, the oven fan is switched on but no heat is generated. The air circulation defrosts the food. It’s great if you forgot to take food out to defrost overnight and you need to make a plan quickly.<br><br>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="container">
            <button onmouseover="hover2();" onmouseout="blur2();" type="button" class="text-left btn btn-outline-danger btn-lg btn-block red-background" data-toggle="collapse" data-target="#demo1"><img id="help-icon2" src="img/helpicons/logos/pin.png">Perfect cake</button>
            <div id="demo1" class="collapse">
                <table style="width:100%">
                    <tr>
                        <td>
                            <p id="title">When is cake done?</p> There are five things to look for when deciding if cake is finished baking. Depending on the kind of cake you’re making, some of these tests will be more useful than others, so it’s important to learn them all.<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="title">1. The edges pull away</p> Once your cake nears the end of the bake time, peer through the oven window and check the edges of the cake. When your cake is done, the sides will have pulled away from the pan slightly.

                            The edges of the cake are the first part to set and become fully baked. They shrink inward as the rest of the cake bakes and the crumb tightens.If you’ve greased your cake pan, a small gap will form between the sides of the cake and the pan when it’s almost done baking. The gap might be small: between 1/8” and 1/4” is normal. This tells you that the outer part of the cake is fully baked, and the center probably is too.

                            The edges pulling away is a good first sign that you’re close to the end of the bake time, but you'll also want to use a few other techniques before calling the cake done.

                            Note: If you’re making a sponge cake (like angel food cake), this test won’t work since you don’t grease the sides of the pan. The cake will stick to the sides of the pan even when it’s fully baked. This helps give the cake support, but it means you can’t look for the edges pulling away as a sign of doneness.<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="title">2. The cake smells fragrant</p> When checking out the sides of the cake, you should notice something else too. Something lovely.

                            When your cake is done baking, it’ll fill your kitchen with an amazing aroma of butter and sugar (read: happiness!).

                            Vanilla cake often smells sweet. Even though “sweet” is technically a taste, our nose and tastebuds are connected. When we smell scents of vanilla and sugar, our brains tell us, “There’s something sweet around here!”<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="title">3. The top turns golden brown</p> Once your cake smells heavenly and the edges have pulled away from the sides of the pan, it’s time to open the oven and take a look. When you’re making vanilla or white cake, look for golden brown edges. (Ever heard of “GBD”? It means “golden brown and delicious.” It’s chef-speak for when something is perfectly baked or cooked in the kitchen. You want your cakes to be GBD!)

                            The edges should have a slightly darker hue, like a perfectly toasted marshmallow. The center should have developed some color as well. Depending on the cake formula, it may turn a light honey color or deep golden brown. The more sugar in your recipe, the browner the cake will be when it’s done.<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="title">4. The toothpick (or paring knife) test</p> If your cake successfully passes the first three tests, it’s time to pull out a toothpick. Or better yet, find a paring knife.

                            While you may have grown up watching someone in the kitchen insert toothpicks or long skewers into cakes to test for doneness, toothpicks don’t have very much surface area. Consider using a paring knife, which more clearly reveals underbaked crumbs. A knife is especially helpful if you’re baking a cake or quick bread made from a thick batter, like pound cake or banana bread.The small incision made by the paring knife won't be visible if you cover your cake with frosting. If you're not frosting the cake, consider using a toothpick to minimize the size of the hole left behind.
                            The idea behind this test is you can insert a toothpick or paring knife into the center of the cake to see if the crumb has set. If the tester comes out clean, it’s done. If it comes out gummy or with crumbs clinging to it, the cake needs more time in the oven.

                            While you can assess the cake using this technique, it’s not enough of a test on its own. (Sometimes a tester will come out mostly clean but the cake still needs more time in the oven.) Remember that this tip is just one of five we’re teaching you around how to tell when cake is done. Don’t forget to use the others too!<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="title">5. The cake springs back</p> After you test your cake with a toothpick or paring knife, you’ll want to gauge the texture of the cake another way. The best way to do this is to gently press on the center of the cake with a few fingers to see if it springs back.

                            If your fingers leave little indents, your cake isn't done baking. Return it to the oven for at least 5 minutes before checking it again. If the cake springs back to your touch, that’s a good sign that the crumb structure has set and your cake is fully baked. You can remove your cake from the oven and let it cool on a rack until your recipe instructs you to turn it out of the pan (if it does at all).<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="title">Internal temperature</p> Some bakers like to use a thermometer to test the internal temperature of baked goods to see if they're done baking.

                            For cake, this isn't so reliable. The internal temperature of cake varies based on the formula, ranging from 200°F to 210°F. Most classic cakes (butter cakes, pound cakes, chocolate and vanilla cakes, etc.) hover around 210°F when they're fully baked, but this isn't always a reliable threshold to look for.

                            Instead, use the five techniques outlined here to get a more complete understanding of whether your cake is done baking or not. You'll be better off, we promise!<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="title">Enjoy your perfectly baked cake!</p> It can be difficult to tell when cake is done baking, especially if you’re baking chocolate cake. That’s why we rely on all these signs together:
                            <br><br>
                            <ol>
                                <li>The edges of the cake pull away from the sides of the pan.</li>
                                <li>It smells fragrant.</li>
                                <li>The top and edges are golden brown (or look matte for chocolate cake).</li>
                                <li>A toothpick or paring knife comes out clean.</li>
                                <li>The cake springs back when pressed gently.</li>

                            </ol>
                            Use your senses to do these tests and gather information about the cakes you bake. Soon you’ll develop a gut feeling for when certain recipes are properly baked.<br><br>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="container">
            <button onmouseover="hover3();" onmouseout="blur3();" type="button" class="text-left btn btn-outline-danger btn-lg btn-block red-background" data-toggle="collapse" data-target="#demo2"><img id="help-icon3" src="img/helpicons/logos/pasta.png">Perfect pasta</button>
            <div id="demo2" class="collapse">
                <table style="width:100%">
                    <tr>
                        <td>
                            <p id="title">1. Use a large pot</p> Pick a roomy pot that gives the pasta plenty of space to move around in. This is a good time to call that eight-or 12-quart stockpot into action.<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="title">2. Load up the pot with lots of water</p> You want five or six quarts of water for a standard 16 oz. package of pasta.

                            When you’re hungry and want to get to spaghetti time stat, you might be tempted to use less water, so it boils quicker. Don’t. Just like pasta needs a roomy pot, it needs plenty of H2O to totally submerge every strand.

                            Here’s a tip for making the water boil faster. Put a lid on the pot, but keep it partially uncovered so you’ll hear when the water starts to boil. Leaving a gap will also help keep the water from boiling over before you turn it down.

                            Ever had a covered pot boil over? We have — very stressful.<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="title">4. Bring the water to a full, rolling boil</p>Again, don’t let hanger make you dump in the pasta when the water is at a mere simmer. You want a vigorous boil. Remember, the pasta is going to cool down the temperature of the water once you drop it in. To bring the water back up to a boil more quickly, put the lid back on.

                            But the second you hear the water boiling again, take off the lid, and…<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="title">5. Stir to keep the pasta from sticking</p>Don’t stray from the stove to check Insta or see what people are tweeting, or settle in to rewatch another episode of Game of Thrones. You’re on pasta duty, people! Stand guard and stir the pot at least two or three times during cooking.

                            Don’t let the strands clump. They should swirl, unencumbered and free.<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="title">6. Test the pasta two minutes before it’s “ready”</p>Check the pasta packaging for the cook times. This is where it gets tricky. Ever notice that the instructions give a range of time? For instance, regular dry spaghetti takes between 6 to 8 minutes. Or is that 5 to 7 minutes? Or 10 to 12? Depends on the package and the pasta.

                            (If you’re cooking at high altitude, that adds yet another variable.)

                            Start checking the pasta’s doneness on the earlier range of the time frame. Fish out a single strand of pasta using a pasta fork (or whatever — we find a pair of chopsticks is perfect). Let it cool, then bite into it.

                            How does it feel on your teeth? Does the center resist just enough or is there still a bit of a crunch? Does the pasta have a springy bounce to it? That’s what you want.

                            Unless you love it softer — sometimes a bowl of slightly soggy noodles tastes like home. But no matter your preference, it’s better to err on the side of al dente because you can fix that if a not-quite-cooked texture isn’t your thing (instructions below).<br><br>
                        </td>
                    </tr>


                </table>
            </div>
        </div>

        <div class="container">
            <button onmouseover="hover4();" onmouseout="blur4();" type="button" class="text-left btn btn-outline-danger btn-lg btn-block red-background" data-toggle="collapse" data-target="#demo3"><img id="help-icon4" src="img/helpicons/logos/egg.png">Perfect boiled egg</button>
            <div id="demo3" class="collapse">
                <table style="width:100%">
                    <tr>
                        <td>
                            <p id="title">Step 1</p> Place eggs in the bottom of a saucepan. Be sure not to crowd the eggs in the pan. They should fit comfortably.<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="title">Step 2</p> Fill the pan with cold water, 1 inch above the eggs.<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="title">Step 3</p> Bring the water to a rapid boil on the stovetop over high heat.<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="title">Step 4</p> Once the water comes to a boil, cover the pan with a lid and remove the pan from the heat. Do not lift the lid. Set a timer for the type of boiled egg you want, from 4 minutes to 12 minutes.<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="title">Step 5</p> Fill a large bowl with ice and water.<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="title">Step 6</p> When the eggs reach the desired cooking time, use tongs to remove the eggs from the hot water and immerse gently into the prepared ice water to cool, about 10 minutes.<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="title">Step 7</p> Gently tap the eggs against a hard surface and peel away the shell. Rinse the egg under cold water to remove any bits of shell and pat dry.
                            <br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p id="title">HOW MANY MINUTES SHOULD I COOK MY EGG? </p>
                            <img style="width: 500px" src="img/helpicons/eggs.jpg" class="img-rounded"><br><br>
                        </td>
                    </tr>


                </table>
            </div>
        </div>

        <div class="container">
            <button onmouseover="hover5();" onmouseout="blur5();" type="button" class="text-left btn btn-outline-danger btn-lg btn-block red-background" data-toggle="collapse" data-target="#demo4"><img id="help-icon5" src="img/helpicons/logos/calc.png">Unit calculator</button>
            <div id="demo4" class="collapse">

                <br><br>
                <div class="form-row align-items-center">
                    <div class="form-group nobottommargin">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control widthinput" id="amount">
                    </div>
                    <div id="siunit" class="col-auto my-1">
                        <label class="mr-sm-2" for="fromunit">SI units</label>
                        <select class="custom-select mr-sm-2" id="fromunit">
                            <option selected>Choose...</option>
                            <option value="liter">l</option>
                            <option value="mililiter">ml</option>
                            <option value="kilogram">kg</option>
                            <option value="gram">g</option>
                        </select>
                    </div>
                    <button type="button" id="swapbutton" onclick="doSwap()" class="btn btn-danger"> <img id="arrow" src="img/helpicons/logos/arrow.png"></button>

                    <div id="spoonunit" class="col-auto my-1">
                        <label class="mr-sm-2" for="tounit">Cup/Tablespoon/Teaspoon</label>
                        <select class="custom-select mr-sm-2" id="tounit">
                            <option selected>Choose...</option>
                            <option value="cup">cup</option>
                            <option value="tablespoon">tablespoon</option>
                            <option value="teaspoon">teaspoon</option>
                        </select>
                    </div>
                    <button type="button" id="swapbutton" onclick="doconvert()" class="btn btn-danger">CONVERT</button>
                </div>
                <p id="convertionvalue"></p>
            </div>
        </div>
    </div>


    <div class="loader-wrapper">
        <span class="loader"><img src="img/goldenspoonIcon.png" class="loader-inner"></span>
    </div>

    <!-- LOADER SCRIPT -->
    <script src="js/loader.js"></script>

    <!-- LOGIN DROPDOWN SCRIPT -->
    <script src="js/loginDropdown.js"></script>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

</body>

</html>
