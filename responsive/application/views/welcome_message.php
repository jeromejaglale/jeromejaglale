<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Foundation</title>

  <link rel="stylesheet" href="css/foundation.css" />

  <script src="js/vendor/custom.modernizr.js"></script>
</head>

<body>	
	<div class="row">
		<div class="large-12 columns">

			<!-- banner -->
			<img src="img/banner.jpg" alt=""/>

			<!-- main nav -->
			<nav class="top-bar">

				<ul class="title-area">
					<li class="name"></li>
					<li class="toggle-topbar menu-icon"><a href=""><span><!-- Menu --></span></a></li>
				</ul>

				<section class="top-bar-section">
					<ul class="left">
						<li>
							<a href="#">Home</a>
						</li>
						<li>
							<a href="">Participate</a>
						</li>              
						<li>
							<a href="">Search</a>
						</li>              
					</ul>
				</section>

			</nav>

			<!-- form -->
			<form class="custom">
				<fieldset>
					<legend>Search locations</legend>

					<div class="row">
						<div class="large-12 columns">
							<label>Keywords</label>
							<input type="text" placeholder="downtown hospital">
						</div>
					</div>

					<div class="row">

						<div class="large-4 columns">
							<label>Era</label>
							<label for="radio1">
								<input name="radio1" type="radio" id="radio1" style="display:none;">
								<span class="custom radio"></span> Any
							</label>
							<label for="radio1">
								<input name="radio1" type="radio" id="radio1" style="display:none;">
								<span class="custom radio"></span> Era 1
							</label>
							<label for="radio1">
								<input name="radio1" type="radio" id="radio1" style="display:none;">
								<span class="custom radio"></span> Era 2
							</label>
							<label for="radio1">
								<input name="radio1" type="radio" id="radio1" style="display:none;">
								<span class="custom radio"></span> Era 1
							</label>
							<label for="radio1">
								<input name="radio1" type="radio" id="radio1" style="display:none;">
								<span class="custom radio"></span> Era 2
							</label>
							<label for="radio1">
								<input name="radio1" type="radio" id="radio1" style="display:none;">
								<span class="custom radio"></span> Era 3
							</label>
						</div>

						<div class="large-4 columns">
							<label>Theme</label>
							<label for="radio1">
								<input name="radio1" type="radio" id="radio1" style="display:none;">
								<span class="custom radio"></span> Any
							</label>
							<label for="radio1">
								<input name="radio1" type="radio" id="radio1" style="display:none;">
								<span class="custom radio"></span> Era 1
							</label>
							<label for="radio1">
								<input name="radio1" type="radio" id="radio1" style="display:none;">
								<span class="custom radio"></span> Era 2
							</label>
							<label for="radio1">
								<input name="radio1" type="radio" id="radio1" style="display:none;">
								<span class="custom radio"></span> Era 1
							</label>
							<label for="radio1">
								<input name="radio1" type="radio" id="radio1" style="display:none;">
								<span class="custom radio"></span> Era 2
							</label>
							<label for="radio1">
								<input name="radio1" type="radio" id="radio1" style="display:none;">
								<span class="custom radio"></span> Era 3
							</label>
						</div>

						<div class="large-4 columns">
							<label>Area</label>
							<label for="radio1">
								<input name="radio1" type="radio" id="radio1" style="display:none;">
								<span class="custom radio"></span> Any
							</label>
							<label for="radio1">
								<input name="radio1" type="radio" id="radio1" style="display:none;">
								<span class="custom radio"></span> Era 1
							</label>
							<label for="radio1">
								<input name="radio1" type="radio" id="radio1" style="display:none;">
								<span class="custom radio"></span> Era 2
							</label>
							<label for="radio1">
								<input name="radio1" type="radio" id="radio1" style="display:none;">
								<span class="custom radio"></span> Era 1
							</label>
							<label for="radio1">
								<input name="radio1" type="radio" id="radio1" style="display:none;">
								<span class="custom radio"></span> Era 2
							</label>
							<label for="radio1">
								<input name="radio1" type="radio" id="radio1" style="display:none;">
								<span class="custom radio"></span> Era 3
							</label>
						</div>

					</fieldset>
				</form>

			</div>
		</div>

		<!-- bottom nav -->
		<div class="row">
			<div class="large-12 columns">

				<nav class="top-bar">
					<ul class="title-area">
						<li class="name"></li>
						<li class="toggle-topbar menu-icon">
							<a href=""><span><!-- Menu --></span></a>
						</li>
					</ul>

					<section class="top-bar-section">
						<ul class="right">
							<li>
								<a href="#">About</a>
							</li>
							<li>
								<a href="">Partners &amp; Contributors</a>
							</li>              
							<li>
								<a href="">Contact</a>
							</li>              
						</ul>
					</section>
				
				</nav>

			</div>
		</div>

		<script>
		document.write('<script src=' +
			('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
			'.js><\/script>')
		</script>

		<script src="js/foundation.min.js"></script>

		<script>
		$(document).foundation();
		</script>
</body>
</html>
