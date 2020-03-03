<!-- Scripts -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/jquery.dropotron.min.js"></script>
<script src="/assets/js/browser.min.js"></script>
<script src="/assets/js/breakpoints.min.js"></script>
<script src="/assets/js/jquery.zoom.min.js"></script>
<script src="/assets/js/util.js"></script>
<script src="/assets/js/main.js"></script>
<script src="/assets/js/ImageSwaper.js"></script>
<?php include_once("{$BasePath}pixel.php");
if($EditMode){
    include_once ("{$BasePath}config/Editor/Editor.php");
}
?>
<style>
    .FloatRight {
        float: right;
    }

    .NavMenu {
        margin-right: 5px;
    }

    .linkimageswap, .ImageSwap {
        max-width: 15vw;
    }

</style>
<?php
if(isset($data->JavascriptList)){
    ?>
    <style>
        <?php echo $data->JavascriptList; ?>
    </style>
    <?php

}

?>
<?php
if(isset($data->JavascriptIn)){
    ?>
    <style>
        <?php echo $data->JavascriptIn; ?>
    </style>
    <?php

}

?>
</html>
