<div class="header">
	<nav>
		<div class="title"><p>Camagru</p></div>
		<div class="pull-right">
			<?php if(empty($_SESSION['user'])): ?>
				<a href="user/login">Sigh in</a>
				<a href="user/register">Sign up</a>
			<?php else: ?>
					<a href="user/info/mkyianyt">mkyianyt</a>
					<a href="user/logout">Logout</a>
			<?php endif; ?>
		</div>
		
	</nav>
</div>