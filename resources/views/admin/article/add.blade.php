<div style="width:800px;margin:0 auto;padding-top:20px;">
    <form class="layui-form" id="form" method="post" action="{{url('/admin/article/add')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="layui-form-item">
            <label class="layui-form-label">上级菜单</label>
            <div class="layui-input-block">
                <select name="parentId">
                    <option value="0">请选择上级菜单</option>
                    <option value="1">&#x4E2A;&#x6027;&#x5316;</option>
                    <option value="3">&#x6253;&#x8D4F;&#x4F5C;&#x8005;</option>
                    <option value="4">&#x57FA;&#x672C;&#x8BF4;&#x660E;</option>
                    <option value="23">&#x7CFB;&#x7EDF;&#x8BBE;&#x7F6E;</option>
                    <option value="27">Font Awesome&#x56FE;&#x6807;&#x5C55;&#x793A;</option>
                    <option value="43">Font Awesome&#x7B2C;&#x4E09;&#x65B9;LOGO</option>
                    <option value="53">&#x81EA;&#x5B9A;&#x4E49;&#x56FE;&#x7247;&#x83DC;&#x5355;</option>
                    <option value="60">&#x7CFB;&#x7EDF;&#x65E5;&#x5FD7;</option>
                    <option value="62">&#x70B9;&#x8D5E;</option>
                    <option value="63">123</option>
                    <option value="66">&#x4F5C;&#x8005;&#x535A;&#x5BA2;</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">文章名称</label>
            <div class="layui-input-block">
                <input type="text" name="name" win-verify="required" placeholder="请输入菜单名称" autocomplete="off" class="layui-input" />
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">文章内容</label>
            <div class="layui-input-block" id="editor">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">系统菜单</label>
            <div class="layui-input-block winui-switch">
                <input name="isNecessary" lay-filter="isNecessary" type="checkbox" lay-skin="switch" lay-text="是|否" />
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="winui-btn" lay-submit lay-filter="formAddMenu">确定</button>
                <button class="winui-btn" onclick="winui.window.close('addMenu'); return false;">取消</button>
            </div>
        </div>
    </form>
    <div class="tips">Tips：1.系统菜单不可以删除 2.窗口标题若不填则默认和菜单名称相同</div>
</div>
<script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{URL::asset('js/wangEditor.min.js')}}"></script>
<script>
    //wangEditor富文本编辑器
    var E = window.wangEditor;
    var editor = new E('#editor');
    // 或者 var editor = new E( document.getElementById('editor') )
    editor.create();
    layui.use(['form','layer'], function (form) {
        var $ = layui.$
            , msg = winui.window.msg;

        form.render();
        form.on('switch(isNecessary)', function (data) {
            $(data.elem).val(data.elem.checked);
        });
        form.on('submit(formAddMenu)', function (data) {
            //表单验证
            if (winui.verifyForm(data.elem)) {
                $('#form').ajaxSubmit(function(res){
                    if(res.status==200){
                        layer.msg('添加成功', {icon: 6});
                        window.parent.location.reload();//刷新父页面
                        parent.layer.close(index);//关闭当前的窗口
                    }else {
                        layer.msg('添加失败', {icon: 6});
                        window.parent.location.reload();//刷新父页面
                        parent.layer.close(index);//关闭当前的窗口
                    }
                })
                /*layui.$.ajax({
                    type: 'post',
                    url: "",
                    async: false,
                    data: data.field,
                    dataType: 'json',
                    success: function (json) {
                        if (json.isSucceed) {
                            msg('添加成功');
                        } else {
                            msg(json.message)
                        }
                        winui.window.close('addMenu');
                    },
                    error: function (xml) {
                        msg('添加失败');
                        console.log(xml.responseText);
                    }
                });*/
            }
            return false;
        });
    });
</script>