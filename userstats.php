<?php
                $user=$_SESSION['user'];
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
                    $query="select * from users where username='".$user."'";
                    $ele=mysql_query($query);
                    while ($row = mysql_fetch_array($ele))
                        {
                                echo "<strong>Files Uploaded:</strong>   ".$row['uploaded'];
                                echo "<br/><br/><strong>Files downloaded:</strong> ".$row['downloaded'];
                                echo "<br/><br/><strong>Account Type:</strong>";
                                $type=$row['type'];
                                switch($type)
                                {
                                    case 2:echo 'Administrator';
                                        break;
                                    case 1:echo 'Paid';
                                        break;
                                    case 0:echo 'Free';
                                        break;
                                }
                        }
                }
                }
                $p->dbsdisconnect();
?>
