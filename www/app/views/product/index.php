<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-4">
            <div class="product-image">
                <?php if ($data['products']['img'] != null) { ?>
                    <img src="images/product/<?= $data['products']['img']; ?>" layout="responsive" class="w-100" alt="<?= $data['products']['name']; ?>" />
                <?php } else { ?>
                    <img src="images/no_image.jpg" layout="responsive" width="164" height="145" alt="<?= $data['products']['name']; ?>" />
                <?php } ?>
            </div>
        </div>

        <div class="col-md-8">
            <h1><?= $data['products']['name']; ?></h1>
            <?php if ($data['new_price'] > 0) : ?>
                <del>
                    <h3 class="pl-3">R$ <?= number_format($data['products']['price'], 2, ",", "."); ?></h3>
                </del>
                <h2 class="pl-3">R$ <?= $data['new_price']; ?></h2>
            <?php else : ?>
                <h3 class="pl-3">R$ <?= number_format($data['products']['price'], 2, ",", "."); ?></h3>
            <?php endif; ?>

            <div class="col-md-5 mt-3 w-75">
                <form action="../product/<?= $data['products']['id']; ?>" method="post">
                    <input type="hidden" name="token" value="<?= $data['token'] ?>" />
                    <div class="input-group input-group-sm mb-3">
                        <input name="coupon" autocomplete="off" placeholder="Have a Coupon?" type="text" class="form-control coupon_input" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="submit">Apply</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>