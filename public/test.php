<?PHP
/* vim: set ts=3 sw=3 sts=3 et si ai: */

/**
 * $SYSNAME :: $SYSDESCRIPTION 
 * 
 * @author       Adolfo Morales  <adolfom@expansion.com.mx> 
 * @package      $SYSNAME
 * @copyright    Copyright 2008 Grupo Editorial Expansion	
 * @filesource   
 * 
 */

//
//	requires
/**
 * test.php :: --here short description--
 * 
 * --long description--
 * 
 * @author       Adolfo Morales  <adolfom@expansion.com.mx> 
 * @package      $SYSNAME
 * @subpackage   
 * @category     
 * @version      $Id: vimrc.local 39 2008-05-10 06:44:21Z andresaquino $
 * 
 */

$username = "root";
$password = "";
$hostname = "localhost";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
print "Connected to MySQL<br>";
// you're going to do lots more here soon
mysql_close($dbh);



?>
