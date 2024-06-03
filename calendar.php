<?php
function get_calendar_by_year($year)
{
    $num_of_month = [0, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    foreach ($num_of_month as $num => $string) {
        if ($num > 0) {
            echo "<h1>$string</h1>" . "<br>";
            $number_of_days = cal_days_in_month(CAL_GREGORIAN, $num, $year);
            for ($day = 1; $day <= $number_of_days; $day++) {
                $dayString = date('l', strtotime("$year-$num-$day")) . '<br>';
                $date = date('d', strtotime("$year-$num-$day")) . '<br>';
                echo "
                <table class='table'>
                <thead>
                <th>$dayString</th>
                 </thead>
                    <tbody>
                        <tr>
                            <td>$date</td>
                        </tr>
                    </tbody>
                    </table>
                ";
            }
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
</head>

<body>
    <form action="index.php" method="post">
        <input type="text" placeholder="Enter a year" name="year">
        <button type="submit" class="btn btn-success btn-sm">Submit</button>
    </form>
    <?php
    if (isset($_POST['year'])) {
        echo "<h1>Year of " . $_POST['year'] . "</h1><br>";
        get_calendar_by_year($_POST['year']);
    } else {
        echo 'Enter Year';
    }
    ?>
</body>

</html>