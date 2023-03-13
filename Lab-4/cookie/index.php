
<?php
$color='white';
if (isset($_COOKIE['mycookie']))
{
      $color=$_COOKIE['mycookie'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body style="background-color:<?php echo $color ?>">
    <h2>Cookie Example</h2>
    <?php
    
    date_default_timezone_set('Asia/Dhaka');
    $timezone = date_default_timezone_get();
    echo "Time Zone: " . $timezone;
    ?>
    <hr>
    <br>
    <h2>Set Cookie</h2>
    <br>
    <hr>
    <form action="action.php" method="post" novalidate>
      <table>
        <tr>
            <td>
                <label for="color">Select a color:</label>
                <input type="color" id="color" name="color">
            </td>
        </tr>
        <tr>
            <td>
                <label for="time">Expire on :</label>
                <input type="datetime-local" id="time" name="time">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Set cookie">
            </td>
        </tr>
      </table>
    </form>
    <hr>
    <br>
    <h2>Destroy cookie</h2>
    <br><hr>
    <form action="destroycookie.php" method="post" novalidate>
    <table>
        <tr>
            <td><input type="submit" value="Destroy cookie" name="cookie"></td>
        </tr>
    </table>
    </form>
</body>
</html>