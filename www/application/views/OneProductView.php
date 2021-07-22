<? /** @var array $data */ ?>
<div class="container">
    <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $data['name'] ?></h5>
            <p class="card-text"><?= $data['description'] ?></p>
            <p class="card-text"><small class="text-muted">$<?= $data['price'] ?></small></p>
        </div>
    </div>
</div>