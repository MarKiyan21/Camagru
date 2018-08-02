<?php include (ROOT.'/views/layouts/header.php');?>

<input id="user-id" type="hidden" value="<?php echo $user['main']['user_id']; ?>"/>
<input id="user-name" type="hidden" value="<?php echo $user['main']['username']; ?>"/>

<div class="container">

	<div class="profile">

		<div class="avatar profile-image" <?php if($status == 2): ?> onmouseover="hover(this);" onmouseout="unhover(this);" <?php endif; ?>>
			<div>
				<img src="<?php echo $user['main']['user_pic']; ?>">
			</div>
			<?php if($status == 2): ?>
					<div class="do-upload">
						<i class="im im-icon-Download-fromCloud"></i>
					</div>
					
					<input id='fileid' type="file" onchange="previewFile();" accept="image/*">
			<?php endif; ?>

		</div>

		<div class="profile-user-settings">

			<h1 class="profile-user-name"><?php echo $user['main']['username']; ?></h1>

			<?php if($status == 2): ?>
				<div class="profile-edit-btn">Edit Profile</div>
				<div class="profile-settings-btn"><i class="fa fa-cogs"></i></div>
				<div class="profile-camera-btn"><a class="href" href="/user/selfie"><i class="im im-icon-Webcam"></i></a></div>
			<?php endif; ?>

		</div>

		<div class="profile-stats">

			<ul>
				<li><a class="href" href="/photos"><span class="profile-stat-count"><?php echo($user['main']['photo_count']) ?></span> photos</a></li>
				<li><span class="profile-stat-count"><?php echo($user['main']['like_count']) ?></span> likes</li>
				<li><span class="profile-stat-count"><?php echo($user['main']['comment_count']) ?></span> comments</li>
			</ul>

		</div>

	</div>

</div>
<br>

<?php if($status == 2): ?>
	<div class="preview-block" onmouseover="hover3(this);" onmouseout="unhover3(this);">
		<img class="img-responsive" id="preview" src="" alt="Image preview...">
		<span class="cancelUpload" onclick="cancelUpload()"><i class="im im-icon-Close"></i></span>
		<span class="savePhoto" onclick="setAvatar()" data-id=""><i class="im im-icon-Profile"></i></span>
	</div>
<?php endif; ?>

<div class="row">
	
	<div class="collage horizontal col-md-10 col-sm-10 col-xs-10 col-sm-offset-1 col-md-offset-1 col-xs-offset-1">
	  
		<div class="row">
			
			<div class="column">
				<?php $i = 0; while ($i < count($user['photos'])): ?>
					<div class="gallery-item" onclick="showDetails(<?php echo $user['photos'][$i]['image_id']; ?>)">
						<img class="img-responsive" src="<?php echo $user['photos'][$i]['path']; ?>">
						<div class="gallery-item-info">
							<ul>
								<li class="gallery-item-likes"><i class="im im-icon-Heart-2"></i> <?php echo $user['photos'][$i]['likes']; ?></li>
								<li class="gallery-item-comments"><i class="im im-icon-Speach-Bubble"></i> <?php echo $user['photos'][$i]['comments']; ?></li>
							</ul>
						</div>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
			<div class="column">
				<?php $i = 1; while ($i < count($user['photos'])): ?>
					<div class="gallery-item" onclick="showDetails(<?php echo $user['photos'][$i]['image_id']; ?>)">
						<img class="img-responsive" src="<?php echo $user['photos'][$i]['path']; ?>">
						<div class="gallery-item-info">
							<ul>
								<li class="gallery-item-likes"><i class="im im-icon-Heart-2"></i> <?php echo $user['photos'][$i]['likes']; ?></li>
								<li class="gallery-item-comments"><i class="im im-icon-Speach-Bubble"></i> <?php echo $user['photos'][$i]['comments']; ?></li>
							</ul>
						</div>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
			<div class="column">
				<?php $i = 2; while ($i < count($user['photos'])): ?>
					<div class="gallery-item" onclick="showDetails(<?php echo $user['photos'][$i]['image_id']; ?>)">
						<img class="img-responsive" src="<?php echo $user['photos'][$i]['path']; ?>">
						<div class="gallery-item-info">
							<ul>
								<li class="gallery-item-likes"><i class="im im-icon-Heart-2"></i> <?php echo $user['photos'][$i]['likes']; ?></li>
								<li class="gallery-item-comments"><i class="im im-icon-Speach-Bubble"></i> <?php echo $user['photos'][$i]['comments']; ?></li>
							</ul>
						</div>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
			<div class="column">
				<?php $i = 3; while ($i < count($user['photos'])): ?>
					<div class="gallery-item" onclick="showDetails(<?php echo $user['photos'][$i]['image_id']; ?>)">
						<img class="img-responsive" src="<?php echo $user['photos'][$i]['path']; ?>">
						<div class="gallery-item-info">
							<ul>
								<li class="gallery-item-likes"><i class="im im-icon-Heart-2"></i> <?php echo $user['photos'][$i]['likes']; ?></li>
								<li class="gallery-item-comments"><i class="im im-icon-Speach-Bubble"></i> <?php echo $user['photos'][$i]['comments']; ?></li>
							</ul>
						</div>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
			<div class="column">
				<?php $i = 4; while ($i < count($user['photos'])): ?>
					<div class="gallery-item" onclick="showDetails(<?php echo $user['photos'][$i]['image_id']; ?>)">
						<img class="img-responsive" src="<?php echo $user['photos'][$i]['path']; ?>">
						<div class="gallery-item-info">
							<ul>
								<li class="gallery-item-likes"><i class="im im-icon-Heart-2"></i> <?php echo $user['photos'][$i]['likes']; ?></li>
								<li class="gallery-item-comments"><i class="im im-icon-Speach-Bubble"></i> <?php echo $user['photos'][$i]['comments']; ?></li>
							</ul>
						</div>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
		</div>
	  
	</div>
	
</div>

<script src="/template/js/profile.js"></script>

<?php include (ROOT.'/views/layouts/footer.php');?>