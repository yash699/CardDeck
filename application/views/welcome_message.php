<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style type="text/css">

  	*{
  		margin: 0;
  		padding: 0;
  	}

  	.header_left
  	{
  		display: flex;
  		align-content: flex-start;
  		justify-content: flex-start;
  		height: 5px;
  		font-size: 13px;
  	}
  	.title_img
  	{
  		width: 13px;
  		height: 13px;
  	}

  	.footer_right
  	{
  		display: flex;
  		align-content: flex-end;
  		justify-content: flex-end;
  		height: 10px;
  	}
  	.content
  	{
  		height: 150px;
  		display: flex;
  		flex-wrap: wrap;

  	}
  
  	.img_box
  	{
  		position: absolute;
  			top: 40%;
  			    left: 40%;
  	}
  	@media (max-width: 500px) {
		  .img_box
		  	{
		  		
		  			    left: 35%;
		  	}
		  	.header_left
		  	{
		  		margin-left: auto;
		  	}
		}


		

  </style>

</head>
<body> 
 
<div class="container mt-5">

		<center class="mb-2">Pratice Test</center>
  	<div class="row justify-content-md-center" id="show_card">


  		<!-- 
  				<div class="col-12 col-md-12" id="show_card">
							  		<p>Empty Card</p>
					</div> -->

			

  	
			

	  
	  
	</div>

	<div class="row mt-2">

		<div class="col-12 col-md-12 ">

				


					  	<div class="card">
							  <div class="card-body" >
							  
							  	    <p >Total : <span class="mb-2 text-muted" id="total">0</span></p>
    								
								</div>
							</div>
					</div>

	</div>
	<button class="btn btn-primary mt-4 mb-4 text-center" id="shuffle_card">Select 3 Card</button>


	<div class="row">
		
		<div class="mt-4">
			card sequence   [ 'A',2, 3, 4, 5, 6, 7, 8, 9, 10, 'J','Q', 'K']
			<br>

		Card sequence no  [ 1,2,3,4,5,6,7,8,9,10,11,12,13]

		<br>
		Spades (♠) Cards * 0
Clubs (♣) Cards * 2
Diamonds (♦) Cards * 4
Hearts (♥) Cards * 6
		</div>

	</div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
	

	

var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';


	$(document).ready(function(){

			$("#shuffle_card").click(function(e){
						var output='';

						var total=0;
						var sub_total=0;

					$.ajax({
					  url: "<?php echo base_url().'card';?>",
					  method:"POST",
					  success: function(data){
					  	
					  	var obj=JSON.parse(data);

					  	$.each(obj, function( index, value ) {

					  		var path=base_url+"assets/card/"+value.card_title+".png";

							 

							  	output +='<div class="col col-md-4 mb-3"><div class="card bg-light" style="width: 8em;"><div class="card-body"><div class="header_left"><div><span class="number_title">'+value.card_value+'</span> <span><img class="title_img"  src="'+path+'"></span></div></div><div class="content"><div class="img_box"><img class="content_img" src="'+path+'"></div></div><div class="footer_right"><div><span class="number_title">'+value.card_value+'</span> <span><img class="title_img" src="'+path+'"></span></div></div></div></div></div>';


							  		if(value.card_title==='spade')
							  		{
							  			sub_total=sub_total+(0*value.card_no);
							  			console.log('spade',sub_total);
							  		}
							  		else if(value.card_title==='clubs')
							  		{
							  			sub_total=sub_total+(2*value.card_no);
							  			console.log('clubs',sub_total);
							  		}
							  		else if(value.card_title==='diamond')
							  		{
											sub_total=sub_total+(4*value.card_no);
											console.log('diamond',sub_total);
							  		}
							  		else if(value.card_title==='heart')
							  		{
							  			sub_total=sub_total+(6*value.card_no);
							  			console.log('heart',sub_total);
							  		}

							  		
							});
					  	total=total+sub_total;
					  	$("#show_card").html(output);
					  	$("#total").html(total);


					  },
					  
					});

				


			});

	});

</script>
</body>
</html>
