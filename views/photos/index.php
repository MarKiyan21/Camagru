<body>
<?php include (ROOT.'/views/layouts/header.php');?>

	<div class="collage horizontal col-md-10 col-sm-10 col-xs-10 col-sm-offset-1 col-md-offset-1 col-xs-offset-1">
	  
		<div class="row">
			
			<div class="column">
				<?php $i = 0; while ($i < count($allPhotos)): ?>
					<div class="gallery-item" onclick="showDetails(<?php echo $allPhotos[$i]['image_id']; ?>)">
						<img class="img-responsive" src="<?php echo $allPhotos[$i]['path']; ?>">
						<div class="gallery-item-info">
							<ul>
								<li class="gallery-item-likes"><i class="im im-icon-Heart-2"></i> <?php echo $allPhotos[$i]['likes']; ?></li>
								<li class="gallery-item-comments"><i class="im im-icon-Speach-Bubble"></i> <?php echo $allPhotos[$i]['comments']; ?></li>
							</ul>
						</div>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
			<div class="column">
				<?php $i = 1; while ($i < count($allPhotos)): ?>
					<div class="gallery-item" onclick="showDetails(<?php echo $allPhotos[$i]['image_id']; ?>)">
						<img class="img-responsive" src="<?php echo $allPhotos[$i]['path']; ?>">
						<div class="gallery-item-info">
							<ul>
								<li class="gallery-item-likes"><i class="im im-icon-Heart-2"></i> <?php echo $allPhotos[$i]['likes']; ?></li>
								<li class="gallery-item-comments"><i class="im im-icon-Speach-Bubble"></i> <?php echo $allPhotos[$i]['comments']; ?></li>
							</ul>
						</div>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
			<div class="column">
				<?php $i = 2; while ($i < count($allPhotos)): ?>
					<div class="gallery-item" onclick="showDetails(<?php echo $allPhotos[$i]['image_id']; ?>)">
						<img class="img-responsive" src="<?php echo $allPhotos[$i]['path']; ?>">
						<div class="gallery-item-info">
							<ul>
								<li class="gallery-item-likes"><i class="im im-icon-Heart-2"></i> <?php echo $allPhotos[$i]['likes']; ?></li>
								<li class="gallery-item-comments"><i class="im im-icon-Speach-Bubble"></i> <?php echo $allPhotos[$i]['comments']; ?></li>
							</ul>
						</div>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
			<div class="column">
				<?php $i = 3; while ($i < count($allPhotos)): ?>
					<div class="gallery-item" onclick="showDetails(<?php echo $allPhotos[$i]['image_id']; ?>)">
						<img class="img-responsive" src="<?php echo $allPhotos[$i]['path']; ?>">
						<div class="gallery-item-info">
							<ul>
								<li class="gallery-item-likes"><i class="im im-icon-Heart-2"></i> <?php echo $allPhotos[$i]['likes']; ?></li>
								<li class="gallery-item-comments"><i class="im im-icon-Speach-Bubble"></i> <?php echo $allPhotos[$i]['comments']; ?></li>
							</ul>
						</div>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
			<div class="column">
				<?php $i = 4; while ($i < count($allPhotos)): ?>
					<div class="gallery-item" onclick="showDetails(<?php echo $allPhotos[$i]['image_id']; ?>)">
						<img class="img-responsive" src="<?php echo $allPhotos[$i]['path']; ?>">
						<div class="gallery-item-info">
							<ul>
								<li class="gallery-item-likes"><i class="im im-icon-Heart-2"></i> <?php echo $allPhotos[$i]['likes']; ?></li>
								<li class="gallery-item-comments"><i class="im im-icon-Speach-Bubble"></i> <?php echo $allPhotos[$i]['comments']; ?></li>
							</ul>
						</div>
					</div>
				<?php $i += 5; ?>
				<?php endwhile; ?>
			</div>
			
		</div>
	  
	</div>

<script src="/template/js/photo.js"></script>

<?php include (ROOT.'/views/layouts/footer.php');?>
</html>