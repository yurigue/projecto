<?php
// Romanian language file for
// Projects and VirtualHosts sub-menus
// Settings and Tools right-click sub-menus
// Translated by Ciprian Murariu <ciprianmp[at]yahoo[dot]com>
// 3.0.7 add $w_listenForApache - $w_AddListenPort - $w_deleteListenPort - $w_settings['SupportMariaDB']
// $w_settings['DaredevilOptions']
// $w_Size - $w_EnterSize - $w_Time - $w_EnterTime - $w_Integer - $w_EnterInteger - $w_add_VirtualHost
// 3.0.8 $w_settings['SupportMySQL'] - $w_portUsedMaria - $w_testPortMariaUsed
// 3.0.9 $w_ext_zend
// 3.1.1 $w_defaultDBMS - $w_invertDefault - $w_changeCLI - $w_misc
// $w_settings['ShowphmyadMenu'] - $w_settings['ShowadminerMenu']
// 3.1.2 $w_reinstallServices - $w_settings['mariadbUseConsolePrompt'] - $w_settings['mysqlUseConsolePrompt']
// $w_enterServiceNameAll - $w_settings['NotVerifyPATH'] - $w_MysqlMariaUser
// 3.1.4 $w_settings 'NotVerifyTLD' 'Cleaning' 'AutoCleanLogs' 'AutoCleanLogsMax' 'AutoCleanLogsMax' 'AutoCleanTmp' 'AutoCleanTmpMax' 'iniCommented'
// $w_wampReport - $w_dowampReport
// 3.1.9 $w_settings 'BackupHosts'
// 3.2.0 $w_verifySymlink  - $w_settings['NotVerifyHosts']
// 3.2.1 $w_addingVer - $w_addingVerTxt - $w_goto - $w_FileRepository
// 3.2.2 $w_MysqlMariaUser $w_EnterSize modified
// 3.2.3 https for wampserver.aviatechno

// Projects sub-menu
$w_projectsSubMenu = 'Proiecte personale';
// VirtualHosts sub-menu
$w_virtualHostsSubMenu = 'VirtualHosts';
$w_add_VirtualHost = 'Administrare VirtualHost';
$w_aliasSubMenu = 'Aliasuri';
$w_portUsed = 'Portul curent Apache: ';
$w_portUsedMysql = 'Portul curent MySQL: ';
$w_portUsedMaria = 'Portul curent MariaDB : ';
$w_testPortUsed = 'Testeaz� portul curent: ';
$w_portForApache = 'Portul Apache';
$w_listenForApache = 'Portul de Intrare pentru ad�ugare la Apache';
$w_portForMysql = 'Portul MySQL';
$w_testPortMysql = 'Testeaz� portul 3306';
$w_testPortMysqlUsed = 'Testeaz� portul MySQL: ';
$w_testPortMariaUsed = 'Testeaz� portul MariaDB: ';

// Right-click Settings
$w_wampSettings = 'Set�ri Wamp';
$w_settings = array(
	'urlAddLocalhost' => 'Adaug� localhost la �nceputul url-ului',
	'VirtualHostSubMenu' => 'Arat� Sub-meniul VirtualHosts',
	'AliasSubmenu' => 'Arat� Sub-meniul Alias',
	'ProjectSubMenu' => 'Arat� Sub-meniul Proiecte personale',
	'HomepageAtStartup' => 'Deschide pagina Index la pornire',
	'MenuItemOnline' => 'Arat� �n Meniu: Online / Offline',
	'ItemServicesNames' => 'Arat� �n Instrumente: Schimb� numele serviciilor',
	'NotCheckVirtualHost' => 'Nu verifica defini�iile VirtualHost',
	'NotCheckDuplicate' => 'Nu verifica dublarea Numelui Serverului',
	'VhostAllLocalIp' => 'Permite utilizarea IP-urilor locale, altele dec�t 127.*',
	'SupportMySQL' => 'Permite utilizarea MySQL',
	'SupportMariaDB' => 'Permite utilizarea MariaDB',
	'DaredevilOptions' => 'Aten�ie: Riscant! Numai pentru exper�i.',
	'ShowphmyadMenu' => 'Arat� phpMyAdmin �n Meniu',
	'ShowadminerMenu' => 'Arat� Adminer �n Meniu',
	'mariadbUseConsolePrompt' => 'Modific� prompterul implicit al consolei MariaDB',
	'mysqlUseConsolePrompt' => 'Modific� prompterul implicit al consolei MySQL',
	'NotVerifyPATH' => 'Nu testa CALEA',
	'NotVerifyTLD' => 'Nu testa TLD',
	'NotVerifyHosts' => 'Nu verifica fi�ierul hosts',
	'Cleaning' => 'Cur��are Automat�',
	'AutoCleanLogs' => 'Cur��� automat fi�ierele jurnal',
	'AutoCleanLogsMax' => 'Num�r de linii �nainte de cur��are',
	'AutoCleanLogsMin' => 'Num�r de linii dup� de cur��are',
	'AutoCleanTmp' => 'Cur��� automat directorul tmp',
	'AutoCleanTmpMax' => 'Num�r de fi�iere �nainte de cur��are',
	'ForTestOnly' => 'Numai �n scopul test�rii',
	'iniCommented' => 'Directive php.ini comentate (; la �nceputul liniei)',
	'BackupHosts' => 'Fi�ier hosts de rezerv�',
);

