<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero</title>
</head>
<body>
    <p>Once upon a time there was a great hero, called Orderus, with some strengths and weaknesses, as all heroes have.</p>
    <p>As Orderus walks the ever-green forests of Emagia, he encounters some wild beasts.</p>
    <p>A battle begins. Who is going to win it?</p>
    <?php
        require 'vendor/autoload.php';

        use App\Gameplay\Battle;

        $battle = new Battle();
        $battle->startBattle();
    ?>
</body>
</html>