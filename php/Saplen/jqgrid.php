<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="zh" />
	<title>jqgrid</title>
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.jqGrid.min.js"></script>
</head>
<body>
	<script type="text/javascript">
	$(document).ready(function(){
	$("#list").jqGrid({
                    width:800,
                    height:300,
                    url:"controller/proxy.php?oper=list&username=<?php echo $_POST['username']?>&psw=<?php echo $_POST['psw']?>",
                    editurl:"controller/proxy.php?username=<?php echo $_POST['username']?>&psw=<?php echo $_POST['psw']?>",
                    mtype:'POST',
                    datatype:'json',
                    colNames:["ID","日期","摘要","内容"],
                    colModel:[
                        {
                            name:'DIA_ID',
                            index:'DIA_ID',
                            sortable:false,
                            width:20,
                            hidden:true,
//                            editable:true,
                            editrules:{
                                edithidden:true
                            }
                        },
                        {
                            name:'DIA_DATE',
                            index:'DIA_DATE',
                            width:50,
                            sortable:false,
                            editable:true,
                            edittype:'text',
                            editoptions:{size:10},
                            editrules:{
                                edithidden:true,
                                required:true
                            }
                        },
                        {
                            name:'DIA_SUMMANY',
                            index:'DIA_SUMMANY',
                            sortable:false,
                            width:150
                        },
                        {
                            name:'DIA_CONTENT',
                            index:'DIA_CONTENT',
                            hidden:true,
                            editable:true,
                            edittype:'textarea',
                            editoptions:{rows:10,cols:80},
                            editrules:{
                                edithidden:true,
                                required:true
                            }
                        }
                    ],
                    pager:"pager",
                    rowNum:10,
                    rowList:[10,20,30],
                    sortname:'date',
                    sortorder:'desc',
                    viewrecords:true,
                    imgpath:'lib/js/jqGrid/themes/basic/images',
                    caption:'日志列表',
                    subGrid:true,
                    
                    subGridUrl:'controller/proxy.php?oper=get',
                    subGridModel:[{
                            name:['内容'],
                            width:[600]
                        }]
                }) ;
                $('#list').navGrid('#pager',{
//                    add:false,
                    search:false
                });
            });
        </script>

</body>
</html>
