<?php

	$login ='Natalia';
	$senha ='123'; 
	
	if ($login == $_POST['usuario'] && $senha == $_POST['password'])
		{

			header ("Location: secreta.html");

		}
	Else //senao

	{

		echo 
			'<p align="center">
				Com esses dados nao existe cadastro
			</p>';	
			
		echo 
			'<p align="center">
				<a href="index.html">
					Clique aqui para voltar.
				</a>
			</p>';	
}

?>
