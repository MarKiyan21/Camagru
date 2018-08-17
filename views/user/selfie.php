<?php include (ROOT.'/views/layouts/header.php');?>

<div class="area">

	<div class="photo-area col-md-5 col-sm-5 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
		<div class="buffer">
			<video id="video" width="640" height="480"></video>
			<div id="sticker-buff">
				<canvas id="sticker" data-flag="0" width="50" height="50"></canvas>
			</div>
			<canvas id="canvas" data-id="0" width="640" height="480"></canvas>
			<div class="button-area">
				<button id="capture" class="btn btn-info buff-capture-button" disabled>Take photo</button>
				<button id="set-as-avatar" class="btn btn-success" onclick="gluedPhoto()">Set as avatar</button>
				<button id="save-photo" class="btn btn-success" onclick="gluedPhoto(false)">Save</button>
			</div>
		</div>
	</div>
	
	<div class="stickers-area col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-1 col-xs-offset-1">
		<div class="row">
			
			<div class="column">
					<div>
						<img data-id="1" class="img-responsive" onclick="imposePhoto(this)" src="/assets/stickers/1.png">
					</div>
					<div>
						<img data-id="4" class="img-responsive" onclick="imposePhoto(this)" src="/assets/stickers/4.png">
					</div>
					<div>
						<img data-id="7" class="img-responsive" onclick="imposePhoto(this)" src="/assets/stickers/7.png">
					</div>
			</div>
			
			<div class="column">
					<div>
						<img data-id="2" class="img-responsive" onclick="imposePhoto(this)" src="/assets/stickers/2.png">
					</div>
					<div>
						<img data-id="5" class="img-responsive" onclick="imposePhoto(this)" src="/assets/stickers/5.png">
					</div>
					<div>
						<img data-id="8" class="img-responsive" onclick="imposePhoto(this)" src="/assets/stickers/8.png">
					</div>
			</div>
			
			<div class="column">
					<div>
						<img data-id="3" class="img-responsive" onclick="imposePhoto(this)" src="/assets/stickers/3.png">
					</div>
					<div>
						<img data-id="6" class="img-responsive" onclick="imposePhoto(this)" src="/assets/stickers/6.png">
					</div>
					<div>
						<img data-id="9" class="img-responsive" onclick="imposePhoto(this)" src="/assets/stickers/9.png">
					</div>
			</div>
			
		</div>
	</div>
	
</div>

<script src="/template/js/selfie.js"></script>

<?php include (ROOT.'/views/layouts/footer.php');?>