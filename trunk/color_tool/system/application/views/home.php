<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Color Tool</title>	
</head>

<body>
	
<h1>Color Tool</h1>
<hr />

<form action="" method="post" accept-charset="utf-8">
	<input type="hidden" name="type" value="html">
	<h2>HTML</h2>
	
	<div style="overflow: hidden;">
		<div style="float: left; margin-right: 5px;">
			<b>Background</b><br />
			#<input type="text" name="html1" value="<?=$html1?>" id="html1"><br />
		</div>
		<div style="float: left;">
			<b>Foreground</b><br />
			#<input type="text" name="html2" value="<?=$html2?>" id="html2"><br />
		</div>
	</div>
	<p><input type="submit" value="Calculate"></p>
</form>

<hr />

<form action="" method="post" accept-charset="utf-8">
	<input type="hidden" name="type" value="rgb">
	<h2>RGB</h2>

	<div style="overflow: hidden;">
		<div style="float: left; margin-right: 5px;">
			<b>Background</b><br />
			R: <input type="text" name="red1" value="<?=$red1?>"><br />
			G: <input type="text" name="green1" value="<?=$green1?>"><br />
			B: <input type="text" name="blue1" value="<?=$blue1?>"><br />
		</div>
		<div style="float: left;">
			<b>Foreground</b><br />
			R: <input type="text" name="red2" value="<?=$red2?>"><br />
			V: <input type="text" name="green2" value="<?=$green2?>"><br />
			B: <input type="text" name="blue2" value="<?=$blue2?>"><br />
		</div>
	</div>
	<p><input type="submit" value="Calculate"></p>
</form>

<hr />

<h2>Color Difference</h2>
<p>
	<?=$color_difference?>
	<?php if ($color_difference != '' && $color_difference < 500): ?>
			<i style="font-size: 13px; background-color: #ffa5ba; padding: 5px; margin-top: 10px;">should be 500 or greater</i>
	<?php endif ?>
</p>

<h2>Color Brightness Difference</h2>
<p>
	<?=$color_brightness_difference?><br />
	<?php if ($color_brightness_difference != '' && $color_brightness_difference < 125): ?>
			<i style="font-size: 13px; background-color: #ffa5ba; padding: 5px; margin-top: 10px;">should be 125 or greater</i>
	<?php endif ?>	
</p>

<hr />

<h2>Sample</h2>
<p style="padding: 30px; background-color: #<?=$html1?>; color: #<?=$html2?>;font-size: 36px;">This is just an example ;)</p>


<h2>Reference</h2>
<p>Color brightness is determined by the following formula:<br />
((Red value X 299) + (Green value X 587) + (Blue value X 114)) / 1000
</p>
<p>Color difference is determined by the following formula:<br />
(maximum (Red value 1, Red value 2) - minimum (Red value 1, Red value 2)) + (maximum (Green value 1, Green value 2) - minimum (Green value 1, Green value 2)) + (maximum (Blue value 1, Blue value 2) - minimum (Blue value 1, Blue value 2))
</p>
<p>Source: <a href="http://www.w3.org/TR/AERT">W3C - Techniques For Accessibility Evaluation And Repair Tools</a>
</p>

</body>
</html>
