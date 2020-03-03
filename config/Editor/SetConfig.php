<?php



include_once(dirname(__FILE__) . "../../../config/config.php");
$Structures = array_diff(scandir( "{$BasePath}Structures/Pages"), array('.', '..'));
$OverwritePath = "{$BasePath}config/Pages/{$_REQUEST['overwrite']}";
$overwritedata = json_decode(file_get_contents($OverwritePath), true);
if (isset($_REQUEST['SetContent'])) {
    unset($_POST['SetContent']);
    file_put_contents($ConfigFilePath, json_encode($_POST));
    echo "Content Updated. Refresh to see changes.";
    $ConfigTextData = file_get_contents($ConfigFilePath);
    $data = json_decode($ConfigTextData);
}


$ConfigItems = array_keys((array)$data);

?>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet"
          href="/assets/css/main<?php if (isset($_REQUEST['variation'])) echo $_REQUEST['variation']; ?>.css"/>
</head>
<body>
<a href="SetStructure.php?overwrite=<?php echo $_REQUEST['overwrite']; ?>">Structure Editor</a>  - <a href="UploadImage.php?overwrite=<?php echo $_REQUEST['overwrite']; ?>">Image Uploader</a> - <a href="ClonePage.php?overwrite=<?php echo $_REQUEST['overwrite']; ?>">Page Creator</a>

<form method="post" enctype="multipart/form-data">

     <div id="TextNodes" >
    <?php foreach ($ConfigItems as $Key) {
        $Text = $data->$Key;
        ?>
        <div>
            <label for="Text">Config Node (<?= $Key; ?>)
                <button type="button" onclick="$(this).parent().parent().remove()">delete</button>
                <button type="button" class="  primary" onclick="AddNode($(this).parent().parent())">Add Config Node
                </button>
            </label>
            <textarea rows="<?php echo count(explode("\n", $Text)); ?>"
                      name="<?= $Key; ?>"><?php echo htmlentities($Text); ?></textarea>
        </div>
    <?php } ?>

    </div>
    <button type="button" onclick="AddNode()">Add Config Node</button>
    <input type="hidden" name="overwrite" value="<?php echo $_REQUEST['overwrite']; ?>"/>

    <button type="submit" class="fit" value="Set Content" name="SetContent">Set Content</button>
</form>
<script src="/assets/js/jquery.min.js"></script>
<script>
    function AddNode(node) {
        var New = prompt("Name Config Key")
        if (!New) {
            return;
        }
        if (node) {
            $(node).before($(` <div>
                <label for="Text">Config Node (${New})
                    <button type="button" onclick="$(this).parent().parent().remove()">delete</button>
                    <button type="button" class="  primary" onclick="AddNode($(this).parent().parent())">Add Config Node</button>
                </label>
                <textarea name="${New}"></textarea>
            </div>`
            ))
            return;
        }
        $('#TextNodes').append($(` <div>
                <label for="Text">Config Node (${New})
                    <button type="button" onclick="$(this).parent().parent().remove()">delete</button>
                    <button type="button" class="  primary" onclick="AddNode($(this).parent().parent())">Add Config Node</button>
                </label>
                <textarea name="${New}"></textarea>
            </div>`
        ))
    }
</script>
</body>
</html>