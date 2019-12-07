<div id='page-wrap'>
<header class='main' id='h1'>
	
</header>

	<nav class='main' id='n1' role='navigation'>

		<?php include '../php/popup.php' ?>

		
		
			<link rel='stylesheet' href='../css/options.css'>
			<link rel='stylesheet' href='../css/menu.css'>
			
			<div id='menu'>
				<span class='op'><a href='Layout.php'>Inicio</a></span>
				<span class='op'><a href='Credits.php'>Cr&eacute;ditos</a></span>
						
				

				<?php 
				if(isset($_SESSION['Tipo'])){
					if($_SESSION['Tipo']=='User'){
						echo("<span class='op'><a href='listaDeAudios.php'> Visualizar lista de audios</a></span>");
					}else if($_SESSION['Tipo']=='Artista'){
						echo("<span class='op'><a href='subirArchivo.php'> Añadir audio</a></span>");
					}
					echo"<span class='op'><a href='Logout.php'>Logout</a></span>";

					?>
					<p align= 'right' >
						<?php $_SESSION['Nombre']?> <?php $_SESSION['Apellidos'] ?>																			
						<button id='btn-abrir-popup-options' class='btn-abrir-popup-options'>
							<img src='../images/ajuste.png' width='15' height='15'/>Ajustes
						</button>    
					</p>
				<?php
				}else{
					echo"<span class='op'><a href='Register.php'>Registrarse</a></span>";
					echo"<span class='op'><a href='LoginLayout.php'>Login</a></span>";

				}
					
				?>			

			</div>
				<script src='../js/popup.js'></script>";
		
		

	</nav>

 	
