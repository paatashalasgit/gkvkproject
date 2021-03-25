<?php
include("connection.php");

if(isset($_POST['submit_newspecies']))
{
                    $name_species = $_POST['name_species'];
                    $name_genus =  $_POST['name_genus'];
                    $name_author = $_POST['name_author'];
                    $name_year = $_POST['name_year'];
                    $accepted_genus = $_POST['accepted_genus'];
                    $accepted_species = $_POST['accepted_species'];
                    $accepted_author = $_POST['accepted_author'];
                    $accepted_year =  $_POST['accepted_year'];
                    $accepted_pdf = $_POST['accepted_pdf'];
                    $accepted_url = $_POST['accepted_url'];
                    $classification_kingdom = $_POST['classification_kingdom'];
                    $classification_phylum  = $_POST['classification_phylum'];
                    $classification_class =  $_POST['classification_class'];
                    $classification_order = $_POST['classification_order'];
                    $classification_family  =  $_POST['classification_family'];
                    
                    $synonyms_genus = $_POST['synonyms_genus']; 
                    $synonyms_species = $_POST['synonyms_species'];
                    $synonyms_author =  $_POST['synonyms_author'];
                    $synonyms_year = $_POST['synonyms_year'];
                    $synonyms_pdf = $_POST['synonyms_pdf'];
                    $synonyms_url  = $_POST['synonyms_url'];
                    
                    
                    $q1 = "insert into species_entry(name_species,name_genus,name_author,name_year,accepted_genus,accepted_species,accepted_author,accepted_year,accepted_pdf,accepted_url,classification_kingdom,classification_phylum,classification_class,classification_order,classification_family) 
                            values ('$name_species','$name_genus','$name_author','$name_year','$accepted_genus','$accepted_species','$accepted_author','$accepted_year','$accepted_pdf','$accepted_url','$classification_kingdom','$classification_phylum','$classification_class','$classification_order','$classification_family') ";
                            
                    $r1 =mysql_query($q1);
                    
                    
                    $q2 = "insert into species_synonyms(synonyms_genus,	synonyms_species,	synonyms_author,	synonyms_year,	synonyms_pdf,	synonyms_url)
                            values ('$synonyms_genus','$synonyms_species','$synonyms_author','$synonyms_year','$synonyms_pdf','$synonyms_url')";
                    
                    $r2 = mysql_query($q2);        
}
?>