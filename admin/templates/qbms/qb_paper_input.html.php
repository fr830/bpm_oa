<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$webtitle}</title>
<link href="../css/application.css" media="screen" rel="stylesheet" type="text/css" />

<!-- 设置打印的样式 -->
<link rel="stylesheet" media="print" type="text/css" href="../css/print.css" />

<script type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
<script type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="../js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../js/ueditor/ueditor.all.js"></script>
<script type="text/javascript" src="../js/mathjax/MathJax.js?config=AM_HTMLorMML-full"></script>
<script type="text/javascript" src="../js/jsAddress.js"></script>
<script type="text/javascript" src="../js/ajaxfileupload.js"></script>
<script type="text/javascript" src="../js/showtipinfo.js"></script>

<script language="javascript">
	$(document).ready(function(){
		//激活ueditor
		window.UEDITOR_HOME_URL = "/pms/admin/js/";
		var editor = new UE.ui.Editor();
		editor.render("myEditor");

		var editor1 = new UE.ui.Editor();
		editor1.render("myEditor1");

		var editor2 = new UE.ui.Editor();
		editor2.render("myEditor2");
	});
</script>
</head>

<body class="controller-my action-page">
<div id="wrapper">
<div id="wrapper2">
<div class="nosidebar" id="main">
    <div id="sidebar"></div>

    <div id="content">
    	<!-- style="position:fixed;width:49%;float:left;" -->
		<div id="list-left" class="splitcontentleft"  >
 			<div class="mypage-box">
    			<h3>试卷录入管理器
