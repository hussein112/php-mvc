<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  
    <!-- Static Contents (header, navigation, ...) -->

    <ul class="navigate">
        <a href="<?php echo ROOT_URL; ?>">Home</a>
    </ul>

    <!-- End Static Contents (header, navigation, ...) -->


    <?php 
        require($view);
    ?>

    <!-- Static Contents (Footer) -->
    <footer>
        <hr>
        Hi
    </footer>
    <!-- End Static Contents (Footer) -->

</body>
</html>