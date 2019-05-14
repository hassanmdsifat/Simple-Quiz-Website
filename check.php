<?php
    session_start();
    $file=fopen("user.txt","r");
    while(!feof($file))
    {
        $uname=trim(fgets($file));
        $upass=trim(fgets($file));
        $type=trim(fgets($file));
        if($uname==$_POST["uname"])
        {
            break;
        }
    }
    $cuname=trim($_POST["uname"]);
    $cpass=trim($_POST["upass"]);
    if($cuname=="")
    {
        header("Location: index.php?e=0");
    }
    else if($cpass=="")
    {
        header("Location: index.php?e=1");
    }
    else
    {
        if($uname==$cuname&&$upass==$cpass)
        {
            if($type=="admin")
            {
                $_SESSION["uname"]=$uname;
                header("Location: admin.php");
            }
            else
            {
                $_SESSION["uname"]=$uname;
                header("Location: test.php");
            }
        }
        else
        {
            header("Location: index.php?e=2");
        }
    }


?>