<?php
if(isset($_GET['File']))
{
    $file=$_GET['File'];
    if(is_file("$file"))
        {
            if(unlink("$file"))
            {
                
                echo "File Successfully Deleted";
            }
            else "File cannot be deleted!!";
            echo "<form action='index.php'><input type='submit' value='Return to home page'/></form>";
        }
    else echo "files does not exist";
}
        ?>
