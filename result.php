<html>
    <head>
        <title>Result</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="upper" style="margin:10px;border:5px inset blue;padding:10px">
        <strong style="font-size:30px">Result</strong>
        <a href="logout.php" style="float:right;margin:10px">Log Out</a>
    </div>
    </body>
</html>

<?php
    session_start();
    if(!isset($_SESSION["uname"]))
        header("Location: logout.php");
    else
    {
        check_res();
    }

    function check_res()
    {
        if(isset($_POST["submit"]))
        {
            $empty=0;
            $correct=0;
            $wrong=0;
            $answer=$_SESSION["answer"];
            for($i=0;$i<count($answer);$i++)
            {
             //echo $_POST["Q".$i].$answer["Q".$i];
             if(isset($_POST["Q".$i]))
             {
                 if($_POST["Q".$i]==$answer["Q".$i])
                    $correct+=1;
                else
                    $wrong+=1;
             }
             else
             {
                 $empty+=1;
             }
            }

           /*echo "<br><strong>Correct answer: ".$correct."<strong>";
            echo "<br><strong>Wrong answer: ".$wrong."<strong>";
            echo "<br><strong>No Answer: ".$empty."<strong>";
            */
            echo "
                <div style='border:2px solid grey;font-size:20px;padding:5px;background:rgb(247, 247, 74);margin:10px;;margin-top:50px'>
                    <strong>Correct answer: ".$correct."</strong>
                    <br><strong>Wrong answer: ".$wrong."</strong>
                    <br><strong>No Answer: ".$empty."</strong>
                    <br><a href='test.php' align='center' style='margin-top:30px'>Take Quiz Again!</a>
                </div>
            ";
        }
    }
?>