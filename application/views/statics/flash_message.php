<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$myflash = $this->session->flashdata('appmessage');


if( !empty(	$myflash ) ) {
?>
<p style="padding: 1em; border: 1px solid #d0d0d0; background-color: #efefef;">
<?php
	echo $myflash;
?>
</p>
<?php
}

?>