<?php if (isset($erros) && count($erros)) { ?>
    <ul>
        <?php foreach ($erros as $erro) { ?>
            <li><span style='font-size: 15pt; padding: 5px;'> <?php echo $erro; ?></span></li>
        <?php } ?>
    </ul>
<?php } ?>