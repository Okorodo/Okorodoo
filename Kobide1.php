<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Validation</title>
</head>
<body>

<form action="" method="POST" role="form">
    <h1>Date Validation</h1>
    <label for="date">Enter Complete Date </label>
    <input type="date" name="date" id="date" aria-label="Enter date in the format YYYY-MM-DD" required>
    <button type="submit">Check</button>
</form>

<?php 
if ($_SERVER["REQUEST_METHOD"] ==  "POST"){
    $date = $_POST['date'];

    list($year, $month, $day) = explode("-", $date);

    echo getDayOfWeek((int)$year, (int)$month, (int)$day);
}
?>
    
<?php
function getDayOfWeek($year, $month, $day) {
    if (!checkdate($month, $day, $year)) {
        return "Invalid date entered!";
    }

    $isLeapYear = (($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400 == 0);
    $daysInMonth = [
        1 => 31,
        2 => $isLeapYear ? 29 : 28,
        3 => 31,
        4 => 30,
        5 => 31,
        6 => 30,
        7 => 31,
        8 => 31,
        9 => 30,
        10 => 31,
        11 => 30,
        12 => 31
    ];

    if ($day > $daysInMonth[$month]) {
        return "Invalid day for the given month!";
    }

    $timestamp = mktime(0, 0, 0, $month, $day, $year);
    $dayOfWeekNumber = date("w", $timestamp);

    switch ($dayOfWeekNumber) {
        case 0:
            return "Sunday";
            break;
        case 1:
            return "Monday";
            break;
        case 2:
            return "Tuesday";
            break;
        case 3:
            return "Wednesday";
            break;
        case 4:
            return "Thursday";
            break;
        case 5:
            return "Friday";
            break;
        case 6:
            return "Saturday";
            break;
        default:
            return "Invalid day!";
    }
}
?>

</body>
</html>