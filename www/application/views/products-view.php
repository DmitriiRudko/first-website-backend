<main>
    <div class="album py-5 bg-light">
        <div class="container mt-2">
            <div class="dropdown mb-1">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <?
                    $sortInfo = SortHelper::parseSortType();
                    echo $sortInfo["description"];
                    ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <?
                    if ($_GET['sortType'] != "price-asc") {
                        $url = '/Products/showProducts?page=' . $_GET['page'] . '&sortType=price-asc';
                        echo "<li><a class='dropdown-item' href=" . $url . ">Cheap first</a></li>";
                    }
                    if ($_GET['sortType'] != "price-desc") {
                        $url = '/Products/showProducts?page=' . $_GET['page'] . '&sortType=price-desc';
                        echo "<li><a class='dropdown-item' href=" . $url . ">Expensive first</a></li>";
                    }
                    if ($_GET['sortType'] != "name-asc") {
                        $url = '/Products/showProducts?page=' . $_GET['page'] . '&sortType=name-asc';
                        echo "<li><a class='dropdown-item' href=" . $url . ">A-Z</a></li>";
                    }
                    if ($_GET['sortType'] != "name-desc") {
                        $url = '/Products/showProducts?page=' . $_GET['page'] . '&sortType=name-desc';
                        echo "<li><a class='dropdown-item' href=" . $url . ">Z-A</a></li>";
                    }
                    if ($_GET['sortType'] != "reviews-desc") {
                        $url = '/Products/showProducts?page=' . $_GET['page'] . '&sortType=reviews-desc';
                        echo "<li><a class='dropdown-item' href=" . $url . ">Most reviewed</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                /** @var array $data */
                $products = $data;
                if (!$products) return;
                foreach ($products as $product):
                    ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"></rect>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                            <div class="card-body">
                                <h5 class="card-title"><?= $product['name'] ?></h5>
                                <p class="card-text"><?= $product['description'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a type="button"
                                           href="/OneProduct/showOneProduct?id=<?= $product['product_id'] ?>"
                                           class="btn btn-sm btn-outline-secondary">Show more</a>
                                        <a type="button"
                                           href="/AddReview/newReviewPage?id=<?= $product['product_id'] ?>"
                                           class="btn btn-sm btn-outline-secondary">Feedback</a>
                                    </div>
                                    <small class="text-muted">$<?= $product['price'] ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </div>
</main>
<nav aria-label="Page navigation example">
    <?php
    /** @var array $pageInfo */
    $plaginationIndices = $pageInfo['indices'];
    $pagesAmount = intdiv($pageInfo['products_amount'], $pageInfo['products_per_page']);
    if ($pageInfo['products_amount'] % $pageInfo['products_per_page']) {
        $pagesAmount++;
    }
    $pageNumber = $_GET['page'];
    if ($pageNumber > $pagesAmount || $pageNumber < 1) {
        $pageNumber = 1;
    }

    $firstIndex = $pageNumber - intdiv($plaginationIndices, 2);
    $lastIndex = $pageNumber + intdiv($plaginationIndices, 2);
    if ($firstIndex < 1) {
        $firstIndex = 1;
        $lastIndex = $plaginationIndices;
    }
    if ($lastIndex > $pagesAmount) {
        $lastIndex = $pagesAmount;
        $firstIndex = $lastIndex - $plaginationIndices + 1;
    }
    if ($lastIndex < $plaginationIndices) {
        $firstIndex = 1;
        $indices = $lastIndex = $pagesAmount;
    }
    ?>
    <? if ($pagesAmount > 1): ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <? if ($pageNumber > 1): ?>
                    <li class="page-item">
                        <a class="page-link"
                           href="<?= "/Products/showProducts?page=" . ($pageNumber - 1) . '&sortType=' . $_GET['sortType'] ?>">Previous</a>
                    </li>
                <? else: ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Previous</a>
                    </li>
                <? endif; ?>
                <? for ($i = $firstIndex; $i <= $lastIndex; $i++): ?>
                    <li class="page-item <?= $i == $pageNumber ? "active" : "" ?> ">
                        <a class="page-link"
                           href=<?= "/Products/showProducts?page=" . $i . '&sortType=' . $_GET['sortType'] ?>> <?= $i ?> </a>
                    </li>
                <? endfor; ?>
                <? if ($pageNumber < $pagesAmount): ?>
                    <li class="page-item">
                        <a class="page-link"
                           href="<?= "/Products/showProducts?page=" . ($pageNumber + 1) . '&sortType=' . $_GET['sortType'] ?>">Next</a>
                    </li>
                <? else: ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Next</a>
                    </li>
                <? endif; ?>
            </ul>
        </nav>
    <? endif; ?>
</nav>