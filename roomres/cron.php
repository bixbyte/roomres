<script src="jquery.min.js"></script>
<script>
$(document).ready(function(e) {
	   		//data backup
            $.post("iara_main.php", {c0m1:"backup"},
			function(data, status){
			});
			
			//Cleaning of old files
			$.post("iara_main.php", {c0m1:"clean"}, 
			function(data, status){
				/*
					*place only in the last function();
				*/
							//window.close();
				/*
					*place only in the last function();
				*/
			}); 
         
}); 
</script>