<?php
    session_start();
    if(!isset($_SESSION["uname"]))
        header("Location: index.php");
    // else
    //     header("Location: main.php");/// eekhne nicher code gula run krbe
?>
<html>
    <head>
        <title>Online Quiz</title>
    </head>
    <body>
    <div class="upper" style="margin:10px;border:5px inset blue;padding:10px">
        <strong style="font-size:30px">Welcome <?php echo $_SESSION["uname"];?></strong>
        <a href="logout.php" style="float:right;margin:10px">Log Out</a>
    </div>
    <div style="margin:50px">
        <form action="result.php" method="post">
        <?php
            $file=fopen("Question.txt","r");
            $question;
            $option;
            $cnt=0;
            $ans;
            $answer;
            while(!feof($file))
            {
                $q=trim(fgets($file));
                $code="Q".$cnt;
                $question[$code]=$q;
                $o1=trim(fgets($file));
                $o2=trim(fgets($file));
                $o3=trim(fgets($file));
                $o4=trim(fgets($file));
                $ans=trim(fgets($file));
                $tmp=array($o1,$o2,$o3,$o4);
                shuffle($tmp);
                $option[$code]=$tmp;
                $answer[$code]=$ans;
                $cnt+=1;
            }
            $shuffled_question = array();

            $keys = array_keys($question);
            shuffle($keys);
            foreach ($keys as $key)
            {
                $shuffled_question[$key] = $question[$key];
            }
            $serial=1;
            foreach($shuffled_question as $key=>$value)
            {
                echo "
                    <div style='border:2px solid grey;padding:10px;margin:2px;padding:5px;background:rgb(229, 232, 255)'><h4>".$serial.".".$value."</h4>
                    <input type='radio' name=".$key." value='".$option[$key][0]."'>".$option[$key][0]."
                    <input type='radio' name=".$key." value='".$option[$key][1]."'>".$option[$key][1]."
                    <input type='radio' name=".$key." value='".$option[$key][2]."'>".$option[$key][2]."
                    <input type='radio' name=".$key." value='".$option[$key][3]."'>".$option[$key][3]."
                    </div>
                    ";
                    $serial+=1;
            }
            $_SESSION["answer"]=$answer;
            echo "<br><input type='submit' name='submit' style='background:green;  border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'></input>";
            /*if(isset($_POST["submit"]))
            {
                $empty=0;
                $correct=0;
                $wrong=0;
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

               echo "<br><strong>Correct answer: ".$correct."<strong>";
                echo "<br><strong>Wrong answer: ".$wrong."<strong>";
                echo "<br><strong>No Answer: ".$empty."<strong>";
                
                echo "
                    <div style='border:2px solid grey;font-size:20px;padding:5px;margin-top:5px;background:rgb(247, 247, 74)'>
                        <strong>Correct answer: ".$correct."</strong>
                        <br><strong>Wrong answer: ".$wrong."</strong>
                        <br><strong>No Answer: ".$empty."</strong>
                    </div>
                ";
            }*/
        ?>
        </form>
    </div>
    </body>
</html>