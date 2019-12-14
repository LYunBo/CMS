@include('admin.tpl.meta')
<link href="/static/admin/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<!-- <div class="header"></div> -->
<div class="loginWraper">
@if(count($errors)>0)
  @foreach($errors->all() as $error)
  <div class="Huialert Huialert-danger"><i class="Hui-iconfont">&#xe6a6;</i>{{$error}}</div>
  @endforeach
@endif
@if(session('error'))
  <div class="Huialert Huialert-error"><i class="Hui-iconfont">&#xe6a6;</i>{{session('error')}}</div>
@endif
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal" action="/admin/login" method="post">
      {{csrf_field()}}
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="username" type="text" placeholder="账户" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="password" type="password" placeholder="密码" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input class="input-text size-L" name="code" type="text" placeholder="验证码" style="width:150px;">
          <img src="{{captcha_src()}}"><a id="kanbuq" href="javascript:;"  onclick="$(this).prev('img')[0].src='{{captcha_src()}}'+Math.random()">看不清，换一张</a> </div>
      </div>
      <!-- <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <label for="online">
            <input type="checkbox" name="online" id="online" value="">
            使我保持登录状态</label>
        </div>
      </div> -->
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright LybCms by H-ui.admin v3.1</div>
@include('admin.tpl.footer')
<!--此乃百度统计代码，请自行删除-->
</body>
</html>
@section('title','后台首页')