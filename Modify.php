<?php
$folder=$_GET['Folder'];
$file=$_GET['File'];
chdir($folder);
function filecheck($a)
        {
            if(!file_exists($a))
            {
                throw new Exception("File Does not exist");
            }return true;
        }
try{
            if(filecheck($file))
                {
$read=fopen("$file",'r');
if(isset ($_POST['Text']))
{
$data=$_POST['Text'];
$write=fopen("$file",'w');
if(fwrite($write,$data))
{
    echo "File Successfully modified";
}
 else {
    echo "File modification failed!!";
echo "<form action='index.php'><input type='submit' value='Return to home page'/></form>";
}
fclose($write);
}
else
{
    echo "<form method='POST' action='modify.php?File=$file&Folder=$folder'>Enter the content you wish to append to the file:<textarea rows='10' cols='40' name='Text'>";
    while(!feof($read))
    {
        echo fgets($read,1024);
        
    }
    echo "</textarea><input type='Submit' value='Append'></form>";
}fclose($read);
 }

            }
        catch(Exception $e)
            {
                echo 'Message:'.$e->getMessage();
            }

?>
