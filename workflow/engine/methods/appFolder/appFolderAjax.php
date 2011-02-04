<?php

if (! isset ( $_REQUEST ['action'] )) {
    $res ['success'] = 'failure';
    $res ['message'] = 'You may request an action';
    print G::json_encode ( $res);
    die ();
}
if (! function_exists ( $_REQUEST ['action'] )) {
    $res ['success'] = 'failure';
    $res ['message'] = 'The requested action doesn\'t exists';
    print G::json_encode ( $res );
    die ();
}

$functionName = $_REQUEST ['action'];
$functionParams = isset ( $_REQUEST ['params'] ) ? $_REQUEST ['params'] : array ();

$functionName ( $functionParams );

function expandNode(){
    require_once ("classes/model/AppFolder.php");

    $oPMFolder = new AppFolder ( );

    $rootFolder = "/";

    if($_POST ['node']=="") $_POST ['node'] ="/";
    if($_POST ['node']=="root") $_POST ['node'] ="/";
    if(!(isset($_POST['sendWhat']))) $_POST['sendWhat']="both";
    if(($_POST['sendWhat']=="dirs")||($_POST['sendWhat']=="both")){
        $folderList = $oPMFolder->getFolderList ( $_POST ['node'] != 'root' ? $_POST ['node'] == 'NA' ? "" : $_POST ['node'] : $rootFolder );
        //G::pr($folderList);
    }
    if(($_POST['sendWhat']=="files")||($_POST['sendWhat']=="both")){
        $folderContent = $oPMFolder->getFolderContent ( $_POST ['node'] != 'root' ? $_POST ['node'] == 'NA' ? "" : $_POST ['node'] : $rootFolder );
        //G::pr($folderContent);
    }
    //G::pr($folderContent);
    $processListTree=array();
    if(isset($folderList)){
        $tempTree=array();
        foreach ( $folderList as $key => $obj ) {
            //$tempTree ['all-obj'] = $obj;
            $tempTree ['text'] = $obj['FOLDER_NAME'];
            $tempTree ['id'] = $obj['FOLDER_UID'];
            $tempTree ['folderID'] = $obj['FOLDER_UID'];
            $tempTree ['cls'] = 'folder';
            $tempTree ['draggable'] = true;
            $tempTree ['name'] = $obj['FOLDER_NAME'];
            $tempTree ['type'] = "Directory";
            $tempTree ['is_file'] = false;
            $tempTree ['appDocCreateDate'] = $obj['FOLDER_CREATE_DATE'];
            $tempTree ['qtip'] ='<strong>Directory: </strong>'.$obj['FOLDER_NAME'].'<br /><strong>Create Date:</strong> '.$obj['FOLDER_CREATE_DATE'].'';
            $tempTree ['is_writable'] =true;
            $tempTree ['is_chmodable'] =true;
            $tempTree ['is_readable'] =true;
            $tempTree ['is_deletable'] =true;





            if((isset($_POST['option']))&&($_POST['option']=="gridDocuments")){
                $tempTree ['icon'] = "/images/documents/extension/folder.png";
            }
            //$tempTree ['leaf'] = true;
            //$tempTree ['optionType'] = "category";
            //$tempTree['allowDrop']=false;
            //$tempTree ['singleClickExpand'] = false;
            /*
             if ($key != "No Category") {
             $tempTree ['expanded'] = true;
             } else {
             //$tempTree ['expanded'] = false;
             $tempTree ['expanded'] = true;
             }
             */
            $processListTree [] = $tempTree;
            $tempTree=array();
        }

        if($_POST ['node'] == '/'){
            $notInFolderLabel = G::LoadTranslation ( 'ID_NOT_IN_FOLDER' );
            $tempTree ['text'] = $notInFolderLabel;
            $tempTree ['id'] = "NA";
            $tempTree ['folderID'] = "NA";
            $tempTree ['cls'] = 'folder';
            $tempTree ['draggable'] = true;
            $tempTree ['name'] = $notInFolderLabel;
            $tempTree ['type'] = "Directory";
            $tempTree ['is_file'] = false;
            $tempTree ['qtip'] ='<strong>Directory: </strong>'.$notInFolderLabel.'<br /><i>Unfiled Files</i> ';
            $tempTree ['is_writable'] =true;
            $tempTree ['is_chmodable'] =true;
            $tempTree ['is_readable'] =true;
            $tempTree ['is_deletable'] =true;

            if((isset($_POST['option']))&&($_POST['option']=="gridDocuments")){
                $tempTree ['icon'] = "/images/documents/extension/bz2.png";
            }
            //$tempTree ['leaf'] = true;
            //$tempTree ['optionType'] = "category";
            //$tempTree['allowDrop']=false;
            //$tempTree ['singleClickExpand'] = false;
            /*
             if ($key != "No Category") {
             $tempTree ['expanded'] = true;
             } else {
             //$tempTree ['expanded'] = false;
             $tempTree ['expanded'] = true;
             }
             */
            $processListTree [] = $tempTree;
            $tempTree=array();

        }
    }
     
    if(isset($folderContent)){
        foreach ( $folderContent as $key => $obj ) {
            $tempTree ['text'] = $obj['APP_DOC_FILENAME'];
            $tempTree ['id'] = $obj['APP_DOC_UID'];

            $tempTree ['cls'] = 'file';
            //$tempTree ['draggable'] = true;
            $tempTree ['leaf'] = true;
            $tempTree ['name'] = $obj['APP_DOC_FILENAME'];
            $mimeInformation=getMime($obj['APP_DOC_FILENAME']);
            $tempTree ['type'] = $mimeInformation['description'];
            $tempTree ['is_file'] = true;
            //if((isset($_POST['option']))&&($_POST['option']=="gridDocuments")){
            $tempTree ['icon'] = $mimeInformation['icon'];
            //}

            $tempTree ['docVersion'] = $obj['DOC_VERSION'];
            $tempTree ['appUid'] = $obj['APP_UID'];
            $tempTree ['usrUid'] = $obj['USR_UID'];
            $tempTree ['appDocType'] = $obj['APP_DOC_TYPE'];
            $tempTree ['appDocCreateDate'] = $obj['APP_DOC_CREATE_DATE'];
            $tempTree ['appDocPlugin'] = $obj['APP_DOC_PLUGIN'];
            $tempTree ['appDocTags'] = $obj['APP_DOC_TAGS'];
            $tempTree ['appDocTitle'] = $obj['APP_DOC_TITLE'];
            $tempTree ['appDocComment'] = $obj['APP_DOC_COMMENT'];
            $tempTree ['appDocFileName'] = $obj['APP_DOC_FILENAME'];
            if(isset($obj['APP_NUMBER'])){
                $tempTree ['appLabel'] = sprintf("%s '%s' (%s)",$obj['APP_NUMBER'],$obj['APP_TITLE'],$obj['STATUS']);
            }else{
                $tempTree ['appLabel'] = "No case related";
            }
            $tempTree ['proTitle'] = $obj['PRO_TITLE'];
            $tempTree ['appDocVersionable'] = 0;
            if(isset($obj['OUT_DOC_VERSIONING'])){
                $tempTree ['appDocVersionable'] = $obj['OUT_DOC_VERSIONING'];
            }elseif(isset($obj['INP_DOC_VERSIONING'])){
                $tempTree ['appDocVersionable'] = $obj['INP_DOC_VERSIONING'];
            }

            if(isset($obj['USR_LASTNAME'])&&isset($obj['USR_LASTNAME'])){
                $tempTree ['owner'] = sprintf("%s %s (%s)",$obj['USR_LASTNAME'],$obj['USR_FIRSTNAME'],$obj['USR_USERNAME']);
            }else{
                $tempTree ['owner'] = sprintf("%s",$obj['USR_USERNAME']);

            }
            $tempTree ['deletelabel'] = $obj['DELETE_LABEL'];
            $tempTree ['downloadLabel'] = $obj['DOWNLOAD_LABEL'];
            $tempTree ['downloadLink'] = $obj['DOWNLOAD_LINK'];
            $tempTree ['downloadLabel1'] = $obj['DOWNLOAD_LABEL1'];
            $tempTree ['downloadLink1'] = $obj['DOWNLOAD_LINK1'];
            $tempTree ['appDocUidVersion'] = $obj['APP_DOC_UID_VERSION'];

            //$tempTree ['optionType'] = "category";
            //$tempTree['allowDrop']=false;
            //$tempTree ['singleClickExpand'] = true;
            /*
             if ($key != "No Category") {
             $tempTree ['expanded'] = true;
             } else {
             //$tempTree ['expanded'] = false;
             $tempTree ['expanded'] = true;
             }
             */
            $processListTree [] = $tempTree;
            $tempTree=array();
        }
    }
    if((isset($_POST['option']))&&($_POST['option']=="gridDocuments")){
        $processListTreeTemp['totalCount']=count($processListTree);
        $processListTreeTemp['items']=$processListTree;
        $processListTree = $processListTreeTemp;
    }

    print G::json_encode ( $processListTree );
}

