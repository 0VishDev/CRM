<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include('include/link.php') ?>
</head>
<body>
	<?php include('include/header.php') ?>



    <!--=== Hero ===-->
	<div class="container-fluid ">
        <div class="row">
            <div class="col-sm-12 col-md-12">
               <img src="img/slider/contact.jpg" style="width:100%;" class="img-fluid">
            </div>
        </div>
    </div>
	<!--=== enf of Hero ===-->
	
	<!--=== Contact Form ===-->
    <div class="mt-7 mb-8">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <p class="u-color-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    <div class="mt-5">
						<h3 class="form-confirmation u-font-serif mt-6 js-form-confirmation">Thank you for contacting us! We will reply as soon as possible!</h3>
                        <form method="POST" class="form js-form" action="php/contact.php">
                            <div class="form__field">
                                <input type="text" name="fullname" placeholder="Full Name" required>
                            </div>
                            <div class="form__field">
                                <input type="email" name="email" placeholder="Your E-mail" class="js-email" required>
                                <p class="form__field__error js-email-error">E-mail is incorrect.</p>
                            </div>
                            <div class="form__field">
                                <textarea rows="4" placeholder="Your Message" name="message"></textarea>
                            </div>
                            <div class="form__field">
                                <button type="submit" class="js-submit">
                                    <span>SEND</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 offset-md-1">
                    <ul class="contact-info">
                        <li><span>Phone</span>+91 9318428529</li>
                        <li><span>E-mail</span>daspunit@hotmail.com</li>
                        <li><span>Working Hours</span>Monday &nbsp;&nbsp;09:00am - 06:00pm<br>Friday &nbsp;&nbsp;09:00am - 02:00pm <br>Sunday &nbsp;&nbsp;-Close</li>
                        <li><span>Address</span>Kankpur Sakari Madhubani Bihar 847329 Manufacturing<br>Bihar ,India</li>
                        <li><ion-icon name="pin" class="u-color-primary"></ion-icon><a href="#" class="u-color-primary" target="_blank">Check on the map</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</div>
	<!--=== enf of Contact Form ===-->



    <?php include('include/footer.php') ?>
    <?php include('include/model.php') ?>
</body>
</html>