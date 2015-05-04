<?php
    
    $names = "Ian";
    
        $nameArr = explode(",",$names);
        print_r($nameArr)."/n/n";
        foreach( $nameArr as $name ){
            echo $name,"\n";
        }
      

?>