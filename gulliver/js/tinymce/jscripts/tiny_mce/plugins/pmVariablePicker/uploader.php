<head>
	<title>Upload an Output Document</title>
	<script type="text/javascript" src="../../tiny_mce_popup.js" ></script>
	<script type="text/javascript" src="editor_plugin_src.js" ></script>
	<base target="_self" />
</head>
<body>
<?php
	$Action = isset($_GET["q"]) ? $_GET["q"] : "none";

	if($Action =="none"){
            displayUploadForm();
        }else if($Action=="upload"){
            uploadVariablePicker();
        }
?>
</body>
</html>

<?php

// displays the upload form
function displayUploadForm()
{
	echo '<form action="uploader.php?'.$_SERVER["QUERY_STRING"].'&q=upload" method="post" enctype="multipart/form-data" onsubmit="">'
                .'Variable Name: <br/>'
                .'<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" size="20" name="upload_variable" ID="Text1"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp'
                .'<input type="submit" name="Variable" value="Variable" style="width: 100px;" onclick="document.getElementById(\'progress_div\').style.visibility=\'visible\';"/>'
                .'  <div id="progress_div" style="visibility: hidden;"><img src="progress.gif" alt="wait..." style="padding-top: 5px;"></div>'
             .'</form>';
}
// uploads the file to the destination path, and returns a link with link path substituted for destination path
function uploadVariablePicker()
{
    $StatusMessage = "";
	$ActualFileName = "";
	$FileObject = $_REQUEST["upload_variable"]; // find data on the file

	updateEditorContent(trim($FileObject));
    closeWindow();
}


function showPopUp($PopupText)
{
	echo "<script type=\"text/javascript\" language=\"javascript\">alert (\"$PopupText\");</script>";
}

function updateEditorContent($serializedHTML)
{
    echo "<script type=\"text/javascript\" language=\"javascript\">updateEditorContent(\"".$serializedHTML."\");</script>";
}

function closeWindow()
{
	echo '
            <script language="javascript" type="text/javascript">
                    closePluginPopup();
            </script>
         ';
}
?>

