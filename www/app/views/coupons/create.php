<!-- Main Content -->
<main class="content">
	<h1 class="title new-item"><b>New Coupon</b></h1>
	<?php if (isset($_SESSION["erro-danger"])) { ?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			Error in send form
		</div>
	<?php } ?>
	<form method="POST" action="../coupons/store" enctype="multipart/form-data">
		<input type="hidden" name="token" value="<?= $data['token'] ?>" />		
		<div class="input-field">
			<label for="name" class="label">Coupon Name</label>
			<input type="text" id="name" name="name" class="input-text" required />
		</div>
		<div class="input-field">
			<label for="coupon_type" class="label">Type</label>
			<select  id="coupon_type" class="input-select" name="coupon_type">
				<?php foreach ($data['coupons_types'] as $key => $value) : ?>
					<option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="input-field">
			<label for="value" class="label">Value</label>
			<input type="money" id="value" name="value" class="input-text dinheiro" />
		</div>	
		<div class="input-field">
			<label for="category" class="label">Categories</label>
			<select multiple id="category" class="input-text" name="categories[]">
				<?php foreach ($data['categories'] as $key => $value) : ?>
					<option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="input-field">
			<label for="brand" class="label">Brands</label>
			<select multiple id="brand" class="input-text" name="brands[]">
				<?php foreach ($data['brands'] as $key => $value) : ?>
					<option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="actions-form">
			<a href="../coupons" class="action back">Back</a>
			<input class="btn-submit btn-action" type="submit" value="Save Coupon" />
		</div>

	</form>
</main>
<!-- Main Content -->