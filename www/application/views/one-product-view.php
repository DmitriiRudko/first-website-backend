<?
/** @var array $data */
$product = $data;
?>

<div class="container">
    <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $product['name'] ?></h5>
            <p class="card-text"><?= $product['description'] ?></p>
            <p class="card-text"><small class="text-muted">$<?= $product['price'] ?></small></p>
        </div>
    </div>
    <? foreach($product['reviews'] as $review): ?>
        <hr/>
        <h6><?= $review['user_name']; ?></h6>
        <?= $review['text']; ?>
    <? endforeach; ?>

</div>