function openPMFolder(){
    $WIDTH_PANEL = 350;
    G::LoadClass ( 'tree' );
    $folderContent = $oPMFolder->getFolderList ( $_POST ['folderID'] != '0' ? $_POST ['folderID'] == 'NA' ? "" : $_POST ['folderID'] : $rootFolder );
    //krumo($folderContent);
    if (! is_array ( $folderContent )) {
        echo $folderContent;
        exit ();
    }

    $tree = new Tree ( );
    $tree->name = 'DMS';
    $tree->nodeType = "blank";

    //$tree->width="350px";
    $tree->value = '';
    $tree->showSign = false;

    $i = 0;
    foreach ( $folderContent as $key => $obj ) {
        $i ++;
        //if($obj->item_type=="F"){
         

        $RowClass = ($i % 2 == 0) ? 'Row1' : 'Row2';
        $id_delete = G::LoadTranslation('ID_DELETE');
        $id_edit = G::LoadTranslation('ID_EDIT');
         
        $htmlGroup = <<<GHTML
	<table cellspacing='0' cellpadding='0' border='1' style='border:0px;' width="100%" class="pagedTable">
	<tr id="{$i}"  onmouseout="setRowClass(this, '{$RowClass}')" onmouseover="setRowClass(this, 'RowPointer' )" class="{$RowClass}" style="cursor:hand">
	<td width='' class='treeNode' style='border:0px;background-color:transparent;'><a href="#" onclick="focusRow(this, 'Selected');openPMFolder('{$obj['FOLDER_UID']}','{$_POST['rootfolder']}');">
	<img src="/images/folderV2.gif" border = "0" valign="middle" />&nbsp;{$obj['FOLDER_NAME']}</a>
  <a href="#" onclick="deletePMFolder('{$obj['FOLDER_UID']}','{$_POST['rootfolder']}');">&nbsp; {$id_delete}</a>
  </td>
	</tr>
	</table>
	<div id="child_{$obj['FOLDER_UID']}"></div>
GHTML;
         
        $ch = & $tree->addChild ( $key, $htmlGroup, array ('nodeType' => 'child' ) );
        $ch->point = ' ';

    }
    $RowClass = ($i % 2 == 0) ? 'Row1' : 'Row2';
    $key = 0;
    if ($_POST ['folderID'] == '0') {
        $notInFolderLabel = G::LoadTranslation ( 'ID_NOT_IN_FOLDER' );
        $htmlGroup = <<<GHTML
	<table cellspacing='0' cellpadding='0' border='1' style='border:0px;' width="100%" class="pagedTable">
	<tr id="{$i}" onclick="focusRow(this, 'Selected');openPMFolder('NA');" onmouseout="setRowClass(this, '{$RowClass}')" onmouseover="setRowClass(this, 'RowPointer' )" class="{$RowClass}">
	<td width='' class='treeNode' style='border:0px;background-color:transparent;'><a href="#" onclick=""><img src="/images/folderV2.gif" border = "0" valign="middle" />&nbsp;- {$notInFolderLabel} -</a>&nbsp;</td>

	</tr>
	</table>
	<div id="child_NA"></div>
GHTML;
         
        $ch = & $tree->addChild ( $key, $htmlGroup, array ('nodeType' => 'child' ) );
        $ch->point = ' ';
    }

    print ($tree->render ()) ;

}

