<?php
/** @var array $data */
$notValid = $data;
?>
<div class="container">
    <form class="row g-3" action="/AddReview/addReview" method="POST">
        <div class="col-md-6">
            <label for="validationServer02" class="form-label">Username</label>
            <input type="text" class="form-control"
                   id="validationServer02" name="username" required>
            <div class="form-floating col-md-12 mt-2 mb-2">
                <textarea class="form-control" id="floatingTextarea2" name="reviewText" required></textarea>
                <label for="floatingTextarea2">Review text</label>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
    </form>
</div>