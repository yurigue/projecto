<?php
// French language file for
// Projects and VirtualHosts sub-menus
// Settings and Tools right-click sub-menus
// 3.0.7 add $w_listenForApache - $w_AddListenPort - $w_deleteListenPort - $w_settings['SupportMariaDB']
// $w_settings['DaredevilOptions']
// $w_Size - $w_EnterSize - $w_Time - $w_EnterTime - $w_Integer - $w_EnterInteger - $w_add_VirtualHost
// 3.0.8 $w_settings['SupportMySQL'] - $w_portUsedMaria - $w_testPortMariaUsed
// 3.0.9 $w_ext_zend
// 3.1.1 $w_defaultDBMS - $w_invertDefault - $w_changeCLI - $w_misc
// $w_settings['ShowphmyadMenu'] - $w_settings['ShowadminerMenu']
// 3.1.2 $w_reinstallServices - $w_settings['mariadbUseConsolePrompt'] - $w_settings['mysqlUseConsolePrompt']
// $w_enterServiceNameAll $w_settings['NotVerifyPATH' -> $w_MysqlMariaUse,
// 3.1.4 $w_settings 'NotVerifyTLD' 'Cleaning' 'AutoCleanLogs' 'AutoCleanLogsMax' 'AutoCleanLogsMax' 'AutoCleanTmp' 'AutoCleanTmpMax' 'iniCommented'
// $w_wampReport - $w_dowampReport
// 3.1.9 $w_settings 'BackupHosts'
// 3.2.0 $w_verifySymlink  - $w_settings['NotVerifyHosts']
// 3.2.1 $w_addingVer - $w_addingVerTxt - $w_goto - $w_FileRepository
// 3.2.2 $w_MysqlMariaUser et $w_EnterSize modifi�s - $w_MySQLsqlmodeInfo $w_mysql_mode $w_phpMyAdminHelp $w_PhpMyAdMinHelpTxt
// 3.2.3 https for wampserver.aviatechno

// Projects sub-menu
$w_projectsSubMenu = 'Vos projets';
// VirtualHosts sub-menu
$w_virtualHostsSubMenu = 'Vos VirtualHosts';
$w_add_VirtualHost = 'Gestion VirtualHost';
$w_aliasSubMenu = 'Vos Alias';
$w_portUsed = 'Port utilis� par Apache : ';
$w_portUsedMysql = 'Port utilis� par MySQL : ';
$w_portUsedMaria = 'Port utilis� par MariaDB : ';
$w_testPortUsed = 'Tester port utilis� : ';
$w_portForApache = 'Port pour Apache';
$w_listenForApache = 'Listen Port � ajouter � Apache';
$w_portForMyql = 'Port pour MySQL';
$w_testPortMysql = 'Tester le port 3306';
$w_testPortMysqlUsed = 'Tester port MySQL utilis� : ';
$w_testPortMariaUsed = 'Tester port MariaDB utilis� : ';

// Right-click Settings
$w_wampSettings = 'Param�tres Wamp';
$w_settings = array(
	'urlAddLocalhost' => 'Ajouter localhost dans url',
	'VirtualHostSubMenu' => 'Sous-menu VirtualHosts',
	'AliasSubmenu' => 'Sous-menu Alias',
	'ProjectSubMenu' => 'Sous-menu Projets',
	'HomepageAtStartup' => 'Page d\'accueil Wampserver au d�marrage',
	'MenuItemOnline' => 'Item menu : En Ligne/Hors Ligne',
	'ItemServicesNames' => 'Item menu Outils : Changer noms des services',
	'NotCheckVirtualHost' => 'Ne pas v�rifier les d�finitions des VirtualHost',
	'NotCheckDuplicate' => 'Ne pas v�rifier ServerName dupliqu�s',
	'VhostAllLocalIp' => 'Autoriser IP locales VirtualHost autres que 127.*',
	'SupportMySQL' => 'Autoriser MySQL',
	'SupportMariaDB' => 'Autoriser MariaDB',
	'DaredevilOptions' => 'Attention: risqu� ! Uniquement pour expert',
	'ShowphmyadMenu' => 'Afficher PhpMyAdmin dans Menu',
	'ShowadminerMenu' => 'Afficher Adminer dans Menu',
	'mariadbUseConsolePrompt' => 'Changer prompt console MariaDB',
	'mysqlUseConsolePrompt' => 'Changer prompt console MySQL',
	'NotVerifyPATH' => 'Ne pas v�rifier PATH',
	'NotVerifyTLD' => 'Ne pas v�rifier TLD',
	'NotVerifyHosts' => 'Ne pas v�rifier fichier hosts',
	'Cleaning' => 'Netoyage automatique',
	'AutoCleanLogs' => 'Nettoyer fichiers de logs automatiquement',
	'AutoCleanLogsMax' => 'Nombre de lignes avant nettoyage',
	'AutoCleanLogsMin' => 'Nombre de lignes apr�s nettoyage',
	'AutoCleanTmp' => 'Nettoyer dossier tmp automatiquement',
	'AutoCleanTmpMax' => 'Nombre de fichiers avant nettoyage',
	'ForTestOnly' => 'Only for test purpose',
	'iniCommented' => 'Directives php.ini comment�es (; au d�but de la ligne)',
	'BackupHosts' => 'Sauvegarde fichier hosts',
);

