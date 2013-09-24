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

	<!-- top nav -->
	<div class="row">
		<div class="large-12 columns">
	        <nav class="top-bar">
	          <ul class="title-area">
	            <li class="name">
	            </li>
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
	
	<!-- banner -->
	<div class="row">
		<div class="large-12 columns">
			<img src="img/banner.jpg" alt=""/>
		</div>
	</div>

	<!-- main nav -->
	<div class="row">
		<div class="large-12 columns">
			<nav class="top-bar">
				<ul class="title-area">
	            <li class="name">
	            </li>
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
		</div>
	</div>


	<div class="row">
		<div class="large-8 columns">
			<h3>The Grid</h3>

			<!-- Grid Example -->
			<div class="row">
				<div class="large-12 columns">
					<div class="panel">
						<p>This is a twelve column section in a row. Each of these includes a div.panel element so you can see where the columns are - it's not required at all for the grid.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="large-6 columns">
						<p style="background-color: red" class="panel">Six columns 2</p>
				</div>
				<div class="large-6 columns">
						<p>Six columns</p>
				</div>
			</div>
			<div class="row">
				<div class="large-4 columns">
					<div class="panel">
						<p>Four columns</p>
					</div>
				</div>
				<div class="large-4 columns">
					<div class="panel">
						<p>Four columns</p>
					</div>
				</div>
				<div class="large-4 columns">
					<div class="panel">
						<p>Four columns</p>
					</div>
				</div>
			</div>

			<h3>Buttons</h3>

      <div class="row">
        <div class="large-6 columns">
          <p><a href="#" class="small button">Small Button</a></p>
          <p><a href="#" class="button">Medium Button</a></p>
          <p><a href="#" class="large button">Large Button</a></p>
        </div>
        <div class="large-6 columns">
          <p><a href="#" class="small alert button">Small Alert Button</a></p>
          <p><a href="#" class="success button">Medium Success Button</a></p>
          <p><a href="#" class="large secondary button">Large Secondary Button</a></p>
        </div>
      </div>
		</div>

		<div class="large-4 columns">
			<h4>Getting Started</h4>
			<p>We're stoked you want to try Foundation! To get going, this file (index.html) includes some basic styles you can modify, play around with, or totally destroy to get going.</p>

			<h4>Other Resources</h4>
			<p>Once you've exhausted the fun in this document, you should check out:</p>
			<ul class="disc">
				<li><a href="http://foundation.zurb.com/docs">Foundation Documentation</a><br />Everything you need to know about using the framework.</li>
				<li><a href="http://github.com/zurb/foundation">Foundation on Github</a><br />Latest code, issue reports, feature requests and more.</li>
				<li><a href="http://twitter.com/foundationzurb">@foundationzurb</a><br />Ping us on Twitter if you have questions. If you build something with this we'd love to see it (and send you a totally boss sticker).</li>
			</ul>
		</div>
	</div>

  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
  
  <script src="js/foundation.min.js"></script>
  <!--
  
  <script src="js/foundation/foundation.js"></script>
  
  <script src="js/foundation/foundation.alerts.js"></script>
  
  <script src="js/foundation/foundation.clearing.js"></script>
  
  <script src="js/foundation/foundation.cookie.js"></script>
  
  <script src="js/foundation/foundation.dropdown.js"></script>
  
  <script src="js/foundation/foundation.forms.js"></script>
  
  <script src="js/foundation/foundation.joyride.js"></script>
  
  <script src="js/foundation/foundation.magellan.js"></script>
  
  <script src="js/foundation/foundation.orbit.js"></script>
  
  <script src="js/foundation/foundation.reveal.js"></script>
  
  <script src="js/foundation/foundation.section.js"></script>
  
  <script src="js/foundation/foundation.tooltips.js"></script>
  
  <script src="js/foundation/foundation.topbar.js"></script>
  
  <script src="js/foundation/foundation.interchange.js"></script>
  
  <script src="js/foundation/foundation.placeholder.js"></script>
  
  <script src="js/foundation/foundation.abide.js"></script>
  
  -->
  
  <script>
    $(document).foundation();
  </script>
</body>
</html>
