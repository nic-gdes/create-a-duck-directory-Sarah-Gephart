<?php
    $page_title = "Home";
    include('./components/head.php');
?>

<body>

    <!-- include navigation -->
    <?php include('./components/nav.php'); ?>

    <main>
        <div class="main-container">
            <div class="intro">
                <div class="hero-content">
                <h1>Welcome to DUCKS</h1>
                    <p>
                        DUCKS is a site that allows you to keep track of all your favorite duck friends, rubber and feathered alike!
                    </p>
                </div>
            </div>

            <div class="grid">
                <a href="./profile.php">
                    <div class="grid-item dave">
                        <img class="grid-img" src="./assets/images/DUCK_DAVE_FALL2022_Duck.jpg" alt="Artwork of a yellow duck wearing a top hat and bow tie, holding a knife by studiosarahann on Instagram">
                        <h2>Dave the Duck</h2>
                        <h3>Favorite Foods</h3>
                        <ul>
                            <li>Strawberry Shortcake</li>
                            <li>Oranges</li>
                            <li>Keylime Pie</li>
                        </ul>
                    </div>
                </a>
                <a href="./profile.php">
                    <div class="grid-item goron">
                        <img class="grid-img" src="./assets/images/Duck_Spring_2023_Bigger2.png" alt="Artwork of a white duck in a top hat and scarf, holding ninja throwing stars by studiosarahann on Instagram">
                        <h2>Gerald the Pekin</h2>
                        <h3>Favorite Foods</h3>
                        <ul>
                            <li>Eggs Benedict</li>
                            <li>Banana Pancakes</li>
                            <li>Bacon</li>
                        </ul>
                    </div>
                </a>
                <a href="./profile.php">
                    <div class="grid-item hateno">
                        <img class="grid-img" src="./assets/images/DUCK_FALL_2023_01.png" alt="Artwork of a bufflehead duck wearing a crown and necklace, with a belt of bombs by studiosarahann on Instagram">
                        <h2>Apricot the Bufflehead</h2>
                        <h3>Favorite Foods</h3>
                        <ul>
                            <li>Alfredo</li>
                            <li>Spaghetti</li>
                            <li>Lasagna</li>
                        </ul>
                    </div>
                </a>
                <a href="./profile.php">
                    <div class="grid-item rito">
                        <img class="grid-img" src="./assets/images/DUCK_FALL_2023_02.png" alt="Artwork of a dark raven wearing a wizard hat by studiosarahann on Instagram">
                        <h2>Herbert the Raven</h2>
                        <h3>Favorite Foods</h3>
                        <ul>
                            <li>Brownies</li>
                            <li>Chocolate Cupcakes</li>
                            <li>Anything Chocolate</li>
                        </ul>
                    </div>
                </a>
                <a href="./profile.php">
                    <div class="grid-item kakariko">
                        <img class="grid-img" src="./assets/images/cute_yellow_duck.jpg" alt="Artwork of a yellow duck by CozyKawaiiArt on Redbubble">
                        <h2>Cute Duck</h2>
                        <h3>Favorite Foods</h3>
                        <ul>
                            <li>Carrots</li>
                            <li>Lettuce</li>
                            <li>Tomatoes</li>
                        </ul>
                    </div>
                </a>
                <a href="./profile.php">
                    <div class="grid-item yiga">
                        <img class="grid-img" src="./assets/images/white_duck.jpg" alt="Artwork of a white duck by sarafaber_ on Instagram">
                        <h2>Sophisticated Duck (or Goose?)</h2>
                        <h3>Favorite Foods</h3>
                        <ul>
                            <li>Cucumbers</li>
                            <li>Finger Sandwiches</li>
                            <li>Tea</li>
                        </ul>
                    </div>
                </a>
            </div>
        </div>
    </main>

    <!-- include footer -->
    <?php include('./components/footer.php'); ?>