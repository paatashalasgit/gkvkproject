function SubmitNewSpecies() {
    
    
            var name_species = $('#name_species').val();
            var name_genus = $('#name_genus').val();
            var name_author = $('#name_author').val();
            var name_year = $('#name_year').val();
            
            var accepted_genus = $('#accepted_genus').val();
            var accepted_species = $('#accepted_species').val(); 
            var accepted_author = $('#accepted_author').val();
            var accepted_year = $('#accepted_year').val();
            var accepted_pdf = $('#accepted_pdf').val();
            var accepted_url = $('#accepted_url').val();
            
            var classification_kingdom = $('#classification_kingdom').val();
            var classification_phylum = $('#classification_phylum').val();
            var classification_class = $('#classification_class').val();
            var classification_order = $('#classification_order').val();
            var classification_family = $('#classification_family').val();
            
            var synonyms_genus = $('#synonyms_genus').val();
            var synonyms_species =$('#synonyms-species').val();
            var synonyms_author = $('#synonyms-author').val();
            var synonyms_year =  $('#synonyms-year').val();
            var synonyms_pdf =$('#synonyms-pdf').val();
            var synonyms_url = $('#synonyms-url').val();
        
        
        	 $('selectspecies').value = name_species;
	 $('select-genus').value = name_genus;    
    
    $.post("submitnewspecies.php", 
    { 
        
            name_species : name_species,
            name_genus : name_genus,
            name_author : name_author,
            name_year : name_year,
            accepted_genus : accepted_genus,
            accepted_species : accepted_species,
            accepted_author : accepted_author,
            accepted_year :  accepted_year,
            accepted_pdf : accepted_pdf,
            accepted_url : accepted_url,
            classification_kingdom : classification_kingdom,
            classification_phylum  : classification_phylum,
            classification_class :  classification_class,
            classification_order : classification_order,
            classification_family  :  classification_family,
            synonyms_genus : synonyms_genus, 
            synonyms_species : synonyms_species,
            synonyms_author :  synonyms_author,
            synonyms_year : synonyms_year,
            synonyms_pdf : synonyms_pdf,
            synonyms_url  : synonyms_url
    },
    function(data) {
	 $('#results').html(data);
	 
	 $('selectspecies').value = name_species;
	 $('select-genus').value = name_genus;
	 $('#new_species')[0].reset();
	 
    });
}


function SubmitNewCrop() {
    
        var crop = $("#crop").val();
           
    
    $.post("submitnewcrop.php", 
    { 
        
            crop : crop
    },
    function(data) {
	 $('#results').html(data);
	 
	 
	 $('#crop')[0].reset();
	 
    });
}

function SubmitNewAccepted() {
    
    
           
            
            var accepted_genus = $('#accepted_genus').val();
            var accepted_species = $('#accepted_species').val(); 
            var accepted_author = $('#accepted_author').val();
            var accepted_year = $('#accepted_year').val();
            var accepted_pdf = $('#accepted_pdf').val();
            var accepted_url = $('#accepted_url').val();
            
            
    
    $.post("submitnewaccepted.php", 
    { 
        
            
            accepted_genus : accepted_genus,
            accepted_species : accepted_species,
            accepted_author : accepted_author,
            accepted_year :  accepted_year,
            accepted_pdf : accepted_pdf,
            accepted_url : accepted_url,
            
    },
    function(data) {
	 $('#results').html(data);
	
	 $('#new-accepted')[0].reset();
	 
    });
}


function SubmitNewUser() {
    
    
           
            
            var full_name = $('#full_name').val();
            var user_name = $('#user_name').val(); 
            var user_email = $('#user_email').val();
            var user_phone = $('#user_phone').val();
            var user_password = $('#user_password').val();
            var user_department = $('#user_department').val();
           var user_role  =  $('#user_role').val();
           var user_image = $('user_image').val();
    
    $.post("submitnewuser.php", 
    { 
        
            full_name : full_name,
            user_name : user_name,
            user_email : user_email,
            user_phone : user_phone,
            user_password : user_password,
            user_department : user_department,
            user_role : user_role,
            user_image : user_image
            
    },
    function(data) {
	 $('#results').html(data);
	
	 $('#new-user')[0].reset();
	 
    });
}