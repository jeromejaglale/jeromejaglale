 <!DOCTYPE html>
<html lang="en" manifest="<?=site_url('cache.manifest')?>">
<head>
	<meta charset="utf-8">
	<title>Expenses Tracker</title>

	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

	<link rel="stylesheet" href="<?=base_url()?>css/main.css?v=1" />

	<script src="<?=base_url()?>js/jquery.js"></script>
	<script src="<?=base_url()?>js/main.js?v=2"></script>
</head>

<body>
<div class="container">
	<form method="post" action="<?=site_url('ajax/add_expense')?>">
			<p>
				Amount<br />
				<input type="number" name="amount" id="amount"/>
		 	</p>
			<p>
				Note<br />
				<input type="text" name="note" id="note"/>
		 	</p>
		 	<input type="submit" />
	</form>
</div>
</body>
</html>