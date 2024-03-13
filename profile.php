<?php
    $page_title = "Home";
    include('./components/head.php');

    // Connect to db
    require('./config/db.php');

    if (isset($_POST['delete'])) {
        $id_to_delete = (int)$_POST['id_to_delete'];
        $sql_delete ="DELETE FROM ducks WHERE id='$id_to_delete'";

        mysqli_query($conn, $sql_delete);
        header ("Location: ./index.php");
    }

    $ducks_is_live = false;
    
    if (isset($_GET['id'])) {
        // Assign a variable to the id
        $id = htmlspecialchars($_GET['id']);

        // Get the duck into from the database

            // Create a query to select the intended duck from the db
            $sql = "SELECT id, name, favorite_foods, bio, img_source FROM ducks WHERE id=$id";
            $result = mysqli_query($conn, $sql);

            $ducks = mysqli_fetch_assoc($result);

            mysqli_free_result($result);
            mysqli_close($conn);

            // Check if id exists and show profile. If no applicable id, don't show profile.
            if(isset($ducks["id"])) {
                $ducks_is_live = true;
            }

            // Check if there's a delete request
            

    }
?>

<body>

    <!-- include navigation -->
    <?php include('./components/nav.php'); ?> 

    <main>
        <?php if ($ducks_is_live) : ?>
        <div class="main-container">
            <div class="profile">
                <div class="profile-items">
                    <div class="profile-item-content">
                        <h2><?php echo $ducks["name"]; ?></h2>
                        <img class="grid-img" src="<?php echo $ducks["img_source"]; ?>" alt="duck.">
                        <p><?php echo $ducks["bio"]; ?></p>
                        <ul><strong>Favorite Foods:</strong><?php $food_list = explode(",", $ducks["favorite_foods"]); ?>
                        <?php foreach($food_list as $food) : ?>
                                <li><?php echo $food ?></li>
                        <?php endforeach ?> </ul>
                        <form action="./profile.php" method="POST">

                            <input type="hidden" id="delete" name="id_to_delete" value="<?php echo $id; ?>">
                            <input type="submit" id="delete" name="delete" value="Delete Duck">

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php else : ?>
            <section class = "no-duck">
                <h1>Sorry, this duck does not exist.</h1>
            </section>
        <?php endif ?>
    </main>

    <!-- include footer -->
    <?php include('./components/footer.php'); ?>