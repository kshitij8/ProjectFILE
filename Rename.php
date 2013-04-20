<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php if(isset($_SESSION['user']))
{?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $file=$_GET['File'];
        function filecheck($a)
        {
            if(!file_exists($a))
            {
                throw new Exception("File Does not exist");
            }return true;
        }
        $Folder=$_GET['Folder'];
        try{
            chdir($Folder);
            if(filecheck($file))
                {
        if(isset($_POST['New']))
        {

            $fd=fopen($file,"r");
            $path_parts=pathinfo($file);
            $ext=strtolower($path_parts['extension']);
            $new=$_POST['New'].".".$ext;
            fclose($fd);
            if(rename("$file","$new"))
                    echo "File Successfully Renamed!!";
            else echo"Renaming Failed!!";
            echo "<form action='index.php'><input type='submit' value='Return to home page'/></form>";

        }
        else
        {
            echo "<form method='POST' action=\"Rename.php?File=$file&Folder=$Folder\">Enter the new name for the file:<input type='text' name='New'><input type='Submit' value='Rename' ></form>";
        }
                }
                
            }
        catch(Exception $e)
            {
                echo 'Message:'.$e->getMessage();
            }
            
        
        ?>
    </body>
</html>
<?php }
else {?>
<html>
        <body style="PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 0px">
        <table>
        <tr><td><?php
        include'header.html' ?> </td></tr><body>
        <tr><td>
        <center><h1>You're not authorized to access this page</h1>
        <p>This maybe because:<br/></p>
        <p>1. You did not login or your session expired.</p>
        <p>2. You don't have privileges to access this page.<br/></p>
        <a href="index.php">Click here to return to home-page!</a></center>
        </td></tr>
                    <tr><td><h1><?php
                    include'footer.html'  ?> </h1></td></tr>
        </table>
        </body>
</html>
<?php }?>

