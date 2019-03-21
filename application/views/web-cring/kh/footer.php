

<div id="slidex">
<footer>
    <div class="content">
		<div class="wrapper">
		<div class="col-xs-12">
			<div class="col-sm-12 col-md-4">
				<div class="logo-footer">
					<img src="<?php echo base_url('web/img/logo-footer.png') ?>" alt="">
				</div>
			</div>
			<div class="col-sm-3 col-md-2 foot-section">
				<h1 class="heading">Address</h1>
				<p>
					Dusit Building<br />
					No. 111 & 113 Street 1003<br />
					Sangkat Phnom Penh Thmey<br />
					Khan Sen Sok<br />
					Phnom Penh,<br />
					Cambodia 12101
				</p>
			</div>
			<div class="col-sm-3 col-md-2 foot-section">
				<h1 class="heading">Contact</h1>
				<p>
					<a href="">help@go-xpress.com</a><br />
					<a href="">jobs@go-xpress.com</a><br />
					P. <a href="tel:+855236997777">023 699 77 77</a><br />
					&nbsp;&nbsp;&nbsp;&nbsp;<a href="tel:+855236347777">023 634 7777</a><br />
				</p>
				
			</div>
			<div class="col-sm-3 col-md-2 foot-section">
				<h1 class="heading">Find Us on</h1>
				<p>
					<a href="https://www.facebook.com/goxpressapp/"><img src="<?php echo base_url('web/img/footer/icon-facebook.png') ?>" alt="" class="img-responsive icon"></a>
					<a href=""><img src="<?php echo base_url('web/img/footer/icon-instagram.png') ?>" alt="" class="img-responsive icon"></a>
					<a href=""><img src="<?php echo base_url('web/img/footer/icon-twitter.png') ?>" alt="" class="img-responsive icon"></a>
				</p>
				
			</div>
			<div class="col-sm-3 col-md-2 foot-section">
				<h1 class="heading">Download Us on</h1>
				<p>
					<a href="https://play.google.com/apps/publish/?dev_acc=17966548711195582773#ApkPlace:p=com.goexpress.application"><img src="<?php echo base_url('web/img/footer/google-play.png') ?>" alt="" class="img-responsive download"></a>
					<a href=""><img src="<?php echo base_url('web/img/footer/app-store.png') ?>" alt="" class="img-responsive download"></a>
				</p>				
			</div>
			<div class="clearfix"></div>
			<div class="col-md-offset-4 col-md-8 copyright">
				&copy; 2016 EPA Co.
			</div>
		</div>
        <div class="clearfix"></div>
		</div>
    <div class="clearfix"></div>
    </div>
</footer>
</div>


</div>

<div id="backtotop">
	<img src="<?php echo base_url('web/img/top.png') ?>" alt="" class="img-responsive blue hidden">
	<img src="<?php echo base_url('web/img/top-white.png') ?>" alt="" class="img-responsive white hidden">
</div>



</div> <!-- #body -->

<div id="loading">
	<img src="<?php echo base_url('web/img/loading.gif') ?>" alt="">
</div>

<!-- <div id="bar" style="position:fixed;top:40%;right:5px;background:#000;color:#fff;padding:5px;text-align:center;z-index:9999;"></div> -->

	<script type="text/javascript" src="<?php echo base_url('web/js/jquery-1.11.3.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('web/js/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('web/js/main.js') ?>"></script>

	<script>
		$(window).load(function(){
			$('.warning').click(function(){
				$(this).hide('slow');
			})
		});


		$('.warning').hide();
		$(".submit").click(function(event){

	        event.preventDefault();
	            // var returnval = '[{"error":1,"error_message":"Failed to Complete the Registration!"}, {"error":0,"error_message":"Registration Successfully! Our staff will call you to completing your registration data."}]',
	            // data = JSON.parse(returnval);
	        $.ajax({
            url : "<?php echo base_url('goexpress/tmp_registration'); ?>",
	            data : $("form[name='signup_form']").serialize(),
	            type : "POST",
	            // success : function(msg){



                dataType : 'json', // data type
                // data : $("#form").serialize(), // post data || get data
                success : function(data) {
                    $(".warning").show('slow');
                    console.log(data);
                    if ( data.error == 0 ) {
                        document.getElementById("signup_form").reset();
	                	$(".warning ul").html('<li class="succes">Registration Successfully! Our staff will call you to completing your registration data.</li>');
	            	}
	            	else {
	                    $(".warning ul").html('<li class="failed">'+ data.error_message + '</li>');	
	            	}
                },
                error: function(xhr, resp, text) {
	                $(".warning").show('slow');
	                $(".warning ul").html('<li class="failed">Failed to Complete the Registration!</li>');	            	
                }


	            // if( data.error == 1 ){
	            //     $(".warning").show('slow');
	            //     $(".warning ul").html('<li class="failed">' + data.error_message +'</li>');	            	
	            // }else{	            	
	            //     $(".warning").show('slow');
	            //     $(".warning ul").html('<li class="succes">' + data.error_message + '</li>');
	            // }




	        //     }
	        });
	    });





    </script>
</body>
</html>
