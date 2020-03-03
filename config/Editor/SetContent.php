<?php
$Images = array_diff(scandir(dirname(__FILE__) . "/../../images"), array('.', '..'));

include_once(dirname(__FILE__) . "../../../config/config.php");
if (isset($_REQUEST['SetContent'])) {

    if(!isset($_REQUEST['Text'])){
        $Nodes=[];
    }else{
        $Nodes=$_REQUEST['Text'];
    }
    if($Nodes === null){
        $Nodes =[];
    }
    $newContent = array("ImageBefore" => $_REQUEST['ImageBefore'], "ImageAfter" => $_REQUEST['ImageAfter'], "Text" => $Nodes, "SubHeader" => $_REQUEST['SubHeader']);
    if (strcmp($_REQUEST['ImageAfter'], 'NONE') === 0) {
        unset($newContent['ImageAfter']);
    }
    if (strcmp($_REQUEST['ImageBefore'], 'NONE') === 0) {
        unset($newContent['ImageBefore']);
    }
    SetCurrentValueByDataPosition($_REQUEST['dp'], $_REQUEST['overwrite'], $newContent);
    echo "Content Updated. Refresh to see changes.";
}
if(isset($_REQUEST['Delete'])){
    DeleteCurrentValueByDataPosition($_REQUEST['dp'], $_REQUEST['overwrite']);
    echo "Content Updated. Refresh to see changes.";
    exit;
}

if(!preg_match('/\[\]$/',$_REQUEST['dp'])) {


    $Content = GetCurrentValueByDataPosition($_REQUEST['dp'], $_REQUEST['overwrite']);
    if (!isset($Content)) {
        echo "No such Content " . $_REQUEST['dp'] . ' ' . $_REQUEST['overwrite'];
        $Content = (object)array("ImageBefore" => '', "ImageAfter" => '', "Text" => [], "SubHeader" => '');
    }else
    {
        $Content=(object)$Content;
    }
}else{
    $Content = (object)array("ImageBefore" => '', "ImageAfter" => '', "Text" => [], "SubHeader" => '');
}

?>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet"
          href="/assets/css/main<?php if (isset($_REQUEST['variation'])) echo $_REQUEST['variation']; ?>.css"/>
</head>
<body>

<form method="post" enctype="multipart/form-data">
    <button type="submit" name="Delete"  >Delete this node (careful no undo)</button>
    <label for="SubHeader">Header</label>
    <input id="SubHeader" name="SubHeader" type="text" value="<?php echo $Content->SubHeader; ?>"/>
    <label for="ImageBefore">Image Before</label>
    <select id="ImageBefore" name="ImageBefore">
        <option value="NONE"></option>
        <?php foreach ($Images as $image) { ?>

            <option value="<?php echo "images/" . $image; ?>" <?php if (strcmp("images/" . $image, $Content->ImageBefore) === 0) echo "selected"; ?> ><?php echo $image; ?></option>
        <?php } ?>
    </select>
    <button type="button" onclick="$('#TextNodes').toggle()">Show/Hide Html Nodes</button>
    <br/>
    <div id="TextNodes" style="display:none">
        <?php foreach ($Content->Text as $Text) { ?>
            <div>
                <label for="Text">Html Node
                    <button type="button" onclick="$(this).parent().parent().remove()">delete</button>
                    <button type="button" class="  primary" onclick="AddNode($(this).parent().parent())">Add Html Node
                        Before this one
                    </button>
                </label>
                <textarea rows="<?php echo count(explode("\n", $Text)); ?>"
                          name="Text[]"><?php echo htmlentities($Text); ?></textarea>
            </div>
        <?php } ?>
        <button type="button" onclick="AddNode()">Add Html Node</button>
    </div>

    <label for="ImageAfter">Image After</label>
    <select id="ImageAfter" name="ImageAfter">
        <option value="NONE"></option>
        <?php foreach ($Images as $image) { ?>
            <option value="<?php echo "images/" . $image; ?>" <?php if (strcmp("images/" . $image, $Content->ImageAfter) === 0) echo "selected"; ?> ><?php echo $image; ?></option>
        <?php } ?>
    </select>
    <input type="hidden" name="dp" value="<?php echo $_REQUEST['dp']; ?>"/>
    <input type="hidden" name="overwrite" value="<?php echo $_REQUEST['overwrite']; ?>"/>

    <button type="submit" class="fit" value="Set Content" name="SetContent">Set Content</button>
</form>
<script src="/assets/js/jquery.min.js"></script>
<script>
    function AddNode(node) {
        if (node) {
            $(node).before($("<div>    <label for=\"Text\">Html Node\n" +
                "                    <button onclick=\"$(this).parent().parent().remove()\">delete</button>               <button type=\"button\" class=\"  primary\" onclick=\"AddNode($(this).parent().parent())\">Add Html Node Before this one</button>\n" +
                "                </label>\n" +
                "                <textarea name=\"Text[]\"></textarea>"))
            return;
        }
        $('#TextNodes').append($("<div>    <label for=\"Text\">Html Node\n" +
            "                    <button onclick=\"$(this).parent().parent().remove()\">delete</button>               <button type=\"button\" class=\"  primary\" onclick=\"AddNode($(this).parent().parent())\">Add Html Node Before this one</button>\n" +
            "                </label>\n" +
            "                <textarea name=\"Text[]\"></textarea>"))
    }
</script>
</body>
</html>