<?php include 'header_view.php' ?>

			<div class="container">
				<center>
				<div class="logo-login center">
					<img class="logo-login-img" src="<?php echo base_url() ?>assets/teia.png">
					<h5 class="h5-teia">TEIA</h5>
					<h6 class="h6-student-chatbot">Student Support Chatbot</h6>
				</div>
				
		          <div class="card card-for-login">
		                <form action="<?php echo base_url() ?>login" method="post">
		                         <div class="input-field">
		                           <input id="username" type="text"  name="username" placeholder="Username" required="">
		                         </div>
		                          <div class="input-field">
		                           <input id="password" type="password"  name="password" placeholder="Password" required="">
		                         </div>
		                    <button type="submit" class="center btn-large btn-custom-login white">Login</button> 
		                </form>
		          </div>
	          </center>
	        </div>


<?php include 'footer_view.php' ?>


