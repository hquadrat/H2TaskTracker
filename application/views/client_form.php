<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Kunden anlegen</title>

	<?php
	$this->load->view('statics/css');
	?>

</head>
<body>

<?php
	$this->load->view('statics/flash_message');
?>

<h1>Kunden anlegen</h1>

<?php
	$this->load->view('statics/navigation');
?>

<?php echo form_open('client/add'); ?>

Name: <?php echo form_input('name'); ?><br />


<fieldset id="persons">

	<legend>Auftraggeber</legend>

	<select name="person" id="person">

<?php foreach ($persons as $item) {?>
	<option value="<?php echo $item->idt_person;?>"><?php echo $item->lastname;?>, <?php echo $item->firstname;?></option>
<?php } ?>

	</select>

</fieldset>

<?php echo form_submit('mysubmit', 'Kunden anlegen!'); ?>


<p id="footer">Page rendered in {elapsed_time} seconds</p>

</body>
</html>