<?php
/*
DESCRIÇÃO:
	Esta função recebe o nome do banco de dados por parâmetro e usa-o para efetuar a conexão
FUNÇÃO: 
	conexao
PARÂMETROS:
	$bd  : string
RETORNO:
	void
*/

function conexao($bd)
{
	// alimenta as variáveis de conexão	
	$host = 'localhost';
	$usuario = 'root';
	$senha = '';
	
	// efetua a conexão no servidor
	$cnx = mysql_connect ($host,$usuario,$senha) or die ('Houve algum erro na conexão'.mysql_error());
	
	// seleciona o banco de dados
	mysql_select_db($bd) or die ('Houve algum erro com o Banco de Dados'.mysql_error());
	
	// para que os acentos sejam gravados no banco de dados
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET character_set_connection=utf8");
	mysql_query("SET character_set_client=utf8");
	mysql_query("SET character_set_results=utf8");
}

/*
DESCRIÇÃO:
	Efetua o cadastro do registro com os dados vindos do formulário, retornando a mensagem de sucesso ou insucesso do cadastro 
FUNÇÃO: 
	cadastrar
PARÂMETROS:
	void
RETORNO:
	$msg : string
*/
function cadastrar($par_nome,$par_idade,$par_idade_dias)
{
	// chama o procedimento CONEXÃO
	conexao('banco');
	
	// alimenta as variáveis com os posts dos texts vindos do formulário
/*	$nome = $_POST['txtNome'];
	$idade = $_POST['txtIdade'];
	$idade_dias = $_POST['txtIdadeEmDias'];
	*/
	
	// cria uma variável com a instrução sql envolvendo os dados alimentados acima
	$inst_sql_cadastrar = "insert into pessoa (nome,idade,idade_dias) values ('$par_nome','$par_idade','$par_idade_dias')";
	
	// invoca a função logica para executar a instrução
	if(mysql_query($inst_sql_cadastrar))
	{
		$msg = ':) Registro cadastrado com o ID:'.mysql_insert_id(); // função que retorna o ID cadastrado no banco 
	}
	else
	{
		$msg = ':( Registro não foi cadastrado. Motivo:'.mysql_error();
	}
	
	// retorna a mensagem concatenada de sucesso ou insucesso
	return ($msg);
	
}


/*
DESCRIÇÃO:
	Efetua a edição de um registro com os dados vindos do formulário, retornando a mensagem de sucesso ou insucesso da edição 
FUNÇÃO: 
	alterar
PARÂMETROS:
	void
RETORNO:
	$msg : string
*/
function editar()
{
	// chama o procedimento CONEXÃO
	conexao('banco');
	
	// alimenta as variáveis com os posts dos texts vindos do formulário
	$nome = $_POST['txtNome'];
	$idade = $_POST['txtIdade'];
	$idade_dias = $_POST['txtIdadeEmDias'];
	
	// cria uma variável com a instrução sql envolvendo os dados alimentados acima
	$inst_sql_editar = "update pessoa set nome = '$nome', idade= '$idade', idade_dias = '$idade_dias' where nome = '$nome'";
	
	// invoca a função logica para executar a instrução
	if(mysql_query($inst_sql_editar))
	{
		$msg = ':) Registro Editado com o ID:'.mysql_insert_id(); // função que retorna o ID cadastrado no banco 
	}
	else
	{
		$msg = ':( Registro não foi editado. Motivo:'.mysql_error();
	}
	
	// retorna a mensagem concatenada de sucesso ou insucesso
	return ($msg);
	
}

function consultar($par_nome)
{
	// chama o procedimento CONEXÃO
	conexao('banco');
	
	
	// cria uma variável com a instrução sql envolvendo os dados alimentados acima
	$inst_sql_consultar = "select * from pessoa where nome = '$par_nome')";

	$resultado = mysql_query($inst_sql_consultar);
	
	while($row = mysql_fetch_assoc($resultado))
		echo $row['nome'];
	
	mysql_free_result($result);

/*
	
	// invoca a função logica para executar a instrução
	if(mysql_query($inst_sql_consultar))
	{
		echo "<input type = 'text' name = 'txtNome' value = 'abc'>";
		//$_POST['txtNome'] = $nome;
	    //$_POST['txtIdade'] = $idade;
	    //$_POST['txtIdadeEmDias'] = $idade_dias;
		echo "edson";
		//$msg = ':) Registro cadastrado com o ID:'.mysql_insert_id(); // função que retorna o ID cadastrado no banco 
	}
	else
	{
		$msg = ':( Registro não foi cadastrado. Motivo:'.mysql_error();
	}
	
	// retorna a mensagem concatenada de sucesso ou insucesso
	//return ($msg);
	*/
}

	
?>
