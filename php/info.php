<html>
<body>
    <h1>You've reached Living Natural!</h1>
    <br>
    <?php
    // execute PHP test
    echo "PHP v" . explode('-', PHP_VERSION)[0] . " is operational on " . $_SERVER['SERVER_NAME'] . " at " . date("h:i:s A e") . " on " . date("l, F d, Y") . "!";
    phpinfo();
    ?>
</body>
</html>
