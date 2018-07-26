<?php include (ROOT.'/views/layouts/header.php');?>

<div class="container">

	<div class="profile">

		<div class="avatar profile-image" onmouseover="hover3(this);" onmouseout="unhover3(this);">

			<img src="<?php echo $user['main']['user_pic']; ?>">
			<span class="do-photo" onclick="doPhoto()"><i class="im im-icon-Camera"></i></span>
			<span class="do-upload"><i class="im im-icon-Upload-toCloud"></i></span>

		</div>

		<div class="profile-user-settings">

			<h1 class="profile-user-name"><?php echo $user['main']['username']; ?></h1>

			<div class="profile-edit-btn">Edit Profile</div>
			
			<div class="profile-settings-btn"><i class="im im-icon-File-Settings"></i></div>

		</div>

		<div class="profile-stats">

			<ul>
				<li><span class="profile-stat-count"><?php echo($user['main']['photo_count']) ?></span> photos</li>
				<li><span class="profile-stat-count"><?php echo($user['main']['like_count']) ?></span> likes</li>
				<li><span class="profile-stat-count"><?php echo($user['main']['comment_count']) ?></span> comments</li>
			</ul>

		</div>

	</div>

</div>
<br>
<div class="row">
	
	<div class="collage horizontal col-md-10 col-sm-10 col-xs-10 col-sm-offset-1 col-md-offset-1 col-xs-offset-1">
	  
		<div class="row">
			
			<div class="column">
				<?php $i = 0; while ($i < count($user['photos'])): ?>
					<div class="gallery-item">
						<img class="img-responsive" src="<?php echo $user['photos'][$i]['path']; ?>">
						<div class="gallery-item-info">
							<ul>
								<li class="gallery-item-likes"><i class="im im-icon-Heart-2"></i> 56</li>
								<li class="gallery-item-comments"><i class="im im-icon-Speach-Bubble"></i> 2</li>
							</ul>
						</div>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
			<div class="column">
				<?php $i = 1; while ($i < count($user['photos'])): ?>
					<div class="gallery-item">
						<img class="img-responsive" src="<?php echo $user['photos'][$i]['path']; ?>">
						<div class="gallery-item-info">
							<ul>
								<li class="gallery-item-likes"><i class="im im-icon-Heart-2"></i> 56</li>
								<li class="gallery-item-comments"><i class="im im-icon-Speach-Bubble"></i> 2</li>
							</ul>
						</div>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
			<div class="column">
				<?php $i = 2; while ($i < count($user['photos'])): ?>
					<div class="gallery-item">
						<img class="img-responsive" src="<?php echo $user['photos'][$i]['path']; ?>">
						<div class="gallery-item-info">
							<ul>
								<li class="gallery-item-likes"><i class="im im-icon-Heart-2"></i> 56</li>
								<li class="gallery-item-comments"><i class="im im-icon-Speach-Bubble"></i> 2</li>
							</ul>
						</div>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
			<div class="column">
				<?php $i = 3; while ($i < count($user['photos'])): ?>
					<div class="gallery-item">
						<img class="img-responsive" src="<?php echo $user['photos'][$i]['path']; ?>">
						<div class="gallery-item-info">
							<ul>
								<li class="gallery-item-likes"><i class="im im-icon-Heart-2"></i> 56</li>
								<li class="gallery-item-comments"><i class="im im-icon-Speach-Bubble"></i> 2</li>
							</ul>
						</div>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
			<div class="column">
				<?php $i = 4; while ($i < count($user['photos'])): ?>
					<div class="gallery-item">
						<img class="img-responsive" src="<?php echo $user['photos'][$i]['path']; ?>">
						<div class="gallery-item-info">
							<ul>
								<li class="gallery-item-likes"><i class="im im-icon-Heart-2"></i> 56</li>
								<li class="gallery-item-comments"><i class="im im-icon-Speach-Bubble"></i> 2</li>
							</ul>
						</div>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
		</div>
	  
	</div>
	
</div>

<script src="/template/js/info.js"></script>

<?php include (ROOT.'/views/layouts/footer.php');?>