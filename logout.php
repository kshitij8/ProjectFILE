<?php
if(isset($_REQUEST['logout']))
{
    session_destroy();
    echo "<head><meta http-equiv=\"refresh\" content=\"0;URL=index.php\"></head>";
}
else
{
?>
        <br/>
        <p><a href="index.php?logout=yes">Logout</a></p>
<?php
    /*echo "<p><form method='POST' action='index.php'><input type='submit' value='Logout' name='logout'></form></p>";
    echo "are you sure you want to logout?<br/>";
    echo "<form method='post' action='index.php'><input type='submit' value='yes' name='logout'></form>";
    echo "<form method='post' action='index.php'><input type='submit' value='no'></form>";*/

}
?>
