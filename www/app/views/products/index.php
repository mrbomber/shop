<!-- Main Content -->
<main class="content">
    <div class="header-list-page">
        <h1 class="title">Products</h1>
        <a href="../products/create" class="btn-action">Add new Product</a>
    </div>
    <?php if (isset($_SESSION["success"])) { ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            Row updated!
        </div>
    <?php } ?>
    <table class="data-grid">
        <tr class="data-row">
            <th class="data-grid-th">
                <span class="data-grid-cell-content">Image</span>
            </th>
            <th class="data-grid-th">
                <span class="data-grid-cell-content">Name</span>
            </th>
            <th class="data-grid-th">
                <span class="data-grid-cell-content">SKU</span>
            </th>
            <th class="data-grid-th">
                <span class="data-grid-cell-content">Price</span>
            </th>
            <th class="data-grid-th">
                <span class="data-grid-cell-content">Quantity</span>
            </th>
            <th class="data-grid-th">
                <span class="data-grid-cell-content">Categories</span>
            </th>

            <th class="data-grid-th">
                <span class="data-grid-cell-content">Marca</span>
            </th>

            <th class="data-grid-th">
                <span class="data-grid-cell-content">Actions</span>
            </th>
        </tr>
        <?php foreach ($data['products'] as $key => $value) : ?>
            <tr class="data-row">
                <td class="data-grid-td">
                    <span class="data-grid-cell-content">

                        <?php if ($value['img'] != null) { ?>
                            <img src="images/product/<?= $value['img']; ?>" layout="responsive" width="80" alt="<?= $value['name']; ?>" />
                        <?php } else { ?>
                            <img src="images/no_image.jpg" layout="responsive" width="80" alt="<?= $value['name']; ?>" />
                        <?php } ?>

                    </span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content"><?= $value['product_name']; ?></span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content"><?= $value['sku']; ?></span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content">R$ <?= number_format($value['price'], 2, ",", "."); ?></span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content"><?= $value['qty']; ?></span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content"><?= $value['categories']; ?></span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content"><?= $value['brand']; ?></span>
                </td>

                <td class="data-grid-td">
                    <div class="actions">
                        <div class="action edit">
                            <a href="../products/edit/<?= $value['id']; ?>"><span>Edit</span></a>
                        </div>
                        <div class=" action delete">
                            <a class="deletar" href="../products/destroy/<?= $value['id']; ?>"><span>Delete</span></a>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</main>
<!-- Main Content -->