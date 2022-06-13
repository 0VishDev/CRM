
	<!--=== Footer ===-->
	<footer class="footer u-bg-secondary">
		<div class="u-bg-secondary footer-widgets">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6 col-md-3">
						<div class="footer-widget">
							<h6 class="footer-widget__title">About Us</h6>
							<p class="text-justify">GAIVI is known to offer quality assured products, yet we never disappoint our customers in terms of quantity as well. We carefully maintain a balance among quality, quantity and price to ensure we never give a single chance of complaint to our customers.</p>
						</div>
					</div>
					<div class="col-sm-6 col-md-2">
						<div class="footer-widget">
							<h6 class="footer-widget__title">QUICK LINKS</h6>
							<ul>
								<li><a href="/">Home</a></li>
								<li><a href="about.php">About</a></li>
								<li><a href="gallery.php">Gallery</a></li>
								<li><a href="contact.php">Contact</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="footer-widget">
							<h6 class="footer-widget__title">CONTACT</h6>
							<div class="mb-2">
								<p><span>Mobile No: &nbsp;&nbsp;</span>9318428529</p>
								<p><span>Email Id:&nbsp;&nbsp;</span>daspunit@hotmail.com</p>
								<p><span>Address:&nbsp;&nbsp;</span>Kankpur Sakari Madhubani Bihar (Pin) 847329 Manufacturing</p>
							</div>
							<p></p>
							<p></p>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="footer-widget">
							
							 <img src="img/g-logo.svg" class="" style="width:290px;height:175px;">
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--== End of footer ==-->
	<!-- Copyright -->
      <div style="background-color: rgba(0, 0, 0, 0.2)">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12 col-md-4">
               <div class="text-center " style="line-height:7;">
                  © 2021 Copyright:
                  <a class="text-white">Gia Vi</a>
                </div> 
            </div>
            <div class="col-sm-12 col-md-3">
              <p class="text-white text-center py-sm-3 " ><a href="http://businessworldtrade.com/" target="_blank"><img src="assets/img/svg-logo.svg" class="img-fluid"></a></p>
            </div>
            <div class="col-sm-12 col-md-5">
               <div class="text-center " >
                  
                  <a class="text-white" style="line-height:7;" >Managed and Developed by Infobiz World Trade Pvt. Ltd.</a>
                </div>
            </div>
          </div>
        </div>
  </div>
   <!-- Copyright -->
	<!--  Query Send  Script-->
	<script type="text/javascript">
              $(document).on("click","#getdata",function (){
                 
                  $("#userData").val($(this).attr("data-product"));
               
                });
            </script>
        <!-- Query Send Script end -->
  <!-- Mission Section Script -->
       <script >
       	

$(window).load(function() {
var controller = new ScrollMagic.Controller({globalSceneOptions: {triggerHook:"onEnter",duration: "135%"}});
	
	// build scenes
	new ScrollMagic.Scene({triggerElement: "#parallax"})
					.setTween("#parallax > div", {y: "80%", ease: Linear.easeNone})
					.addTo(controller);

	
	/* new ScrollMagic.Scene({triggerElement: ".timeline"})
					.setTween(timeline_scene)
					.addTo(controller); */	


	var scrollController = new ScrollMagic.Controller();
	
	var parallax_all = new TimelineMax();
	parallax_all	
		.from("#Boat", 4 , {x:-700, ease: Power1.easeIn})	
		.from("#steer_text",1,{y:500,opacity:0},2)
		.from("#steer_sub_text",1,{y:500,opacity:0},3)
		.from(".steer-button",1,{y:550,opacity:0},3)
	
		
	new ScrollMagic.Scene({
			triggerElement: "#parallax",
			triggerHook:0.8,
			reverse:true
		})
		.setTween(parallax_all)
		.addTo(scrollController)
    .addIndicators();;
});
       </script>
  <!-- End Mission Section -->
  
<!--===  SCRIPTS ===-->
<script src="assets/js/vendors/jquery-3.3.1.min.js"></script>
<script src="assets/js/vendors/bootstrap.min.js"></script>
<script src="assets/js/vendors/slick.min.js"></script>
<script src="https://unpkg.com/ionicons@4.4.2/dist/ionicons.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="assets/js/script.js"></script>