<?php
session_start();

//a function to return all alive bees list --->Randomization purpose
function alive_bees()
{

    $i = 0;
    foreach ($_SESSION as $name => $value) {

        if ($value !== "Died") {
            $alive_bees_lis[] = $i;
        }

        $i++;
    }

    //i will use array_rand() so i need to get alive bees mapping number into this array index
    foreach ($alive_bees_lis as $name => $value) {

        $array_to_randomize[$value] = $name;
    }

    return $array_to_randomize;
}


//when next time form submitted do not reset all session var
if (!isset($_SESSION["qb2"])) {

//initial values for queen bees
    $_SESSION["qb1"] = 100;
    $_SESSION["qb2"] = 100;
    $_SESSION["qb3"] = 100;

//initial values for worker bees
    $_SESSION["wb1"] = 75;
    $_SESSION["wb2"] = 75;
    $_SESSION["wb3"] = 75;
    $_SESSION["wb4"] = 75;
    $_SESSION["wb5"] = 75;

//initial values for drone bees
    $_SESSION["db1"] = 50;
    $_SESSION["db2"] = 50;
    $_SESSION["db3"] = 50;
    $_SESSION["db4"] = 50;
    $_SESSION["db5"] = 50;
    $_SESSION["db6"] = 50;
    $_SESSION["db7"] = 50;

}


if (isset($_POST['hit'])) {
    //check to see if all the queen bees are died
    if ($_SESSION["qb1"] === "Died" && $_SESSION["qb2"] === "Died" && $_SESSION["qb3"] === "Died") {

        //All worker bees should die as well
        $_SESSION["wb1"] = "Died";
        $_SESSION["wb2"] = "Died";
        $_SESSION["wb3"] = "Died";
        $_SESSION["wb4"] = "Died";
        $_SESSION["wb5"] = "Died";

        //All drone bees should die as well
        $_SESSION["db1"] = "Died";
        $_SESSION["db2"] = "Died";
        $_SESSION["db3"] = "Died";
        $_SESSION["db4"] = "Died";
        $_SESSION["db5"] = "Died";
        $_SESSION["db6"] = "Died";
        $_SESSION["db7"] = "Died";

    } else { //otherwise continue with game


        //selecting a random alive bee
        $which_bee = array_rand(alive_bees());


        if ($which_bee >= 0 && $which_bee < 3) {//These are queen bees
            $point_deduction = -7;
            switch ($which_bee) {
                case 0:
                    if ($_SESSION["qb1"] > 7)
                        $_SESSION["qb1"] += $point_deduction;
                    else
                        $_SESSION["qb1"] = "Died";
                    break;

                case 1:
                    if ($_SESSION["qb2"] > 7)
                        $_SESSION["qb2"] += $point_deduction;
                    else
                        $_SESSION["qb2"] = "Died";
                    break;

                case 2:
                    if ($_SESSION["qb3"] > 7)
                        $_SESSION["qb3"] += $point_deduction;
                    else
                        $_SESSION["qb3"] = "Died";
                    break;
            }
        } elseif ($which_bee >= 3 && $which_bee < 8) {//These are Worker Bees

            $point_deduction = -12;
            switch ($which_bee) {
                case 3:
                    if ($_SESSION["wb1"] > 12 && $_SESSION["qb1"] != "Died" && $_SESSION["qb2"] != "Died" && $_SESSION["qb3"] != "Died")
                        $_SESSION["wb1"] += $point_deduction;
                    else
                        $_SESSION["wb1"] = "Died";
                    break;

                case 4:
                    if ($_SESSION["wb2"] > 12)
                        $_SESSION["wb2"] += $point_deduction;
                    else
                        $_SESSION["wb2"] = "Died";
                    break;

                case 5:
                    if ($_SESSION["wb3"] > 12)
                        $_SESSION["wb3"] += $point_deduction;
                    else
                        $_SESSION["wb3"] = "Died";
                    break;

                case 6:
                    if ($_SESSION["wb4"] > 12)
                        $_SESSION["wb4"] += $point_deduction;
                    else
                        $_SESSION["wb4"] = "Died";
                    break;

                case 7:
                    if ($_SESSION["wb5"] > 12)
                        $_SESSION["wb5"] += $point_deduction;
                    else
                        $_SESSION["wb5"] = "Died";
                    break;
            }

        } else {//These are Drone Bees

            $point_deduction = -18;

            switch ($which_bee) {
                case 8:
                    if ($_SESSION["db1"] > 18)
                        $_SESSION["db1"] += $point_deduction;
                    else
                        $_SESSION["db1"] = "Died";
                    break;

                case 9:
                    if ($_SESSION["db2"] > 18)
                        $_SESSION["db2"] += $point_deduction;
                    else
                        $_SESSION["db2"] = "Died";
                    break;

                case 10:
                    if ($_SESSION["db3"] > 18)
                        $_SESSION["db3"] += $point_deduction;
                    else
                        $_SESSION["db3"] = "Died";
                    break;

                case 11:
                    if ($_SESSION["db4"] > 18)
                        $_SESSION["db4"] += $point_deduction;
                    else
                        $_SESSION["db4"] = "Died";
                    break;

                case 12:
                    if ($_SESSION["db5"] > 18)
                        $_SESSION["db5"] += $point_deduction;
                    else
                        $_SESSION["db5"] = "Died";
                    break;

                case 13:
                    if ($_SESSION["db6"] > 18)
                        $_SESSION["db6"] += $point_deduction;
                    else
                        $_SESSION["db6"] = "Died";
                    break;

                case 14:
                    if ($_SESSION["db7"] > 18)
                        $_SESSION["db7"] += $point_deduction;
                    else
                        $_SESSION["db7"] = "Died";
                    break;
            }
        }

    }


}