<!--    				<a>[隐藏]</a> -->
    				<a id="u_paper_a" onclick="update_paper_attribute();" style="color:red;background-color:#FFFFDD;">[试卷属性]</a> 
    				<a id="u_question_a" onclick="update_question_content();">[试题内容]</a>
    				<a id="divTipAbrand1" onMouseOver="showTipsInfo('divTip1','divTipAbrand1')" onClick="return false;" onMouseOut="hideTipsInfo('divTip1')" style="float:right;color:green;">asciiML公式提示</a>
    				
    				
    				<div id=divTip1 onMouseOver="showTipsInfo('divTip1','divTipAbrand1');" onMouseOut="hideTipsInfo('divTip1');">
    					<table>
    						<thead>
    							<tr>
    								<td>公式</td>
    								<td>结果</td>
    							</tr>
    						</thead>
    						<tbody>
    							<tr>
    								<td>A_1,B_2,C_3</td>
    								<td>`A_1,B_2,C_3`</td>
    							</tr>
    							<tr>
    								<td>~=,~~,sum,prod,+-,_|_</td>
    								<td>`~=,~~,sum,prod,+-,_|_`</td>
    							</tr>
    							<tr>
    								<td>x = sqrt((-b +- b^2-4ac)/(2a)) .</td>
    								<td>`x = sqrt((-b +- b^2-4ac)/(2a)) .`</td>
    							</tr>
    							<tr>
    								<td>{:{(x=1+2),(y=a+b):} </td>
    								<td>`{:{(x=1+2),(y=a+b):}` </td>
    							</tr>
    							<tr>
    								<td>{:(x=1+2),(y=a+b):}</td>
    								<td>`{:(x=1+2),(y=a+b):}`</td>
    							</tr>
    							<tr>
    								<td>{:((x=1),(y=a+b):}</td>
    								<td>`{:((x=1),(y=a+b):}`</td>
    							</tr>
    							<tr>
    								<td>(:(x=1),(y=a+b):}</td>
    								<td> `(:(x=1),(y=a+b):}`</td>
    							</tr>
    						</tbody>
    					</table>
					</div>
					
					
    			</h3>
				<form action="" method="post">
				<div id="paper_attribute" class="box" >
			        <fieldset class="tabular"><legend>试卷属性</legend>
			        <div id="all_attributes">
			        	<p>
							<label>试卷名<span class="required"> *</span></label>
							<input type="text" id="title" name="title" size="40" value="{$title}" />
						</p>
						
						<div id="attributes" class="attributes">
							<div class="splitcontent">
								<div class="splitcontentleft">
									<p>
										<label>科目类型<span class="required"> *</span></label>
										{get_section('subject_type',$DefineSubjectType,$subject_type,$ary_first=array(''),'subject_type')}
									</p>
									<p>
										<label>学期<span class="required"> *</span></label>
										{get_section('term',$DefineTermType,$term,$ary_first=array(''),'term')}
									</p>
									<p>
										<label>教材版本<span class="required"> *</span></label>
										{get_section('textbook_version',$DefineTextbookVersion,$textbook_version,$ary_first=array(''),'textbook_version')}
									</p>
									<p>
										<label>学校<span class="required"> *</span></label>
										{get_section('school',$DefineSchoolAry,$school,$ary_first=array(''),'school')}
									</p>
									<p>
										<label>出题人/出处</label>
										<input type="text" id="author" name="author" size="8" value="{$author}" />
									</p>
									<p>
										<label>难度系数</label>
										<span style="color:blue;">{$p_degree}</span>
									</p>
								</div>
							
								<div class="splitcontentright">
									<p>
										<label>年级<span class="required"> *</span></label>
										{get_section('grade',$DefineGradeAry,$grade,$ary_first=array(''),'grade')}
									</p>
									<p>
										<label>年份<span class="required"> *</span></label>
										<input type="text" id="year" name="year" value="{$year}" onClick="WdatePicker({dateFmt:'yyyy'})" class="Wdate">
									</p>
									<p>
										<label>地区<span class="required"> *</span></label>
										<select id="province" name="province" style="width:30%"></select>
										<select id="city" name="city" style="width:30%"></select>
										<select id="area" name="area" style="width:30%"></select>
									</p>
									<p>
										<label>考试时间</label>
										<input type="text" id="test_time" name="test_time" size="8" value="{$test_time}" />
									</p>
									<p>
										<label>满分</label>
										<input type="text" id="total_score" name="total_score" size="8" value="{$total_score}" />
									</p>
									<p>
										<label>试卷录入人</label>
										<span style="color:blue;">{$userAry[$editor]}</span>
									</p>
								</div>
							</div>
						</div>
						
				
						<p>
						  <label>试卷备注</label>
						  <a href="#" ><img alt="Edit" src="../images/edit.png" /></a>
						  <span style="color:red;">插入数学公式请使用``(半角-反引号)包围公式部分</span>
						  <span id="issue_description_and_toolbar" style="display:none">
						    <div class="jstEditor">
						    		<textarea cols="40" rows="10" style="height:100px;" name="myEditor" id="myEditor">{$detail}</textarea>
						    </div>
						    <div class="jstHandle"></div>
						  </span>
						</p>
						
						<input type="hidden" id="paper_pid" name="paper_pid" value="{$pid}" />
						<input type="hidden" id="tty" name="tty" value="pa" />
<!--						<input id="submit" name="submit" value="提交试卷属性" type="submit" />-->
						<input type="button" name="test" onclick="ajax_submit_paper_attribute();" value="提交试卷属性" />
			        </div>
			        </fieldset>
			    </div>
			    </form>
			    
			    <form action="" method="post"  enctype='multipart/form-data'>
			    <div id="question_content" class="box" style="display:none;">
			        <fieldset class="tabular"><legend>题目属性</legend>
			        <div id="all_attributes">
						<div id="attributes" class="attributes">
							<div class="splitcontent">
								<div class="splitcontentleft">
									<p>
										<label>难度系数<span class="required"> *</span></label>
										<input type="text" id="q_degree" name="q_degree" size="8" value="{$q_degree}" />1/2/3/4/5
									</p>
									<p>
										<label>章节<span class="required"> *</span></label>
										{get_section('chapter',$DefineChapterAry,$chapter,$ary_first=array(''),'chapter')}
									</p>
									<p>
										<label>题目类型<span class="required"> *</span></label>
										{get_section('question_type',$DefineQuestionTypeAry,$question_type,$ary_first=array(''),'question_type')}
									</p>
									<p>
										<label><span style="color:red;">知识点(标签/索引)</span></label>
										<input type="text" id="q_index" name="q_index" size="30" /><br />
										<span>多个知识点用分号';'隔开</span>
									</p>
								</div>
							
								<div class="splitcontentright">
									<p>
										<label>录入人:</label>
										<span style="color:blue;">{$userAry[$editor]}</span>
									</p>
									<p>
										<label>分值<span class="required"> *</span></label>
										<input type="text" id="score" name="score" size="8" />
									</p>
									<p></p>
									<p>
										<!-- 依据题目的类型，结合序号组合试卷 -->
										<label>题目-试卷序号<span class="required"> *</span></label>
										<input type="text" id="order_seed" name="order_seed" size="8" />
									</p>
								</div>
							</div>
						</div>
						
				
						<p>
							<label>试题内容<span class="required"> *</span></label>
						  	<a href="#" ><img alt="Edit" src="../images/edit.png" /></a>
						  	<span id="issue_description_and_toolbar" style="display:none">
							    <div class="jstEditor">
							    	<textarea cols="40" rows="10" style="height:100px;" name="myEditor1" id="myEditor1">{$question_content}</textarea>
							    </div>
							    <div class="jstHandle"></div>
						  	</span>
						</p>
						
						<p>
							<label>题目附加图片路径</label>
							<span id="divPreview">
								<input type='file' name='fileQst' id='fileQst' onchange="PreviewImage(this,'icon_img','divPreview');" />
							</span>
							<img class="border-radius-5" src="" alt="" id="icon_img" width="120px" style="margin-left:12%;"/>
						</p>
						
						<p>
							<label>选项A</label>
							<input type="text" id="optionA" name="optionA" size="30" />
							
							<span id="divOptionA">
								<input type='file' name='fileOptionA' id='fileOptionA' onchange="PreviewImage(this,'optionImgA','divOptionA');" />
							</span>
							<img class="border-radius-5" src="" alt="" id="optionImgA" width="120px" style="margin-left:12%;"/>
						</p>
						<p>
							<label>选项B</label>
							<input type="text" id="optionB" name="optionB" size="30" />
							
							<span id="divOptionB">
								<input type='file' name='fileOptionB' id='fileOptionB' onchange="PreviewImage(this,'optionImgB','divOptionB');" />
							</span>
							<img class="border-radius-5" src="" alt="" id="optionImgB" width="120px" style="margin-left:12%;"/>
						</p>
						<p>
							<label>选项C</label>
							<input type="text" id="optionC" name="optionC" size="30" />
							
							<span id="divOptionC">
								<input type='file' name='fileOptionC' id='fileOptionC' onchange="PreviewImage(this,'optionImgC','divOptionC');" />
							</span>
							<img class="border-radius-5" src="" alt="" id="optionImgC" width="120px" style="margin-left:12%;"/>
						</p>
						<p>
							<label>选项D</label>
							<input type="text" id="optionD" name="optionD" size="30" />
							
							<span id="divOptionD">
								<input type='file' name='fileOptionD' id='fileOptionD' onchange="PreviewImage(this,'optionImgD','divOptionD');" />
							</span>
							<img class="border-radius-5" src="" alt="" id="optionImgD" width="120px" style="margin-left:12%;"/>
						</p>
						
						<p>
							<label>正确答案<span class="required"> *</span></label>
							<input type="text" id="right_answer" name="right_answer" value="{$right_answer}" size="30" />
						</p>
						<p>
						  <label>答案参考及解析</label>
						  <a href="#" ><img alt="Edit" src="../images/edit.png" /></a>
						  <span id="issue_description_and_toolbar" style="display:none">
						    <div class="jstEditor">
						    	<textarea cols="40" rows="10" style="height:100px;" name="myEditor2" id="myEditor2">{$answer_analyze}</textarea>
						    </div>
						    <div class="jstHandle"></div>
						  </span>
						</p>
						
						<input type="hidden" id="question_pid" name="question_pid" value="{$pid}" />
						<input type="hidden" id="qid" name="qid" value="" />
						
						<input type="hidden" id="tty" name="tty" value="qa" />
<!--						<input id="submit" name="submit" value="提交试题信息" type="submit" />-->
						<input type="button" value="提交试题信息" onclick="ajax_submit_question_attribute();" />
						<input type="button" value="删除试题" onclick="ajax_del_question_attribute();" />
			        </div>
			        </fieldset>
			    </div>
			    
				</form>
			</div>
			
		</div>

		<div id="list-right" class="splitcontentright">
			<div class="mypage-box">
    		<h3>试卷预览 #{$pid} <!-- <a>[录入管理器]</a> --></h3>
			<form action="" method="post">
			<table class="list issues">
			<thead>
				<tr>
			    	<th style="text-align:left;">操作：
			    		<a onclick="preview();">[打印]</a> 
			    		<a>[导出到TFR]</a>  
			    		<a onclick="hide_parse();">[隐藏答案及解析]</a>
			    		<a onclick="show_parse();">[显示答案及解析]</a>
			    	</th>
			    </tr>
		    </thead>
		    <tbody></tbody>
			</table>
			
			<!--startprint-->
			
			<!-- 试卷的页眉部分  -->
			<div id="page-header">
				<img src="../images/header_logo.png" width="200" border="0" />
				<span style="color:#339900;font-size:11px;text-align:right;padding-left:100px;">
					<strong>晨曦教育-中小学课外辅导卓著机构 www.doumen123.com</strong>
				</span>
				<hr size="1" />
			</div>
			
			<!-- 试卷头部描述信息 -->
			<div id="paper-header">
		  		<!-- <a>修改</a> -->
		  		<div id="paper-title">{$result['title']}<br />{$DefineSubjectType[$result['subject_type']]}试卷</div>
		  		<div id="paper-header-attribute">
			  		<div>完成时间：{$result['test_time']}分钟</div>
					<div>总分：{$result['total_score']}分</div>
				</div>
			</div>
			
			<div id="question-div">
			
			<?php $iCount=1;?>
			{loop $questionTypeAry $qTypeSeedKey=>$depth1Ary}
				{loop $depth1Ary $qTypeKey=>$depth2Ary}
					<!-- 题目类型信息 -->
					<div id="paper-question-type">
						{$DefineNumZhnAry[$qTypeSeedKey]}.{$DefineQuestionTypeAry[$qTypeKey]}
						(本题共{count($questionTypeAry[$qTypeSeedKey][$qTypeKey]['qid'])}小题，满分{$questionTypeAry[$qTypeSeedKey][$qTypeKey]['totalScore']}分)
					</div>
					
					{if $questionTypeAry[$qTypeSeedKey][$qTypeKey]['qid']}
					{loop $questionTypeAry[$qTypeSeedKey][$qTypeKey]['qid'] $key=>$val}
					<!-- 题目内容 -->
						<div id="paper-question-content">
						{$iCount}<span class="update-question-info-{$iCount}"><a onclick="update_question_info('{$pid}','{$val}');">(校正)</a></span>.{$dataAry[$val]['question_content']}
					  		
							<!-- 图片链接非空时加载输出 -->
					  		{if !empty($dataAry[$val]['question_img_path'])}
					  		<div id="paper-question-img">
					  			<img align="right" width="" src="{$dataAry[$val]['question_img_path']}"></img>
					  		</div>
					  		{/if}
						  	
						  	<!-- 选择题输出选项，填空，解答题或者不输出 -->
						  	{if !empty($dataAry[$val]['optionA'])}
					  		<div id="paper-question-answer">A.{$dataAry[$val]['optionA']}</div>
					  			<!-- @todo 处理选项中的图片输出部分 -->
					  			{if !empty($dataAry[$val]['a_option_img_path'])}
					  			<div id="paper-question-img">
						  			<img align="right" width="" src="{$dataAry[$val]['a_option_img_path']}"></img>
						  		</div>
					  			{/if}
					  		{/if}
					  		
					  		{if !empty($dataAry[$val]['optionB'])}
					  		<div id="paper-question-answer">B.{$dataAry[$val]['optionB']}</div>
					  			<!-- @todo 处理选项中的图片输出部分 -->
					  			{if !empty($dataAry[$val]['b_option_img_path'])}
					  			<div id="paper-question-img">
						  			<img align="right" width="" src="{$dataAry[$val]['b_option_img_path']}"></img>
						  		</div>
					  			{/if}
					  		{/if}
					  		
					  		{if !empty($dataAry[$val]['optionC'])}
					  		<div id="paper-question-answer">C.{$dataAry[$val]['optionC']}</div>
					  			<!-- @todo 处理选项中的图片输出部分 -->
					  			{if !empty($dataAry[$val]['c_option_img_path'])}
					  			<div id="paper-question-img">
						  			<img align="right" width="" src="{$dataAry[$val]['c_option_img_path']}"></img>
						  		</div>
					  			{/if}
					  		{/if}
					  		
					  		{if !empty($dataAry[$val]['optionD'])}
					  		<div id="paper-question-answer">D.{$dataAry[$val]['optionD']}</div>
					  			<!-- @todo 处理选项中的图片输出部分 -->
					  			{if !empty($dataAry[$val]['d_option_img_path'])}
					  			<div id="paper-question-img">
						  			<img align="right" width="" src="{$dataAry[$val]['d_option_img_path']}"></img>
						  		</div>
					  			{/if}
					  		{/if}
						</div>
						<!-- 答案内容及解析 -->
						<div id="paper-answer-content" class="paper-answer-content-{$iCount}">
							正确答案：{$dataAry[$val]['right_answer']}
					  		
					  		<!-- 解析不为空则输出解析内容 -->
					  		{if !empty($dataAry[$val]['answer_analyze'])}
						  		<div id="paper-answer-analysis">
						  			{$dataAry[$val]['answer_analyze']}
						  		</div>
					  		{/if}
						</div>
					<?php $iCount++;?>
					{/loop}
					{/if}
					
				{/loop}
			{/loop}
			
			</div>
			
			<!--endprint-->
			
			</form>
			</div>
		</div>
		
	</div>
</div>

<div id="footer">
  <div class="bgl"><div class="bgr">
    Powered by mlight <a href="">MLight</a> © 2013-2015 YueFeng Leung
  </div></div>
</div>
</div>
</div>

<script type="text/javascript">
//初始化地区市三级联动效果
addressInit('province', 'city', 'area', "{$province}", "{$city}", "{$area}");

//隐藏显示试卷的答案
function hide_parse()
{
	<?php for ($k=1;$k<=$iCount;$k++){?>
		$(".paper-answer-content-{$k}").hide();
	<?php }?>
}
function show_parse()
{
	<?php for ($k=1;$k<=$iCount;$k++){?>
		$(".paper-answer-content-{$k}").show();
	<?php }?>
}

//隐藏试题的校正项用于打印排版
function hide_question_update(){
	<?php for ($k=1;$k<=$iCount;$k++){?>
		$(".update-question-info-{$k}").hide();
	<?php }?>
}

//控制左侧录入管理器的隐藏显示
function control_manager_panel(sign){
	if(sign == 'hide'){
		$("#list-left").hide();
		return;
	}
	if(sign == 'show'){
		$("#list-right").show();
		return;
	}
}

var hkey_root,hkey_path,hkey_key;
hkey_root="HKEY_CURRENT_USER";
hkey_path="\\Software\\Microsoft\\Internet Explorer\\PageSetup\\";

//固定标签控制局部内容打印
function preview(){
	//隐藏试题的校正项
	hide_question_update();
	pagesetup_null();
	bdhtml=window.document.body.innerHTML;
	sprnstr="<!--startprint-->";
	eprnstr="<!--endprint-->";
	prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17);
	prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr));
	window.document.body.innerHTML=prnhtml;
	window.print();
}