// Right-click Tools
$w_wampTools = 'Outils';
$w_restartDNS = 'Red�marrage DNS';
$w_testConf = 'V�rifier syntaxe httpd.conf';
$w_testServices = 'V�rifier l\'�tat des services';
$w_changeServices = 'Changer le nom des services';
$w_enterServiceNameApache = "Entrer un nombre d'index pour le service Apache. Il sera ajout� � 'wampapache'";
$w_enterServiceNameMysql = "Entrer un nombre d'index pour le service Mysql. Il sera ajout� � 'wampmysqld'";
$w_enterServiceNameAll = "Entrer un nombre pour le suffixe des noms des services (Vide pour remettre services d'origine)";
$w_compilerVersions = 'V�rifier compilateur VC, compatibilit�s et fichiers ini';
$w_UseAlternatePort = 'Utiliser un port autre que %s';
$w_AddListenPort = 'Ajouter un Listen port � Apache';
$w_vhostConfig = 'Afficher les VirtualHost examin�s par Apache';
$w_apacheLoadedModules = 'Afficher les modules Apache charg�s';
$w_misc = 'Divers';
$w_empty = 'Vider';
$w_emptyAll = 'Vider TOUS les';
$w_dnsorder = 'V�rifier l\'ordre de recherche DNS';
$w_deleteVer = 'Supprimer versions inutilis�es';
$w_addingVer = 'Ajouter version Apache, PHP, MySQL, MariaDB, etc.';
$w_deleteListenPort = 'Supprimer un Listen port Apache';
$w_delete = 'Supprimer';
$w_defaultDBMS = 'SGBD par d�faut :';
$w_invertDefault = 'Inverser SGBD par defaut ';
$w_changeCLI = 'Changer  version PHP CLI';
$w_reinstallServices = 'R�installer tous les services';
$w_wampReport = 'Rapport de configuration Wampserver';
$w_dowampReport = 'Cr�er '.$w_wampReport;
$w_verifySymlink = 'V�rifier les liens symboliques';
$w_goto = 'Aller � :';
$w_FileRepository = 'Liens d�p�ts fichiers & addons Wampserver';

//Divers
$w_ext_spec = 'Extensions sp�ciales';
$w_ext_zend = 'Extensions Zend';
$w_phpparam_info = 'Pour information';
$w_ext_nodll = 'Pas de fichier dll';
$w_ext_noline = "Pas de 'extension='";
$w_mod_fixed = "Module irr�versible";
$w_no_module = 'Pas de fichier module';
$w_no_moduleload = "Pas de 'LoadModule'";
$w_mysql_none = "aucun";
$w_mysql_user = "mode utilisateur";
$w_mysql_default = "par d�faut";
$w_mysql_mode = "Explications de sql-mode";
$w_Size = "Taille";
$w_Time = "Temps";
$w_Integer = "Nombre entier";
$w_phpMyAdminHelp = "Aide PhpMyAdmin";

// PromptText pour Aestan Tray Menu variables de type: prompt
// Peuvent contenir \r\n pour plusieurs lignes
$w_EnterInteger = "Entrez un nombre entier";
$w_enterPort = "Entrer le num�ro de port souhait�";
$w_EnterSize = "Entrez la taille : xxxx suivie par M pour Mega ou G pour Giga.\r\nLe symbole M ou G doit �tre accol� au nombre.\r\nPar exemple : 64M ; 256M ; 1G";
$w_EnterTime = "Entrez le temps en secondes";
$w_MysqlMariaUser = "Entrer un nom utilisateur valide. Si vous ne savez pas, laissez 'root' par d�faut.\r\nSi vous avez mis un mot de passe � root ou � l'utilisateur choisi, il faudra taper ce mot de passe lors de la demande de la console\r\n'Enter password:'\r\nSans mot de passe, uniquement touche Entr�e.";

