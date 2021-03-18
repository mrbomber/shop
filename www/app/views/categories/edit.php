<!-- Main Content -->
<main class="content">
	<h1 class="title new-item">Edit Category</h1>
	<?php if (isset($_SESSION["erro-danger"])) { ?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			Error in send form
		</div>
	<?php } ?>


	<form method="POST" action="../categories/update/<?= $data['category']['id']; ?>">
		<input type="hidden" name="token" value="<?= $data['token'] ?>" />

		<div class="input-field">
			<label for="name" class="label">Category Name</label>
			<input type="text" id="name" name="name" class="input-text" required value="<?= $data['category']['name']; ?>" />
		</div>

		<div class="input-field">
			<label for="code" class="label">Category Code</label>
			<input type="text" id="code" name="code" class="input-text" required value="<?= $data['category']['code']; ?>" />
		</div>

		<div class="actions-form">
			<a href="../products" class="action back">Back</a>
			<input class="btn-submit btn-action" type="submit" value="Save Product" />
		</div>

	</form>
</main>
<!-- Main Content -->