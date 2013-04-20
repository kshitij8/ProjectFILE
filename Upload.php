<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       $F=$Folder=$_SERVER['DOCUMENT_ROOT']."/"."Uploads";
        if(isset($_FILES['upload']))
           {
           
               $target="$F/".basename($_FILES['upload']['name']);
               if(move_uploaded_file($_FILES['upload']['tmp_name'],$target))
                    echo "File successfully uploaded!";
               else echo "File uploading Failed!!";
               echo "<form action='index.php'><input type='submit' value='Return to home page'/></form>";
           }
           else
           {
               echo "<form enctype='multipart/form-data' method='POST' action=\"Index.php\">";
               echo "File:<input name='upload' type='file'/><input type='submit'value='Upload'/></form>";
           }
       

               ?>
    </body>
</html>
