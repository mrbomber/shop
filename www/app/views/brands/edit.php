<!-- Main Content -->
<main class="content">
	<h1 class="title new-item"><b>Edit Brand</b></h1>
	<?php if (isset($_SESSION["erro-danger"])) { ?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			Error in send form
		</div>
	<?php } ?>


	<form method="POST" action="../brands/update/<?= $data['brand']['id']; ?>">
		<input type="hidden" name="token" value="<?= $data['token'] ?>" />

		<div class="input-field">
			<label for="name" class="label">Brand Name</label>
			<input type="text" id="name" name="name" class="input-text" required value="<?= $data['brand']['name']; ?>" />
		</div>

		

		<div class="actions-form">
			<a href="../brands" class="action back">Back</a>
			<input class="btn-submit btn-action" type="submit" value="Save Product" />
		</div>

	</form>
</main>
<!-- Main Content -->