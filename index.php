<?php require_once('funcoes.php'); //INCLUI O ARQUIVO COM AS FUNÇÕES EM PHP NO HTML ?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Conexão: PHP - MySql</title>
	<script type="text/javascript" src="funcoes.js"> //INCLUI O ARQUIVO COM AS FUNÇÕES EM JAVASCRIPT NO HTML
	</script>
  </head>
  <body>
    <!-- CRIAÇÃO DOS COMPONENTES DO FORMULARIO HTML -->
    <form method = "POST"   action = "" name = "frmCadastro">
      <p> Nome 			<input type = "text" id = "txtNome"        name = "txtNome" value = "digite o nome" onclick="txtNome.value=''"/> </p>
	  <p> Idade 		<input type = "text" id = "txtIdade"       name = "txtIdade"/> </p>
	  <p> Idade em dias	<input type = "text" id = "txtIdadeEmDias" name = "txtIdadeEmDias"/> </p>
	  
	  <input type = "button" value = "Validar" id = "btnValidar" name = "btnValidar" onclick = "txtIdadeEmDias.value = valida_dados(txtNome.value, txtIdade.value)"/> <br>
	  <input type = "submit" value = "Gravar" id = "btnGravar" name = "btnGravar" />
	  <input type = "submit" value = "Editar" id = "btnEditar" name = "btnEditar" />
	  <input type = "submit" value = "Consultar" id = "btnConsultar" name = "btnConsultar" />

	  </form>
	
	
	<?php
	  // EFETUA O CADASTRO SE O BOTÃO GRAVAR FOR CLICADO
	  error_reporting(0); // ELIMINA OS WARNINGS E ERRORS DURANTE  EXECUÇÃO DO PHP
	  if(isset($_POST['btnGravar']))
	  {
		 $nome = $_POST['txtNome'];
	     $idade = $_POST['txtIdade'];
	     $idade_dias = $_POST['txtIdadeEmDias'];
		 echo cadastrar($nome,$idade,$idade_dias);
		 unset($_POST['btnGravar']);
		  
	  }

	  // EFETUA A EDIÇÃO SE O BOTÃO EDITAR FOR 
	  error_reporting(0); // ELIMINA OS WARNINGS E ERRORS DURANTE  EXECUÇÃO DO PHP
	  if(isset($_POST['btnEditar']))
	  {
		 echo editar();
		 unset($_POST['btnEditar']);
		  
	  }

	  // EFETUA CONSULTA SE O BOTÃO CONSULTAR FOR CLICADO 
	  error_reporting(0); // ELIMINA OS WARNINGS E ERRORS DURANTE  EXECUÇÃO DO PHP
	 // if(isset($_POST['btnConsultar']))
	  {
		 $nome = 'txtNome.value'; 
		 //echo consultar($nome);
		 
		 
		 	conexao('banco');
	
	
	// cria uma variável com a instrução sql envolvendo os dados alimentados acima
	$inst_sql_consultar = "select * from pessoa where nome = '$nome')";

	$resultado = mysql_query($inst_sql_consultar);
	
	while($row = mysql_fetch_assoc($resultado))
		echo $row['nome'];
	
	mysql_free_result($result);
		 
		 
		 
		 
		 unset($_POST['btnConsultar']);
		  
	  }

	  
	  ?>
  </body>
</html>  