<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Person Dashboard</title>

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

<h1>Person Dashboard</h1>

<?php foreach ($persons as $item) {?>

<div>

<h2><?php echo $item->lastname;?>, <?php echo $item->firstname;?></h2>
<p><?php echo $item->t_address_idt_address;?></p>

</div>
<?php } ?>

<p id="footer">Page rendered in {elapsed_time} seconds</p>

</body>
</html>