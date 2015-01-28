// JavaScript Document

$(document).ready(function(e) {
    $('#search').keyup(function(e) {
		
        text = $('#search').val();
		
		$.post("proc_adds.php", {stringy:text,act:"5346)7454dm1_basic_pro"}, 
		
		function(data, status){
			$('#results').html(data);
		});
		
    });
	
	$('#find').click(function(e) {
		
        text = $('#search').val();
		
		$.post("proc_adds.php", {stringy:text, act:"5346)7454dm1_basic_pro"}, 
		
		function(data, status){
			$('#results').html(data);
		});
		
    });
	
});

