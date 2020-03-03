<?php
$PagesPath = $_SERVER['DOCUMENT_ROOT'] . '/config/Pages/';
if (isset($_REQUEST['Clone'])) {

    if (preg_match('/(\.php|\/)$/', $_REQUEST['ClonedPath'], $output)) {
        $file = preg_replace('/[^a-z]/i', '_', $_REQUEST['ClonedPath']);
        $PathToOutput = $_SERVER['DOCUMENT_ROOT'] . "/" . $_REQUEST['ClonedPath'];

        switch ($output[1]) {
            case '.php':
                $PathToFolder = $_SERVER['DOCUMENT_ROOT'] . "/" . dirname($_REQUEST['ClonedPath']);

                try {
                    if (!file_exists($PathToFolder))
                        mkdir($PathToFolder, 0755, true);
                } catch (Exception $e) {

                }
                file_put_contents("$PagesPath/$file.json", file_get_contents("$PagesPath{$_REQUEST['overwrite']}"));
                file_put_contents($PathToOutput, GetTemplate($file));
                ?>
                <a href="/<?php echo $_REQUEST['ClonedPath']; ?>" target="_blank"><?php echo $_REQUEST['ClonedPath']; ?></a>
                <?php
                break;
            case '/';
                try {
                    $PathToFolder = $PathToOutput;
                    if (!file_exists($PathToFolder))
                        mkdir($PathToFolder, 0755, true);
                } catch (Exception $e) {

                }
                file_put_contents("$PagesPath$file.json", file_get_contents("$PagesPath{$_REQUEST['overwrite']}"));
                file_put_contents($PathToFolder . "/index.php", GetTemplate($file));
                ?>
                <a href="/<?php echo $_REQUEST['ClonedPath']; ?>" target="_blank"><?php echo $_REQUEST['ClonedPath']; ?></a>
                <?php
                break;
        }
    }
}

?><!DOCTYPE html>
    <html>
    <head>

        <link rel="stylesheet"
              href="/assets/css/main<?php if (isset($_REQUEST['variation'])) echo $_REQUEST['variation']; ?>.css"/>
    </head>
    <body>

    <form method="post" enctype="multipart/form-data">
        <p><?php echo $_SERVER['DOCUMENT_ROOT']; ?> </p>
        <label for="ClonedPath">Select path for cloned page</label>
        https://thisdomain/<input type="text" name="ClonedPath" id="ClonedPath">
        <input type="hidden" name="overwrite" value="<?php echo $_REQUEST['overwrite']; ?>"/>
        <p>Either end in .php or /</p>
        <input type="submit" value="Clone Page" name="Clone">
    </form>

    </body>
    </html>
<?php

function GetTemplate($file)
{
    return <<<TEMPLATE
<?php
    \$overwrite = "$file.json";
    include_once(\$_SERVER['DOCUMENT_ROOT'] . '/PageRenderer.php');
    ?>
TEMPLATE;

}