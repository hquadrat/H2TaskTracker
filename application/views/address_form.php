<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Adresse anlegen/bearbeiten</title>

	<?php
	$this->load->view('statics/css');
	?>

</head>
<body>

<?php
	$this->load->view('statics/flash_message');
?>

<h1>Adresse anlegen/bearbeiten</h1>

<?php
	$this->load->view('statics/navigation');
?>

<?php

$outStreet = "";
$outCo = "";
$outPostalcode = "";
$outCity = "";
$outPhonebusiness = "";
$outPhoneprivate = "";
$outMobilebusiness = "";
$outMobileprivate = "";
$outEmailbusiness = "";
$outEmailprivate = "";

if( (!empty($addressEditID)) && ($addressEditID != 0) ) {

	$outStreet = $address->street;
	$outCo = $address->co;
	$outPostalcode = $address->postalcode;
	$outCity = $address->city;
	$outPhonebusiness = $address->phonebusiness;
	$outPhoneprivate = $address->phoneprivate;
	$outMobilebusiness = $address->mobilebusiness;
	$outMobileprivate = $address->mobileprivate;
	$outEmailbusiness = $address->emailbusiness;
	$outEmailprivate = $address->emailprivate;

	echo form_open('address/edit');
	echo form_hidden('addresseditid', $addressEditID);

}
else {

	echo form_open('address/add');

}

?>

Strasse: <?php echo form_input('street', $outStreet); ?><br />
C/O: <?php echo form_input('co', $outCo); ?><br />
PLZ/Stadt: <?php echo form_input('postalcode', $outPostalcode); ?> <?php echo form_input('city', $outCity); ?><br /><br />
Telefon geschäftl.: <?php echo form_input('phonebusiness', $outPhonebusiness); ?><br />
Telefon privat: <?php echo form_input('phoneprivate', $outPhoneprivate); ?><br /><br />
Mobil geschäftl.: <?php echo form_input('mobilebusiness', $outMobilebusiness); ?><br />
Mobil privat: <?php echo form_input('mobileprivate', $outMobileprivate); ?><br /><br />
E-mail geschäftl.: <?php echo form_input('emailbusiness', $outEmailbusiness); ?><br />
E-mail privat: <?php echo form_input('emailprivate', $outEmailprivate); ?><br />

<?php
if( (!empty($addressEditID)) && ($addressEditID != 0) ) echo form_submit('mysubmit', 'Adressänderungen speichern!');
else echo form_submit('mysubmit', 'Adresse anlegen!');
?>


<p id="footer">Page rendered in {elapsed_time} seconds</p>

</body>
</html>