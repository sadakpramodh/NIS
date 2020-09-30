<?php 
                                                    $data = $connection->query("SELECT * FROM `Volunteers Data`")->fetchAll();
                                                    // and somewhere later:
                                                    foreach ($data as $row) {
                                                      echo "<tr>";
                                                      foreach ($row as $result) 
                                                        foreach ($result as $x){
                                                        echo "<td>". $x . "</td>";
                                                      }
                                                        //echo $row['name']."<br />\n";
                                                     echo "</tr>";
                                                    }

                                             ?>
<?php 
                                                    $query = $connection->prepare("SHOW COLUMNS FROM `Volunteers Data`");
                                                    $query->execute();
                                                    //Assign the data which you pulled from the database (in the preceding step) to a variable.
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    if($query->execute()) {
                                                        $raw_column_data = $query->fetchAll();
                                                          
                                                        foreach($raw_column_data as $outer_key => $array){
                                                            foreach($array as $inner_key => $value){

                                                                if ($inner_key === 'Field'){
                                                                        if (!(int)$inner_key){

                                                                            echo "<th>". $value ."</th>";
                                                                        }
                                                                    }
                                                            }
                                                        }        
                                                    } 
                                                  ?>