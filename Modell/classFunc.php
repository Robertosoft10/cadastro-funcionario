<?php
class Func{
  private $idFunc;
  private $nome;
  private $fone;
  private $cargo;
  private $salario;
  private $turno;

  public function __construct($idFunc, $nome, $fone, $cargo, $salario, $turno){
    $this->idFunc = $idFunc;
    $this->nome = $nome;
    $this->fone = $fone;
    $this->cargo = $cargo;
	$this->salario = $salario;
    $this->turno = $turno;
  }
  public function setIdFunc($idFunc){
    $this->idFunc = $idFunc;
  }
  public function getIdFunc(){
    return $this->idFunc;
  }
  public function setNome($nome){
    $this->nome = $nome;
  }
  public function getNome(){
    return $this->nome;
  }
  public function setFone($fone){
    $this->fone = $fone;
  }
  public function getFone(){
    return $this->fone;
  }
   public function setCargo($cargo){
    $this->cargo = $cargo;
  }
  public function getCargo(){
    return $this->cargo;
  }
  public function setSalario($salario){
    $this->salario = $salario;
  }
  public function getSalario(){
    return $this->salario;
  }
    public function setTurno($turno){
    $this->turno = $turno;
  }
  public function getTurno(){
    return $this->turno;
  }
}
 ?>
