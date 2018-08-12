<?php include (ROOT.'/views/layouts/header.php');?>

<div class="area">

	<div class="photo-area col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
		<div class="buffer">
			<video id="video" width="640" height="480"></video>
			<canvas id="canvas" width="640" height="480"></canvas>
			<div class="button-area">
				<button id="capture" class="btn btn-info buff-capture-button">Take photo</button>
				<button id="set-as-avatar" class="btn btn-success">Set as avatar</button>
				<button id="save-photo" class="btn btn-success">Save</button>
			</div>
		</div>
	</div>
	
	<div class="stickers-area col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-1 col-xs-offset-1">
		<div class="row">
			
			<div class="column">
					<div>
						<img class="img-responsive" src="/assets/stickers/1.svg">
					</div>
					<div>
						<img class="img-responsive" src="/assets/stickers/4.svg">
					</div>
					<div>
						<img class="img-responsive" src="/assets/stickers/7.svg">
					</div>
			</div>
			
			<div class="column">
					<div>
						<img class="img-responsive" src="/assets/stickers/2.png">
					</div>
					<div>
						<img class="img-responsive" src="/assets/stickers/5.svg">
					</div>
					<div>
						<img class="img-responsive" src="/assets/stickers/8.svg">
					</div>
			</div>
			
			<div class="column">
					<div>
						<img class="img-responsive" src="/assets/stickers/3.svg">
					</div>
					<div>
						<img class="img-responsive" src="/assets/stickers/6.svg">
					</div>
					<div>
						<img class="img-responsive" src="/assets/stickers/9.svg">
					</div>
			</div>
			
		</div>
	</div>
	
</div>

<script src="/template/js/selfie.js"></script>

<?php include (ROOT.'/views/layouts/footer.php');?>