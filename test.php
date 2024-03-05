<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
</head>
<body>

    <form method="post" action="test.php">
        <!-- Your form fields go here -->
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">

        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    echo isset($_POST['submit']);
    if (isset($_POST["submit"])) {
        ?>
        <div class="fixed right-0 min-w-[30vw] translate-y-[15vh]">
            <?php require "./component/alert.php" ?>
        </div>
        <?php
    }
    ?>

</body>
</html>
