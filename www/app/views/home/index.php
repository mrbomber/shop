<!-- Main Content -->
<main class="content">
  <div class="header-list-page">
    <h1 class="title">Dashboard</h1>
  </div>
  <div class="infor">
    You have <?php echo sizeof($data['products']); ?> products added on this store: <a href="../products/create" class="btn-action">Add new Product</a>
  </div>
  <ul class="product-list">
    <?php foreach ($data['products'] as $key => $value) : ?>
      <li>
        <div class="product-image">
          <?php if ($value['img'] != null) { ?>
            <img src="images/product/<?= $value['img']; ?>" layout="responsive" width="164" height="145" alt="<?= $value['name']; ?>" />
          <?php } else { ?>
            <img src="images/no_image.jpg" layout="responsive" width="164" height="145" alt="<?= $value['name']; ?>" />
          <?php } ?>
        </div>
        <div class="product-info">
          <div class="product-name"><span><?= $value['name']; ?></span></div>
          <div class="product-price"><span class="special-price"><?= $value['qty'] > 0 ? $value['qty'] . " Available" : "Out of stock"; ?></span> <span>R$<?= number_format($value['price'], 2, ",", "."); ?></span></div>
          <div class="mt-2 w-75">
            <form action="../product/<?= $value['id']; ?>" method="post">
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
      </li>
    <?php endforeach; ?>

  </ul>
</main>
<!-- Main Content -->