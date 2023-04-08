<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="sellercss.css" rel="stylesheet" type="text/css">
    <title>Buyer Chat</title>
</head>
<body>
    <table align="center">
        <tr>
            <td>
            <form action=" ../controller/buyer_chat_check.php" method="post" novalidate>
            <fieldset>
            <legend>Chat as Buyer</legend>
            <label for="username_buyer">Username: </label>
            <input type="text" name="username_buyer" id="username_buyer" placeholder="Enter username.."><br><br>
            <label for="text">Text: </label>
            <input type="text" name="text" id="text" placeholder="text">
            </td></tr>
                <tr align="right">
                    <td><input type="submit" value="Chat"></td>
                </tr>
            
            </fieldset>
    </form>
            </td>
        </tr>
    </table>
    
</body>
</html>