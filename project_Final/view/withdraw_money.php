<style>    
    .class{
        border:0;
        width: 200px;
        height: 200px;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>

<table align="center" class="class">
	<tr>
		<td>
        <table class="class">
            <tr>
                <th>
                <!-- <?php
                    
                    if(isset($_SESSION['withdraw_ammount_err'])){
                        echo $_SESSION['withdraw_ammount_err'];
                        unset($_SESSION['withdraw_ammount_err']);
                    }
                    ?> -->
                    <br>
                    <form method="post" action="../controller/payment_method_validation.php" onsubmit="return withdraw()" novalidate>
                    <label for="ammount">Enter Withdraw Amount </label>
                    <input type="number" name="ammount" id="ammount">
                    <p id="withdraw_error"></p>
                    <input type="submit" value="Withdraw Money" class="button">
                </form>
                </th>
            </tr>
        </table>
        </td>
    </tr>
</table>
</body>
</html>