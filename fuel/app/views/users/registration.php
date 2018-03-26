<?php
/**
 * Created by PhpStorm.
 * User: franck
 * Date: 3/26/18
 * Time: 2:07 AM
 */
?>
<div class="content-box">
    <?= Lang::get_lang() ?>
    <h2>New <span class='muted'>Client</span></h2>
    <br>
    <div class="auth-box-w" style="min-width: 640px;">
        <?php echo  $form ; ?>
    </div>


    <p><?php echo Html::anchor('client', 'Back'); ?></p>
</div>
