<?php
require_once '../Config/classConexao.php';
require_once '../Modell/classFunc.php';
interface IRepositorioFuncs{
  public function insertFunc($func);
  public function deleteFunc($idFunc);
  public function requiestFunc($idFunc);
  public function updateFunc($func);
  public function getListFunc();
}
class RepositorioFuncsMySQL implements IRepositorioFuncs{
  private  $conexao;
          public function __construct(){
              $this->conexao = new Conexao("localhost", "root", "", "cf");
              if($this->conexao->conectar() == false){
                  echo "Erro".mysqli_error();
              }
          }
  public function insertFunc($func){
	  
	  $nome = $func->getNome();
	  $fone = $func->getFone();
	  $cargo = $func->getCargo();
	  $salario = $func->getSalario();
	  $turno = $func->getTurno();
	  
	  $sql = "INSERT INTO funcionarios (nome, fone, cargo, salario, turno)VALUES('$nome', '$fone', '$cargo', '$salario', '$turno')";
	  $this->conexao->executarQuery($sql);
			}
  public function deleteFunc($idFunc){
			$sql = "DELETE FROM funcionarios WHERE idFunc = '$idFunc'";
            $this->conexao->executarQuery($sql);
			}
  public function requiestFunc($idFunc){
			$linha = $this->conexao->registroQuery("SELECT * FROM funcionarios WHERE idFunc='$idFunc'");
			$func = new Func($linha['idFunc'], $linha['nome'], $linha['fone'], $linha['cargo'], $linha['salario'], $linha['turno']);
			return $func;
			}
			
  public function updateFunc($func){
			  $idFunc = $func->getIdFunc();
              $nome = $func->getNome();
			  $fone = $func->getFone();
			  $cargo = $func->getCargo();
			  $salario = $func->getSalario();
			  $turno = $func->getTurno();

            $sql = "UPDATE funcionarios SET nome='$nome', fone='$fone', cargo='$cargo', salario='$salario', turno='$turno' WHERE idFunc='$idFunc'";
            $this->conexao->executarQuery($sql);	
			}
  public function getListFunc(){
	  $consult = $this->conexao->executarQuery("SELECT * FROM funcionarios");
            $arrayFuncs = array();
            while ($linha = mysqli_fetch_array($consult)){
            $func = new Func($linha['idFunc'], $linha['nome'], $linha['fone'], $linha['cargo'], $linha['salario'], $linha['turno']);
            array_push($arrayFuncs, $func);
            }
            return $arrayFuncs;
        }
}
$repositorio = new RepositorioFuncsMySQL();
?>