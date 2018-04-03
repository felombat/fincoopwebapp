<div class="content-box">
    <?php if(isset($client)): ?>
        <h2><?= $title ?></h2>
    <?php else: ?>
        <h2>New <span class='muted'>Contribution</span></h2>
    <?php endif; ?>
<br>
<?php if(isset($client)): ?>

    <?php echo render('contribution/_form', array('client' => $client)); ?>

    <?php else: ?>

    <?php echo render('contribution/_form'); ?>

<?php endif; ?>


<p><?php echo Html::anchor('contribution', 'Back'); ?></p>
</div>
