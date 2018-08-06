<?php include (ROOT.'/views/layouts/header.php');?>

<input id="user-id" type="hidden" value="<?php echo $user['main']['user_id']; ?>"/>
<input id="user-name" type="hidden" value="<?php echo $user['main']['username']; ?>"/>
<input id="user-email" type="hidden" value="<?php echo $user['main']['email']; ?>"/>

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
				<div class="profile-camera-btn">
					<label class="camera-button">
						<a class="href" href="/user/selfie"><i class="im im-icon-Webcam"></i></a>
					</label>
				</div>
				
				<div class="profile-settings-btn">
					<input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" />
					<label class="menu-open-button" for="menu-open">
						<i class="fa fa-cogs"></i>
					</label>
					
					<a href="#popup1" class="menu-item blue href" title="Change login"><i class="im im-icon-Male-2"></i></a>
					<a href="#popup2" class="menu-item green href" title="Change email"><i class="im im-icon-Mail-withAtSign"></i></a>
					<a id="ch-notifications" class="menu-item red href" title="Email notifications">
						<?php if ($user['main']['notification'] == 1): ?>
							<i class="fa fa-bell-slash"></i>
						<?php else: ?>
							<i class="fa fa-bell"></i>
						<?php endif; ?>
					</a>
					<a href="#popup3" class="menu-item orange href" title="Change password"><i class="im im-icon-Lock-2"></i></a>
				</div>
				
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

<div id="popup1" class="overlay">
	<div class="popup col-md-6 col-sm-6 col-xs-6 col-sm-offset-3 col-md-offset-3 col-xs-offset-3">
		<div class="modal-body">
			<a class="close" href="#">&times;</a>
			<h4 class="modal-title">Change login</h4>
		</div>
		
		<div class="modal-footer">
			<form id="change-login">
				<div class="form-group col-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3" onclick="delClass(this.parentNode);">
					<input id="new-login" class="form-control" type="text" name="newlogin" placeholder="<?php echo $user['main']['username']; ?>" required>
					<span id="helpBlock1" style="display: none; color: red;" class="help-block pull-left">Some text...</span>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="popup2" class="overlay">
	<div class="popup col-md-6 col-sm-6 col-xs-6 col-sm-offset-3 col-md-offset-3 col-xs-offset-3">
		<div class="modal-body">
			<a class="close" href="#">&times;</a>
			<h4 class="modal-title">Change email</h4>
		</div>
		
		<div class="modal-footer">
			<form id="change-email">
				<div class="form-group col-md-6 col-sm-8 col-xs-12 col-md-offset-3 col-sm-offset-2" onclick="delClass(this.parentNode);">
					<input id="new-email" class="form-control" type="text" name="newemail" placeholder="<?php echo $user['main']['email']; ?>" required>
					<span id="helpBlock2" style="display: none; color: red;" class="help-block pull-left">Some text...</span>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="popup3" class="overlay">
	<div class="popup col-md-6 col-sm-6 col-xs-6 col-sm-offset-3 col-md-offset-3 col-xs-offset-3">
		<div class="modal-body">
			<a class="close" href="#">&times;</a>
			<h4 class="modal-title">Change password</h4>
		</div>
		
		<div class="modal-footer">
			<form id="change-password">
				<div class="form-group col-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3" onclick="delClass(this.parentNode);">
					<input id="old-pass" class="form-control" type="password" name="oldpassword" placeholder="Old password" required>
				</div>
				<div class="form-group col-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3" onclick="delClass(this.parentNode);">
					<input id="new-pass" class="form-control" type="password" name="newpassword" placeholder="New password" required>
				</div>
				<div class="form-group col-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3" onclick="delClass(this.parentNode);">
					<input id="conf-pass" class="form-control" type="password" name="confpassword" placeholder="Confirm password" required>
					<span id="helpBlock3" style="display: none; color: red;" class="help-block pull-left">Some text...</span>
				</div>
			</form>
		</div>
	</div>
</div>

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