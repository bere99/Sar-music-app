<div id='page-wrap'>
<header class='main' id='h1'>
	
	<?php /*
	if (isset($_GET['email'])){
	echo"<span class='right'><a href='Layout.php'>Logout</a></span>";
	echo "&nbsp";
	echo "&nbsp";
        echo $_GET['email'];
	}else{
  	echo"<span class='right'><a href='SignUp.php'>Registro</a></span>";
	echo "&nbsp";
	echo "&nbsp";
	echo"<span class='right'><a href='LogIn.php'>Login</a></span>";		
	}*/
	?>

</header>

	<nav class='main' id='n1' role='navigation'>

		<?php include '../php/popup.php' ?>

		<?php
		echo"
			<link rel='stylesheet' href='../css/options.css'>
			<link rel='stylesheet' href='../css/menu.css'>
			
			<div id='menu'>
				<span class='op'><a href='Layout.php'>Inicio</a></span>
							
				<span class='op'><a href='listaDeAudios.php'> Visualizar lista de audios</a></span>
						
				<span class='op'><a href='subirArchivo.php'> Añadir audio</a></span>
					
				<span class='op'><a href='Credits.php'>Cr&eacute;ditos</a></span>
						
				<span class='op'><a href='Layout.php'>Inicio</a></span>

				<p align= 'right' >	
				{$_SESSION['Nombre']} {$_SESSION['Apellidos']}																				
					<button id='btn-abrir-popup-options' class='btn-abrir-popup-options'>
						<img src='../images/ajuste.png' width='15' height='15'/>Ajustes
					</button>    
				</p>	

			</div>
				<script src='../js/popup.js'></script>";
		?>
		

	</nav>

 	
