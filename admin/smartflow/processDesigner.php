﻿<?php
 define('IN_DAEM', true); include '../includes/init.php'; $templateDefineAry = array(); $sql = "select * from excel_template_struct"; $query = $db->query($sql); while ($row = $db->fetch_array($query)) { $templateDefineAry[$row["id"]] = $row["name"]; } $processDataAry = array(); $processId = $_GET["id"]; if (empty($processId)) { gourl("未找到对应的流程信息!请先创建流程信息后再进行设计!","",-1); } $sql = "select * from process_management WHERE id = '" . $processId . "'"; $result = $db->query_first($sql); $processDataAry = $result; if(!empty($_POST)) { $dataPostAry = $_POST; $ele_id = $_POST["ele_id"]; if($_GET["type"]=="node") { if (empty($ele_id)) { echo "缺少ele_id";die; } $nodeConfigAry = json_decode($processDataAry["node_property_config"],true); $nodeConfigAry[$ele_id] = array('ele_table'=>$_POST["ele_table"],'ele_gateway'=>$_POST["ele_gateway"],'ele_role'=>$_POST["ele_role"]); $nodeConfigJson = _json_encode($nodeConfigAry); $sql = "update process_management set node_property_config = '".$nodeConfigJson."' where id = '".$processId."'"; $res = $db->query($sql); if($res) { echo "配置节点属性成功!";die; } else { echo "配置节点属性失败!";die; } } elseif($_GET["type"]=="SaveProcess") { $configData2 = _json_encode($_POST); $configData2 = str_replace("\n","",$configData2); $configData2 = str_replace(array("\"true\"","\"false\""),array("true","false"),$configData2); $sql = "update process_management set config_data = '".$configData2."' where id = '".$processId."'"; $res = $db->query($sql); if($res) { echo "更新流程成功!";die; } else { echo "更新流程失败!";die; } } } include template();