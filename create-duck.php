<?php

    $page_title = "Create a Duck";
    include('./components/head.php');

    // check for POST

    if (isset($_POST['submit'])) {

        // create error array
        $errors = array(
            "name" => "",
            "favorite_foods" => "",
            "bio" => ""
        );

        // get POST
        $name = htmlspecialchars($_POST ["name"]);
        $favorite_foods = htmlspecialchars($_POST ["favorite_foods"]);
        $bio = htmlspecialchars($_POST ["bio"]);

        
        // check if the name exists
        if(empty($name)) {

            // if it doesn't, throw error "required"
            $errors ["name"] = "A name is required.";

        } else {
            // if it does, check against regex
            if(!preg_match('/^[a-z\s]+$/i', $name)) {
                // if fails regex, throw "incorrect formatting" error
                $errors["name"] = "Forgetting something? No illegal characters, that's what.";
            }
        }


        // check if the favorite foods exists
        if(empty($favorite_foods)) {

            // if it doesn't, throw error "required"
            $errors ["favorite_foods"] = "No favorite foods? You have a very hungry duck.";

        } else {

            // if it does, check against regex
            if(!preg_match('/^[a-z,\s]+$/i', $favorite_foods)) {


            // if fails regex, throw "incorrect formatting" error
            $errors ["favorite_foods"] = "Favorite foods must be separated by commas, lol.";
            }
        }


        // check if bio/message is empty
        if(empty($bio)) {

            // if it doesn't, throw error "required"
            $errors ["bio"] = "A bio is required.";
        }

        if(!array_filter($errors)) {
            // everything is good, form is valid

            // connect to database
            require('./config/db.php');

            // build sql query
            $sql = "INSERT INTO ducks (name, favorite_foods, bio) VALUES ('$name', '$favorite_foods', '$bio')";

            // echo $sql;

            // execute query in mysql
            mysqli_query($conn, $sql);

            echo "Query is successful. Added: " . $name . "to database.";

            // load homepage

            header("Location: ./index.php");
        } else {
            // if there are any errors

        }
 
    }

    

    
?>

<body>

    <?php include('./components/nav.php'); ?>

    <main>
        <h1>Create a Duck</h1>
        <p>Fill out this form to add a new duck to the homepage.</p>
        <section class=form>
            <form action="./create-duck.php?submitted=true" method="POST">
                <div>
                    <label for="name">Name</label>

                    <?php
                        if (isset($errors['name'])) {
                            echo "<div class='error'>" . $errors["name"] . "</div>";
                        }
                    ?>

                    <input type="text" id="name" name="name" placeholder="Gerald the Pekin" value="<?php if (isset($name)) { echo $name; } ?>" required />
                </div>
                <div>
                    <label for="favorite_foods">Favorite Foods (Separate multiple with a comma)</label>

                    <?php
                        if(isset($errors['favorite_foods'])) {
                            echo "<div class='error'>" . $errors["favorite_foods"] . "</div>";
                        }
                    ?>

                    <input type="text" id="favorite_foods" name="favorite_foods" placeholder="Cucumbers, finger sandwiches, tea" value="<?php if (isset($favorite_foods)) { echo $favorite_foods; } ?>" required />
                </div>
                <!-- <div>
                    <label for="file">Profile Image</label>
                    <input type="file" id="file" name="file" value="Upload" />
                </div> -->
                <div>
                    <label for="bio">Duck Biography</label>

                    <?php
                        if (isset($errors['bio'])) {
                            echo "<div class='error'>" . $errors["bio"] . "</div>";
                        }
                    ?>

                    <textarea name="bio" id="bio" cols="40" placeholder="Gerald has been practicing using his throwing stars as well as being a gentleman. He lives in London." required><?php if (isset($bio)) { echo $bio; } ?></textarea>
                </div>
                
                <input type="submit" id="submit" name="submit" value="Submit" />
            </form>
        </section>

    </main>
    <?php include('./components/footer.php'); ?>