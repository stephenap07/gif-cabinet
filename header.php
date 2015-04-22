<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class='navbar-header'>
			<strong>
				<a href='/gif-cabinet'>GC </a>
			</strong>
		</div>
		<ul class='nav navbar-nav navbar-right'>
			<li>
				<?php
					if (!isLoggedIn()) {
						echo "<a href='login.php'>Sign In</a>";
					} else {
						echo "<a href='logout.php'>Logout</a>";
					}
				?>
			</li>
		</ul>
	</div>
</nav>
