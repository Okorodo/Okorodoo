<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Number Check</title>
</head>
<body>

<form action="" method="POST" role="form">
    <h1>ARRAY NUMBER</h1>
    <label for="numbers">Enter your numbers (comma separated)</label>
    <input type="text" placeholder="Enter numbers, separated by commas" name="numbers" id="numbers" required aria-labelledby="numbers" /> <br><br>
    <label for="target">Enter target sum</label>
    <input type="number" placeholder="Enter target sum" name="target" id="target" min="1" required aria-labelledby="target">
    <button type="submit">Check</button>
</form> 


<?php 
if ($_SERVER["REQUEST_METHOD"] ==  "POST"){
    if (empty($_POST['numbers']) || !isset($_POST['target']) || !is_numeric($_POST['target'])) {
        echo 'Please fill in the numbers and target value correctly.';
    } else {
        $numbers = array_map('trim', explode(',', $_POST['numbers']));
        foreach ($numbers as $number) {
            if (!is_numeric($number)) {
                echo 'Please ensure all numbers are valid.';
                return;
            }
        }

        $target = $_POST['target'];
        $result = twoSum($numbers, $target);
        
        if (isset($result[0]) && is_numeric($result[0]) && isset($result[1]) && is_numeric($result[1])) {
            echo implode(' ', $result);
        } else {
            echo 'No valid pair was found that add up to the target.';
        }
    }
}
?>
<?php 

        
function twoSum($nums, $target) {
    $map = array();
    foreach ($nums as $key => $num) {
        $complement = $target - $num;
        if (isset($map[$complement])) {
            return [$map[$complement], $key];
        }
        $map[$num] = $key;
    }
    return ["No valid pair found!"];
}
?>
</body>
</html>