//配置网页打印的页眉页脚为空
function pagesetup_null(){
	//不支持activeX控件的调用
	return;
    try{
        var RegWsh = new ActiveXObject("WScript.Shell");
        
        //设置打印部分内容的页眉为指定位置的图片
        hkey_key="header";
        RegWsh.RegWrite(hkey_root+hkey_path+hkey_key,'<IMG src="http://www.baidu.com/img/baidu_logo.gif" width="100" height="42" border="0"><span style="color:#339900;font-size:11px"><strong>支持html的图文并茂页眉</strong></span><hr size="1" />');

        //设置打印部分内容的页脚
        hkey_key="footer";
        RegWsh.RegWrite(hkey_root+hkey_path+hkey_key,"");

        HKEY_Key="margin_left";
        Wsh.RegWrite(HKEY_Root+HKEY_Path+HKEY_Key,"28mm");
        
    }catch(e){
    	alert("不允许ActiveX控件");
	}
}


//更新试卷属性
function update_paper_attribute()
{
	document.getElementById("paper_attribute").style.display = "block";
	document.getElementById("question_content").style.display = "none";
	document.getElementById("u_paper_a").style.background = "#FFFFDD";
	document.getElementById("u_paper_a").style.color = "red";
	document.getElementById("u_question_a").style.background = "";
	document.getElementById("u_question_a").style.color = "";
}

