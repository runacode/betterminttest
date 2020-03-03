<?php
$i = 0;
$ContentName = "ContentIndex$ContentIndex";

foreach ($data->$ContentName as $item) { ?>
    <section <?php if ($EditMode) { ?> datatype="Content" data-position="<?php echo $ContentName; ?>-<?php echo $i; ?>"<?php } ?>>

        <?php
        if (isset($item->SubHeader) && strlen(trim($item->SubHeader)) > 0) {
            ?>

            <h3><?= $item->SubHeader ?></h3>
            <?php
        } elseif ($EditMode) {
            ?>

            <h3>-</h3>
            <?php
        }
        if (isset($item->ImageBefore)) {
            ?>
            <img src="/<?= $item->ImageBefore ?>"
                 class="image fit"/>
            <?php
        }

        foreach ($item->Text as $text) { ?>
            <p> <?= $text ?></p>
            <?php

        }
        if (isset($item->ImageAfter)) {
            ?>
            <img src="/<?= $item->ImageAfter ?>" class="image fit"/>
            <?php
        }
        ?>
    </section>
    <?php
    $i++;
}
if ($EditMode) { ?>

    <section datatype="Content" data-position="<?php echo $ContentName; ?>-[]">
        <h3 class="button">New Item for <?php echo $ContentName; ?></h3>


    </section>
<?php } ?>
