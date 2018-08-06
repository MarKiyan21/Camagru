<?php include (ROOT.'/views/layouts/header.php');?>

<input id="user-id" type="hidden" value="<?php echo $photo['current_user']['user_id']; ?>"/>
<input id="user-name" type="hidden" value="<?php echo $photo['current_user']['username']; ?>"/>
<input id="user-pic" type="hidden" value="<?php echo $photo['current_user']['user_pic']; ?>"/>
<input id="photo-id" type="hidden" value="<?php echo $photo['image_id']; ?>"/>
<input id="owner-notif" type="hidden" value="<?php echo $photo['owner']['notification']; ?>"/>
<input id="owner-mail" type="hidden" value="<?php echo $photo['owner']['email']; ?>"/>

<div class="row">
	<div class="pack col-md-5 col-sm-6 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1" onmouseover="hover(this);" onmouseout="unhover(this);">
		<img class="big-image img-responsive" src=" <?php echo $photo['path'] ?> ">
		<span class="heart <?php if ($photo['is_liked'] == 1): ?> heart-liked <?php endif; ?>" onclick="likePhoto(this, <?php echo $photo['image_id']; ?>, <?php echo $photo['current_user']['user_id']; ?>, <?php echo $photo['owner']['notification']; ?>);"><i class="fa fa-heart"></i></span>
	</div>
	
	<div class="col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1">
	
	    <div class="messages">
	
			<?php foreach ($photo['comments'] as $comment): ?>
	
		        <div>
		            <div class="avatar">
		                <a href="/user/info/<?php echo $comment['username']; ?>">
			                <img alt="avatar" src="<?php echo $comment['user_pic']; ?>" />
		                </a>
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