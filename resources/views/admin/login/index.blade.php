@extends('admin.public.public')
@section('body')
<body class="login-bg">

<div class="login layui-anim layui-anim-up">
    <div class="message">管理登录</div>
    <div id="darkbannerwrap"></div>
    
    <form method="post" class="layui-form" action="/admin_dologin">
    	{{csrf_field()}}
      <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
      <hr class="hr15">
      <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
      <hr class="hr15">
      <input name="code" lay-verify="required" placeholder="验证码"  type="text" class="layui-input">
      <img src="{{captcha_src()}}" style="cursor: pointer;vertical-align: middle;height: 50px;outline: none;"  onclick="this.src='{{captcha_src()}}'+Math.random()">
      <hr class="hr15">
      <input value="登录" lay-submit lay-filter="login" style="width:100%;" onclick="ajax_submit(this)" type="submit">
      <hr class="hr20" >
    </form>
</div>

<script>
    $(function  () {
        layui.use('form', function(){
          var form = layui.form;
          // layer.msg('玩命卖萌中', function(){
          //   //关闭后的操作
          //   });
          //监听提交
          form.on('submit(/admin_dologin)', function(data){
            // alert(888)
            layer.msg(JSON.stringify(data.field),function(){
                location.href='index.html'
            });
            return false;
          });
        });
    })

    function ajax_submit() {

    }
</script>
<!-- 底部结束 -->
<script>
//百度统计可去掉
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</body>
@endsection
@section('title','后台登录')