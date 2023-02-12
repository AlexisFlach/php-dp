<?php

namespace App\Behavioral\Strategy;

use App\Behavioral\Strategy\FlyBehavior\FlyWithWings;
use App\Behavioral\Strategy\QuackBehavior\Quack;

?>

<!DOCTYPE html>
<html>

<head>
    <title>Create Your Own Duck</title>
</head>

<body>
    <h1>Create Your Own Duck</h1>
    <form action="index.php" method="post">
        <label for="duck">Type of duck:</label>
        <select name="duck">
            <option value="MallardDuck">Mallard Duck</option>
            <option value="RubberDuck">Rubber Duck</option>
            <option value="DecoyDuck">Decoy Duck</option>
        </select><br><br>
        <label for="fly_behavior">Fly Behavior:</label>
        <select name="fly_behavior">
            <option value="FlyWithWings">Fly With Wings</option>
            <option value="FlyNoWay">Fly No Way</option>
        </select><br><br>
        <label for="quack_behavior">Quack Behavior:</label>
        <select name="quack_behavior">
            <option value="Quack">Quack</option>
            <option value="MuteQuack">Mute Quack</option>
        </select><br><br>
        <input type="submit" value="Create Duck">
    </form>

    <?php

    require_once(__DIR__ . '/../../../vendor/autoload.php');

    use App\Behavioral\Strategy\FlyBehavior\FlyNoWay;
    use App\Behavioral\Strategy\QuackBehavior\MuteQuack;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        echo 'Please select a duck type, fly behavior, and quack behavior.';
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $duck = $_POST['duck'];
        $flyBehavior = $_POST['fly_behavior'];
        $quackBehavior = $_POST['quack_behavior'];

        $duck = match ($duck) {
            'MallardDuck' => new MallardDuck\MallardDuck(),
            default => new Duck\Duck(new FlyWithWings(), new Quack()),
        };

        $duckInstance = $duck;

        if ($flyBehavior === 'FlyNoWay') {
            $duckInstance->setFlyBehavior(new FlyNoWay());
        }

        if ($quackBehavior === 'MuteQuack') {
            $duckInstance->setQuackBehavior(new MuteQuack());
        }

        echo $duckInstance->display();

        echo $duckInstance->performFly();

        echo $duckInstance->performQuack();

    }

    ?>

</body>

</html>