//更新题目内容
function update_question_content(){
	document.getElementById("paper_attribute").style.display = "none";
	document.getElementById("question_content").style.display = "block";
	document.getElementById("u_paper_a").style.background = "";
	document.getElementById("u_paper_a").style.color = "";
	document.getElementById("u_question_a").style.background = "#FFFFDD";
	document.getElementById("u_question_a").style.color = "red";
}

/**
 * ajax提交试题的属性，返回的pid更新表单的隐藏域
 */
function ajax_submit_paper_attribute(){
	var title = $('#title').val();
	var province = $('#province').val();
	var city = $('#city').val();
	var area = $('#area').val();
	var grade = $('#grade').val();
	var subject_type = $('#subject_type').val();
	var term = $('#term').val();
	var textbook_version = $('#textbook_version').val();
	var school = $('#school').val();
	var p_degree = $('#p_degree').val();
	var author = $('#author').val();
	var year = $('#year').val();
	var test_time = $('#test_time').val();
	var total_score = $('#total_score').val();
	var myEditor = $('#myEditor').val();
	var pid = $('#paper_pid').val();
	
	$.ajax({
		type	: "post",
		url 	: "qb_ajax_deal.php",
		data    :{"title":title,"province":province,"city":city,"area":area,
					"grade":grade,"subject_type":subject_type,"term":term,"textbook_version":textbook_version,"school":school,
					"p_degree":p_degree,"author":author,"year":year,"test_time":test_time,"total_score":total_score,
					"myEditor":myEditor,"pid":pid,"isAjax":true,"type":"paper_process"},
			dataType: "json",
			success : function(rs){
//				alert(rs['sign']);
				if(rs['sign']==0){
					alert(rs['content']);
				}
				else{
					$('#paper-header').html(rs['content']);
					//更新表单的隐藏域，避免重复的提交
					$('#paper_pid').val(rs['pid']);
//					alert($('#pid').val());
				}
			},
			error : function(){
				alert("获取数据失败!");
			}
		});
}

