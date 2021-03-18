<!-- Main Content -->
<main class="content">
	<h1 class="title new-item"><b>Login</b></h1>
	<?php if (isset($_SESSION["erro_login"])) { ?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			User or password wrong
		</div>
	<?php } ?>
	<form method="POST" action="../login/check">
		<input type="hidden" name="token" value="<?= $data['token'] ?>" />
		<div class="input-field">
			<label for="login" class="label">Login</label>
			<input type="text" id="login" name="login" class="input-text" required />

		</div>
		<div class="input-field">
			<label for="category-code" class="label">Password</label>
			<input type="password" id="password" name="password" class="input-text" required />

		</div>
		<div class="actions-form">
			<a href="../" class="action back">Back</a>
			<input class="btn-submit btn-action" type="submit" value="Save" />
		</div>
	</form>
</main>
<!-- Main Content -->