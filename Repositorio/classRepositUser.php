<?php
require_once '../Config/classConexao.php';
require_once '../Modell/classUser.php';
interface IRepositorioUsers{
  public function insertUser($user);
  public function deleteUser($idUser);
  public function requiestUser($idFunc);
  public function updateUser($user);
  public function getListUser();
}
class RepositorioUsersMySQL implements IRepositorioUsers{
  private  $conexao;
          public function __construct(){
              $this->conexao = new Conexao("localhost", "root", "", "cf");
              if($this->conexao->conectar() == false){
                  echo "Erro".mysqli_error();
              }
          }
  public function insertUser($user){
	  
	  $nome = $user->getNome();
	  $email = $user->getEmail();
	  $senha = $user->getSenha();
	  $nivel = $user->getNivel();
	  
	  $sql = "INSERT INTO usuarios (nome, email, senha, nivel)VALUES('$nome', '$email', '$senha', '$nivel')";
	  $this->conexao->executarQuery($sql);
			}
  public function deleteUser($idUser){
			$sql = "DELETE FROM usuarios WHERE idUser = '$idUser'";
            $this->conexao->executarQuery($sql);
			}
  public function updateUser($user){
			  $idUser = $user->getIdUser();
              $nome = $user->getNome();
			  $email = $user->getEmail();
			  $senha = $user->getSenha();
			  $nivel = $user->getNivel();

            $sql = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha', nivel='$nivel' WHERE idUser='$idUser'";
            $this->conexao->executarQuery($sql);	
			}
   public function requiestUser($idUser){
			$linha = $this->conexao->registroQuery("SELECT * FROM usuarios WHERE idUser='$idUser'");
			$user = new User($linha['idUser'], $linha['nome'], $linha['email'], $linha['senha'], $linha['nivel']);
			return $user;
			}
  public function getListUser(){
	  $consult = $this->conexao->executarQuery("SELECT * FROM usuarios");
            $arrayUsers = array();
            while ($linha = mysqli_fetch_array($consult)){
            $user = new User($linha['idUser'], $linha['nome'], $linha['email'], $linha['senha'], $linha['nivel']);
            array_push($arrayUsers, $user);
            }
            return $arrayUsers;
        }
}
$repositorio = new RepositorioUsersMySQL();
?>