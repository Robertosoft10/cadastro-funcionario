<?php
class User{
  private $idUser;
  private $nome;
  private $email;
  private $senha;
  private $nivel;

  public function __construct($idUser, $nome, $email, $senha, $nivel){
    $this->idUser = $idUser;
    $this->nome = $nome;
    $this->email = $email;
    $this->senha = $senha;
	$this->nivel = $nivel;
  }
  public function setIdUser($idUser){
    $this->idUser = $idUser;
  }
  public function getIdUser(){
    return $this->idUser;
  }
  public function setNome($nome){
    $this->nome = $nome;
  }
  public function getNome(){
    return $this->nome;
  }
  public function setEmail($email){
    $this->email = $email;
  }
  public function getEmail(){
    return $this->email;
  }
   public function setSenha($senha){
    $this->senha = $senha;
  }
  public function getSenha(){
    return $this->senha;
  }
  public function setNivel($nivel){
    $this->nivel = $nivel;
  }
  public function getNivel(){
    return $this->nivel;
  }
}
 ?>
