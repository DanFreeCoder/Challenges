<?php
function get_calendar_by_year($year)
{
    $num_of_month = [1,'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    foreach ($num_of_month as $num => $string) {
        if ($num > 0) {
            echo "<h1>$string</h1>";
            $number_of_days = cal_days_in_month(CAL_GREGORIAN, $num, $year);
            echo "<ul>";
            for ($day = 1; $day <= $number_of_days; $day++) {
                $dayString = date('l', strtotime("$year-$num-$day"));
                $date = date('d', strtotime("$year-$num-$day"));
                echo "
                        
                        <div class='list'>
                        <p class='text-center'><strong>".$dayString."</strong></p>
                        <li class='text-center'><time datetime=''>".$date."</time></li>
                        </div>
                ";
            }
            echo "</ul>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.scss">
</head>

<body>
    <form action="calendar_activity1.php" method="post" class="d-flex gap-2 mt-3">
        <input type="text" placeholder="Enter a year" class="form-control" name="year">
        <button type="submit" class="btn btn-success btn-sm">Submit</button>
    </form>
    <?php
    if (isset($_POST['year'])) {
        echo "<h1>Year of " . $_POST['year'] . "</h1><br>";
        
        get_calendar_by_year($_POST['year']);
    } else {
        echo "<h1>Year of " . date('Y') . "</h1><br>";
        
        get_calendar_by_year(date('Y'));
    }
    ?>


</body>

</html>