/**
 * 从试卷中移除该试题
 */
function ajax_del_question_attribute(){
	var pid = $('#paper_pid').val();
	var qid = $('#qid').val();

	$.ajax({
		type	: "post",
		url 	: "qb_ajax_deal.php",
		data    :{"qid":qid,"pid":"{$pid}","isAjax":true,"type":"question_remove"},
//			dataType: "String",
			success : function(rs){
				$('#question-div').html(rs);
			},
			error : function(){
				alert("从试卷中移除试题失败!");
			}
		});
}

/**
 * 添加及修改试题内容
 */
function ajax_submit_question_attribute(){
	var q_degree = $('#q_degree').val();
	var chapter = $('#chapter').val();
	var question_type = $('#question_type').val();
	var q_index = $('#q_index').val();
	var score = $('#score').val();
	
	var order_seed = $('#order_seed').val();
	var myEditor1 = $('#myEditor1').val();
	var optionA = $('#optionA').val();
	var optionB = $('#optionB').val();
	var optionC = $('#optionC').val();
	
	var optionD = $('#optionD').val();
	var right_answer = $('#right_answer').val();
	var myEditor2 = $('#myEditor2').val();
	var qid = $('#qid').val();

	var author = $('#author').val();

	//试卷的属性附加到试题中
	var subject_type = $("#subject_type").val();
	var grade = $('#grade').val();
	var term = $('#term').val();

	var pid = $('#paper_pid').val();
	
	$.ajaxFileUpload({
		url:'qb_ajax_deal.php',
		secureuri:false,
		
		//处理多文件上传的修改部分
//		fileElementId:'fileQst',
		fileElementId:['fileQst','fileOptionA','fileOptionB','fileOptionC','fileOptionD'],//原先是fileElementId:’id’ 只能上传一个
		
		dataType: 'String',
		data:{"q_degree":q_degree,"chapter":chapter,"question_type":question_type,"q_index":q_index,"score":score,
				"order_seed":order_seed,"myEditor1":myEditor1,"optionA":optionA,"optionB":optionB,"optionC":optionC,
				"optionD":optionD,"right_answer":right_answer,"myEditor2":myEditor2,
				"subject_type":subject_type,"grade":grade,"term":term,
				"qid":qid,"pid":pid,"author":author,"isAjax":true,"type":"question_process"},
		success: function (rs){
			$("#question-div").html(rs);

			//更新成功后将数据试卷的试题编号+1，并将试题内容清空
			//如果qid不为空则是更新操作，将qid清空
			$('#myEditor2').val('');
			$('#qid').val('');
			$('#order_seed').val('');
			
//			alert(rs);return;
			/*
			if(rs['sign']==0){
				alert(rs['content']);
			}
			else{
				$('#question-div').html(rs['content']);
			}
			*/
		},
		error : function(){
			alert("获取数据失败!");
		}
	});

	/*
	$.ajax({
		type	: "post",
		url 	: "qb_ajax_deal.php",
		data    :{"q_degree":q_degree,"chapter":chapter,"question_type":question_type,"q_index":q_index,"score":score,
					"order_seed":order_seed,"myEditor1":myEditor1,"optionA":optionA,"optionB":optionB,"optionC":optionC,
					"optionD":optionD,"right_answer":right_answer,"myEditor2":myEditor2,
					"subject_type":subject_type,"grade":grade,"term":term,
					"qid":qid,"pid":"{$pid}","author":author,"isAjax":true,"type":"question_process"},
			dataType: "json",
			success : function(rs){
				if(rs['sign']==0){
					alert(rs['content']);
				}
				else{
					$('#question-div').html(rs['content']);
				}
			},
			error : function(){
				alert("获取数据失败!");
			}
		});
	*/
}