function getPMFolderContent(){
    $swSearch = false;

    if (isset ( $_POST ['folderID'] )) { //Render content of a folder
        $folderID = $_POST ['folderID'] != '0' ? $_POST ['folderID'] == 'NA' ? "" : $_POST ['folderID'] : $rootFolder;
        $folderContent = $oPMFolder->getFolderContent ( $folderID );
    } else { // Perform a Search
        $swSearch = true;
        $folderContent = $oPMFolder->getFolderContent ( NULL, array (), $_POST ['searchKeyword'], $_POST ['type'] );
    }
    array_unshift ( $folderContent, array ('id' => 'char' ) );
    if (! is_array ( $folderContent )) {
        echo $folderContent;
        exit ();
    }

    $_DBArray ['PM_FOLDER_DOC'] = $folderContent;
    $_SESSION ['_DBArray'] = $_DBArray;

    G::LoadClass ( 'ArrayPeer' );
    $c = new Criteria ( 'dbarray' );
    $c->setDBArrayTable ( 'PM_FOLDER_DOC' );
    $c->addAscendingOrderByColumn ( 'id' );
    $G_PUBLISH = new Publisher ( );
    require_once ('classes/class.xmlfield_InputPM.php');

    $labelFolderAddFile = "";
    $labelFolderAddFolder = "";
    if ($RBAC->userCanAccess ( 'PM_FOLDERS_ADD_FILE' ) == 1) {
        $labelFolderAddFile = G::LoadTranslation ( 'ID_ATTACH' );
    }
    if ($RBAC->userCanAccess ( 'PM_FOLDERS_ADD_FOLDER' ) == 1) {
        $labelFolderAddFolder = G::LoadTranslation ( 'ID_NEW_FOLDER' );
    }

    if (! $swSearch) {
        $G_PUBLISH->AddContent ( 'propeltable', 'paged-table', 'appFolder/appFolderDocumentList', $c, array ('folderID' => $_POST ['folderID'] != '0' ? $_POST ['folderID'] == 'NA' ? "/" : $_POST ['folderID'] : $rootFolder, 'labelFolderAddFile' => $labelFolderAddFile, 'labelFolderAddFolder' => $labelFolderAddFolder ) );
        $G_PUBLISH->AddContent ( 'xmlform', 'xmlform', 'appFolder/appFolderDocumentListHeader', '', array (), 'appFolderList?folderID=' . $_POST ['folderID'] );
    } else {
        $G_PUBLISH->AddContent ( 'propeltable', 'paged-table', 'appFolder/appFolderDocumentListSearch', $c, array () );
        $G_PUBLISH->AddContent ( 'xmlform', 'xmlform', 'appFolder/appFolderDocumentListHeader', '', array (), 'appFolderList?folderID=/' );
    }

    G::RenderPage ( 'publish', 'raw' );

}

function getPMFolderTags(){
    // Default font sizes
    $min_font_size = 12;
    $max_font_size = 30;

    $rootFolder = "/";
    $folderID = $_POST ['rootFolder'] != '0' ? $_POST ['rootFolder'] == 'NA' ? "" : $_POST ['rootFolder'] : $rootFolder;
    $tags = $oPMFolder->getFolderTags ( $folderID );
    $minimum_count = 0;
    $maximum_count = 0;
    if ((is_array ( $tags )) && (count ( $tags ) > 0)) {
        $minimum_count = min ( array_values ( $tags ) );
        $maximum_count = max ( array_values ( $tags ) );
    }
    $spread = $maximum_count - $minimum_count;

    if ($spread == 0) {
        $spread = 1;
    }

    $cloud_html = '';
    $cloud_tags = array (); // create an array to hold tag code
    foreach ( $tags as $tag => $count ) {
        $href = "#";
        //$href="?q="$tag;
        $size = $min_font_size + ($count - $minimum_count) * ($max_font_size - $min_font_size) / $spread;
        $cloud_tags [] = '<a style="font-size: ' . floor ( $size ) . 'px' . '" class="tag_cloud" href="' . $href . '" onClick="getPMFolderSearchResult(\'' . $tag . '\',\'TAG\')"' . ' title="\'' . $tag . '\' returned a count of ' . $count . '">' . htmlspecialchars ( stripslashes ( $tag ) ) . '</a>';
    }
    $cloud_html = join ( "\n", $cloud_tags ) . "\n";

    print "$cloud_html";

}

