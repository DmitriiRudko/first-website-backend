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
                    <a type="button" href="/Admin/publishReview?id=<?= $review['review_id'] ?>" class="btn btn-success">Accept</a>
                    <a type="button" href="/Admin/deleteReview?id=<?= $review['review_id'] ?>" class="btn btn-danger">Decline</a>
                </td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
    <a type="button" href="/Admin/createTables" class="btn btn-primary btn-lg">Crete tables</a>
</div>