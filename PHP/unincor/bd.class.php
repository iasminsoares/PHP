<?php 
	
	
	class bd {
	/**
		Para criar uma conexão entre o php e o Banco de Dados MySql, vamos precisar de:
		- host é o endereço onde o MySql está instalado, neste caso no mesmo local que o Apache e no mesmo computador. 	
	**/
		private $host = 'localhost';

		//- usuario de conexão com o Mysql, o padrão de instalação é o ROOT
		private $usuario = 'root';

		// - senha de conexão com o Mysql, o padrão de instalação é vazia
		private $senha = '';
	 
		// - banco de dados o nome do banco de dados que serão criados as tabelas
		private $database = 'bd_unincor';

		//função que executa a conexão do php com o Banco de dados
		public function conecta_mysql(){
			//criar conexão utlizando função nativa que espera 4 parametros:
			//localizacao do bd, usuario de acesso, senha, banco de dados
			//this-> faz referência a propriedade existente dentro da própria classe
			$conexao = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

			//ajustar a charset UTF8 de comunicação entre a aplicação e o banco de dados.
			mysqli_set_charset($conexao, 'utf8');

			//verificar se houve erro de conexão
			if(mysqli_connect_errno()){
				echo 'Erro ao tentar se conectar com o BD MySQL: '.mysqli_connect_error();
			}

			return $conexao;
		}

	}
?>