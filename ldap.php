<?php require_once("autoload.php"); ?>
<?php if (session_status() == PHP_SESSION_NONE) {
	session_start();
} 

if(!isset($_POST['password']) || ! isset($_POST['name'])){
	$_SESSION['infomsg'] = "Veuillez rentrer vos identifiants";
	$_SESSION['infotype'] = "danger";
	header("Location: connexionmessagerie.php");
	exit();
}
$baseDN = "OU=GRPALU,DC=grpalu,DC=priv";
$ldapServer = "192.168.12.100";
$ldapServerPort = 389;
$mdp=$_POST['password'];
$dn = "GRPALU\\".$_POST['name'];

$conn=ldap_connect($ldapServer);

// on teste : le serveur LDAP est-il trouvé ?
if (!$conn){
	$_SESSION['infomsg'] = "Erreur lors de la connexion";
	$_SESSION['infotype'] = "danger";
	header("Location: connexionmessagerie.php");
	exit();
}

/* 2ème étape : on effectue une liaison au serveur, ici de type "anonyme"
 * pour une recherche permise par un accès en lecture seule
 */

// On dit qu'on utilise LDAP V3, sinon la V2 par défaut est utilisé
// et le bind ne passe pas. 
if (!ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3)) {
	$_SESSION['infomsg'] = "Erreur LDAPv3 - Contacter l'admin";
	$_SESSION['infotype'] = "danger";
	header("Location: connexionmessagerie.php");
	exit();
}


// Instruction de liaison. 
// Décommenter la ligne pour une connexion authentifiée
// ou pour une connexion anonyme.
// Connexion authentifiée
$bindServerLDAP=ldap_bind($conn,$dn,$mdp);
// print ("Connexion anonyme...<br />");
// $bindServerLDAP=ldap_bind($conn);
// en cas de succès de la liaison, renvoie Vrai
if (!$bindServerLDAP || ldap_errno($conn)!=0){
	$_SESSION['infomsg'] = "Identifiants invalides";
	$_SESSION['infotype'] = "danger";
	header("Location: connexionmessagerie.php");
	exit();
}

ldap_close($conn);

$_SESSION['infomsg'] = "Vous êtes bien connecté";
$_SESSION['infotype'] = "success";
$bdd= new ConnexionBDD();
$cli = $bdd->addUser($_POST['name']."grpalu.com");
$_SESSION['user']=serialize($cli);
header("Location: messagerie.php");
exit()
?>