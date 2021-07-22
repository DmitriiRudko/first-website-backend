<p>
<table>
    <tr>
        <td>Продукт</td>
        <td>Код</td>
    </tr>
    <?php
    /** @var array $data */
    if ($data != null)

        foreach ($data as $row) {
            echo '<tr><td>' . $row['name'] . '</td><td>' . $row['barcode'] . '</td></tr>';

        }
    ?>
</table>
</p>
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
                        <a class="page-link" href="<?= "?page=" . ($pageNumber - 1) ?>">Previous</a>
                    </li>
                <? else: ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Previous</a>
                    </li>
                <? endif; ?>
                <? for ($i = $firstIndex; $i <= $lastIndex; $i++): ?>
                    <li class="page-item <?= $i == $pageNumber ? "active" : "" ?> ">
                        <a class="page-link" href=<?= "?page=" . $i ?>> <?= $i ?> </a>
                    </li>
                <? endfor; ?>
                <? if ($pageNumber < $pagesAmount): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= "?page=" . ($pageNumber + 1) ?>">Next</a>
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