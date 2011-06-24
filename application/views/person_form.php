<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Person anlegen</title>

	<?php
	$this->load->view('statics/css');
	?>

</head>
<body>

<?php
	$this->load->view('statics/flash_message');
?>

<h1>Person anlegen</h1>

<?php
	$this->load->view('statics/navigation');
?>

<?php echo form_open('person/add'); ?>

Firstname: <?php echo form_input('firstname'); ?><br />
Lastname: <?php echo form_input('lastname'); ?><br />

<fieldset id="addresses">

	<legend>Adresse</legend>

	<select name="address" id="address">

<?php foreach ($addresses as $item) {?>
	<option value="<?php echo $item->idt_address;?>"><?php echo $item->street;?>, <?php echo $item->postalcode;?> <?php echo $item->city;?></option>
<?php } ?>

	</select>

</fieldset>

<fieldset id="persontypes">

	<legend>Personentyp</legend>

	<select name="persontype" id="persontype">

<?php foreach ($persontypes as $item) {?>
	<option value="<?php echo $item->idt_persontype;?>"><?php echo $item->persontypeRef;?></option>
<?php } ?>

	</select>

</fieldset>

<?php echo form_submit('mysubmit', 'Person anlegen!'); ?>


<p id="footer">Page rendered in {elapsed_time} seconds</p>

</body>
</html>