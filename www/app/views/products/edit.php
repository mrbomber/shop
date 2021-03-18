<!-- Main Content -->
<main class="content">
	<h1 class="title new-item"><b>Edit Product</b></h1>
	<?php if (isset($_SESSION["erro-danger"])) { ?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			Error in send form
		</div>
	<?php } ?>


	<form method="POST" action="../products/update/<?= $data['product']['id']; ?>" enctype="multipart/form-data">
		<input type="hidden" name="token" value="<?= $data['token'] ?>" />
		<input type="hidden" name="img" value="<?= $data['product']['img'] ?>" />
		<div class="input-field">
			<label for="sku" class="label">Product SKU</label>
			<input type="text" id="sku" name="sku" class="input-text" value="<?= $data['product']['sku']; ?>" />
		</div>
		<div class="input-field">
			<label for="name" class="label">Product Name</label>
			<input type="text" id="name" name="name" class="input-text" required value="<?= $data['product']['name']; ?>" />
		</div>
		<div class="input-field">
			<label for="brand_id" class="label">Brand</label>
			<select  id="brand_id" class="input-select" name="brand_id">
				<?php foreach ($data['brands'] as $key => $value) : ?>
					<option value="<?= $value['id']; ?>" <?php echo ($value['id'] == $data['product']['brand_id']) ? 'selected="selected"' : "" ?>><?= $value['name']; ?></option>					
				<?php endforeach; ?>
			</select>
		</div>
		<div class="input-field">
			<label for="price" class="label">Price</label>
			<input type="money" id="price" name="price" class="input-text dinheiro" value="<?= number_format($data['product']['price'], 2, ",", "."); ?>" />
		</div>
		<div class="input-field">
			<label for="quantity" class="label">Quantity</label>
			<input type="text" id="quantity" name="qty" class="input-text" required value="<?= $data['product']['qty']; ?>" />
		</div>
		<div class="input-field">
			<label for="category" class="label">Categories</label>
			<select multiple id="category" class="input-text" name="categories[]">
				<?php foreach ($data['categories'] as $key => $value) : ?>
					<option value="<?= $value['id']; ?>" <?php echo (isset($data['products_categories']) && in_array($value['id'], $data['products_categories'])) ? 'selected="selected"' : "" ?>><?= $value['name']; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="input-field">
			<label for="description" class="label">Description</label>
			<textarea id="description" name="description" class="input-text"><?= $data['product']['description']; ?></textarea>
		</div>



		<div class="input-field">
			<div class="row">
				<div class="col-md-3">
					<label for="File" class="label">Image File</label>
				</div>
				<div class="col-md-2">
					<div id="image-holder">
						<?php if ($data['product']['img'] != null) { ?>
							<img src="images/product/<?= $data['product']['img']; ?>" layout="responsive" width="80" alt="<?= $data['product']['name']; ?>" />
						<?php } else { ?>
							<img src="images/no_image.jpg" layout="responsive" width="80" alt="<?= $data['product']['name']; ?>" />
						<?php } ?>
					</div>
				</div>
				<div class="col-md-7">
					<input id="file" class="file pt-2" name="file" type="file" multiple data-min-file-count="0" accept="image/*">
				</div>
			</div>
		</div>

		<div class="actions-form">
			<a href="../products" class="action back">Back</a>
			<input class="btn-submit btn-action" type="submit" value="Save Product" />
		</div>

	</form>
</main>
<!-- Main Content -->