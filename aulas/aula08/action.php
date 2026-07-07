<?php require_once dirname(__DIR__). '/componentes/config.php';?>
<?php
if(!empty($_GET['nomeUser'])) {
$nomeuser = filter_input(INPUT_GET,'nomeUser',FILTER_SANITIZE_SPECIAL_CHARS);
$_SESSION['nomeUser'] = $nomeuser ;
}
if(!empty($_GET['senhaUser'])) {
$senhauser = filter_input(INPUT_GET,'senhaUser',FILTER_SANITIZE_SPECIAL_CHARS);
$_SESSION['senhaUser'] = encrypt_secure($senhauser,'e');    
}
?>

<?php

if(!empty($_POST['email_login'])&&!empty($_POST['senha_login'])) {

$user="admin@admin.com";
$senha = "MvnT+EQqkijr+8dFy0tTzSowNrZdXNtqedxp+BsRHWRHJ1qfbX0nVkPujVUVsE/cVZX9FrXG2NEiUItqf1Wgjg==";
$nome = "Professor Eugênio";

$senhadec = encrypt_secure($senha,'d');

echo $emaillogin=filter_input(INPUT_POST,'email_login',FILTER_SANITIZE_SPECIAL_CHARS);
echo $senhalogin=filter_input(INPUT_POST,'senha_login',FILTER_SANITIZE_SPECIAL_CHARS);

if($senhalogin == $senhadec && $emaillogin == $user) {
    $_SESSION['userstatus'] = true;
    $_SESSION['emailadmin'] = true;
  

header("Location: paineladmin.php");
exit();

}




}


?>


<?php
// código para retorno automático limpando o cache 
// o header está expulsando da página
// exit(); está limpando o cahe da página
header("Location: index.php");
exit();
?>