function uploadDocument(){

    $uploadDocumentComponent=array();


    $uploadDocumentComponent["xtype"]= "tabpanel";
    $uploadDocumentComponent["stateId"]= "upload_tabpanel";
    $uploadDocumentComponent["activeTab"]= "uploadform";
    $uploadDocumentComponent["dialogtitle"]= "actupload";
    $uploadDocumentComponent["stateful"]= true;

    $uploadDocumentComponent["stateEvents"]= array("tabchange");
    $uploadDocumentComponent["getState"]= "function_getState";
    $functionsToReplace['function_getState']="function() { return {
                    activeTab:this.items.indexOf(this.getActiveTab())
                };
    }";
    $uploadDocumentComponent["listeners"]["resize"]["fn"]="function_listeners_resize";
    $functionsToReplace['function_listeners_resize'] = "function(panel) {
                            panel.items.each( function(item) { item.setHeight(500);return true } );
                        }";
    $uploadDocumentComponent["items"]=array();

    $itemA=array();


    $itemA["xtype"]= "swfuploadpanel";
    $itemA["title"]= "flashupload";
    $itemA["height"]= "300";
    $itemA["id"]= "swfuploader";
    $itemA["viewConfig"]["forceFit"]=true;
    $itemA["listeners"]["allUploadsComplete"]["fn"]="function_listeners_allUploadsComplete";
    $functionsToReplace['function_listeners_allUploadsComplete'] = "function(panel) {
                                    datastore.reload();
                                    panel.destroy();
                                    Ext.getCmp('dialog').destroy();
                                    statusBarMessage('upload_completed', false );
                                }";
     
    // Uploader Params
    $itemA["upload_url"]= "../appFolder/appFolderAjax.php";
    $itemA["post_params"][session_name()]=session_id();
    $itemA["post_params"]["option"]="uploadFile";
    $itemA["post_params"]["action"]="upload";
    $itemA["post_params"]["dir"]="datastore.directory";
    $itemA["post_params"]["requestType"]="xmlhttprequest";
    $itemA["post_params"]["confirm"]="true";

    $itemA["flash_url"]="/scripts/extjs3-ext/ux.swfupload/swfupload.swf";
    $itemA["file_size_limit"]=get_max_file_size();
    // Custom Params
    $itemA["single_file_select"]=false; // Set to true if you only want to select one file from the FileDialog.
    $itemA["confirm_delete"]=false; // This will prompt for removing files from queue.
    $itemA["remove_completed"]=false; // Remove file from grid after uploaded.
    //$uploadDocumentComponent["items"][]=$itemA;

    //Standard Upload
    $itemA=array();
    $itemA["xtype"]="form";
    $itemA["autoScroll"]=true;
    $itemA["autoHeight"]=true;
    $itemA["id"]="uploadform";
    $itemA["fileUpload"]=true;
    $itemA["labelWidth"]="125";
    $itemA["url"]="URL_SCRIPT";
    $itemA["title"]="standardupload";
    //$itemA["tooltip"]="Max File Size <strong>". ((get_max_file_size() / 1024) / 1024)." MB</strong><br />Max Post Size<strong>". ((get_max_upload_limit() / 1024) / 1024)." MB</strong><br />";
    $itemA["frame"]=true;
    $itemA["items"]=array();
    $itemB=array();

    $itemB["xtype"]="displayfield";
    $itemB["value"]="Max File Size <strong>". ((get_max_file_size() / 1024) / 1024)." MB</strong><br />Max Post Size<strong>". ((get_max_upload_limit() / 1024) / 1024)." MB</strong><br />";
    //$itemA["items"][]=$itemB;

    for($i=0;$i<7;$i++) {
        $itemB=array();

        $itemB["xtype"]="fileuploadfield";
        $itemB["fieldLabel"]="File ".($i+1);
        $itemB["id"]="uploadedFile[$i]";
        $itemB["name"]="uploadedFile[$i]";
        $itemB["width"]=275;
        $itemB["buttonOnly"]= false;
        $itemA["items"][]=$itemB;
    }

    $itemB=array();

    $itemB["xtype"]="checkbox";
    $itemB["fieldLabel"]="overwrite_files";
    $itemB["name"]="overwrite_files";
    $itemB["checked"]=true;
    $itemA["items"][]=$itemB;

    $itemA["buttons"]=array();

    $buttonA=array();
    $buttonA["text"]="btnsave";
    $buttonA["handler"]="function_standardupload_btnsave";
    $functionsToReplace["function_standardupload_btnsave"]=' function() {
                statusBarMessage( "upload_processing", true );
                form = Ext.getCmp("uploadform").getForm();
                
                //Ext.getCmp("uploadform").getForm().submit();
                console.log(form);
                console.log(form.url);
                Ext.getCmp("uploadform").getForm().submit({
                    //reset: true,
                    reset: false,
                    success: function(form, action) {
                        
                        datastore.reload();
                        statusBarMessage( action.result.message, false, true );
                        Ext.getCmp("dialog").destroy();
                    },
                    failure: function(form, action) {
                        
                        if( !action.result ) return;
                        Ext.MessageBox.alert("error", action.result.error);
                        statusBarMessage( action.result.error, false, false );
                    },
                    scope: Ext.getCmp("uploadform"),
                    // add some vars to the request, similar to hidden fields
                    params: {
                        option: "standardupload",
                        action: "uploadExternalDocument",
                        dir: datastore.directory,
                        requestType: "xmlhttprequest",
                        confirm: "true",
                        docUid: "-1",
                        appId: "00000000000000000000000000000000"
                    }
                });
            }';

    $itemA["buttons"][]=$buttonA;

    $buttonA=array();

    $buttonA["text"]= "btncancel";
    $buttonA["handler"]="function_standardupload_btncancel";
    $functionsToReplace["function_standardupload_btncancel"]=' function() { Ext.getCmp("dialog").destroy(); }';
    $itemA["buttons"][]=$buttonA;

    $uploadDocumentComponent["items"][]=$itemA;

    $itemA=array();

    $itemA["xtype"]="form";
    $itemA["id"]="transferform";
    $itemA["url"]="../appFolder/appFolderAjax.php";
    $itemA["hidden"]="true";
    $itemA["title"]="acttransfer";
    $itemA["autoHeight"]="true";
    $itemA["labelWidth"]=225;
    $itemA["frame"]= true;
    $itemA["items"]=array();


    for($i=0;$i<7;$i++) {
        $itemB=array();
        $itemB["xtype"]= "textfield";
        $itemB["fieldLabel"]= "url_to_file";
        $itemB["name"]= "userfile[$i]";
        $itemB["width"]=275;
        $itemA["items"][]=$itemB;
    }
    $itemB=array();
    $itemB["xtype"]="checkbox";
    $itemB["fieldLabel"]="overwrite_files";
    $itemB["name"]="overwrite_files";
    $itemB["checked"]=true;
    $itemA["items"][]=$itemB;

    $itemA["buttons"]=array();

    $buttonA=array();

    $buttonA["text"]="btnsave";
    $buttonA["handler"]="function_transfer_btnsave";
    $functionsToReplace["function_transfer_btnsave"]='function() {
                statusBarMessage( "transfer_processing", true );
                transfer = Ext.getCmp("transferform").getForm();
                transfer.submit({
                    //reset: true,
                    reset: false,
                    success: function(form, action) {
                        datastore.reload();
                        statusBarMessage( action.result.message, false, true );
                        Ext.getCmp("dialog").destroy();
                    },
                    failure: function(form, action) {
                        if( !action.result ) return;
                        Ext.MessageBox.alert("error", action.result.error);
                        statusBarMessage( action.result.error, false, false );
                    },
                    scope: transfer,
                    // add some vars to the request, similar to hidden fields
                    params: {
                        "option": "com_extplorer",
                        "action": "transfer",
                        "dir": datastore.directory,
                        "confirm": "true"
                    }
                });
            }';

    $itemA["buttons"]=$buttonA;

    $buttonA=array();
    $buttonA["text"]="btncancel";
    $buttonA["handler"]="function_transfer_btncancel";
    $functionsToReplace["function_transfer_btncancel"]='function() { Ext.getCmp("dialog").destroy(); }';
    $itemA["buttons"]=$buttonA;

    //         $uploadDocumentComponent["items"][]=$itemA;
     
    $finalResponse=G::json_encode($uploadDocumentComponent);
    $finalResponse=str_replace("URL_SCRIPT","../appFolder/appFolderAjax.php",$finalResponse);
    foreach($functionsToReplace as $key => $originalFunction){

        $finalResponse=str_replace('"'.$key.'"',$originalFunction,$finalResponse);
    }
    echo ($finalResponse);

    /*
     //krumo($_POST);
     G::LoadClass ( 'case' );
     $oCase = new Cases ( );

     $G_PUBLISH = new Publisher ( );
     $Fields ['DOC_UID'] = $_POST ['docID'];
     $Fields ['APP_DOC_UID'] = $_POST ['appDocId'];
     $Fields ['actionType'] = $_POST ['actionType'];
     $Fields ['docVersion'] = $_POST ['docVersion'];

     $Fields ['appId'] = $_POST ['appId'];
     $Fields ['docType'] = $_POST ['docType'];
     $G_PUBLISH->AddContent ( 'xmlform', 'xmlform', 'cases/cases_AttachInputDocumentGeneral', '', $Fields, 'appFolderSaveDocument?UID=' . $_POST ['docID'] . '&appId=' . $_POST ['appId'] . '&docType=' . $_POST ['docType'] );
     G::RenderPage ( 'publish', 'raw' );
     */
}

