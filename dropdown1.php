<?php
    include("connection.php");
    $q = $_REQUEST["q"];
    
    $col_input = $_REQUEST["col"];
    
    switch ($col_input){
        
        case "selectgenus":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct name_genus from species_entry where name_genus like '$q%'", $connection);
             
             while(list($name_genus) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$name_genus  . "'>";
             }
            
            break;
            
        case "st":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct type from data_entry where type like '$q%'", $connection);
             
             while(list($type) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$type  . "'>";
             }
            
            break;  
            
        case "select-species":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct name_species from species_entry where name_species like '$q%'", $connection);
             
             while(list($name_species) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$name_species  . "'>";
             }
            
            break;      
        
        case "commonname-language":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct language from common_name where language like '$q%'", $connection);
             
             while(list($language) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$language  . "'>";
             }
            
            break;   
            
        case "commonname-name":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct common_name from common_name where common_name like '$q%'", $connection);
             
             while(list($common_name) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$common_name  . "'>";
             }
            
            break;    
            
        case "localname-language":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct language from vernacular_name where language like '$q%'", $connection);
             
             while(list($name_genus) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$name_genus  . "'>";
             }
            
            break;       
            
        case "localname-name":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct vernacular_name from vernacular_name where vernacular_name like '$q%'", $connection);
             
             while(list($vernacular_name) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$vernacular_name  . "'>";
             }
            
            break;   
            
        case "stageofpests-attacked":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct stage_pest_attack from introduction  where stage_pest_attack like '$q%'", $connection);
             
             while(list($stage_pest_attack) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$stage_pest_attack  . "'>";
             }
            
            break;   
            
        case "symptoms-ppa":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct plantpart_affected from symptoms where plantpart_affected like '$q%'", $connection);
             
             while(list($plantpart_affected) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$plantpart_affected  . "'>";
             }
            
            break;       
        
        case "symptoms-damage":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct damage_symptoms from symptoms where damage_symptoms like '$q%'", $connection);
             
             while(list($damage_symptoms) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$damage_symptoms  . "'>";
             }
            
            break;    
        
        case "alternatehost-sn":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct scientific_name from alternate_hosts where scientific_name like '$q%'", $connection);
             
             while(list($scientific_name) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$scientific_name  . "'>";
             }
            
            break;   
            
         case "alternatehost-cn":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct common_name from alternate_hosts where common_name like '$q%'", $connection);
             
             while(list($common_name) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$common_name  . "'>";
             }
            
            break; 
        
         case "chemicalcontrol-moa":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct method from chemical_control where method like '$q%'", $connection);
             
             while(list($method) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$method  . "'>";
             }
            
            break;   
            
        case "biologicalcontrol-name":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct bc_name from biological_control  where bc_name like '$q%'", $connection);
             
             while(list($bc_name) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$bc_name  . "'>";
             }
            
            break;  
            
        case "resistant-name":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct resistants from resistant_tolarant where resistants like '$q%'", $connection);
             
             while(list($resistants) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$resistants  . "'>";
             }
            
            break; 
            
        case "naturalenemies-name":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct ne_name from natural_enemies where ne_name like '$q%'", $connection);
             
             while(list($ne_name) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$ne_name  . "'>";
             }
            
            break;  
            
        case "name-genus":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct name_genus from species_entry where name_genus like '$q%'", $connection);
             
             while(list($name_genus) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$name_genus  . "'>";
             }
            
            break;
            
        case "name-species":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct name_species from species_entry where name_species like '$q%'", $connection);
             
             while(list($name_species) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$name_species  . "'>";
             }
            
            break; 
            
        case "name-author":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct name_author from species_entry where name_author like '$q%'", $connection);
             
             while(list($name_author) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$name_author  . "'>";
             }
            
            break;
            
        case "accepted-genus":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct accepted_genus from accepted_species_entry where accepted_genus like '$q%'", $connection);
             
             while(list($accepted_genus) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$accepted_genus  . "'>";
             }
            
            break; 
            
        case "accepted-species":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct accepted_species from accepted_species_entry where accepted_species like '$q%'", $connection);
             
             while(list($accepted_species) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$accepted_species  . "'>";
             }
            
            break; 
            
        case "accepted-author":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct accepted_author from accepted_species_entry where accepted_author like '$q%'", $connection);
             
             while(list($accepted_author) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$accepted_author  . "'>";
             }
            
            break;     
            
        case "classification-order":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct classification_order from species_entry where classification_order like '$q%'", $connection);
             
             while(list($classification_order) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$classification_order  . "'>";
             }
            
            break;      
        
        case "classification-family":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct classification_family from species_entry where classification_family like '$q%'", $connection);
             
             while(list($classification_family) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$classification_family  . "'>";
             }
            
            break;     
            
        case "synonyms-genus":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct synonyms_genus from species_synonyms where synonyms_genus like '$q%'", $connection);
             
             while(list($synonyms_genus) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$synonyms_genus  . "'>";
             }
            
            break;    
            
        case "crop_text":
             
            //  $q1 = "select name_genus from species_entry where name_genus like $q%";
             $r1 = mysql_query("select distinct resource_name from  resource_crop where resource_name like '$q%'", $connection);
             
             while(list($resource_name) = mysql_fetch_array($r1)){
                 
                 echo "<option value ='" .$resource_name  . "'>";
             }
            
            break;        
    }
?>