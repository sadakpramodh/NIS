<?php
  include("inc/config.php");


        #$sql = $sql = 'SHOW COLUMNS FROM `Volunteers Data`';
        #'select column_name from information_schema.columns where lower(table_name)=lower(\\''.$this->table.'\\')'

        // $query = $connection->prepare("SHOW COLUMNS FROM `Volunteers Data`");
      
       
            

function getColumnNames($tableName){
        $columnNames = array(); 
        $sql = 'SHOW COLUMNS FROM `' . $tableName .'`';
        $query = $connection->prepare($sql);
            
      
        if($query->execute()){
            $raw_column_data = $query->fetchAll();

            foreach($raw_column_data as $outer_key => $array){
                foreach($array as $inner_key => $value){

                    if ($inner_key === 'Field'){
                            if (!(int)$inner_key){
                              echo $value;
                                $columnNames[] = $value;
                                
                            }
                        }
                }
            }        
        }
        return $columnNames;
               
    }

print_r(getColumnNames("Volunteers Data"));
$x = getColumnNames("Volunteers Data");
foreach($a as $b) {
  echo $b;
}

/* if($query->execute()){
                $raw_column_data = $query->fetchAll();
                
                foreach($raw_column_data as $outer_key => $array){
                    foreach($array as $inner_key => $value){
                            
                        if ($inner_key === 'Field'){
                                if (!(int)$inner_key){
                                    
                                    echo $value;
                                }
                            }
                    }
                }        
            } */
           
        
        

?>