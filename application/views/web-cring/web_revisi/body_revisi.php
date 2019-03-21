<style>
	.border-default{
		border-bottom-width: 1px;
		border-bottom-style: solid;
	}

	.border-color{
		border-bottom-color:gray;
	}
</style>

<div class="row" style="margin-right:20%; margin-left:20%; margin-top:2%; ">
	
	<!-- Category -->
	<div class="col-md-3" style="display:block; border:2px solid black; padding-left:0px; padding-right:0px;">

		<div style="font-size: 15px; color:#FCFCFC; text-align:center; background-color:#2d1e5f; padding:10px; height:7vh;">CATEGORIES</div>
		
		<?php foreach($records as $index => $record):?>
			<div class="row border-default border-color" 
				style="
				height: 10vh;
				margin:auto;
				">
				<div class="col-md-3">
					(Icon)
				</div>
				<div class="col-md-9" style="color:#424143;">
					<?php echo $record->kategori_name ?>
				</div>	
			</div>
		
		<?php endforeach; ?>
	
	</div>

	<!-- Slider -->
	<div class="col-md-5" style="height:100%; max-height: 100%; background-color:blue; margin-left:10px;">

		b
	</div>

	<!-- 
	-->
	<div class="col-md-3">
		c
	</div>
</div>
