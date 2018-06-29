<?php
 // this will avoid mysqli_connect() deprecation error.
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 // but I strongly suggest you to use PDO or mysqlii.
 
                                  
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "11011";
                                    $dbname = "database";
                                    $errorMsg="";
                                    
                                    // Create connection
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
									?>