<?php
 define('IN_DAEM', true); include_once '../includes/init.php'; $g_id = ceil($_POST['g_id']); $g_name = trim($_POST['g_name']); $g_description = trim($_POST['g_description']); if ($g_id > 0) { if ($g_name == '' || $g_description == '') { $db->close(); gourl('缺少关键参数。','',-1); } $sql = "update ".DB_DAEMDB.".".TB_SUFFIX."db_admingroup set g_name='".$g_name."',g_description='".$g_description."' where g_id='".$g_id."'"; $db->query($sql); writerecord($_SESSION['UserId'],'修改群组！',$g_name); $db->close(); gourl('群组修改成功。','group_list.php'); } else { if ($g_name == '' || $g_description == '') { $db->close(); gourl('缺少关键参数。','',-1); } $sql = "insert into ".DB_DAEMDB.".".TB_SUFFIX."db_admingroup(g_name,g_description) value('".$g_name."','".$g_description."')"; $db->query($sql); writerecord($_SESSION['UserId'],'添加群组！',$g_name); $db->close(); gourl('群组添加成功。','group_list.php'); } 