//Game Reset when clicked on reset button
if (isset($_POST['reset'])) {

//initial values for queen bees
    $_SESSION["qb1"] = 100;
    $_SESSION["qb2"] = 100;
    $_SESSION["qb3"] = 100;

//initial values for worker bees
    $_SESSION["wb1"] = 75;
    $_SESSION["wb2"] = 75;
    $_SESSION["wb3"] = 75;
    $_SESSION["wb4"] = 75;
    $_SESSION["wb5"] = 75;

//initial values for drone bees
    $_SESSION["db1"] = 50;
    $_SESSION["db2"] = 50;
    $_SESSION["db3"] = 50;
    $_SESSION["db4"] = 50;
    $_SESSION["db5"] = 50;
    $_SESSION["db6"] = 50;
    $_SESSION["db7"] = 50;

}

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bee Slap Game</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>


<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h3>Hit the Red Button to Slap Any Bee </h3>
            <hr/>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-9">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

                <!--making the beehive starts-->
                <input type="text" class="btn btn-default" placeholder="Queen Bee"
                       value="<?php echo (isset($_SESSION["qb1"])) ? "Queen Bee= " . $_SESSION["qb1"] : ''; ?>"
                       readonly/>
                <input type="text" class="btn btn-default" placeholder="Queen Bee"
                       value="<?php echo (isset($_SESSION["qb2"])) ? "Queen Bee= " . $_SESSION["qb2"] : ''; ?>"
                       readonly/>
                <input type="text" class="btn btn-default" placeholder="Queen Bee"
                       value="<?php echo (isset($_SESSION["qb3"])) ? "Queen Bee= " . $_SESSION["qb3"] : ''; ?>"
                       readonly/>

                <input type="text" class="btn btn-default" placeholder="Worker Bee"
                       value="<?php echo (isset($_SESSION["wb1"])) ? "Worker Bee= " . $_SESSION["wb1"] : ''; ?>"
                       readonly>
                <input type="text" class="btn btn-default" placeholder="Worker Bee"
                       value="<?php echo (isset($_SESSION["wb2"])) ? "Worker Bee= " . $_SESSION["wb2"] : ''; ?>"
                       readonly>
                <input type="text" class="btn btn-default" placeholder="Worker Bee"
                       value="<?php echo (isset($_SESSION["wb3"])) ? "Worker Bee= " . $_SESSION["wb3"] : ''; ?>"
                       readonly>
                <input type="text" class="btn btn-default" placeholder="Worker Bee"
                       value="<?php echo (isset($_SESSION["wb4"])) ? "Worker Bee= " . $_SESSION["wb4"] : ''; ?>"
                       readonly>
                <input type="text" class="btn btn-default" placeholder="Worker Bee"
                       value="<?php echo (isset($_SESSION["wb5"])) ? "Worker Bee= " . $_SESSION["wb5"] : ''; ?>"
                       readonly>


                <input type="text" class="btn btn-default" placeholder="Drone Bee"
                       value="<?php echo (isset($_SESSION["db1"])) ? "Drone Bee= " . $_SESSION["db1"] : ''; ?>"
                       readonly>
                <input type="text" class="btn btn-default" placeholder="Drone Bee"
                       value="<?php echo (isset($_SESSION["db2"])) ? "Drone Bee= " . $_SESSION["db2"] : ''; ?>"
                       readonly>
                <input type="text" class="btn btn-default" placeholder="Drone Bee"
                       value="<?php echo (isset($_SESSION["db3"])) ? "Drone Bee= " . $_SESSION["db3"] : ''; ?>"
                       readonly>
                <input type="text" class="btn btn-default" placeholder="Drone Bee"
                       value="<?php echo (isset($_SESSION["db4"])) ? "Drone Bee= " . $_SESSION["db4"] : ''; ?>"
                       readonly>
                <input type="text" class="btn btn-default" placeholder="Drone Bee"
                       value="<?php echo (isset($_SESSION["db5"])) ? "Drone Bee= " . $_SESSION["db5"] : ''; ?>"
                       readonly>
                <input type="text" class="btn btn-default" placeholder="Drone Bee"
                       value="<?php echo (isset($_SESSION["db6"])) ? "Drone Bee= " . $_SESSION["db6"] : ''; ?>"
                       readonly>
                <input type="text" class="btn btn-default" placeholder="Drone Bee"
                       value="<?php echo (isset($_SESSION["db7"])) ? "Drone Bee= " . $_SESSION["db7"] : ''; ?>"
                       readonly>
                <!--making the beehive ends-->
        </div>


        <div class="col-lg-3">
            <input type="submit" class="btn btn-danger" name="hit" value="Hit A Bee">
            <!--Hit button-->
        </div>
    </div>

    </form>

    <div class="row">
        <div class="col-lg-12">

            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" style="margin: 30px 0px 0px 300px;">

                <input type="submit" class="btn btn-success" name="reset" value="Reset The Game">

            </form>
        </div>
    </div>

</div>
</div>
<script src="js/jquery-1.11.1.min.js"></script>

<script src="js/bootstrap.js"></script>
<script>
    //hide the died bee
    $("input[value*='Died']").hide();


</script>
</body>
</html>

