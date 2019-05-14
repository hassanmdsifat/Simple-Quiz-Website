<?php
    session_start();
    $file=fopen("user.txt","r");
    while(!feof($file))
    {
        $cusername=fgets($file);
        $arr=explode(":",$cusername);
        $cus=trim($arr[1]);

        $cusername=fgets($file);
        $arr=explode(":",$cusername);
        $cpass=trim($arr[1]);

        $cusername=fgets($file);
        $arr=explode(":",$cusername);
        $ctype=trim($arr[1]);

        if($cus==trim($_POST["uname"]))
        {
            break;
        }
    }
    $uname=trim($_POST["uname"]);
    $upass=trim($_POST["upass"]);

    if($uname=="")
    {
        header("Location: index.php?e=1'");
    }
    else if($upass=="")
    {
        header("Location: index.php?e=2'");
    }
    else
    {
        if($uname==$cus&&$upass==$cpass&&$ctype=="user")
        {
            header("Location: test.php");
        }
        else if($uname==$cus&&$upass==$cpass&&$ctype=="user")
        {
            header("Location: test.php");
        }
        else
        {
            header("Location: index.php?e=3'");
        }
    }

?>