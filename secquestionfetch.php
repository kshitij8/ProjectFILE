<?php
include 'datab.php';
                $p=new data();
                $c=$p->dbsconnect();
                if(!$c)
                {
                    die("couldnot connect!!");
                }
                else
                {
                if(!mysql_select_db("filesystem"))
                    die("Could not open the Database!");
                else
                {
                    $ele=mysql_query("select * from question");
                    echo "<td>Select the security question:</td><td><select name='question'>";
                    while ($row = mysql_fetch_array($ele))
                        {
                                echo "<option value='".$row['QID']."'>".$row['Question']."</option>";
                        }
                        echo "</select></td>";
                }
                }
                $p->dbsdisconnect();
?>
