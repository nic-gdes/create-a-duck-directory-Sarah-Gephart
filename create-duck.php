<?php
    $page_title = "Create a Duck";
    include('./components/head.php');

    if (isset($_POST['submit'])) {
        $name = htmlspecialchars($_POST(['name']));
        $email = htmlspecialchars($_POST(['email']));
        $message = htmlspecialchars($_POST(['message']));

        echo $name . ", " . $email . ", " . $message;
    }
?>

<body>

    <?php include('./components/nav.php'); ?>

    <main>
        <h1>Create a Duck</h1>
        <section class=form>
            <form action="./create-duck.php?submitted=true" method="POST">
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Gerald the Pekin" />
                </div>
                <div>
                    <label for="food">Favorite Foods (Separate multiple with a comma)</label>
                    <input type="text" id="food" name="food" placeholder="Cucumbers, finger sandwiches, tea" />
                </div>
                <div>
                    <label for="file">Profile Image</label>
                    <input type="file" id="file" name="file" value="Upload" />
                </div>
                <div>
                    <label for="message">Duck Biography</label>
                    <textarea name="message" id="message" cols="40" placeholder="Gerald has been practicing using his throwing stars as well as being a gentleman. He lives in London."></textarea>
                </div>
                
                <input type="submit" id="submit" name="submit" value="Submit" />
            </form>
        </section>

    </main>
    <?php include('./components/footer.php'); ?>