// Textes longs
// Les guillemets " dans les textes doivent �tre �chapp�s : \" - Peuvent contenir \r\n pour plusieurs lignes
$w_addingVerTxt = "Tous les \"addons\", c'est-�-dire tous les installeurs de versions Apache, PHP, MySQL ou MariaDB ainsi que les installeurs des mises � jour (Wampserver, Aestan Tray Menu, xDebug, etc.) et des applications Web (PhpMyAdmin, Adminer) sont sur:\r\n\r\n'https://sourceforge.net/projects/wampserver/'\r\n\r\nIl suffit de t�l�charger les fichiers-installeurs que vous voulez et de les lancer par un clic-droit sur le nom du fichier t�l�charg� puis \"Ex�cuter en tant qu'administrateur\" pour que l'addon ou l'application soit ajout� � votre version de Wampserver.\r\n\r\nEnsuite, changer de version Apache, PHP, MySQL ou MariaDB est l'affaire de trois clics:\r\nClic-Gauche -> PHP|Apache|MySQL|MariaDB -> Version -> Choisir la version\r\nLe changement de version ne reprend pas les modifications de param�tres que vous auriez pu faire ni ne transf�re les bases de donn�es de l'ancienne version vers la nouvelle.\r\n\r\nUn d�p�t bien mieux organis� que Sourceforge et toujours � jour existe :\r\n\r\n'https://wampserver.aviatechno.net'\r\n\r\nLes liens sur les d�p�ts sont dans Clic-Droit -> Aide\r\n";
$w_MySQLsqlmodeInfo = "MySQL/MariaDB sql-mode\r\nLe serveur SQL peut fonctionner dans diff�rents modes SQL en fonction de la valeur de la directive sql-mode.\r\nD�finir un ou plusieurs modes restreint certaines possibilit�s et exige une plus grande rigeur dans la syntaxe SQL et la validation des donn�es.\r\nLe fonctionnement de la directive sql-mode du fichier my.ini est le suivant.\r\n\r\n- sql-mode: par d�faut\r\nLa directive sql-mode n'existe pas ou est comment�e (;sql-mode=\"....\")\r\nLes modes par d�faut de la version de MySQL/MariaDB sont appliqu�s\r\n\r\n- sql-mode: mode utilisateur\r\nLa directive sql-mode est remplie avec des modes d�finis par l'utilisateur, par exemple :\r\nsql-mode=\"NO_ZERO_DATE,NO_ZERO_IN_DATE,NO_AUTO_CREATE_USER\"\r\n\r\n- sql-mode: aucun\r\nLa directive sql-mode est vide mais doit exister :\r\nsql-mode=\"\"\r\naucun mode SQL n'est appliqu�.\r\n";
$w_PhpMyAdMinHelpTxt = "-- PhpMyAdmin\r\nAu lancement de PhpMyAdmin, il vous sera demand� un nom utilisateur et un mot de passe.\r\nApr�s installation de Wampserver 3, le nom utilisateur par d�faut est \"root\" (Sans les guillemets) et il n'y a pas de mot de passe, ce qui veut dire que vous devez laisser la case Mot de passe du formulaire d'acc�s vide.\r\n\r\nPhpMyAdmin est configur� pour vous permettre d'acc�der � MySQL ou � MariaDB selon les SGBD qui sont actifs.\r\nSi les deux SGBD sont activ�s, vous verrez un menu d�roulant sur l'�cran de connexion, appel� \"Choix du serveur\", le serveur par d�faut sera affich� en premier dans la liste d�roulante. S�lectionnez ici le SGBD que vous souhaitez utiliser dans le cadre de la proc�dure de connexion.\r\nN'oubliez pas que si vous avez diff�rents comptes d'utilisateurs, vous devez utiliser le bon pour le SGBD s�lectionn�.\r\nAUSSI : Si vous avez le m�me compte, c'est-�-dire \"root\" sur les deux SGBD, si vous avez d�fini des mots de passe diff�rents, vous devez utiliser le bon mot de passe pour le compte et le SGBD.\r\n";

?>