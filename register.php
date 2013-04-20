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
                    $email=$_REQUEST['username'];
                    $password=$_REQUEST['password'];
                    $pass2=$_REQUEST['password2'];
                    $Qid=$_REQUEST['question'];
                    $Qans=$_REQUEST['answer'];
                    $utype=$_REQUEST['usertype'];
                    if(filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE)
                    {
                        echo "Invalid Email-ID entered!!";
                    }
                    else
                    {if($pass2!=$password)
                    {
                        echo "Entered password do not match!!";
                    }
                    else
                    {
                            $password=md5($password);
                            $query="select * from users where username='".$email."'";
                            $ele=mysql_query($query);
                            if($ele)
                            {
                                echo "Username aleardy exists";
                            }
                            else
                            {
                              $query="insert into users values ('".$email."','".$password."','".$utype."','0','0','".$Qid."','".$Qans."');";
                              $stat=mysql_query($query);
                              if($stat)
                              {
                                  echo "New user created!!";
                                  echo "<br/><a href='index.php'>Click here to login!</a>";
                                  
                              }
                              else {
                                  echo"Could not create user!!";
                                  echo"<a href='index.php?newuser=yes'>click here to try again</a>";
                              }
                            }

                    }
                    }
                }
                }
                $p->dbsdisconnect();
?>
