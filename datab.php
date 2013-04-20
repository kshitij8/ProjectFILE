<?php

class data {

  private $con;
  public function dbsconnect()
  {
                $this->con=mysql_connect("localhost","root","");
                return $this->con  ;
  }
  public function dbsdisconnect()
  {
      if(mysql_close($this->con))
          return TRUE;
      else FALSE;
  }
}
?>
