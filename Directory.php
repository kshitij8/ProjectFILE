<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Directory
 *
 * @author CETPA
 */
class Directry {
    public function getalldir($dir = '.', $exclude = array( 'cgi-bin', '.', '..' ))
    {

        
        /*if($Folder=='.')
        {
            $Folder=$_SERVER['DOCUMENT_ROOT'];
        }
        if(chdir($Folder))
        {
            $dirstruct=scandir($Folder);
        $i=0;
        while(isset($dirstruct[$i]))
        {
            if ((!is_file($dirstruct[$i]))&&($dirstruct[$i]!=".")&&($dirstruct[$i]!=".."))
            {
                echo $dirstruct[$i]."<br/>";
                echo "-->";
                $temp=new Directry();
                $f=getcwd()."\\".$dirstruct[$i];
                $temp->getalldir($f);
            }
            ++$i;
        }}*/
    $exclude = array_flip($exclude);
    if(!is_dir($dir))
    {
        return;
    }

    $dh = opendir($dir);

    if(!$dh)
    {
        return;
    }

    $stack = array($dh);
    $level = 0;

    while(count($stack))
    {
        if(false !== ( $file = readdir( $stack[0] ) ) )
        {
            if(!isset($exclude[$file]))
            {
                print str_repeat('&nbsp;', $level * 4);
                if(is_dir($dir . '/' . $file))
                {
                    $dh = opendir($file . '/' . $dir);
                    if($dh)
                    {
                        print "<strong>$file</strong><br />\n";
                        
                        array_unshift($stack, $dh);
                        ++$level;
                    }
                }
                else
                {

                    print "$file<br />\n";
                }
            }
        }
        else
        {
            closedir(array_shift($stack));
            --$level;
        }
    }

        
    }
    public function createdir()
    {

    }
    public function renamedir()
    {

    }
    public function getallfile()
    {
    if(isset ($_GET['Folder']))
    {
    $Folder=$_GET['Folder'];
    }
    else $Folder=getcwd ();
    $Handle=opendir("$Folder");
    echo "<table>";
    echo"<tr><td>File Name</td></tr>";
    echo "";
    while(($i=readdir($Handle))!=FALSE)
    {
       
       if(is_file($i))
       {
       $fd=fopen($i,"r");
       $path_parts=pathinfo($i);
       $ext=strtolower($path_parts['extension']);
       echo "<tr  ><td >".$i."</td><td><a href=\"Delete.php?File=$Folder%5C$i\"> Delete</a></td>";
       if($ext=="txt")
       echo "<td><a href=\"Modify.php?File=$i&Folder=$Folder\"> Modify</a></td><td>";
       else echo"<td style=\"width:30px\"></td><td>";
       echo "<a href=\"Rename.php?File=$i&Folder=$Folder\"> Rename</a></td><td><a href=\"Relocate.php?File=$i&Folder=$Folder\"> Relocate</a></td>";
       /*if($ext=="txt")
       echo "<td><a href=\"$Folder/$i\">View File</a></td>";*/
       echo"<td><a href=\"download.php?download_file=$i&folder=$Folder\">Download File</a></td>";
       echo"</tr>";
       }
    }
    echo "</table>";
    closedir($Handle);
    }
}
?>
