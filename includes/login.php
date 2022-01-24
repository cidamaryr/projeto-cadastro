
<?php
session_start();
if (!isset($_SESSION['user'])){
    $_SESSION['user'] = "";
    $_SESSION['nome'] = "";
    $_SESSION['tipo'] = "";
}

 function cripto($senha){
    $c = '';    
    for ($pos = 0; $pos < strlen($senha); $pos++){
         $letra = ord($senha[$pos]) + 1;
         $c .= chr($letra);
    }
    return $c;
 }

 function gerarHash($senha){
     $txt  = cripto($senha);
     $hash = password_hash($txt, PASSWORD_DEFAULT);
     return $hash;
  }
function testarHash($pass, $hash) {
    $ok = password_verify(cripto($pass), $hash);
    return $ok;
}

function logout(){
    unset($_SESSION['user']);
    unset($_SESSION['nome']);
    unset($_SESSION['tipo']);
}
function is_logado(){
      if(empty($_SESSION['user'])) {
        return false;
      } else { 
        return true;  
      }
}
function is_admin(){
   $t = $_SESSION['tipo'] ?? null;
   if (is_null($t)) {
      return false;
   } else {
         if ($t == 'admin') {
            return true;   
         } else {
            return false; 
         }
   }
}
function is_editor(){
    $t = $_SESSION['tipo'] ?? null;
    if (is_null($t)) {
       return false;
    } else {
          if ($t == 'editor') {
             return true;   
          } else {
             return false; 
          }
    }
 }




//echo gerarHash("admin");
//echo gerarHash("teste");

/*
if (testarHash(cripto('teste'),'$2y$10$fmdaFJpF/fDstXEbZNHxGuyBK6krcOmyTuoWXS0CoZvKpDVyF5T0m')){
  echo "Senha confere";
}  else {
    echo "Senha nao confere!";
}
 
$original = 'estudonauta';
echo "$original --- ";
echo cripto($original) . " --- ";
echo gerarHash($original) . " --- ";
echo testarHash("ftuvepobvub", '$2y$10$OG2tLRyvxsbsZ06yGVVicu0ohhHOY3.eX/L/2JDNw6TAtDYVS3Y3.')  ? "SIM":"NAO";
*/