<style>    
    .class{
        border:0;
        width: 200px;
        height: 200px;
    }
</style>
<table align="center" class="class">
	<tr>
		<td>
        <table class="class">
            <tr>
                <th>
                <!-- <?php
                    
                    if(isset($_SESSION['withdraw_ammount_err'])){
                        echo $_SESSION['withdraw_ammount_err'];
                        echo"success";
                        unset($_SESSION['withdraw_ammount_err']);
                    }
                    ?> -->
                    <br>
                    <form method="post" action="../controller/payment_method_validation.php" novalidate>
                    <label for="ammount">Enter Withdraw Amount </label>
                    <input type="number" name="ammount" id="ammount">
                    <input type="submit" value="Withdraw Money" style="color: green; display: block; margin: 0 auto;">
                </form>
                </th>
            </tr>
        </table>
        </td>
    </tr>
</table>