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
    /** @var array $page_info */
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";

    $plagination_indices = $page_info['indices'];
    $pages_amount = intdiv($page_info['products_amount'], $page_info['products_per_page']);
    if ($page_info['products_amount'] % $page_info['products_per_page']) {
        $pages_amount++;
    }
    $page_number = $_GET['page'];
    if ($page_number > $pages_amount or $page_number < 1) {
        $page_number = 1;
    }

    $first_index = $page_number - intdiv($plagination_indices, 2);
    $last_index = $page_number + intdiv($plagination_indices, 2);
    if ($first_index < 1) {
        $first_index = 1;
        $last_index = $plagination_indices;
    }
    if ($last_index > $pages_amount) {
        $last_index = $pages_amount;
        $first_index = $last_index - $plagination_indices + 1;
    }
    if ($last_index < $plagination_indices) {
        $first_index = 1;
        $indices = $last_index = $pages_amount;
    }

    ?>
    <? if ($pages_amount > 1): ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <? if ($page_number > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= "?page=" . ($page_number - 1) ?>">Previous</a>
                    </li>
                <? else: ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Previous</a>
                    </li>
                <? endif; ?>
                <? for ($i = $first_index; $i <= $last_index; $i++): ?>
                    <li class="page-item <?= $i == $page_number ? "active" : "" ?> ">
                        <a class="page-link" href=<?= "?page=" . $i ?>> <?= $i ?> </a>
                    </li>
                <? endfor; ?>
                <? if ($page_number < $pages_amount): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= "?page=" . ($page_number + 1) ?>">Next</a>
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