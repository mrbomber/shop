<!-- Main Content -->
<main class="content">
    <div class="header-list-page">
        <h1 class="title"><b>Brands</b></h1>
        <a href="../brands/create" class="btn-action">Add new Brand</a>
    </div>
    <?php if (isset($_SESSION["success"])) { ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            Row updated!
        </div>
    <?php } ?>
    <table class="data-grid">
        <tr class="data-row">
            <th class="data-grid-th">
                <span class="data-grid-cell-content">Name</span>
            </th>
           
            <th class="data-grid-th">
                <span class="data-grid-cell-content">Actions</span>
            </th>
        </tr>
        <?php foreach ($data['brands'] as $key => $value) : ?>
            <tr class="data-row">
                <td class="data-grid-td">
                    <span class="data-grid-cell-content"><?= $value['name']; ?></span>
                </td>

                <td class="data-grid-td">
                    <div class="actions">
                        <div class="action edit">
                            <a href="../brands/edit/<?= $value['id']; ?>"><span>Edit</span></a>
                        </div>
                        <div class=" action delete">
                            <a class="deletar" href="../brands/destroy/<?= $value['id']; ?>"><span>Delete</span></a>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</main>
<!-- Main Content -->