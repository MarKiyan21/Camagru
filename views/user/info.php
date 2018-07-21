<?php include (ROOT.'/views/layouts/header.php');?>

<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-6">
	  
		<div class="col-md-4 col-sm-4 col-xs-4 col-sm-offset-2 col-md-offset-2 col-xs-offset-2">
			<div class="avatar" onmouseover="hover(this);" onmouseout="unhover(this);">
				<img class="img-responsive" src="<?php echo $user['main']['user_pic']; ?>">
				<span><i class="im im-icon-Upload-toCloud"></i></span>
			</div>
		</div>
		
		<div class="info col-md-4 col-sm-4 col-xs-4">
			
			<div class="col-md-12 col-sm-12 col-xs-12">
				<span>Marian Kyianytsia</span>
			</div>
			
			<div class="col-md-12 col-sm-12 col-xs-12">
				<span>mkyianyt</span>
			</div>
			
			<div class="col-md-12 col-sm-12 col-xs-12">
				<span><i class="sl sl-icon-settings"></i></span>
			</div>
			
		</div>
	  
	</div>
	<div class="additional col-md-4 col-sm-4 col-xs-3">
		
		<div class="col-md-12 col-sm-12 col-xs-12">
			<span><?php echo($user['main']['photo_count']) ?> photos</span>
		</div>
		
		<div class="col-md-12 col-sm-12 col-xs-12">
			<span><?php echo($user['main']['like_count']) ?> likes</span>
		</div>
		
		<div class="col-md-12 col-sm-12 col-xs-12">
			<span><?php echo($user['main']['comment_count']) ?> comments</span>
		</div>
		
	</div>
	<div class="col-md-2 col-sm-2 col-xs-2">
		
		<div class="col-md-12 col-sm-12 col-xs-12">
			<button class="btn btn-info"><i class="im im-icon-Camera"></i></button>
		</div>
		
	</div>
</div>
<br>
<div class="row">
	
	<div class="collage horizontal col-md-10 col-sm-10 col-xs-10 col-sm-offset-1 col-md-offset-1 col-xs-offset-1">
	  
		<div class="row">
			
			<div class="column">
				<?php $i = 0; while ($i < count($user['photos'])): ?>
					<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
						<img class="img-responsive" src="<?php echo $user['photos'][$i]['path']; ?>">
						<span onclick="showDetails(<?php echo $user['photos'][$i]['image_id'] ?>)"><i class="im im-icon-Information"></i></span>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
			<div class="column">
				<?php $i = 1; while ($i < count($user['photos'])): ?>
					<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
						<img class="img-responsive" src="<?php echo $user['photos'][$i]['path']; ?>">
						<span onclick="showDetails(<?php echo $user['photos'][$i]['image_id'] ?>)"><i class="im im-icon-Information"></i></span>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
			<div class="column">
				<?php $i = 2; while ($i < count($user['photos'])): ?>
					<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
						<img class="img-responsive" src="<?php echo $user['photos'][$i]['path']; ?>">
						<span onclick="showDetails(<?php echo $user['photos'][$i]['image_id'] ?>)"><i class="im im-icon-Information"></i></span>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
			<div class="column">
				<?php $i = 3; while ($i < count($user['photos'])): ?>
					<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
						<img class="img-responsive" src="<?php echo $user['photos'][$i]['path']; ?>">
						<span onclick="showDetails(<?php echo $user['photos'][$i]['image_id'] ?>)"><i class="im im-icon-Information"></i></span>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
			<div class="column">
				<?php $i = 4; while ($i < count($user['photos'])): ?>
					<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
						<img class="img-responsive" src="<?php echo $user['photos'][$i]['path']; ?>">
						<span onclick="showDetails(<?php echo $user['photos'][$i]['image_id'] ?>)"><i class="im im-icon-Information"></i></span>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
		</div>
	  
	</div>
	
</div>

<script src="/template/js/main.js"></script>

<?php include (ROOT.'/views/layouts/footer.php');?>