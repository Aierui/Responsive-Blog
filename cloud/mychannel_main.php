<?php
require_once(dirname(__FILE__)."/config.php");
CheckPurview('c_List');
require_once(DEDEINC.'/datalistcp.class.php');
setcookie("ENV_GOBACK_URL",$dedeNowurl,time()+3600,"/");

$sql = "SELECT id,nid,typename,addtable,isshow,issystem FROM `#@__channeltype` ORDER BY id DESC";
$dlist = new DataListCP();
$dlist->SetTemplet(DEDEADMIN."/templets/mychannel_main.htm");
$dlist->SetSource($sql);
$dlist->display();

function GetSta($sta,$id)
{
    if($sta==1)
    {
        return ($id!=-1 ? "启用  &gt; <a href='mychannel_edit.php?dopost=hide&id=$id'><u>禁用</u></a>" : "固定项目");
    }
    else
    {
        return "禁用 &gt; <a href='mychannel_edit.php?dopost=show&id=$id'><u>启用</u></a>";
    }
}

function IsSystem($s)
{
    return $s==1 ? "系统" : "自动";
}