function copyAction(){
    $dir=$_REQUEST['dir'];
   $copyDialog["xtype"]="form";
   $copyDialog["id"]="simpleform";
   $copyDialog["labelWidth"]=125;
	$copyDialog["width"]=340;
	$copyDialog["url"]="URL_SCRIPT";
	$copyDialog["dialogtitle"]= "Copy/Move";
	$copyDialog["frame"]= true;
	$copyDialog["items"]=array();
	
	$itemField=array();
	$itemField["xtype"]="textfield";
    $itemField["fieldLabel"]="Destination";
    $itemField["name"]="new_dir";
    $itemField["value"]="$dir/";
    $itemField["width"]=175;
    $itemField["allowBlank"]=false;
    $copyDialog["items"][]=$itemField;
    
    
    
    $copyDialog["buttons"]=array();
    
    $itemButton=array();
    $itemButton["text"]= "Create";
    $itemButton["handler"]="copyDialogCreateButtonFunction";
    $functionsToReplace["copyDialogCreateButtonFunction"]="function() {
    		form =  Ext.getCmp('simpleform').getForm();
			statusBarMessage( 'Please wait...', true );
		    var requestParams = getRequestParams();
		    requestParams.confirm = 'true';
		    requestParams.action  = 'copyExecute';
		    form.submit({
		        //reset: true,
		        reset: false,
		        success: function(form, action) {
		        	statusBarMessage( action.result.message, false, true );
		        	try{
		        		dirTree.getSelectionModel().getSelectedNode().reload();
		        	} catch(e) {}
					datastore.reload();
					Ext.getCmp('dialog').destroy();
		        },
		        failure: function(form, action) {
		        	if( !action.result ) return;
					Ext.MessageBox.alert('Error!', action.result.error);
					statusBarMessage( action.result.error, false, false );
		        },
		        scope: form,
		        // add some vars to the request, similar to hidden fields
		        params: requestParams
		    });
		  }";
    $copyDialog["buttons"][]=$itemButton;
    
    $itemButton=array();
	$itemButton["text"]="Cancel";
	$itemButton["handler"]= "copyDialogCancelButtonFunction";
	$functionsToReplace["copyDialogCancelButtonFunction"]="function() { Ext.getCmp('dialog').destroy(); }";
	$copyDialog["buttons"][]=$itemButton;
	
	$finalResponse=G::json_encode($copyDialog);
    foreach($functionsToReplace as $key => $originalFunction){

        $finalResponse=str_replace('"'.$key.'"',$originalFunction,$finalResponse);
    }
    $finalResponse=str_replace("URL_SCRIPT","../appFolder/appFolderAjax.php",$finalResponse);
    echo ($finalResponse);

}

function documentVersionHistory(){

    $folderID = $_POST ['folderID'] != '0' ? $_POST ['folderID'] == 'NA' ? "" : $_POST ['folderID'] : $rootFolder;
    $folderContent = $oPMFolder->getFolderContent ( $folderID, array ($_POST ['appDocId'] ) );

    array_unshift ( $folderContent, array ('id' => 'char' ) );
    if (! is_array ( $folderContent )) {
        echo $folderContent;
        exit ();
    }

    $_DBArray ['PM_FOLDER_DOC_HISTORY'] = $folderContent;
    $_SESSION ['_DBArray'] = $_DBArray;

    G::LoadClass ( 'ArrayPeer' );
    $c = new Criteria ( 'dbarray' );
    $c->setDBArrayTable ( 'PM_FOLDER_DOC_HISTORY' );
    $c->addAscendingOrderByColumn ( 'id' );
    $G_PUBLISH = new Publisher ( );
    require_once ('classes/class.xmlfield_InputPM.php');

    $G_PUBLISH->AddContent ( 'propeltable', 'paged-table', 'appFolder/appFolderDocumentListHistory', $c, array ('folderID' => $_POST ['folderID'] != '0' ? $_POST ['folderID'] == 'NA' ? "/" : $_POST ['folderID'] : $rootFolder ) );

    G::RenderPage ( 'publish', 'raw' );

}

