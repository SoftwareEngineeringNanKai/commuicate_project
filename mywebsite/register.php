<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Enhance Required Form Fields with CSS3" />
        <meta name="keywords" content="form, html5, css3, animated, transition, required, filter" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demos.css" />
        <link rel="stylesheet" type="text/css" href="css/style2.css" />
		<!--<script type="text/javascript" src="js/modernizr.custom.04022.js"></script>-->
        <script src="js/modernizr.custom2.js"></script>
        <!--start-->
        <link rel="stylesheet" type="text/css" href="css/normalize3.css" />
		<link rel="stylesheet" type="text/css" href="css/demo3.css" />
		<link rel="stylesheet" type="text/css" href="css/component2.css" />
		<link rel="stylesheet" type="text/css" href="css/content.css" />
        <!--end-->
        <!--start-->
        <link rel="stylesheet" type="text/css" href="css/style_radio.css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300' rel='stylesheet' type='text/css' />
        <!--end-->
    </head>
    <body>
	    <?php include 'blue.php'?>
        <div class="container">	
			<header>
				<h1>Welcome to Registation</h1>
	    </header>
			
			<section class="af-wrapper">
	            <h3>Register Form</h3>
		        
				<input id="af-showreq" class="af-show-input" type="checkbox" name="showreq" />
				<label for="af-showreq" class="af-show">Show only required fields</label>
				
				<form class="af-form" id="af-form" novalidate>
				
					<div class="af-outer">
						<div class="af-inner">
							<label for="input-title">Nick Name</label>
							<input type="text" name="title" id="input-title">
						</div>
					</div>
				
					<div class="af-outer af-required">
						<div class="af-inner">
							<label for="input-name">Password</label>
							<input type="text" name="fullname" id="input-name" required>
						</div>
					</div>
					
					<div class="af-outer af-required">
						<div class="af-inner">
						  <label for="input-email">Repassword</label>
						  <input type="email" name="email_address" id="input-email" required>
						</div>
					</div>
					
					<div class="af-outer">
						<div class="af-inner">
							<label for="input-bdate">Birthday</label>
							<input type="date" name="birthdate" id="input-bdate" placeholder="MM/DD/YYYY">
						</div>
					</div>
					
					<div class="af-outer">
						<div class="af-inner">
						  <label for="input-country">Country</label>
						  <input type="email" name="country" id="input-country">
						</div>
					</div>
					
					<div class="af-outer af-required">
						<div class="af-inner">
						  <label for="input-catname">Email</label>
						  <input type="email" name="catsname" id="input-catname" required>
						</div>
					</div>
					
					<div class="af-outer">
						<div class="af-inner">
						  <label for="input-phone">Phone Number</label>
						  <input type="email" name="phonenumber" id="input-phone">
						</div>
					</div>
                    
                    <section class="af-outer">
						<section class="af-inner">
						  <label for="input-phone">Phone Number</label>
						</section>
					</section>
                    
                   <div class="switch demo3">
                        <input type="checkbox">
					    <label><i></i></label>
				   </div>
				   <input type="submit" value="Send it over!" /> 
				   <br><br>
				   <div class="mockup-content">
					<div class="morph-button morph-button-modal morph-button-modal-1 morph-button-fixed">
						<button type="button">Terms &amp; Conditions</button>
						<div class="morph-content">
							<div>
								<div class="content-style-text">
									<span class="icon icon-close" style="color:#0F3">Close the dialog</span>
									<h2>Terms &amp; Conditions</h2>
									<p>Pea horseradish azuki bean lettuce avocado asparagus okra. Kohlrabi radish okra azuki bean corn fava bean mustard tigernut juccama green bean celtuce collard greens avocado quandong <strong>fennel gumbo</strong> black-eyed pea. Grape silver beet watercress potato tigernut corn groundnut. Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea <strong>tomato spring onion</strong> azuki bean gourd.</p>
									<p><input id="terms" type="checkbox" /><label for="terms">I accept the terms &amp; conditions.</label></p>
								</div>
							</div>
						</div>
					</div><!-- morph-button -->
				</div><!-- /form-mockup -->
				</form>
			</section>
        </div>
        
        <script src="js/classie.js"></script>
		<script src="js/uiMorphingButton_fixed.js"></script>
		<script>
			(function() {	
				var docElem = window.document.documentElement, didScroll, scrollPosition;

				// trick to prevent scrolling when opening/closing button
				function noScrollFn() {
					window.scrollTo( scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0 );
				}

				function noScroll() {
					window.removeEventListener( 'scroll', scrollHandler );
					window.addEventListener( 'scroll', noScrollFn );
				}

				function scrollFn() {
					window.addEventListener( 'scroll', scrollHandler );
				}

				function canScroll() {
					window.removeEventListener( 'scroll', noScrollFn );
					scrollFn();
				}

				function scrollHandler() {
					if( !didScroll ) {
						didScroll = true;
						setTimeout( function() { scrollPage(); }, 60 );
					}
				};

				function scrollPage() {
					scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
					didScroll = false;
				};

				scrollFn();

				var UIBtnn = new UIMorphingButton( document.querySelector( '.morph-button' ), {
					closeEl : '.icon-close',
					onBeforeOpen : function() {
						// don't allow to scroll
						noScroll();
					},
					onAfterOpen : function() {
						// can scroll again
						canScroll();
					},
					onBeforeClose : function() {
						// don't allow to scroll
						noScroll();
					},
					onAfterClose : function() {
						// can scroll again
						canScroll();
					}
				} );

				document.getElementById( 'terms' ).addEventListener( 'change', function() {
					UIBtnn.toggle();
				} );
			})();
		</script>
        <?php include 'nav.php'?>
		<?php include 'balloon.php'?>
    </body>
</html>