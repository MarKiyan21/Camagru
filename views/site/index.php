<?php include (ROOT.'/views/layouts/header.php');?>

<div class="row">
	<div class="collage col-md-4 col-sm-4 col-xs-4 col-sm-offset-1 col-md-offset-1 col-xs-offset-1">
	  
		<div class="row">
			
			<div class="column">
				<?php $i = 0; while ($i < count($lastPhotos)): ?>
					<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
						<img class="img-responsive" src="<?php echo $lastPhotos[$i]['path']; ?>">
						<span onclick="showDetails(<?php echo $lastPhotos[$i]['image_id'] ?>)"><i class="im im-icon-Information"></i></span>
					</div>
				<?php $i += 3; ?>
				<?php endwhile; ?>
			</div>
			
			<div class="column">
				<?php $i = 1; while ($i < count($lastPhotos)): ?>
					<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
						<img class="img-responsive" src="<?php echo $lastPhotos[$i]['path']; ?>">
						<span onclick="showDetails(<?php echo $lastPhotos[$i]['image_id'] ?>)"><i class="im im-icon-Information"></i></span>
					</div>
				<?php $i += 3; ?>
				<?php endwhile; ?>
			</div>
			
			<div class="column">
				<?php $i = 2; while ($i < count($lastPhotos)): ?>
					<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
						<img class="img-responsive" src="<?php echo $lastPhotos[$i]['path']; ?>">
						<span onclick="showDetails(<?php echo $lastPhotos[$i]['image_id'] ?>)"><i class="im im-icon-Information"></i></span>
					</div>
				<?php $i += 3; ?>
				<?php endwhile; ?>
			</div>
			
		</div>
	  
	</div>
	<div class="information col-md-5 col-sm-5 col-xs-5 col-sm-offset-1 col-md-offset-1 col-xs-offset-1">
		
		<div class="row">
			
			<div class="welcome col-md-12 col-sm-12 col-xs-12">
				<span>WELCOME</span>
			</div>
			
		</div>
		
		<hr>
		
		<div class="row">
			
			<div class="description col-md-12 col-sm-12 col-xs-12">
				<span>Hello, dear <?php if(!empty($_SESSION['user'])):?><a href="/user/info/<?php echo $_SESSION['user']?>"><?php echo $_SESSION['user'];?></a> <?php else: ?>friend<?php endif; ?>! Do you want to do some <a href="/photos/">photos</a>?</span><hr>
				<?php if(!empty($_SESSION['user'])): ?>
					<button class="btn btn-info" onclick="doPhoto()" style="font-size: 20px;">Do Selfie</button>
				<?php else: ?>
					<span>You only need to <a href="/user/register">register</a> or <a href="/user/login">log in</a> to our site, designed by a great coder without a sense of design, but with a sense of humor :))</span>
				<?php endif; ?>
				
			</div>
			
		</div>
		
	</div>
	
</div>

<script src="/template/js/main.js"></script>

<?php include ROOT.'/views/layouts/footer.php';?>