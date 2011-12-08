<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Client Dashboard</title>

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

<h1>Client Dashboard</h1>

<?php foreach ($clients as $item) {?>

<div>

<h3><?php echo $item->clientname;?></h3>

<p>Auftraggeber: <?php echo $item->CRlastname;?>, <?php echo $item->CRfirstname;?></p>

</div>
<?php } ?>

<p id="footer">Page rendered in {elapsed_time} seconds</p>

</body>
</html>