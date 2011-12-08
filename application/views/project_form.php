<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Projekt anlegen</title>

	<?php
	$this->load->view('statics/xhtml_head');
	?>

</head>
<body>

<?php
	$this->load->view('statics/navigation');
?>

<?php
	$this->load->view('statics/flash_message');
?>

<h1>Projekt anlegen</h1>

<?php echo form_open('project/add'); ?>

Projektname: <?php echo form_input('name'); ?><br />
Beschreibung: <?php echo form_input('description'); ?><br />
Aufwand geplant: <?php echo form_input('effortplanned'); ?><br />
Kunde benachrichtigen: <?php echo form_radio('notifyowners', '0', TRUE); ?> Nein <?php echo form_radio('notifyowners', '1'); ?> Ja


<fieldset id="clients">

	<legend>Kunde</legend>

	<select name="client" id="client">

<?php foreach ($clients as $item) {?>
	<option value="<?php echo $item->idt_client;?>"><?php echo $item->name;?></option>
<?php } ?>

	</select>

</fieldset>

<?php echo form_submit('mysubmit', 'Projekt anlegen!'); ?>


<p id="footer">Page rendered in {elapsed_time} seconds</p>

</body>
</html>