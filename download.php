<?php
if(isset($_REQUEST['download_file']))
{
    $folder=$_GET['folder'];
    /*$path=$_SERVER['DOCUMENT_ROOT']."\\".$folder."\\";
    $fullpath=$path.$_GET['download_file'];*/
    $fullpath=$folder."\\".$_GET['download_file'];
    if(($fd=fopen($fullpath,'r')))
    {
      $fsize=filesize($fullpath);
      $path_parts=pathinfo($fullpath);
      $ext=strtolower($path_parts['extension']);
      switch($ext)
      {
          case "pdf":
              header("Content-type:application/pdf");
              header("Content-disposition:attachment;filename=\"".$path_parts['basename']."\"");
              break;
          default:
              header("Content-type:application/octet-stream");
              header("Content-disposition:filename=\"".$path_parts['basename']."\"");
      }
      header("Content-length:$fsize");
      header("Cache-control:private");
      while(!feof($fd))
      {
          $buffer=fread($fd,2044);
          echo $buffer;
      }
    }
    fclose($fd);
    exit;
    }
    /*else
 {
     ?>
<html>
    <body>
        <form>
            <a href="download.php?download_file=misc.php">Download here</a>
        </form>
    </body>
</html>
<?php
 }


*/?>