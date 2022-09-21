
function connecter(){
  user = document.log.User.value;
  password = document.log.password.value;
  if(user == "Hajaina" && password == "BNI301"){
    open("menu.php");
  }else{
    alert("Erreur , veiller ressayer..");
  }
}
function client(){
  open("client.php");
}