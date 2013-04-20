<html>
    <body>
        <?php
        if(!isset($_REQUEST['question']))
        {
        ?>
        <center><h1>Forgot Password!</h1>
            <br/><p>To reset your password enter the following details:</p>
        <form method="POST" action="forgotpassword.php" >
            <table><tr><td>Username:</td><td><input type="text" name="username"></td></tr>
                <tr>
            <?php
                include 'secquestionfetch.php';
                echo "</tr>";
                
              ?>
            <tr><td>Security Answer:</td><td><input type="text" name="answer"></td></tr>
            <tr><td></td><td><input type="Submit" value="Reset password"></td></tr>
        </table>
        </form></center>
<?php }
else
{
 include 'datab.php';
                $p=new data();
                if(!$p->dbsconnect())
                {
                    die("couldnot connect!!");
                }
                else
                {
                if(!mysql_select_db("filesystem"))
                    die("Could not open the Database!");
                else
                {
                $query="select * from users where username='".$_REQUEST['username']."'";
                $ele=mysql_query($query);
                    while ($row = mysql_fetch_array($ele))
                        {
                        if(($row['SQID']==$_REQUEST['question'])&&($row['SQAnswer']==$_REQUEST['answer']))
                        {
                           echo "Your password has been reset<br/>";
                           echo "your new password is:";
                           $new=rand(99999,9999999);
                           echo $new;
                           $new=md5($new);
                           $query="update users set password='".$new."'where username='".$_REQUEST['username']."'";
                           mysql_query("$query");
                        }
                        }
                }
                }
                $p->dbsdisconnect();


}?>

    </body>
</html>
