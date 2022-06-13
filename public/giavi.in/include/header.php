<header class="header">
		<!--=== Desktop navigation ===-->
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-10 col-sm-7 col-lg-2">
					<a href="/" class="">
		                  <img src="img/g-logo.svg" class="" style="width:180px;height:90px;">
						<!-- <span class="u-font-serif">GIAVI</span> -->
					</a>
				</div>
				<div class="col-sm-8 d-none d-lg-block">
					<ul class="desktop-nav d-lg-flex justify-content-center">
						<li><a href="/" class="desktop-nav__link">Home</a></li>
						<li><a href="about.php" class="desktop-nav__link">About</a></li>
						<li><a href="gallery.php" class="desktop-nav__link">Gallery</a></li>
						<li><a href="contact.php" class="desktop-nav__link">Contact</a></li>

						<li class="desktop-nav__item desktop-nav__item--has-submenu active">						
					      <a class="desktop-nav__link active" >All Products</a>
							<ul class="desktop-nav__submenu list-bare">
								<li><a href="Spices.php">Spices</a></li>
								<li><a href="pickles.php">Pickles</a></li>
								
							</ul>
						</li>						
					</ul>
				</div>
				<div class="col-1 d-lg-none">
					<a href="#" class="mobile-nav-trigger d-lg-none js-open-mobile-nav"><ion-icon name="menu" class="icon"></ion-icon></a>
				</div>
				<div class="col-sm-4 col-lg-2 d-none d-sm-block">
				  <a href="model.php" class="btn btn--ghost btn--full" data-toggle="modal" data-target="#exampleModal1" >Enquiry</a>				
			   </div>
			</div>
		</div>
		<!--=== Mobile navigation ===-->
		<ul class="mobile-nav-list js-mobile-nav d-lg-none">
		<li><a href="/" class="mobile-nav-list__link">Home</a></li>
			<li><a href="about.php" class="mobile-nav-list__link">About</a></li>
			<li><a href="gallery.php" class="mobile-nav-list__link">Gallery</a></li>
			<li><a href="contact.php" class="mobile-nav-list__link">Contact</a></li>

			<li class="mobile-nav-list__item mobile-nav-list__item--has-submenu">
				<a href="gallery.php" class="mobile-nav-list__link js-open-submenu">All Products</a>
				<ul class="mobile-nav-list__submenu js-submenu">
					<li><a href="Spices.php">Spices</a></li>
					<li><a href="Pickles.php">Pickles</a></li>
					<li><a href=""></a></li>
				</ul>
			</li>
			
			<li>
				<a href="model.php" class="btn btn--ghost btn--full" data-toggle="modal" data-target="#exampleModal1" >Enquiry</a>
			</li>
			
		</ul>
	</header>