<?php
include_once(dirname(__FILE__) . "/config/config.php");
include_once("{$BasePath}/config/editmode.php");
include_once("{$BasePath}Structures/Sections/Header.php");
?>
<body class="left-sidebar is-preload">
<div id="page-wrapper">
    <!-- Header -->
    <?php include_once("{$BasePath}Structures/Sections/Menu.php"); ?>

    <!-- Main -->
    <section id="main">
        <div class="container">

                <div  class="col-12-medium imp-medium">
                    <?php $ContentIndex = 1; ?>
                    <?php include("{$BasePath}/Structures/Sections/Content.php"); ?>
                </div>

            <div class="row">

                <?php
                $PageStructure = "{$BasePath}Structures/Pages/" . $data->Structure . ".php";
                if (isset($data->Structure) && file_exists($PageStructure)) {
                    include_once($PageStructure);
                } else {
                    include_once("{$BasePath}Structures/Pages/NoSideBar.php");
                }

                ?>


            </div>
            <div  class="col-12-medium imp-medium">
                <?php $ContentIndex = 4; ?>
                <?php include("{$BasePath}/Structures/Sections/Content.php"); ?>
            </div>
        </div>
    </section>

    <?php include_once("{$BasePath}Structures/Sections/Footer.php"); ?>

</div>
</body>
<?php include_once("{$BasePath}Structures/Sections/Scripts.php"); ?>
