<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Task anlegen</title>

	<?php
	$this->load->view('statics/css');
	?>

</head>
<body>

<?php
	$this->load->view('statics/flash_message');
?>

<h1>Task anlegen</h1>

<?php
	$this->load->view('statics/navigation');
?>

<?php echo form_open('task/add'); ?>

Name: <?php echo form_input('name'); ?><br />
Description: <?php echo form_input('description'); ?><br />
Effortplanned: <?php echo form_input('effortplanned'); ?><br />
Percentfinished: <?php echo form_input('percentfinished'); ?>

<fieldset id="projects">

	<legend>Projekt</legend>

	<select name="project" id="project">

<?php foreach ($projects as $item) {?>
	<option value="<?php echo $item->idt_project;?>"><?php echo $item->name;?></option>
<?php } ?>

	</select>

</fieldset>

<fieldset id="persons">

	<legend>Bearbeiter</legend>

	<select name="person" id="person">

<?php foreach ($persons as $item) {?>
	<option value="<?php echo $item->idt_person;?>"><?php echo $item->firstname;?></option>
<?php } ?>

	</select>

</fieldset>

<?php echo form_submit('mysubmit', 'Task anlegen!'); ?>


<p id="footer">Page rendered in {elapsed_time} seconds</p>

</body>
</html>