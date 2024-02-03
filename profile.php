<?php
    $page_title = "Home";
    include('./components/head.php');
?>

<body>

    <!-- include navigation -->
    <?php include('./components/nav.php'); ?> 

    <main>
        <div class="main-container">
            <div class="profile">
                <div class="profile-items">
                    <img class="flex-img" src="./assets/images/DUCK_DAVE_FALL2022_Duck.jpg" alt="Artwork of a yellow duck wearing a top hat and bow tie, holding a knife by studiosarahann on Instagram">
                    <div class="profile-item-content">
                        <h2>Duck Name</h2>
                        <ul>
                            <li>Favorite Food 1</li>
                            <li>Favorite Food 2</li>
                            <li>Favorite Food 3</li>
                        </ul>
                        <p>Duck biography, and more interesting facts.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- include footer -->
    <?php include('./components/footer.php'); ?>