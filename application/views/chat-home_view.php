<?php include 'header_view.php'; ?>
<div class="container">
	<h2 class="h2-teia-is-here">Hello <?php echo $_SESSION['logged_in']['profile_firstName'] ?>, Teia is here to help</h2>
	<div class="border-bottom"></div>
</div>
<form action="/create_chat" method=POST id="my_form">
	<a href="javascript:{}" onclick="document.getElementById('my_form').submit();" id="submit">
		<footer class="page-footer footer-for-session">
	          <div class="container">
	            <div class="row">
	              <div class="col l6 s12">
	                <h5 class="white-text center h5-start-session">Start Session</h5>
	              </div>
	            </div>
	          </div>
		</footer>
	</a>
</form>






























<?php include 'footer_view.php' ?>
