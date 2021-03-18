<!-- Main Content -->
<main class="content">
	<h1 class="title new-item"><b>New Category</b></h1>
	<?php if (isset($_SESSION["erro-danger"])) { ?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			Error in send form
		</div>
	<?php } ?>
	<form method="POST" action="../categories/store">
		<input type="hidden" name="token" value="<?= $data['token'] ?>" />
		<div class="input-field">
			<label for="category-name" class="label">Category Name</label>
			<input type="text" id="category-name" name="name" class="input-text" required />

		</div>
		<div class="input-field">
			<label for="category-code" class="label">Category Code</label>
			<input type="text" id="category-code" name="code" class="input-text" required />

		</div>
		<div class="actions-form">
			<a href="../categories" class="action back">Back</a>
			<input class="btn-submit btn-action" type="submit" value="Save" />
		</div>
	</form>
</main>
<!-- Main Content -->