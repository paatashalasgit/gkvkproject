<?php
include('connection.php');

$accepted_genus = $_POST['acceptedgenus'];
$accepted_species = $_POST['acceptedspecies'];



$q1 = "select species_entry_id from species_entry where accepted_genus = $accepted_genus and accepted_species = $accepted_species";
$r1= mysql_query($q1);

list($species_entry_id) = mysql_fetch_array($r1);

echo $species_entry_id;

$q2 = "select synonyms_genus, synonyms_species, synonyms_author, synonyms_year, synonyms_pdf, synonyms_url from species_synonyms where species_entry_id = $species_entry_id";
$r2= mysql_query($q2);

while(list($synonyms_genus, $synonyms_species, $synonyms_author, $synonyms_year, $synonyms_pdf, $synonyms_url)=mysql_fetch_array($q2))
{
    
        // echo $synonyms_genus, $synonyms_species, $synonyms_author, $synonyms_year, $synonyms_pdf, $synonyms_url;
    // echo"
    //     <tr id='clone-synonyms'>
    // 	    <td>
    // 	        <input list='synonyms-genus' name='synonyms_genus[]' id='synonyms_genus[]' class='form-control select2' onkeyup='dropDown(this.value,'synonyms-genus')' value=".$synonyms_genus." >
    // 	            <datalist id= 'synonyms-genus' >
                                                    
    //                 </datalist>
    //         </td>
    //         <td>
    //             <input type='text name='synonyms-species[]' id='synonyms-species[]' class='form-control select2' value=".$synonyms_species." >
                                                            
    //         </td>
    //         <td>
    //             <input type='text' name='synonyms-author[]' id='synonyms-author[]' class='form-control select2' value=".$synonyms_author." >
                                                            
    //         </td>
    //         <td>
    //             <input type='text' name='synonyms-year[]' id='synonyms-year[]' class='form-control select2' value=".$synonyms_year." >
                                                            
    //       </td>
    //         <td>
    //             <input type='text' name='synonyms-pdf[]' id='synonyms-pdf[]' class='form-control select2' value=".$synonyms_pdf." >
                                                            
    //         </td>
    //         <td>
    //             <input type='text' name='synonyms-url[]' id='synonyms-url[]' class='form-control select2' value=".$synonyms_url.">
                                                            
    //         </td>
    // 	</tr>
    // ";
}    
?>