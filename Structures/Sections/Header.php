<!DOCTYPE HTML>
<?php
$CssFile="main.css";
if(isset($data->CssOverwrite)){
    $CssFile= $data->CssOverwrite;
}
?>
<html>
<head>
    <title><?= $data->Title ?></title>
    <meta charset="utf-8"/>
    <?php foreach ($data->MetaTags as $item) { ?>
        <meta name="<?php echo $item->Name; ?>" content="<?php echo $item->Content; ?>"/>
    <?php } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="/assets/css/<?php echo $CssFile; ?>" />
    <?php
    if(isset($data->CssList)){
        ?>
        <style>
            <?php echo $data->CssList; ?>
        </style>
        <?php

    }

    ?>
    <?php
    if(isset($data->CssIn)){
        ?>
        <style>
            <?php echo $data->CssIn; ?>
        </style>
        <?php

    }

    ?>
</head>
