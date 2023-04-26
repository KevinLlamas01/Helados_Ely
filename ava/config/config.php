<?php 
	
	session_start();

	define("CLIENT_ID", "AZrEJfmXWTfr3u_oVjnvTgvR_oDZkmtOqzfyfeO9Wx0sejJUaUV8JA0qdYMchxWztGc0FYR9folEp356");
	define("CURRENCY", "USD");
	define("KEY_TOKEN", "APR.wqc-354*");
	define("MONEDA", "$");

	$num_cart=0;
	if(isset($_SESSION['carrito']['producto'])){
		$num_cart=count($_SESSION['carrito']['producto']);
	}
 ?>