<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGPA Calculator</title>
</head>
<body>
    <form action="" method="POST" role="form">
    <h1>CGPA CONVERTER</h1>
    <label for="cgpa">Enter CGPA</label>
    <input type="text" placeholder="Input your CGPA" name="cgpa" id="cgpa" min="1" max="4.0" required aria-labelledby="cgpa">
    <button type="submit">Check</button>
    </form>
    <?php 
     if ($_SERVER["REQUEST_METHOD"] ==  "POST"){
            $cgpa = $_POST['cgpa'];

            echo calculateGrade($cgpa);
        }
    ?>
    <?php
    function calculateGrade($cgpa) {
        $grade = '';
        if ($cgpa > 4.0 || $cgpa < 1) {
            return "Invalid CGPA value. Please enter a number between 1 and 4.";
        } else if ($cgpa >= 4.0) {
            return "CGPA: $cgpa, Grade: Excellent (A)";
        } elseif ($cgpa >= 3.5) {
            return "CGPA: $cgpa, Grade: Very Good (B+)";
        } elseif ($cgpa >= 3.0) {
            return "CGPA: $cgpa, Grade: Good (B)";
        } elseif ($cgpa >= 2.5) {
            return "CGPA: $cgpa, Grade: Fair (C+)";
        } elseif ($cgpa >= 2.0) {
            return "CGPA: $cgpa, Grade: Pass (C)";
        } else {
            return "CGPA: $cgpa, Grade: Fail (F)";
        }
    }
    ?>
</body>
</html>