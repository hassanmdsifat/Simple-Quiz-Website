<?php
    $msg1="";
    $msg2="";
    $msg3="";
    if(isset($_GET["e"]))
    {
        if($_GET["e"]==0)
        {
            $msg1="*User Name Can't be empty";
        }
        else if($_GET["e"]==1)
        {
            $msg2="*Password Can't be empty";
        }
        else if($_GET["e"]==2)
        {
            $msg3="*Invalid ID or PassWord";
        }
    }

?>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

        <div class="login" align="center">
            <h1>Online Quiz Managment System</h1>
            <form action="check.php" method="post">
                <table style="margin-top:50px">
                    <tr>
                        <td>
                            <p align="center"><strong>LogIn<strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="textbox" name="uname" placeholder="User Name"></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="upass" placeholder="Password"></td>
                    </tr>
                    <tr>
                        <td id="inv"><?=$msg1?></td>
                </tr>
                    <tr>
                        <td id="inv"><?=$msg2?></td>
                    </tr>
                    <tr>
                        <td id="inv"><?=$msg3?></td>
                    </tr>
                    <tr>
                    <td><input type="submit" name="Login" id="Logbtn" value="Login"></td>
                    </tr>

                </table>
            </form>
        </div>
</body>
</html>