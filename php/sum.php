<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_GET['num1']) && isset($_GET['num2'])) {
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $sum = $num1 + $num2;

    echo "<p>$sum</p>";
}
?>
<a href="form.html">Go back to the form</a>
</body>
</html>
