<?
session_start();
$usuario = $_POST['usuario'];
$senha   = $_POST['senha'];
$con = mysql_connect("localhost", "root", "123456") or die
 ("Sem conexão com o servidor");
$select = mysql_select_db("teste") or die("Sem acesso ao DB, Entre em 
contato com o Administrador, cidamary@apeoesp.org.br");
 
$result = mysql_query("SELECT * FROM `teste.usuario` 
WHERE `usuario` = '$usuario' AND `senha`= '$senha'");
if(mysql_num_rows ($result) > 0 )
{
$_SESSION['usuario'] = $usuario;
$_SESSION['senha'] = $senha;
header('location:site.php');
}
else{
  unset ($_SESSION['usario']);
  unset ($_SESSION['senha']);
  header('location:index.php');
   
  }

?>