// Right-click Tools
$w_wampTools = 'Instrumente';
$w_restartDNS = 'Reporne�te DNS';
$w_testConf = 'Verific� sintaxa httpd.conf';
$w_testServices = 'Verific� starea serviciilor';
$w_changeServices = 'Schimb� numele serviciilor';
$w_enterServiceNameApache = "Introdu un num�r de ordine pentru serviciul Apache. Acest num�r va fi ad�ugat la sf�r�itul cuv�ntului 'wampapache'";
$w_enterServiceNameMysql = "Introdu un num�r de ordine pentru serviciul Mysql. Acest num�r va fi ad�ugat la sf�r�itul cuv�ntului 'wampmysqld'";
$w_enterServiceNameAll = "Introdu un num�r pentru sufix-ul numelor serviciilor (necompletat pentru serviciile originale)";
$w_compilerVersions = 'Verific� compilatorul VC, compatibilitatea �i fi�ierele ini';
$w_UseAlternatePort = 'Folose�te alt port dec�t %s';
$w_AddListenPort = 'Adaug� un port de Intrare pentru Apache';
$w_vhostConfig = 'Arat� VirtualHost verificat de Apache';
$w_apacheLoadedModules = 'Arat� Modulele �nc�rcate de Apache';
$w_empty = 'Gole�te';
$w_misc = 'Diverse';
$w_emptyAll = 'Gole�te TOATE';
$w_dnsorder = 'Verific� ordinea de c�utare a DNS';
$w_deleteVer = '�terge versiunile neutilizate';
$w_addingVer = 'Adaug� versiuni de Apache, PHP, MySQL, MariaDB, etc.';
$w_deleteListenPort = '�terge un port de Intrare Apache';
$w_delete = '�terge';
$w_defaultDBMS = 'DBMS implicit:';
$w_invertDefault = 'Inverseaz� DBMS implicit ';
$w_changeCLI = 'Schimb� versiunea PHP CLI';
$w_reinstallServices = 'Reinstaleaz� toate serviciile';
$w_wampReport = 'Raportul de Configurare Wampserver';
$w_dowampReport = 'Genereaz� '.$w_wampReport;
$w_verifySymlink = 'Verific� link-uri simbolice';
$w_goto = 'Mergi la:';
$w_FileRepository = 'Link-uri c�tre arhiva de fi�iere �i addon-uri pentru Wampserver';

//miscellaneous
$w_ext_spec = 'Extensii speciale';
$w_ext_zend = 'Extensii Zend';
$w_phpparam_info = 'Informa�ii suplimentare';
$w_ext_nodll = 'Fi�ier dll inexistent';
$w_ext_noline = "Nu exist� 'extensie='";
$w_mod_fixed = "Module ireversibile";
$w_no_module = 'Fi�ier modul inexistent';
$w_no_moduleload = "Nu exist� 'LoadModule'";
$w_mysql_none = "niciunul";
$w_mysql_user = "modul utilizator";
$w_mysql_default = "implicit";
$w_Size = "M�rimea";
$w_Time = "Timul";
$w_Integer = "Num�r �ntreg";

// PromptText for Aestan Tray Menu type: prompt variables
// Quotation marks " in texts must be escaped: \" - May have \r\n for multilines
$w_EnterInteger = "Introdu un num�r �ntreg";
$w_enterPort = 'Introdu num�rul noului port';
$w_EnterSize = "Introdu M�rimea: xxxx urmat de M pentru Mega sau G pentru Giga.\r\nNum�rul trebuie �nso�it de simbolul M or G.\r\nExemplu : 64M ; 256M ; 1G";
$w_EnterTime = "Introdu timpul �n secunde";
$w_MysqlMariaUser = "Introdu un nume de utilizator valabil. Dac� nu-l cuno�ti, p�streaz� 'root' implicit.\r\nIf you have set a password for either root or the chosen user, you will need to type that password when prompted for 'Enter password:' from the console. Without password, Enter key";

// Long texts
// Quotation marks " in texts must be escaped: \" - May have \r\n for multilines
$w_addingVerTxt ="Toate \"addon-urile\", ex. toate installer-ele pentru versiunile Apache, PHP, MySQL sau MariaDB c�t �i cele pentru actualiz�ri (Wampserver, Aestan Tray Menu, xDebug, etc.), precum �i aplica�iile web (PhpMyAdmin, Adminer) se g�sesc la adresa\r\n\r\n'https://sourceforge.net/projects/wampserver/'\r\n\r\nDesc�rca�i fi�ierele pe care le dori�i �i lansa�i-le ap�s�nd click-dreapta pe numele lor, iar apoi \"Ruleaz� ca administrator\" pentru a ad�uga addon-ul sau aplica�ia respectiv� la versiunea existent� de Wampserver.\r\n\r\nApoi, schimbarea versiunii de Apache, PHP, MySQL sau MariaDB se face �n doar trei pa�i:\r\nClick-st�nga pe icon -> PHP|Apache|MySQL|MariaDB -> Schimb� versiunea -> Versiune\r\n\r\nSchimbarea versiunii nu va realiza automat �i schimbarea parametrilor modifica�i anterior �i nici nu va transfera bazele de date de la vechea versiune la cea nou�.\r\n\r\nO arhiv� mult mai bine organizat� �i permanent la zi dec�t cea de la Sourceforge exist� la adresa:\r\n\r\n'https://wampserver.aviatechno.net'.\r\n\r\nLink-urile la arhive se reg�sesc cu Click-dreapta pe icon -> Ajutor\r\n";

?>