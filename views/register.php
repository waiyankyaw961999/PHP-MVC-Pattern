<?php
$this->title = 'Register';

use \app\core\form\Form;

$form = new Form();
?>


<div class="position-absolute top-50 start-50 translate-middle">
    <h1 class="text-center fw-bold">Create an account</h1>
    <?php echo $form->begin('', "post") ?>
    <div class="row">
        <div class="col"> <?php echo $form->field($model, 'firstname'); ?></div>
        <div class="col"> <?php echo $form->field($model, 'lastname'); ?></div>
    </div>
    <?php echo $form->field($model, 'email'); ?>
    <?php echo $form->field($model, 'password')->passwordField(); ?>
    <?php echo $form->field($model, 'confirmPassword')->passwordField(); ?>
    <button type="submit" class="btn btn-primary">Confirm</button>
    <?php Form::end() ?>
</div>