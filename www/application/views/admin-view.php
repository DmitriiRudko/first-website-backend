<?
/** @var array $data */
$notPublishedReviews = $data;
?>

<div class="container">
    <table class="table align-middle">
        <thead>
        <tr>
            <th scope="col">Username</th>
            <th scope="col">Text</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <? foreach ($notPublishedReviews as $review): ?>
        <tr>
            <td><?= $review['user_name'] ?></td>
            <td><?= $review['text'] ?></td>
            <td>
                <button type="button" class="btn btn-success">Accept</button>
                <button type="button" class="btn btn-danger">Decline</button>
            </td>
        </tr>
        <? endforeach; ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-primary btn-lg">Crete tables</button>
</div>