function uploadExternalDocument(){

    $response['action']=$_POST['action']. " - ".$_POST['option'];
    $response['error']="error";
    $response['message']="error";
    $response['success']=false;
    if(isset($_POST["confirm"]) && $_POST["confirm"]=="true") {
        //G::pr($_FILES);
        $uploadedInstances=count($_FILES['uploadedFile']['name']);
        $sw_error=false;
        $sw_error_exists=isset($_FILES['uploadedFile']['error']);
        $emptyInstances=0;
        $quequeUpload=array();
        // upload files & check for errors
        for($i=0;$i<$uploadedInstances;$i++) {
            $errors[$i]=NULL;
            $tmp = $_FILES['uploadedFile']['tmp_name'][$i];
            $items[$i] = stripslashes($_FILES['uploadedFile']['name'][$i]);
            if($sw_error_exists) $up_err = $_FILES['uploadedFile']['error'][$i];
            else $up_err=(file_exists($tmp)?0:4);


            if($items[$i]=="" || $up_err==4){
                $emptyInstances++;
                continue;
            }
            if($up_err==1 || $up_err==2) {
                $errors[$i]='miscfilesize';
                $sw_error=true;  continue;
            }
            if($up_err==3) {
                $errors[$i]='miscfilepart';
                $sw_error=true;  continue;
            }
            if(!@is_uploaded_file($tmp)) {
                $errors[$i]='uploadfile';
                $sw_error=true;  continue;
            }

            //The uplaoded files seems to be correct and ready to be uploaded. Add to the Queque
            $fileInfo=array("tempName"=>$tmp,"fileName"=>$items[$i]);
            $quequeUpload[]=$fileInfo;
        }
        //G::pr($quequeUpload);

        //Read. Instance Document classes
        if(!empty($quequeUpload)){
            $docUid=$_POST['docUid'];
            $appDocUid=isset($_POST['APP_DOC_UID'])?$_POST['APP_DOC_UID']:"";
            $docVersion=isset($_POST['docVersion'])?$_POST['docVersion']:"";
            $actionType=isset($_POST['actionType'])?$_POST['actionType']:"";
            $folderId=$_POST['dir']==""?"/":$_POST['dir'];
            $appId=$_POST['appId'];
            $docType=isset($_POST['docType'])?$_GET['docType']:"INPUT";
             
            //save info

            require_once ( "classes/model/AppDocument.php" );
            require_once ('classes/model/AppFolder.php');
            require_once ('classes/model/InputDocument.php');

            $oInputDocument = new InputDocument();
            if($docUid!=-1){
                $aID = $oInputDocument->load($docUid);
            }else{
                $oFolder=new AppFolder();
                $folderStructure=$oFolder->getFolderStructure($folderId);
                $aID=array('INP_DOC_DESTINATION_PATH'=>$folderStructure['PATH']);
            }


            $oAppDocument = new AppDocument();


            //Get the Custom Folder ID (create if necessary)
            $oFolder=new AppFolder();
            if($docUid!=-1){
                //krumo("jhl");
                $folderId=$oFolder->createFromPath($aID['INP_DOC_DESTINATION_PATH'],$appId);
                //Tags
                $fileTags=$oFolder->parseTags($aID['INP_DOC_TAGS'],$appId);
            }else{
                $folderId=$folderId;
                $fileTags="EXTERNAL";
            }

            foreach($quequeUpload as $key =>$fileObj){
                switch($actionType){
                    case "R": //replace
                        $aFields = array('APP_DOC_UID'     => $appDocUid,
                       'APP_UID'     => $appId,
                       'DOC_VERSION'     => $docVersion,
                     'DEL_INDEX'           => 1,
                     'USR_UID'             => $_SESSION['USER_LOGGED'],
                     'DOC_UID'             => $docUid,
                     'APP_DOC_TYPE'        => $docType,
                     'APP_DOC_CREATE_DATE' => date('Y-m-d H:i:s'),
                     'APP_DOC_COMMENT'     => isset($_POST['form']['APP_DOC_COMMENT']) ? $_POST['form']['APP_DOC_COMMENT'] : '',
                     'APP_DOC_TITLE'       => '',
                     'APP_DOC_FILENAME'    => $fileObj['fileName'],
                     'FOLDER_UID'          => $folderId,
                     'APP_DOC_TAGS'        => $fileTags);


                        $oAppDocument->update($aFields);
                        break;
                    case "NV": //New Version


                        $aFields = array('APP_DOC_UID'     => $appDocUid,
                       'APP_UID'     => $appId,

                     'DEL_INDEX'           => 1,
                     'USR_UID'             => $_SESSION['USER_LOGGED'],
                     'DOC_UID'             => $docUid,
                     'APP_DOC_TYPE'        => $docType,
                     'APP_DOC_CREATE_DATE' => date('Y-m-d H:i:s'),
                     'APP_DOC_COMMENT'     => isset($_POST['form']['APP_DOC_COMMENT']) ? $_POST['form']['APP_DOC_COMMENT'] : '',
                     'APP_DOC_TITLE'       => '',
                     'APP_DOC_FILENAME'    => $fileObj['fileName'],
                     'FOLDER_UID'          => $folderId,
                     'APP_DOC_TAGS'        => $fileTags);

                        $oAppDocument->create($aFields);
                        break;
                    default: //New
                        $aFields = array('APP_UID'     => $appId,
                     'DEL_INDEX'           => isset($_SESSION['INDEX'])?$_SESSION['INDEX']:1,
                     'USR_UID'             => $_SESSION['USER_LOGGED'],
                     'DOC_UID'             => $docUid,
                     'APP_DOC_TYPE'        => $docType,
                     'APP_DOC_CREATE_DATE' => date('Y-m-d H:i:s'),
                     'APP_DOC_COMMENT'     => isset($_POST['form']['APP_DOC_COMMENT']) ? $_POST['form']['APP_DOC_COMMENT'] : '',
                     'APP_DOC_TITLE'       => '',
                     'APP_DOC_FILENAME'    => $fileObj['fileName'],
                     'FOLDER_UID'          => $folderId,
                     'APP_DOC_TAGS'        => $fileTags);


                        $oAppDocument->create($aFields);
                        break;
                }


                $sAppDocUid = $oAppDocument->getAppDocUid();
                $iDocVersion = $oAppDocument->getDocVersion();
                $info = pathinfo( $oAppDocument->getAppDocFilename() );
                $ext = (isset($info['extension']) ? $info['extension'] : '');

                //save the file
                //    if (!empty($_FILES['form'])) {
                //      if ($_FILES['form']['error']['APP_DOC_FILENAME'] == 0) {
                $sPathName = PATH_DOCUMENT . $appId . PATH_SEP;
                $sFileName = $sAppDocUid . "_".$iDocVersion. '.' . $ext;
                G::uploadFile($fileObj['tempName'], $sPathName, $sFileName );

                //Plugin Hook PM_UPLOAD_DOCUMENT for upload document
                $oPluginRegistry =& PMPluginRegistry::getSingleton();
                if ( $oPluginRegistry->existsTrigger ( PM_UPLOAD_DOCUMENT ) && class_exists ('uploadDocumentData' ) ) {
                     
                    $oData['APP_UID']   = $appId;
                    $documentData = new uploadDocumentData (
                    $appId,
                    $_SESSION['USER_LOGGED'],
                    $sPathName . $sFileName,
                    $fileObj['fileName'],
                    $sAppDocUid
                    );

                    //$oPluginRegistry->executeTriggers ( PM_UPLOAD_DOCUMENT , $documentData );
                    //unlink ( $sPathName . $sFileName );
                }
                //end plugin
            }
        }

        if($sw_error) {          // there were errors
            $err_msg="";
            for($i=0;$i<$uploadedInstances;$i++) {
                if($errors[$i]==NULL) continue;
                $err_msg .= $items[$i]." : ".$errors[$i]."\n";
            }

            $response['error']=$err_msg;
            $response['message']=$err_msg;
            $response['success']=false;
        }elseif($emptyInstances==$uploadedInstances){
            $response['error']="You may upload at least one file";
            $response['message']="You may upload at least one file";
            $response['success']=false;
        }else{
            $response['error']="Upload complete";
            $response['message']="Upload complete";
            $response['success']=true;


        }





    }

    print_r(G::json_encode($response));
    /*
     G::LoadClass ( 'case' );
     $oCase = new Cases ( );

     $G_PUBLISH = new Publisher ( );
     $Fields ['DOC_UID'] = "-1";

     $Fields ['appId'] = "00000000000000000000000000000000";

     $G_PUBLISH->AddContent ( 'xmlform', 'xmlform', 'cases/cases_AttachInputDocumentGeneral', '', $Fields, 'appFolderSaveDocument?UID=-1&appId=' . $Fields ['appId'] . "&folderId=" . $_POST ['folderID'] );
     G::RenderPage ( 'publish', 'raw' );
     */
}

