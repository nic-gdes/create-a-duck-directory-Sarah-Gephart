<?php

    $page_title = "Create a Duck";
    include('./components/head.php');

    // check for POST

    if (isset($_POST['submit'])) {


        // create error array
        $errors = array(
            "name" => "",
            "favorite_foods" => "",
            "bio" => "",
            "img_src" => ""
        );

        // get POST
        $name = htmlspecialchars($_POST ["name"]);
        $favorite_foods = htmlspecialchars($_POST ["favorite_foods"]);
        $bio = htmlspecialchars($_POST ["bio"]);
        $img_src = $_FILES["img_src"]["name"];

        
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

        // Handle file uplead target directory
        $target_dir ="./assets/images/";
        

        // Target uploaded image file
        $image_file = $target_dir . basename($_FILES["img_src"]["name"]);

        // Get upleaded file extension so we can test to make sure it's an image
        $image_file_type = strtolower(pathinfo($image_file,PATHINFO_EXTENSION));

        // Test image for errors
            // image exists
            if (empty($img_src)) {
                $errors["img_src"] = "An image is required.";
            } else {

                // Check that the image file is an actual image
                $size_check = @getimagesize($_FILES["img_src"]["tmp_name"]);
                $file_size = $_FILES["img_src"]["size"];

                if(!$size_check) {
                    // Check if file is an image
                    $errors["img_src"] = "File is not an image.";
                } else if ($file_size > 500000) {
                    // Check if file isze is too big
                    $errors["img_src"] = "File size cannot be larger than 500kb. There are too many bytes.";
                } else if ($image_file_type != "jpg"
                && $image_file_type != "png"
                && $image_file_type != "jpeg"
                && $image_file_type != "gif"
                && $image_file_type != "webp") {
                    // Check if filetype is acceptable
                    $errors["img_src"] = "Sorry, only JPG, JPEG, PNG, GIF, or WEP files are allowed.";
                } else if (move_uploaded_file($_FILES["img_src"]["tmp_name"], $image_file)) {
                    
                    // file uploaded successfully
                } else {
                    $errors["img_src"] = "Sorry, there was an error uploading you file.";
                }


                print_r($errors);
            }



        if(!array_filter($errors)) {
            // everything is good, form is valid

            // connect to database
            require('./config/db.php');

            // build sql query
            $sql = "INSERT INTO ducks (name, favorite_foods, bio, img_source) VALUES ('$name', '$favorite_foods', '$bio', '$image_file')";

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
            <form action="./create-duck.php?submitted=true" method="POST" enctype="multipart/form-data">
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
                <div>
                    <label for="file">Profile Image</label>
                    <?php
                        if(isset($errors['img_src'])) {
                            echo "<div class='error'>" . $errors["img_src"] . "</div>";
                        }
                    ?>
                    <input type="file" id="image" name="img_src" />
                </div>
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