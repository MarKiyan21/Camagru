<?php include (ROOT.'/views/layouts/header.php');?>

<div class="area">

	<div class="photo-area col-md-6 col-sm-6 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
		<div class="buffer">
			<video id="video" width="100%" height="100%"></video>
			<a href="#" id="capture" class="buff-capture-button href">CheckIn</a>
			<canvas id="canvas" width="100%" height="100%"></canvas>
		</div>
	</div>
	
	<div class="stickers-area col-md-4 col-sm-4 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1">
		
	</div>
	
</div>

<script src="/template/js/selfie.js"></script>

<?php include (ROOT.'/views/layouts/footer.php');?>