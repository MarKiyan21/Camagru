<?php include (ROOT.'/views/layouts/header.php');?>

<input id="user-id" type="hidden" value="<?php echo $photo['current_user']['user_id']; ?>"/>
<input id="user-pic" type="hidden" value="<?php echo $photo['current_user']['user_pic']; ?>"/>
<input id="photo-id" type="hidden" value="<?php echo $photo['image_id']; ?>"/>

<div class="row">
	<div class="pack col-md-5 col-sm-6 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1" onmouseover="hover(this);" onmouseout="unhover(this);">
		<img class="big-image img-responsive" src=" <?php echo $photo['path'] ?> ">
		<span class="heart <?php if ($photo['is_liked'] == 1): ?> heart-liked <?php endif; ?>" onclick="likePhoto(this, <?php echo $photo['image_id'] ?>, <?php echo $photo['current_user']['user_id']; ?>);"><i class="im im-icon-Heart-2"></i></span>
	</div>
	
	<div class="test col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1">
	
	    <div class="messages">
	
			<?php foreach ($photo['comments'] as $comment): ?>
	
		        <div>
		            <div class="avatar">
		                <img alt="avatar" src="<?php echo $comment['user_pic']; ?>" />
		            </div>
		            <div class="msg">
		                <div class="tri"></div>
		                <div class="msg_inner"><?php echo $comment['text']; ?></div>
		            </div>
		        </div>
		        
		        <?php endforeach; ?>
	
	    </div>
	    
	    <div class="input">
	        <textarea id="comment-input" class="form-control" rows="2" placeholder="Say something..."></textarea>
    	</div>
	    	
	</div>
</div>

<script src="/template/js/photo.js"></script>

<?php include (ROOT.'/views/layouts/footer.php');?>