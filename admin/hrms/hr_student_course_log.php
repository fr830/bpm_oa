<?php
 define('IN_DAEM', true); include '../includes/init.php'; $userAry = get_user_realname(); $studentInfoAry = get_student_info(); $courseInfoAry = get_course_info('',FALSE); $startDate = date('Y-m-01'); $endDate = date('Y-m-t'); if (!check_user_group($_SESSION['UserName'], '1')) { $cidStr = ''; $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."hr_course_info where teacher_account = '".$_SESSION['UserName']."'"; $query - $db->query($sql); while ($row = $db->fetch_array($query)) { $cidStr .= "'".$row['cid']."',"; } $cidStr = trim($cidStr,','); if (empty($cidStr)) $cidStr = "''"; $cond .= " and cid in (".$cidStr.")"; } if (!empty($_GET['submit'])) { $cid = $_GET['cid']; $course_name = trim($_GET['course_name']); $sign_key = trim($_GET['sign_key']); $student = $_GET['student']; $startDate = empty($_GET['startDate']) ? date('Y-m-01') : $_GET['startDate']; $endDate = empty($_GET['endDate']) ? date('Y-m-t') : $_GET['endDate']; $cond = ''; if (!empty($cid)) { $cond .= " and cid = '".$cid."'"; } if (!empty($course_name)) { $cidStr = ''; $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."hr_course_info where  course_name like '%".$course_name."%'"; $query - $db->query($sql); while ($row = $db->fetch_array($query)) { $cidStr .= "'".$row['cid']."',"; } $cidStr = trim($cidStr,','); $cond .= " and cid in (".$cidStr.")"; } if (!empty($sign_key)) { $cond .= " and sign_key = '".$sign_key."'"; } if (!empty($student)) { $sidStr = ''; $sql = "select sid from ".DB_DAEMDB.".".TB_SUFFIX."hr_student where name like '%".$student."%'"; $query = $db->query($sql); while ($row = $db->fetch_array($query)) { $sidStr .= "'".$row['sid']."',"; } $sidStr = trim($sidStr,','); $cond .= " and sid in (".$sidStr.")"; } if (!check_user_group($_SESSION['UserName'], '1')) { $cidStr = ''; $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."hr_course_info where teacher_account = '".$_SESSION['UserName']."'"; $query - $db->query($sql); while ($row = $db->fetch_array($query)) { $cidStr .= "'".$row['cid']."',"; } $cidStr = trim($cidStr,','); if (empty($cidStr)) $cidStr = "''"; $cond .= " and cid in (".$cidStr.")"; } } $dataAry = array(); $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."hr_student_course_record 
		where unix_timestamp(course_date) between '".strtotime($startDate)."' and '".strtotime($endDate)."' ".$cond."
		order by unix_timestamp(course_date) desc,create_time desc"; $query = $db->query($sql); $i = 0; while ($row = $db->fetch_array($query)) { $dataAry[$i] = $row; $dataAry[$i]['duration'] = floor((strtotime($row['endTime'])-strtotime($row['startTime']))/60); if ($row['application_status']=='2') { if ($row['absence']=='2') { $totalDuration += $dataAry[$i]['duration']; $totalDurationConvert = number_format($totalDuration/60,1); } } $i++; } include template(); 