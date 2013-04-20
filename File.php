<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of File
 *
 * @author Valued Acer Customer
 */
class File {
    public function read()
    {

    }
    public function write()
    {

    }
    public function zipread()
    {

    }
    public function download()
    {



    }
    public function upload()
    {
        $action="File%5CUpload";
        $target="$F/".basename($_FILES['upload']['name']);
        if(move_uploaded_file($_FILES['upload']['tmp_name'],$target))
                    echo "File successfully uploaded!";
               else echo "File uploading Failed!!";
               header("location:index.php?");

    }
    public function encrypt()
    {

    }
    public function decrypt()
    {

    }
}
?>