function newFolder(){
    //G::pr($_POST);
    if($_POST ['dir']=="") $_POST ['dir']="/";
    $folderStructure = $oPMFolder->getFolderStructure ( $_POST ['dir'] );
    //G::pr($folderStructure);
    $folderPath = $folderStructure ['PATH'];
    $parentUid = $_POST ['dir'];
    $folderUid = G::GenerateUniqueID ();
     
    $formNewFolder=array();
     

    $formNewFolder["xtype"]="form";
    $formNewFolder["id"]= "simpleform";
    $formNewFolder["labelWidth"]=125;
    $formNewFolder["url"]="../appFolder/appFolderAjax.php";
    $formNewFolder["dialogtitle"]= "Create New Folder";
    $formNewFolder["frame"]= true;
    $formNewFolder["items"]= array();



    $field=array();
    $field["xtype"]= "label";
    $field["fieldLabel"]= "Path";
    $field["name"]= "form[FOLDER_PATH]";
    $field["id"]= "form[FOLDER_PATH]";
    $field["width"]=175;
    $field["allowBlank"]=false;
    $field["value"]=$folderPath;
    $field["text"]=$folderPath;
    $formNewFolder["items"][]= $field;

    $field=array();
    $field["xtype"]= "hidden";
    $field["fieldLabel"]= "Uid";
    $field["name"]= "form[FOLDER_UID]";
    $field["id"]= "form[FOLDER_UID]";
    $field["width"]=175;
    $field["allowBlank"]=false;
    $field["value"]=$folderUid;
    $formNewFolder["items"][]= $field;

    $field=array();
    $field["xtype"]= "hidden";
    $field["fieldLabel"]= "Parent";
    $field["name"]= "form[FOLDER_PARENT_UID]";
    $field["id"]= "form[FOLDER_PARENT_UID]";
    $field["width"]=175;
    $field["allowBlank"]=false;
    $field["value"]=$parentUid;
    $formNewFolder["items"][]= $field;

    $field=array();
    $field["xtype"]= "textfield";
    $field["fieldLabel"]= "Name";
    $field["name"]= "form[FOLDER_NAME]";
    $field["id"]= "form[FOLDER_NAME]";
    $field["width"]=175;
    $field["allowBlank"]=false;
    $formNewFolder["items"][]= $field;


    $formNewFolder["buttons"]= array();


     
    $button=array();
    $button["text"]= "Create";
    $button["handler"]= 'handlerCreate';
    $formNewFolder["buttons"][]= $button;

    $button=array();
    $button["text"]= "Cancel";
    $button["handler"]= 'handlerCancel';
    $formNewFolder["buttons"][]= $button;

    $handlerCreate='function() {
                statusBarMessage( "Please wait...", true );
                Ext.getCmp("simpleform").getForm().submit({
                    //reset: true,
                    reset: false,
                    success: function(form, action) {
                        statusBarMessage( action.result.message, false, true );
                        try{
                            dirTree.getSelectionModel().getSelectedNode().reload();
                        } catch(e) {}
                        datastore.reload();
                        Ext.getCmp("dialog").destroy();
                    },
                    failure: function(form, action) {
                        if( !action.result ) return;
                        Ext.Msg.alert("Error!", action.result.error);
                        statusBarMessage( action.result.error, false, false );
                    },
                    scope: Ext.getCmp("simpleform"),
                    // add some vars to the request, similar to hidden fields
                    params: {option: "new",
                            action: "appFolderSave",
                            dir: datastore.directory,
                            confirm: "true"}
                })
            }';

    $handlerCancel='function() { Ext.getCmp("dialog").destroy(); }';

    $response=G::json_encode($formNewFolder);
    //This will add the functions to the Json response without quotes!
    $response=str_replace('"handlerCreate"',$handlerCreate,$response);
    $response=str_replace('"handlerCancel"',$handlerCancel,$response);
    print_r($response);
     
    /*
     $oFolder = new AppFolder ( );
     $folderStructure = $oPMFolder->getFolderStructure ( $_POST ['folderID'] );
     $Fields ['FOLDER_PATH'] = $folderStructure ['PATH'];
     $Fields ['FOLDER_PARENT_UID'] = $_POST ['folderID'];
     $Fields ['FOLDER_UID'] = G::GenerateUniqueID ();
     $G_PUBLISH = new Publisher ( );

     $G_PUBLISH->AddContent ( 'xmlform', 'xmlform', 'appFolder/appFolderEdit', '', $Fields, 'appFolderSave' );
     G::RenderPage ( 'publish', 'raw' );
     */
}

