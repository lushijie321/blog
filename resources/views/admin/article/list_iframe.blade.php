<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>菜单列表</title>
    <link href="{{ URL::asset('lib/layui/css/layui.css')}}" rel="stylesheet" />
    <link href="{{ URL::asset('lib/font-awesome-4.7.0/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{ URL::asset('lib/winui/css/winui.css')}}" rel="stylesheet" />
</head>
<body>
    <div class="winui-toolbar">
        <div class="winui-tool">
            <button id="reloadTable" class="winui-toolbtn"><i class="fa fa-refresh" aria-hidden="true"></i>刷新数据</button>
            <button id="addMenu" class="winui-toolbtn"><i class="fa fa-plus" aria-hidden="true"></i>新增菜单</button>
            <button id="editMenu" class="winui-toolbtn"><i class="fa fa-pencil" aria-hidden="true"></i>编辑菜单</button>
            <button id="deleteMenu" class="winui-toolbtn"><i class="fa fa-trash" aria-hidden="true"></i>删除选中</button>
        </div>
    </div>
    <div style="margin:auto 10px;">
        <table id="menu" lay-filter="menutable"></table>
        <script type="text/html" id="barMenu">
            <a class="layui-btn layui-btn-xs" lay-event="setting">权限设置</a>
            <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
            <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        </script>
    </div>
    <table class="layui-hide" id="test"></table>
    <script src="{{URL::asset('lib/layui/layui.js')}}"></script>
    <script type="text/javascript">
        layui.config({
            base: "/js/"
        }).use('menulist');
    </script>
    <script>
        layui.use('table', function(){
            var table = layui.table;
            table.render({
                elem: '#menu'
                ,url:"{{URL::asset('json/menulist.json')}}"
                ,cols: [[
                    { field: 'id', type: 'checkbox' },
                    { field: 'icon', title: '图标', width: 120 },
                    { field: 'name', title: '名称', width: 150 },
                    { field: 'title', title: '标题', width: 150 },
                    { field: 'pageURL', title: '页面地址', width: 200 },
                    { field: 'openType', title: '页面类型', width: 120, templet: '#openTypeTpl' },
                    { field: 'isNecessary', title: '系统菜单', width: 100, templet: '#isNecessary' },
                    { field: 'order', title: '排序', width: 80, edit: 'text' },
                    { title: '操作', fixed: 'right', align: 'center', toolbar: '#barMenu', width: 200 }
                ]]
                ,page: true
            });
        });
    </script>
</body>
</html>