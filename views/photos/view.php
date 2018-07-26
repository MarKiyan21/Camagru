<?php include (ROOT.'/views/layouts/header.php');?>

<div class="row">
	<div class="pack col-md-5 col-sm-6 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1" onmouseover="hover(this);" onmouseout="unhover(this);">
		<img class="big-image img-responsive" src=" <?php echo $photo['path'] ?> ">
		<span class="heart" onclick="likePhoto(this, <?php echo $photo['image_id'] ?>);"><i class="im im-icon-Heart-2"></i></span>
	</div>
	
	<div class="col-md-5 col-sm-5 col-xs-10 col-md-offset-0 col-sm-offset-0 col-xs-offset-1">
	
	    <div class="messages">
	
	        <div>
	            <div class="avatar">
	                <img alt="avatar" src="/template/img/avatars/nopic.png" />
	            </div>
	            <div class="msg">
	                <div class="tri"></div>
	                <div class="msg_inner">Hi sweetie</div>
	            </div>
	        </div>
	
	        <div>
	            <div class="avatar">
	                <img alt="avatar" src="/template/img/avatars/nopic.png" />
	            </div>
	            <div class="msg">
	                <div class="tri"></div>
	                <div class="msg_inner">Hello sweetheart. I'm coming home sooner today.</div>
	            </div>
	        </div>
	
	        <div>
	            <div class="avatar">
	                <img alt="avatar" src="/template/img/avatars/nopic.png" />
	            </div>
	            <div class="msg">
	                <div class="tri"></div>
	                <div class="msg_inner">Yaaaay! Bring me some chocolate!</div>
	            </div>
	        </div>
	
	        <div>
	            <div class="avatar">
	                <img alt="avatar" src="/template/img/avatars/nopic.png" />
	            </div>
	            <div class="msg">
	                <div class="tri"></div>
	                <div class="msg_inner">Sure.</div>
	            </div>
	        </div>
	
	        <div>
	            <div class="avatar">
	                <img alt="avatar" src="/template/img/avatars/nopic.png" />
	            </div>
	            <div class="msg">
	                <div class="tri"></div>
	                <div class="msg_inner">Ok. Bye!</div>
	            </div>
	        </div>
	        
	        <div class="input">
		        <textarea class="form-control" rows="2" placeholder="Say something..."></textarea>
	    	</div>
	
	    </div>
	    	
	</div>
</div>

<script src="/template/js/photo.js"></script>

<?php include (ROOT.'/views/layouts/footer.php');?>