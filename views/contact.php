<?php
$this->title = 'Contact';
?>

<div class="position-absolute top-50 start-50 translate-middle">
    <h2>Contact us </h2>
    <form action="" method="post" class="">
        <div class="mb-3">
            <label>Subject</label>
            <input type="text" name="subject" class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label>Body</label>
            <textarea name="body" class="form-control"></textarea>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>