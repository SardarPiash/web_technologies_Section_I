<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="task1.php">
        <label for="num">Input a Number:</label>
        <input type="number" name="num" id="num">
        <input type="submit" value="submit"><hr>
    </form>

    <?php
    $number=$_GET['num'];
    $result=1;

    echo "<table border=1 align=center>";
    for($i=1;$i<=10;$i++)
    {
        $result=$number*$i;
        
        echo "
        <tr> <td>$number</td> <td>*</td><td> $i</td><td>=</td><td>$result</td></tr>";
    } 
    echo "</table>";
    

    ?>
</body>
</html>