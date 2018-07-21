<?php include (ROOT.'/views/layouts/header.php');?>

<div class="row">
	<div class="collage col-md-4 col-sm-4 col-xs-4 col-sm-offset-1 col-md-offset-1 col-xs-offset-1">
	  
		<div class="row">
			
			<div class="column">
				<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
					<img class="img-responsive" src="/template/img/1.jpeg">
					<span><i class="im im-icon-Information"></i></span>
				</div>
				<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
					<img class="img-responsive" src="/template/img/2.jpg">
					<span><i class="im im-icon-Information"></i></span>
				</div>
				<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
					<img class="img-responsive" src="/template/img/3.jpeg">
					<span><i class="im im-icon-Information"></i></span>
				</div>
				<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
					<img class="img-responsive" src="/template/img/4.jpg">
					<span><i class="im im-icon-Information"></i></span>
				</div>
				<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
					<img class="img-responsive" src="/template/img/5.jpeg">
					<span><i class="im im-icon-Information"></i></span>
				</div>
			</div>
			
			<div class="column">
				<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
					<img class="img-responsive" src="/template/img/6.jpg">
					<span><i class="im im-icon-Information"></i></span>
				</div>
				<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
					<img class="img-responsive" src="/template/img/7.jpg">
					<span><i class="im im-icon-Information"></i></span>
				</div>
				<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
					<img class="img-responsive" src="/template/img/8.jpeg">
					<span><i class="im im-icon-Information"></i></span>
				</div>
				<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
					<img class="img-responsive" src="/template/img/9.jpeg">
					<span><i class="im im-icon-Information"></i></span>
				</div>
				<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
					<img class="img-responsive" src="/template/img/10.jpg">
					<span><i class="im im-icon-Information"></i></span>
				</div>
			</div>
			
			<div class="column">
				<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
					<img class="img-responsive" src="/template/img/11.jpeg">
					<span><i class="im im-icon-Information"></i></span>
				</div>
				<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
					<img class="img-responsive" src="/template/img/12.jpg">
					<span><i class="im im-icon-Information"></i></span>
				</div>
				<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
					<img class="img-responsive" src="/template/img/13.jpg">
					<span><i class="im im-icon-Information"></i></span>
				</div>
				<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
					<img class="img-responsive" src="/template/img/14.jpg">
					<span><i class="im im-icon-Information"></i></span>
				</div>
				<div class="pack" onmouseover="hover(this);" onmouseout="unhover(this);">
					<img class="img-responsive" src="/template/img/15.jpg">
					<span><i class="im im-icon-Information"></i></span>
				</div>
			</div>
			
		</div>
	  
	</div>
	<div class="information col-md-5 col-sm-5 col-xs-5 col-sm-offset-1 col-md-offset-1 col-xs-offset-1">
		
		<div class="row">
			
			<div class="welcome col-md-12 col-sm-12 col-xs-12">
				<span>WELCOME</span>
			</div>
			
		</div>
		
		<br>
		
		<div class="row">
			
			<div class="description col-md-12 col-sm-12 col-xs-12">
				<span>Hello, dear <?php if(!empty($_SESSION['user'])):?><a href="/user/info/<?php echo $_SESSION['user']?>"><?php echo $_SESSION['user'];?></a> <?php else: ?>friend<?php endif; ?>! Do you want to do some <a href="/photos/">photos</a>?</span><br><br>
				<?php if(!empty($_SESSION['user'])): ?>
					<button class="btn btn-info" style="font-size: 20px;">Do Selfie</button>
				<?php else: ?>
					<span>You only need to <a href="/user/register">register</a> or <a href="/user/login">log in</a> to our site, designed by a great coder without a sense of design, but with a sense of humor</span>
				<?php endif; ?>
				
			</div>
			
		</div>
		
	</div>
	
</div>

<script src="/template/js/main.js"></script>

<?php include ROOT.'/views/layouts/footer.php';?>