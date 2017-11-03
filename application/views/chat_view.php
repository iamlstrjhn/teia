<?php include 'header_view.php' ?>

<div class="navbar-fixed">

		<nav class="nav-for-chat">
			<div class="nav-wrapper">
		      <a href="#" class="brand-logo left"><img src="<?php echo base_url() ?>assets/back.png" class="icon-back"></a>
		     
		      <a href="" class="session-no-class">Session No: <?php echo $this->session->userdata['chat_room']['room'] ?></a>
		     
		      <a href="/chat/end_session" class="brand-logo right"><img src="<?php echo base_url() ?>assets/more.png" class="icon-info"></a>
		     
		    </div>
		</nav>
</div>


          			<div class="row row-for-chat" id="">
          				<div id="live-chat">
          					


          				</div>
          				


					
		
		<div class=" footer-for-chat">

				<div class="container-fluid">
			            <div class="row row-1">
			              <div class="col s10 l11 column-for-chat">
			                <div class="input-field send-field">
				                <input id="chatInput" type="text"  name="text-area" placeholder="This is a message" class="materialize-textarea" required="">
				            </div>
			              </div>
			              	<div class="col s2 l1"> <a href="" id="btn_send"><img class="image-send" src="<?php echo base_url() ?>assets/send.png"></a></div>
			            </div>
			      </div>    
		</div>












<script type="text/javascript">
  
$(document).ready(function(){  
      	setInterval(function(){
      		$('#live-chat').load('<?php echo base_url() ?>chat/get_messages');
      	},2000);


   }); 

      $(document).on('click', '#btn_send', function(){  
           var chatInput = $('#chatInput').val();  
         
           $.ajax({  
                url:'<?php echo base_url() ?>chat/send_message',  
                method:"POST",  
                data:"message="+ chatInput,  
                dataType:"text",  
                success:function(data)  
                {  
                       
                   setInterval();  
                }  
           })  
           
             
      });  

      
   


</script>












<?php include 'footer_view.php' ?>
