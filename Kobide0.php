<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palindrome Checker</title>
</head>
<body>

<form action="" method="POST" role="form">
    <h1>Palindrome Check</h1>
    <label for="text">Enter your text </label>
    <input type="text" name="text" id="text" aria-label="Enter your text below" required>
    <button type="submit">Check</button>
</form>

<?php 
function isPalindrome($s) {
    $s = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $s)); 
    return $s === strrev($s);
}

if ($_SERVER["REQUEST_METHOD"] ==  "POST"){
    $text = $_POST['text'];
    if(!empty($text)){
        if(isPalindrome($text)){
            echo "The text \"$text\" is a palindrome.";
        } else {
            echo "The text \"$text\" is not a palindrome.";
        }
    } else {
        echo "Please enter text!";
    }
}
?>

</body>
</html>