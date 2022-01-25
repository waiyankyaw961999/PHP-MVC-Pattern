<?php
$this->title = 'Login';

use \app\core\form\Form;

$form = new Form();
?>


<div class="position-absolute top-50 start-50 translate-middle">
    <h1 class="text-center fw-bold">Login</h1>
    <?php echo $form::begin($action = '', $method = "post"); ?>

    <?php echo $form->field($model, 'email'); ?>
    <?php echo $form->field($model, 'password'); ?>

    <button type="submit" class="btn btn-primary">Submit</button>
    <?php echo $form::end() ?>
</div>