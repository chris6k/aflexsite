<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />
	<title>加盟店地区管理</title>
</head>
<body>
	<?php require_once("jsInclude.php");?>
	
	<table id="jqgrid"></table> 
	<div id="pager"></div> 
	
<script type="text/javascript">
	$(document).ready(function(){
	$("#jqgrid").jqGrid({
   	url:'xmlLoad.php?path=storeLocationArea',
	datatype: "json",
   	colNames:['地区','城市'],
   	colModel:[
   		{name:'area',index:'area', width:75, editable:true},
   		{name:'city',index:'city', width:90, editable:true}	
   	],
   	autowidth: true,
   	sortname: 'id',
    viewrecords: false,
    sortorder: "desc",
    caption:"加盟店地区管理",
    pager: '#pager',
   	sortname: 'id',
    viewrecords: false,
    sortorder: "asc",
	editurl: "updateStoreLocationArea.php",
	height:'auto',
	hidegrid:true,
//loadui:'block', //whether allow user do something when the ui display "loading"
mtype:'POST',
forceFit:true
	});
	$("#jqgrid").jqGrid('navGrid','#pager',
	 {}, //options
	 {
	 width:600,
	 closeAfterEdit:true,
	 reloadAfterSubmit:false,
	 //beforeSubmit:checkBeforeSubmit,
	 afterSubmit : responseHandler
	 }, // edit options //checkOnSubmit:true,saveData: "Data has been changed! Save edited?", bYes : "Yes", bNo : "No",
	 {
	 width:600,
	 closeAfterAdd:true,
	 clearAfterAdd:true,
	 reloadAfterSubmit:true,
	 //beforeSubmit:checkBeforeSubmit,
	 afterSubmit : responseHandler
	 }, // add options
	 {
	 width:400,
	 closeAfterEdit:true,
	 reloadAfterSubmit:true,
	 afterSubmit : responseHandler
	 }, // del options
	 {
	 closeAfterSearch:true
	 } // search options
	
	 ); 
 
	 function responseHandler(response,postData) {
	 	 var e = window.eval || eval;
		 if(response.readyState == 4) {
		 results = e('(' + response.responseText + ')');
		 if(results.success) {
		 //alert(results.message);
		 return [true];
		 } else {
		 return [false, results.message];
		 }
		 }
		return false; 
	 }
	 
	 function checkBeforeSubmit(postdata, formid) {
	 	var form = $(formid);
	 }
	 
});	
</script>
</body>
</html>