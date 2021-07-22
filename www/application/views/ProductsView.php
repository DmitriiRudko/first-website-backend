<main>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="dropdown mb-1">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <?
                    switch ($_GET['sortType']) {
                        case "priceHTL":
                            echo "Expensive first";
                            break;
                        case "priceLTH":
                            echo "Cheap first";
                            break;
                        case "reviews":
                            echo "Most reviewed";
                            break;
                        case "nameATZ":
                            echo "A-Z";
                            break;
                        case "nameZTA":
                            echo "Z-A";
                            break;
                        default:
                            $_GET['sortType'] = "priceLTH";
                            echo "Cheap first";
                    }
                    ?>
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <?
                    if ($_GET['sortType'] != "priceLTH") {
                        $url = '?page=' . $_GET['page'] . '&sortType=priceLTH';
                        echo "<li><a class='dropdown-item' href=" . $url . ">Cheap first</a></li>";
                    }
                    if ($_GET['sortType'] != "priceHTL") {
                        $url = '?page=' . $_GET['page'] . '&sortType=priceHTL';
                        echo "<li><a class='dropdown-item' href=" . $url . ">Expensive first</a></li>";
                    }
                    if ($_GET['sortType'] != "nameATZ") {
                        $url = '?page=' . $_GET['page'] . '&sortType=nameATZ';
                        echo "<li><a class='dropdown-item' href=" . $url . ">A-Z</a></li>";
                    }
                    if ($_GET['sortType'] != "nameZTA") {
                        $url = '?page=' . $_GET['page'] . '&sortType=nameZTA';
                        echo "<li><a class='dropdown-item' href=" . $url . ">Z-A</a></li>";
                    }
                    if ($_GET['sortType'] != "reviews") {
                        $url = '?page=' . $_GET['page'] . '&sortType=reviews';
                        echo "<li><a class='dropdown-item' href=" . $url . ">Most reviewed</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                /** @var array $data */
                if (!$data) return;
                foreach ($data as $row):
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
                                <h5 class="card-title"><?= $row['name'] ?></h5>
                                <p class="card-text"><?= $row['description'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Show more
                                        </button>
                                    </div>
                                    <small class="text-muted">$<?= $row['price'] ?></small>
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
    if ($pageNumber > $pagesAmount or $pageNumber < 1) {
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
                           href="<?= "?page=" . ($pageNumber - 1) . '&sortType=' . $_GET['sortType'] ?>">Previous</a>
                    </li>
                <? else: ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Previous</a>
                    </li>
                <? endif; ?>
                <? for ($i = $firstIndex; $i <= $lastIndex; $i++): ?>
                    <li class="page-item <?= $i == $pageNumber ? "active" : "" ?> ">
                        <a class="page-link"
                           href=<?= "?page=" . $i . '&sortType=' . $_GET['sortType'] ?>> <?= $i ?> </a>
                    </li>
                <? endfor; ?>
                <? if ($pageNumber < $pagesAmount): ?>
                    <li class="page-item">
                        <a class="page-link"
                           href="<?= "?page=" . ($pageNumber + 1) . '&sortType=' . $_GET['sortType'] ?>">Next</a>
                    </li>
                <? else: ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Next</a>
                    </li>
                <? endif; ?>
                </li>
            </ul>
        </nav>
    <? endif; ?>
</nav>