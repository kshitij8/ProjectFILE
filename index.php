<?php
if(!isset($_SESSION['id']))
{session_start();}
    ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link >
        <title></title>
    </head>
    <body style="PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 0px">
        <table>
            <tr><td><?php
            include'header.html' ?> </td></tr>
            <tr><table><tr>
            <td style="background-color:beige" >
                <div style="width:300px ">
                    
            <?php
            if(isset($_SESSION['user']))
            {$startdir=$_SERVER['DOCUMENT_ROOT']."\\dir";
            chdir($startdir);
            include 'Directory.php';
            $te=$_SERVER['DOCUMENT_ROOT'];
            $access=new Directry();
            $access->getalldir();
            chdir($startdir);
            }?>
                </div>
            </td><td style="width:900px; text-align:center  ">
            <?php
            if((!isset($_SESSION['user']))&&(!isset($_REQUEST['username']))&&(!isset($_REQUEST['forgot']))&&(!isset($_REQUEST['newuser']))&&(!isset($_REQUEST['register'])))
            {
                include 'login.php';
            }
            if(isset($_REQUEST['forgot'])){
                include 'forgotpassword.php';
                
            }
            if(isset($_REQUEST['register']))
            {
                include 'register.php';
            }
            if(isset($_REQUEST['newuser']))
            {
                include 'user.php';
                $newuser=new user();
                $newuser->createneuser();
            }
            if(isset($_REQUEST['Username'])&&isset($_REQUEST['Password']))
            {
                include 'user.php';
                $user=new user();
                $user->getlogin();
                 
            }
            if(isset($_SESSION['user']))
            {
                $user=$_SESSION['user'];
                echo "<h2>Hello ".$user."</h2><br/>";
                echo "<h1>Welcome!!"."</h1><br/><br/>";
                $access->getallfile();
                $Folder=getcwd();
                
                
            }
            ?>
                    </td><td style="background-color:beige">
                        <div style="width:200px ">
                            <?php
                            if(isset($_SESSION['user']))
                            {
                                include 'userstats.php';
                                echo "<p><a href='Upload.php'>Upload a New File</a>";
                                include 'logout.php';
                                if(isset($_REQUEST['operation']))
                                {
                                echo $_REQUEST['action'];
                                if($_REQUEST['operation']==TRUE)
                                {
                                    echo " Successful.";
                                }
                                if($_REQUEST['operation']==FALSE) echo " Failed!!!";
                                }
                                echo "<p><a href='feedbackform.php'>Submit Feedback </a></p>";
                            }
                            ?>
                        </div>
                    </td></tr></table></tr>
                    <tr><td><h1><?php
                    include'footer.html'  ?> </h1></td></tr>
        </table>
    </body>
</html>
<?php if(isset($_FILES['upload']))
    
    ?>