function appFolderSave(){
    $form = $_POST['form'];
    $FolderUid = $form['FOLDER_UID'];
    $FolderParentUid = $form['FOLDER_PARENT_UID'];
    $FolderName = $form['FOLDER_NAME'];
    $FolderCreateDate = 'now';
    $FolderUpdateDate = 'now';
    $response['action']=$_POST['action']. " - ".$_POST['option'];
    $response['error']="error";
    $response['message']="error";
    $response['success']=false;
    $folderCreateResponse = $oPMFolder->createFolder ( $FolderName, $FolderParentUid, "new" );

    $response=array_merge($response,$folderCreateResponse);

    print_r(G::json_encode($response));


}

function documentInfo(){
    $oFolder = new AppFolder ( );
    $Fields = $oPMFolder->getCompleteDocumentInfo ( $_POST ['appId'], $_POST ['appDocId'], $_POST ['docVersion'], $_POST ['docID'], $_POST ['usrUid'] );
    $G_PUBLISH = new Publisher ( );

    $G_PUBLISH->AddContent ( 'xmlform', 'xmlform', 'appFolder/appFolderDocumentInfo', '', $Fields, '' );
    G::RenderPage ( 'publish', 'raw' );

}

function documentdelete(){
    include_once ("classes/model/AppDocument.php");
    $oAppDocument = new AppDocument ( );
    $oAppDocument->remove($_POST['sFileUID'],$_POST['docVersion']);
    /*we need to delete fisicaly the file use the follow code
     $appId= "00000000000000000000000000000000";
     $sPathName = PATH_DOCUMENT . $appId . PATH_SEP;
     unlink($sPathName.$_POST['sFileUID'].'_1.jpg');*/
}

function deletePMFolder(){
    include_once ("classes/model/AppFolder.php");
    $oAppFoder = new AppFolder ( );
    $oAppFoder->remove($_POST['sFileUID'],$_POST['rootfolder']);

}

function getMime($fileName){
    $fileName=basename($fileName);
    $fileNameA=explode(".",$fileName);
    $return['description']=G::LoadTranslation("MIME_DES_DOCUMENT");
    $return['icon']="/images/documents/extension/document.png";
    if(count($fileNameA)>1){
        $extension=$fileNameA[count($fileNameA)-1];
        $return['description']=G::LoadTranslation("MIME_DES_".strtoupper($extension));
        $return['icon']="/images/documents/extension/".strtolower($extension).".png";
    }
    return $return;
}

function get_max_file_size() {          // get php max_upload_file_size
    return calc_php_setting_bytes( ini_get("upload_max_filesize") );
}

function get_max_upload_limit() {
    return calc_php_setting_bytes( ini_get('post_max_size'));
}

function calc_php_setting_bytes( $value ) {
    if(@eregi("G$",$value)) {
        $value = substr($value,0,-1);
        $value = round($value*1073741824);
    } elseif(@eregi("M$",$value)) {
        $value = substr($value,0,-1);
        $value = round($value*1048576);
    } elseif(@eregi("K$",$value)) {
        $value = substr($value,0,-1);
        $value = round($value*1024);
    }

    return $value;
}

function get_abs_item($dir, $item) {        // get absolute file+path
    if( is_array( $item )) {
        // FTP Mode
        $abs_item = '/' . get_abs_dir($dir)."/".$item['name'];
        if( get_is_dir($item)) $abs_item.='/';
        return extPathName($abs_item);
    }
    return extPathName( get_abs_dir($dir)."/".$item );
}

function extPathName($p_path,$p_addtrailingslash = false) {
    $retval = "";

    $isWin = (substr(PHP_OS, 0, 3) == 'WIN');

    if ($isWin) {
        $retval = str_replace( '/', '\\', $p_path );
        if ($p_addtrailingslash) {
            if (substr( $retval, -1 ) != '\\') {
                $retval .= '\\';
            }
        }

        // Check if UNC path
        $unc = substr($retval,0,2) == '\\\\' ? 1 : 0;

        // Remove double \\
        $retval = str_replace( '\\\\', '\\', $retval );

        // If UNC path, we have to add one \ in front or everything breaks!
        if ( $unc == 1 ) {
            $retval = '\\'.$retval;
        }
    } else {
        $retval = str_replace( '\\', '/', $p_path );
        if ($p_addtrailingslash) {
            if (substr( $retval, -1 ) != '/') {
                $retval .= '/';
            }
        }

        // Check if UNC path
        $unc = substr($retval,0,2) == '//' ? 1 : 0;

        // Remove double //
        $retval = str_replace('//','/',$retval);

        // If UNC path, we have to add one / in front or everything breaks!
        if ( $unc == 1 ) {
            $retval = '/'.$retval;
        }
    }

    return $retval;
}