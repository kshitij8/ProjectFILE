<?php
if(!isset($_REQUEST['username']))
{
?>
<form method="POST" action="feedbackform.php">
Enter the Username:<input type="text" name="username" value="" />
<br/>
Subject:<input type="text" name="subject" value="" />
<br/>
Complain/Problems:<br/><textarea name="complaint" rows="10" cols="30">
</textarea>
<br/><input type="submit" value="Submit" />
</form>
<?php
}
 else {
    include 'datab.php';
    $c=new data();
    $con=$c->dbsconnect();
    if(!$con)
    {
         die("couldnot connect!!");
    }
    else
    {
         if(!mysql_select_db("filesystem"))
         die("Could not open the Database!");
         else
         {
             $query="insert into feedback values('".$_REQUEST['username']."','".$_REQUEST['subject']."','".$_REQUEST['complaint']."');";
             if(mysql_query($query))
             {
                 echo "Feedback Successfully Submitted!!";
             }else echo "Could not submit feedback!!";
             
         }
    $c->dbsdisconnect();
}}

?>
