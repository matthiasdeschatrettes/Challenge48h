<?php
	session_start();
	include('connexion.php');
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link rel="stylesheet" type="text/css" href="CSS/search.css">
</head>
<body>
	  <?php
         include('fonction/transfert.php');
         if ( isset($_FILES['fic']) )
         {
             transfert();
         }
      ?>
	<h3>Envoi d'une image</h3>
      <form enctype="multipart/form-data" action="#" method="post">
         <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
         <input type="file" name="fic" size=50 />
         <input type="submit" value="Envoyer" />
      </form>
     <br>
     <br>
	<input type="text" class="myInput" id="search-img"  placeholder="Search for names..">

	<div id="result-search"></div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#search-img').keyup(function(){
				$('#result-search').html('');
				var img = $(this).val();

				if (img !="") {
					$.ajax ({
						type: 'GET',
						url: 'fonction/search_img.php',
						data: 'image=' +encodeURIComponent(img),
						success: function(data){
							if (data !="") {
								$('#result-search').append(data);
							} else{
								document.getElementById('result-search').innerHTML = "<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun utilisateur</div>"
							}							
						}
						
					});
				
			}

			});

		});
	</script>
</body>
</html>