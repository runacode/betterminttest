                 <!-- Content -->
                <div id="content" class="col-12 col-12-medium imp-medium">
                    <!-- Post -->
                    <article class="box post">
                    <?php include_once("{$BasePath}/Structures/Widgets/ImageSelector.php"); ?>
                        <?php include_once("{$BasePath}/Structures/Widgets/Add-ToCart.php"); ?>
                    <?php $ContentIndex = 2; ?>
                    <?php include("{$BasePath}/Structures/Sections/Content.php"); ?>

                    <?php $ContentIndex = 3; ?>
                    <?php include("{$BasePath}/Structures/Sections/Content.php"); ?>
                    </article>
                </div>