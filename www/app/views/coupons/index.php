<!-- Main Content -->
<main class="content">
    <div class="header-list-page">
        <h1 class="title"><b>Coupons</b></h1>
        <a href="../coupons/create" class="btn-action">Add new Coupon</a>
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
                <span class="data-grid-cell-content">Type</span>
            </th>
            <th class="data-grid-th">
                <span class="data-grid-cell-content">Value</span>
            </th>
          

            <th class="data-grid-th">
                <span class="data-grid-cell-content">Actions</span>
            </th>
        </tr>
        <?php foreach ($data['coupons'] as $key => $value) : ?>
            <tr class="data-row">
               

                <td class="data-grid-td">
                    <span class="data-grid-cell-content"><?= $value['name']; ?></span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content"><?= $value['type']; ?></span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content"><?php if($value['type_id'] == 1): echo 'R$ '.number_format($value['value'], 2, ",", "."); else: echo $value['value'].' %'; endif;?></span>
                </td>

              

                <td class="data-grid-td">
                    <div class="actions">
                        <div class="action edit">
                            <a href="../coupons/edit/<?= $value['id']; ?>"><span>Edit</span></a>
                        </div>
                        <div class=" action delete">
                            <a class="deletar" href="../coupons/destroy/<?= $value['id']; ?>"><span>Delete</span></a>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</main>
<!-- Main Content -->