<?php
class user {
    public function getlogin()
    {
                include 'datab.php';
                $user=$_REQUEST['Username']; 
                if(filter_var($user,FILTER_VALIDATE_EMAIL)==FALSE)
                    {
                        echo "<br/><font color='red'>Invalid Email-ID entered!!</font>";
                    }
                $pass=$_REQUEST['Password'];
                $enc=md5($pass);

                $u=new data();
                if(!$u->dbsconnect())
                {
                    die("couldnot connect!!");
                }
                else
                {
                if(!mysql_select_db("filesystem"))
                    die("Could not open the Database!");
                else
                {
                $pas=mysql_query("select password from users where username=\"$user\"");
                while ($row = mysql_fetch_array($pas)) 
                {
                     if($enc==$row['password'])
                    {
                        echo "You have been successfully logged in!!";
                        $_SESSION['user']=$user;
                        echo "<head><meta http-equiv=\"refresh\" content=\"0;URL=index.php\"></head>";
                    }
                    else echo "<font color='red'>Incorrect username/password!</font>";
                    $u->dbsdisconnect();
                }}
                

}}
public function createneuser()
{
 ?>
<h2>New User Registration</h2>
<h4>Please fill in the details below</h4>
<form method="POST" action="index.php">
                    <table>
                        <tr><td>Enter your-email id:</td><td><input type="text" name="username"></td></tr>
                        <tr><td>Create password:</td><td><input type="password" name="password"></td><td>(must be atleast 6 characters long)</td></tr>
                        <tr><td>Confirm password:</td><td><input type="password" name="password2"></td></tr>
                        <tr><?php include 'secquestionfetch.php' ?></tr>
                        <tr><td>Security Answer:</td><td><input type="text" name="answer"></td></tr>
                        <tr><td>User type:</td><td><select name="usertype">
                                            <option value="0">Free</option>
                                            <option value="1">Paid</option>
                                        </select></td></tr>
                        <tr><td></td><td><input type="submit" value="Register" name="register" /></td></tr>
        </table></form>
    <?php
}
}
?>