//Ajax File Uploader For JQuery
function ajaxFileUpload()
{
	$.ajaxFileUpload({
			url:'qb_ajax_deal.php',
			secureuri:false,
			fileElementId:'fileToUpload',
			dataType: 'json',
			data:{name:'logan', id:'id'},
			success: function (data, status){
				if(typeof(data.error) != 'undefined'){
					if(data.error != ''){
						alert(data.error);
					}else{
						alert(data.msg);
					}
				}
			},
			error: function (data, status, e){
				alert(e);
			}
		});
	return false;
}

//对应的题目数组中取出该题目的信息内容显示,结合试卷的编号进行控制更新
function update_question_info(pid,qid){
	$("#qid").val(qid);
	$.ajax({
		type	: "post",
		url 	: "qb_ajax_deal.php",
		data    :{"pid" : pid,"qid" : qid,"type" : "select"},
			dataType: "json",
			success : function(rs){
//				alert(rs['qid']);
//				$('#user_design_menu').html(rs);
				
				$("#q_degree").val(rs['degree']);
				$("#chapter").val(rs['chapter']);
				$("#question_type").val(rs['question_type']);
				$("#q_index").val(rs['q_index']);
				$("#score").val(rs['score']);
				$("#order_seed").val(rs['order_seed']);
				
				//true 是追加的形式
//				UE.getEditor('myEditor1').setContent('欢迎使用ueditor', true);
				UE.getEditor('myEditor1').setContent(rs['question_content']);
				UE.getEditor('myEditor2').setContent(rs['answer_analyze']);

				$("#optionA").val(rs['optionA']);
				$("#optionB").val(rs['optionB']);
				$("#optionC").val(rs['optionC']);
				$("#optionD").val(rs['optionD']);
				$("#right_answer").val(rs['right_answer']);

				//动态加载题目的图片
//				$("#icon_img").html('<img class="border-radius-5" src="'+rs['question_img_path']+'" id="icon_img" width="120px" style="margin-left:12%;"/>');
				document.getElementById("icon_img").src=rs['question_img_path'];
				document.getElementById("optionImgA").src=rs['a_option_img_path'];
				document.getElementById("optionImgB").src=rs['b_option_img_path'];
				document.getElementById("optionImgC").src=rs['c_option_img_path'];
				document.getElementById("optionImgD").src=rs['d_option_img_path'];

				//加载成功后跳入试题的内容部分展示
				update_question_content();
			},
			error : function(){
				alert("获取数据失败!");
			}
		});
}

</script>

</body>
</html>