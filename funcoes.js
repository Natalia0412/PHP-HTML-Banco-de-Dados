/*
DESCRIÇÃO:
	Esta função recebe dois parametros, verifica se os mesmos nao sao vazios e validos; se sim calcula a idade em dias, 
	senão retorna um dado em branco
FUNÇÃO: 
	valida_dados
PARÂMETROS:
	nome  : string
	idade : int
RETORNO:
	sucesso   : int
	insucessi : void
*/
	    function valida_dados(nome,idade)
		{
			var erro=false; // flag de controle de erro na validação dos dados
			
			//verifica se o nome esta em branco, habilitando o flag
			if(nome == ""){
				alert("Nome em branco!");
				erro = true;
			}
			
			// verifica se a idade nao é numero, habilitando o flag erro
			if(isNaN(parseInt(idade))){
				alert("Idade inválida!");
				erro = true;
			}
			
			// se não houver erro calcula a idade em dias e retorna-a ao html. Senão retorna um dado em branco			
			if(!erro)
				return idade * 365;
			else
			    return "";
		}
	