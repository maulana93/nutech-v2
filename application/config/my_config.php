<?php
date_default_timezone_set('Asia/Jakarta');
$whatINeed = explode('/', $_SERVER['REQUEST_URI']);
$enslug = $whatINeed[1];

$config["webconfig"]["list-uji-mikrobiologi"] = array(
	'1'=>'ALT'
	,'2'=>'Escherichia Coli'
	,'3'=>'Staphyloccocus Aureus'
	,'4'=>'Clostridium'
	,'5'=>'Vibrio Cholerae'
	,'6'=>'Kolifom'
	,'7'=>'Salmonella'
	,'99'=>'Lainnya'
);

$config["webconfig"]["list-uji-logam"] = array(
	'1'=>'Pb (Timbal)'
	,'2'=>'Cd (Cadmium)'
	,'3'=>'Sn (Timah)'
	,'4'=>'Hg (Mercury)'
	,'5'=>'As (Arsen)'
);

$config["webconfig"]["list-uji-vitamin"] = array(
	'1'=>'Vitamin A'
	,'2'=>'Vitamin B'
	,'3'=>'Vitamin B1'
	,'4'=>'Vitamin B2'
	,'5'=>'Vitamin B3'
	,'6'=>'Vitamin B5'
	,'7'=>'Vitamin B6'
	,'8'=>'Vitamin B7'
	,'9'=>'Vitamin B9'
	,'10'=>'Vitamin B12'
	,'11'=>'Vitamin C'
	,'12'=>'Vitamin D'
	,'13'=>'Vitamin E'
	,'14'=>'Vitamin K'
);

$config["webconfig"]["list-uji-proximat"] = array(
	'1'=>'Energi'
	,'2'=>'Energi dari lemak'
	,'3'=>'Kadar air'
	,'4'=>'Kadar abu'
	,'5'=>'Lemak total'
	,'6'=>'Protein'
	,'7'=>'Karbohidrat'
);