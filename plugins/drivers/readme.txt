Enable drivers in this directory like this:

<?php
use Adminer\Adminer;
use Adminer\AdminerInterface;

function create_adminer(): AdminerInterface
{
	include "plugins/drivers/simpledb.php"; // the driver is enabled just by including

	return new Adminer(); // or return Pluginer if you want to use other plugins
}

// include original Adminer
include "adminer.php";
?>
