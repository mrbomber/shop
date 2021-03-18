<!-- Main Content -->
<main class="content">
	<h1 class="title new-item"><b>New User</b></h1>
	<?php if (isset($_SESSION["erro-danger"])) { ?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			Error in send form
		</div>
	<?php } ?>
	<form method="POST" action="../users/store">
		<input type="hidden" name="token" value="<?= $data['token'] ?>" />
		<div class="input-field">
			<label for="login" class="label">Login</label>
			<input type="text" id="login" name="login" class="input-text" required />

		</div>
		<div class="input-field">
			<label for="password" class="label">Password</label>
			<input type="password" id="password" name="password" class="input-text" required />

		</div>
		<div class="actions-form">
			<a href="../users" class="action back">Back</a>
			<input class="btn-submit btn-action" type="submit" value="Save" />
		</div>
	</form>
</main>
<!-- Main Content -->