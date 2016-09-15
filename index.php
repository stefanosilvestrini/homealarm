<?php

include_once(__DIR__ . '/conf.php');

function getUltimoStatus() {

	$return_query = queryMySqli(" select outputstr, data_reg from log order by id DESC limit 1 ");
	return $return_query[0];

}

$ultimo_stato_array = getUltimoStatus(); 

$ultimo_stato = $ultimo_stato_array['outputstr'];
$ultimo_stato_orario = date('d/m/Y H:i', strtotime($ultimo_stato_array['data_reg']));

?>
<html>
<head>
	
	<title>Allarme casa</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
		body {
		  margin: 60px auto;
		  background: #fff;
		}

	.flipswitch {
	  background-color: rgba(255,0,0,0.5);
	  border-radius: 40px;
	  cursor: pointer;
	  display: block;
	  height: 40px;
	  position: relative;
	  width: 120px;
	}

	.flipswitch:after {
	  content: "";
	  background: white;
	  display: block;
	  position: absolute;
	  width: 50%;
	  left: 4px; top: 4px; bottom: 4px; 
	  transition: 300ms ease;
	  border-radius: 1em;
	  text-align: center;
	  line-height: 22px;
	  color: rgba(0,0,0,0.25);
	  font-weight: bold;

	}

	input[type=checkbox] {display: none}

	input:checked + .flipswitch {
	  background-color: #94c535;
	}

	input:checked + .flipswitch:after {
	  left: calc(50% - 4px);
	}

	@-webkit-keyframes intro {
	  0% {-webkit-transform: translateY(-100px)}
	  50% {-webkit-transform: translateY(15px)}
	  100% {-webkit-transform: translateY(0px)}
	}

	.switch { margin: auto; text-align: center; width:100%; margin-top: 100px;}
	#cent { margin: auto; text-align: center; width: 120px; padding-top: 20px }
	#res { padding-top: 20px}

</style>

</head>
<body>

	<input type="hidden" value="<?php echo (empty($_GET['old_stato']) ? $ultimo_stato : $_GET['old_stato']); ?>" id="old_stato">
	<input type="hidden" value="<?php echo $ultimo_stato; ?>" id="attuale_stato">

	<div class="switch">

		<h2>Stato attuale: <u><?php echo $ultimo_stato; ?></u> (<?php echo $ultimo_stato_orario; ?>)</h2>

		<div id="cent">

		  	<label>
			  <input id="onoff" <?php echo $ultimo_stato == 'inserito' ? ' checked ' : ''; ?> type="checkbox">
			  <span class="flipswitch"></span>
			</label>

		</div>

		<div id="res"></div>

	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	<script src="common.js" type="text/javascript"></script>

</body>
</html>