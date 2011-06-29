<?php
	$pageTitle = "Projects Dashboard";
?>

	<?php
	$this->load->view('statics/xhtml_head');
	?>

	<script type="text/javascript">

	$(document).ready(function() {

		$("#hide_button").toggle();
		$("#panel_contents").toggle();

		$("#show_button").click(function(){
			$("#panel_contents").toggle();
			$("#panel_contents").animate({
				height: "48px"
			}, 400);
			$("#hide_button").toggle();
			$("#show_button").toggle();

		});

	   $("#hide_button").click(function(){
			$("#panel_contents").animate({
				height: "0px"
			}, 400, function() {
					$("#panel_contents").toggle();
				}
			);
		
			$("#hide_button").toggle();
			$("#show_button").toggle();

	   });

	});

	</script>

</head>
<body style="background-color: #333;">

<?php
	$this->load->view('statics/navigation');
?>

<?php
	$this->load->view('statics/flash_message');
?>

<?php
	//var_dump($projects);
?>
<div id="dashboard_container">

<ul id="project_dashboard">
<?php

$namechecker = $projects[0]->projectname;

?>
<li>
	<h2><?php echo $projects[0]->projectname;?> <?php echo anchor('project/projectform/'.$projects[0]->projectid, 'Edit', array('class' => 'edit')); ?></h2>
	<ul>
<?php

foreach ($projects as $item) {

	if( $namechecker != $item->projectname ) {
		$namechecker = $item->projectname;
?>
	</ul>
</li>
<li>
	<h2><?php echo $item->projectname;?> <?php echo anchor('project/projectform/'.$item->projectid, 'Edit', array('class' => 'edit')); ?></h2>
	<ul>

<?php
	}

?>

		<li>
			<?php echo $item->taskname;?> <?php echo anchor('task/taskform/'.$item->taskid, 'Edit', array('class' => 'edit')); ?><br />
			<span class="taskdescription"><?php echo $item->taskdescription;?></span>
			<?php
				// funny percentage styling
				$outPercentage = (int)$item->taskpercentfinished;

				if ($outPercentage >= 0 && $outPercentage < 20) {

					$outColor = "042D04";

				} elseif ($outPercentage >= 20 && $outPercentage < 40) {

					$outColor = "085A08";

				} elseif ($outPercentage >= 40 && $outPercentage < 60) {

					$outColor = "0C860C";

				} elseif ($outPercentage >= 60 && $outPercentage < 80) {

					$outColor = "10B310";

				} else {

					$outColor = "00FF00";
					$outColor = "14E014";

				}
			?>
			<span style="background-color: #<?php echo $outColor;?>;" class="taskpercentfinished"><?php echo $item->taskpercentfinished;?>%</span>
		</li>

<?php } ?>
</ul>
</li>
</ul>

	<br clear="all" />

</div>

<p id="footer">Page rendered in {elapsed_time} seconds</p>

</body>
</html>