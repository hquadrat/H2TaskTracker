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

if( (!empty($addressEditID)) && ($addressEditID != 0) ) {

	echo form_open('address/edit');
	echo form_hidden('addresseditid', $addressEditID);

	echo "ID: ".$addressEditID;
	echo "EDIT EDIT EDIT";

}
else {

	echo form_open('address/add');

}

?>

Strasse: <?php echo form_input('street', $address->street); ?><br />
C/O: <?php echo form_input('co', $address->co); ?><br />
PLZ/Stadt: <?php echo form_input('postalcode', $address->postalcode); ?> <?php echo form_input('city', $address->city); ?><br /><br />
Telefon geschäftl.: <?php echo form_input('phonebusiness', $address->phonebusiness); ?><br />
Telefon privat: <?php echo form_input('phoneprivate', $address->phoneprivate); ?><br /><br />
Mobil geschäftl.: <?php echo form_input('mobilebusiness', $address->mobilebusiness); ?><br />
Mobil privat: <?php echo form_input('mobileprivate', $address->mobileprivate); ?><br /><br />
E-mail geschäftl.: <?php echo form_input('emailbusiness', $address->emailbusiness); ?><br />
E-mail privat: <?php echo form_input('emailprivate', $address->emailprivate); ?><br />

<?php
if( (!empty($addressEditID)) && ($addressEditID != 0) ) echo form_submit('mysubmit', 'Adressänderungen speichern!');
else echo form_submit('mysubmit', 'Adresse anlegen!');
?>


<p id="footer">Page rendered in {elapsed_time} seconds</p>

</body>
</html>