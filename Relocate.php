<?php
if(isset($_POST['Foldern']))
{
$foldern=$_POST['Foldern'];
$folder=$_POST['Folder'];
$file=$_POST['File'];
$filen=$file;
$file=$folder.'\\'.$file;
$filen=$foldern.'\\'.$filen;
if(copy($file,$filen))
{
    echo "File relocated!!";
    unlink($file);
}
else
    echo "unable to move file!!";
echo "<form action='index.php'><input type='submit' value='Return to home page'/></form>";
 
}
else
{
    $folder=$_GET['Folder'];
    $file=$_GET['File'];
    $Struct=scandir(getcwd());
            $i=2;
            echo "<form method='POST' action='Relocate.php'>";
            echo "<input type='Hidden' name='Folder' value=$folder >";
            echo "<input type='Hidden' name='File' value=$file> ";
            echo "<select name='Foldern'>";
            while($Struct[$i])
            {
                if (!is_file($Struct[$i]))
                    if($Struct[$i]!=$folder)
                        echo "<option value=\"$Struct[$i]\">$Struct[$i]</option>";
                ++$i;
            }
            echo "</select><input type='submit' name='Submit'/>";
}

?>
