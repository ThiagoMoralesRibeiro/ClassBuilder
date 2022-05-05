<?php
	class Usuarios {

		private $idUsuario;
		private $email;
		private $senha;
		private $idNivelUsuario;
		private $nome;
		private $cpf;
		private $endereco;
		private $bairro;
		private $cidade;
		private $uf;
		private $cep;
		private $telefone;
		private $foto;
		private $ativo;

		function __construct( $idUsuario, $email, $senha, $idNivelUsuario, $nome, $cpf, $endereco, $bairro, $cidade, $uf, $cep, $telefone, $foto, $ativo){
			 $this->setIdUsuario( $idUsuario );
			 $this->setEmail( $email );
			 $this->setSenha( $senha );
			 $this->setIdNivelUsuario( $idNivelUsuario );
			 $this->setNome( $nome );
			 $this->setCpf( $cpf );
			 $this->setEndereco( $endereco );
			 $this->setBairro( $bairro );
			 $this->setCidade( $cidade );
			 $this->setUf( $uf );
			 $this->setCep( $cep );
			 $this->setTelefone( $telefone );
			 $this->setFoto( $foto );
			 $this->setAtivo( $ativo );
		}

		public function toArray(){
			 return array(
				 $this->getIdUsuario(),
				 $this->getEmail(),
				 $this->getSenha(),
				 $this->getIdNivelUsuario(),
				 $this->getNome(),
				 $this->getCpf(),
				 $this->getEndereco(),
				 $this->getBairro(),
				 $this->getCidade(),
				 $this->getUf(),
				 $this->getCep(),
				 $this->getTelefone(),
				 $this->getFoto(),
				 $this->getAtivo()
			);
		}

		public function toString(){
			 return("\n\t\t\t\t". implode(", ",$this->toArray()));
		}

		public function setIdUsuario( $idUsuario ){
			 $this->idUsuario = $idUsuario;
		}

		public function getIdUsuario(){
			  return( $this->idUsuario );
		}

		public function setEmail( $email ){
			 $this->email = $email;
		}

		public function getEmail(){
			  return( $this->email );
		}

		public function setSenha( $senha ){
			 $this->senha = $senha;
		}

		public function getSenha(){
			  return( $this->senha );
		}

		public function setIdNivelUsuario( $idNivelUsuario ){
			 $this->idNivelUsuario = $idNivelUsuario;
		}

		public function getIdNivelUsuario(){
			  return( $this->idNivelUsuario );
		}

		public function setNome( $nome ){
			 $this->nome = $nome;
		}

		public function getNome(){
			  return( $this->nome );
		}

		public function setCpf( $cpf ){
			 $this->cpf = $cpf;
		}

		public function getCpf(){
			  return( $this->cpf );
		}

		public function setEndereco( $endereco ){
			 $this->endereco = $endereco;
		}

		public function getEndereco(){
			  return( $this->endereco );
		}

		public function setBairro( $bairro ){
			 $this->bairro = $bairro;
		}

		public function getBairro(){
			  return( $this->bairro );
		}

		public function setCidade( $cidade ){
			 $this->cidade = $cidade;
		}

		public function getCidade(){
			  return( $this->cidade );
		}

		public function setUf( $uf ){
			 $this->uf = $uf;
		}

		public function getUf(){
			  return( $this->uf );
		}

		public function setCep( $cep ){
			 $this->cep = $cep;
		}

		public function getCep(){
			  return( $this->cep );
		}

		public function setTelefone( $telefone ){
			 $this->telefone = $telefone;
		}

		public function getTelefone(){
			  return( $this->telefone );
		}

		public function setFoto( $foto ){
			 $this->foto = $foto;
		}

		public function getFoto(){
			  return( $this->foto );
		}

		public function setAtivo( $ativo ){
			 $this->ativo = $ativo;
		}

		public function getAtivo(){
			  return( $this->ativo );
		}

	}


?>