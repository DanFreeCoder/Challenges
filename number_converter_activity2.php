<?php

function octa($number)
{
    $octal_divisor = 8;
    $array = [];
    do {
        $remainder = $number % $octal_divisor;
        $number = intdiv($number, $octal_divisor); // Update the number to be the quotient for the next iteration
        $array[] = $remainder;
    } while ($number > 0);
    $octal = '';
    for ($i = count($array) - 1; $i >= 0; $i--) {
        $octal .= $array[$i];
    }
    echo '<h1>Octal: ' . $octal . '</h1>';
}


function hex($number)
{
    $hex_divisor = 16;
    $hex = '';
    $hexVal = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'A', 'B', 'C', 'D', 'E', 'F'];
    do {
        $remainder = $number % $hex_divisor;
        $number = intdiv($number, $hex_divisor); // Update the number to be the quotient for the next iteration
        $hex = $hexVal[$remainder] . $hex;
    } while ($number > 0);

    echo '<h1>Hexadecimal: ' . $hex . '</h1>';
}

function binary($number)
{
    $bin_divisor = 2;
    $binVal = [0, 1];
    $bin = '';
    do {
        $remainder = $number % $bin_divisor;
        $number = intdiv($number, $bin_divisor); // Update the number to be the quotient for the next iteration
        $bin = $binVal[$remainder] . $bin;
    } while ($number > 0);

    echo '<h1>Binary: ' . $bin . '</h1>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decimal to Octal, Hexadecimal, Binary</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>
    <center>
        <h1>Decimal to Octal, Hexadecimal, Binary</h1>
    </center>
    <center>
        <form method="post" action="activity2.php">
            <input type="number" name="number" placeholder="Enter number" required>
            <button type="submit">Convert</button>
        </form>

        <?php
        if (isset($_POST['number'])) {
            $number = $_POST['number'];

            octa($number);
            hex($number);
            binary($number);
        }

        ?>
    </center>
</body>

</html>