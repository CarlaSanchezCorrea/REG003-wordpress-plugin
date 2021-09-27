<?php
/*
Plugin Name: plugin donation
Plugin URI: https://example.com/plugin-name
Description: Este un plugin para donación de dinero a organizaciones sin fines de lucro y puede ser integrado con la pasarela de pago Culqi.
Version: 0.0.1
Requires at Least: 5.6.1
Requires PHP: 7.4.14
Author: Astrid & Mery
Licence: MIT
*/
//require
require_once dirname(__FILE__) . '/classes/shortcode.class.php';


if (!defined('ABSPATH')) exit;

function Activation() {
    // crea una tabla de bd desde wordpress
    global $wpdb;

    $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}donaciones(
        `DonacionId` 	INT 			NOT NULL AUTO_INCREMENT,
        `Monto` 		INT 			NOT NULL,
        `Nombre` 		VARCHAR(50) 	NULL,
        `Email` 		VARCHAR(50) 	NULL,
        `Telefono` 		INT 			NOT NULL,
        PRIMARY KEY (`DonacionId`));";

    $wpdb->query($sql);

	$settingsTable = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}settings(
        `SettingsId` 	INT 			NOT NULL AUTO_INCREMENT,
		`SecretKey` 	VARCHAR(40)		NOT NULL,
		`PublicKey` 	VARCHAR(40) 	NULL,
		`OrgName` 		VARCHAR(40) 	NULL,
        PRIMARY KEY (`SettingsId`));";

    $wpdb->query($settingsTable);
}

function Deactivation() {
    flush_rewrite_rules();
}


register_activation_hook(__FILE__, 'Activation');
register_deactivation_hook(__FILE__, 'Deactivation');


add_action('admin_menu', 'CreateMenu');

function CreateMenu() {
	add_menu_page(
		'Instrucciones de uso del plugin Menú', //pageTitle
		'DonationPlugin',//menuTitle
		'manage_options',//capability
		plugin_dir_path(__FILE__) . 'admin/mainpage.php',//menuSlug
		null, //functionName
		'1' //position
	);
	add_submenu_page(
		plugin_dir_path(__FILE__) . 'admin/mainpage.php',//menuSlug
		'Submenu 1',
		'Historial de Donaciones',
		'manage_options',
		plugin_dir_path(__FILE__) . 'admin/tablaDonacion.php',
		null,
		'2'
	);
	add_submenu_page(
		plugin_dir_path(__FILE__) . 'admin/mainpage.php',//menuSlug
		'Submenu 2',
		'Settings Culqi',
		'manage_options',
		plugin_dir_path(__FILE__) . 'admin/settings.php',
		null,
		'3'
	);
}



add_shortcode('ShortcodeDonate', 'ShortcodeDonation');

function ShortcodeDonation($atts) {
    //attributes
    $_short = new shortCode;
  $title = $atts['title'];

  $html = $_short->formulario($title);
  
  return $html;

}


//enviando información del Webmaster
if(isset($_POST['submitWebmasterInfo'])){
	$webmasterData = array("SecretKey"=>$_POST['secretKey'], "PublicKey"=>$_POST['publicKey'], "OrgName"=>$_POST['orgName']);
	$tabla = "wp_settings";//Tabla en base de datos
	$wpdb->insert($tabla,$webmasterData);

}




?>