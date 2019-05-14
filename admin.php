<?php
    session_start();
    if(!isset($_SESSION["uname"]))
    {
        header("Location: logout.php");
    }
    if(!isset($_SESSION["quest"]))
    {
        $_SESSION["quest"]="";
    }
    if(!isset($_SESSION["opt1"]))
    {
        $_SESSION["opt1"]="";
    }
    if(!isset($_SESSION["opt2"]))
    {
        $_SESSION["opt2"]="";
    }
    
    if(!isset($_SESSION["opt3"]))
    {
        $_SESSION["opt3"]="";
    }
    
    if(!isset($_SESSION["opt4"]))
    {
        $_SESSION["opt4"]="";
    }
    $msg1="";
    $msg2="";
    $msg3="";
    if(isset($_GET["e"]))
    {
        if($_GET["e"]==0)
        {
            $msg1="*Question Cannot Be Empty!";
        }
        else if($_GET["e"]==1)
        {
            $msg2="*Option Cannot Be Empty!";
        }
        else if($_GET["e"]==2)
        {
            $msg3="*Answer doesnot match with options!";
        }
    }
?>
<html>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="style2.css">
    </head>
    <body>
    <div class="upper" style="margin:10px;border:5px inset blue;padding:10px">
        <strong style="font-size:30px">Welcome <?php echo $_SESSION["uname"];?></strong>
        <a href="logout.php" style="float:right;margin:10px">Log Out</a>
    </div>
    <div class="question" align="center">
        <h2 align="center">Add Question</h2>
        <form action="admin.php" method="post">
            <input type="textbox" name="quest" id="ques" placeholder="<?php if($_SESSION["quest"]=="") echo"Question";?>" value="<?php if(isset($_SESSION["quest"])) echo htmlentities($_SESSION["quest"]);?>"><div id="inv"><?=$msg1?></div>
            <input type="textbox" name="opt1" id="opt" placeholder="<?php if($_SESSION["opt1"]=="") echo"Option 1";?>" value="<?php if(isset($_SESSION["opt1"])) echo htmlentities($_SESSION["opt1"]);?>"><br>
            <input type="textbox" name="opt2" id="opt" placeholder="<?php if($_SESSION["opt2"]=="") echo"Option 2";?>" value="<?php if(isset($_SESSION["opt2"])) echo htmlentities($_SESSION["opt2"]);?>"><br>
            <input type="textbox" name="opt3" id="opt"  placeholder="<?php if($_SESSION["opt3"]=="") echo"Option 3";?>" value="<?php if(isset($_SESSION["opt3"])) echo htmlentities($_SESSION["opt3"]);?>"><br>
            <input type="textbox" name="opt4" id="opt" placeholder="<?php if($_SESSION["opt4"]=="") echo"Option 4";?>" value="<?php if(isset($_SESSION["opt4"])) echo htmlentities($_SESSION["opt4"]);?>"><br>
            <div id="inv"><?=$msg2?></div>
            <input type="textbox" name="ans" id="opt" placeholder="Answer"><br>
            <div id="inv"><?=$msg3?></div>
            <input type="submit" name="Submit" id="sub">
        </form>
        <?php
            if(isset($_POST["Submit"]))
            {
                $quest=trim($_POST["quest"]);
                $opt1=trim($_POST["opt1"]);
                $opt2=trim($_POST["opt2"]);
                $opt3=trim($_POST["opt3"]);
                $opt4=trim($_POST["opt4"]);
                $ans=trim($_POST["ans"]);
                if($quest=="")
                {
                    header("Location: admin.php?e=0");
                }
                else if($opt1==""||$opt2==""||$opt3==""||$opt4=="")
                {
                    $_SESSION["quest"]=$quest;
                    if($opt1!="")
                    {
                        $_SESSION["opt1"]=$opt1;
                    }
                    if($opt2!="")
                    {
                        $_SESSION["opt2"]=$opt2;
                    }
                    if($opt3!="")
                    {
                        $_SESSION["opt3"]=$opt3;
                    }
                    if($opt4!="")
                    {
                        $_SESSION["opt4"]=$opt4;
                    }
                    header("Location: admin.php?e=1");
                }
                else if($opt1!=$ans&&$opt2!=$ans&&$opt3!=$ans&&$opt4!=$ans)
                {
                    $_SESSION["quest"]=$quest;
                    $_SESSION["opt1"]=$opt1;
                    $_SESSION["opt2"]=$opt2;
                    $_SESSION["opt3"]=$opt3;
                    $_SESSION["opt4"]=$opt4;
                    header("Location: admin.php?e=2");
                }
                else
                {
                    $_SESSION["quest"]="";
                    $_SESSION["opt1"]="";
                    $_SESSION["opt2"]="";
                    $_SESSION["opt3"]="";
                    $_SESSION["opt4"]="";
                    $file=fopen("Question.txt","a");
                    fwrite($file,PHP_EOL.$quest.PHP_EOL);
                    fwrite($file,$opt1.PHP_EOL);
                    fwrite($file,$opt2.PHP_EOL);
                    fwrite($file,$opt3.PHP_EOL);
                    fwrite($file,$opt4.PHP_EOL);
                    fwrite($file,$ans);
                    header("Location: admin.php");
                }
            }
        ?> 
    </div>
    </body>
</html>
 