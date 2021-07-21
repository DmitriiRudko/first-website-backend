<h1>Продукты</h1>
<p>
<table>
    <tr>
        <td>Продукт</td>
        <td>Код</td>
    </tr>
    <?php

    if ($data != null)
        foreach ($data as $row) {
            echo '<tr><td>' . $row['name'] . '</td><td>' . $row['barcode'] . '</td></tr>';
        }

    ?>
</table>
</p>