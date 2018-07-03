<?php
// $_SESSION['user'] = 'marik';
?>

<?php include (ROOT.'/views/layouts/header.php');?>
<body>
<div class="wrapper">
	<div class="container">
		<h1>Welcome</h1>
		<form class="form">
			<input type="text" placeholder="Username">
			<input type="password" placeholder="Password">
			<button type="submit" id="login-button">Login</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
</body>
<?php include ROOT.'/views/layouts/footer.php';?>

<script>
	
	function fadeOut( elem, ms )
	{
	  if( ! elem )
	    return;
	
	  if( ms )
	  {
	    var opacity = 1;
	    var timer = setInterval( function() {
	      opacity -= 50 / ms;
	      if( opacity <= 0 )
	      {
	        clearInterval(timer);
	        opacity = 0;
	        elem.style.display = "none";
	        elem.style.visibility = "hidden";
	      }
	      elem.style.opacity = opacity;
	      elem.style.filter = "alpha(opacity=" + opacity * 100 + ")";
	    }, 50 );
	  }
	  else
	  {
	    elem.style.opacity = 0;
	    elem.style.filter = "alpha(opacity=0)";
	    elem.style.display = "none";
	    elem.style.visibility = "hidden";
	  }
	}
	
	var element = document.getElementById('login-button');
	
	element.addEventListener("click", function(e) {
    	e.preventDefault();
    	var form = document.getElementsByClassName('form')[0];
		fadeOut(form, 500);
// 		var wrapper = document.getElementsByClassName('wrapper')[0];
// 		wrapper.className = 'form-success';
	}, false);

</script>