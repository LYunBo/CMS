@extends('admin.public.public')
@section('content')
	<div class="page-container">
	<p class="f-20 text-success">欢迎使用H-ui.admin <span class="f-14">v3.1</span>后台模版！</p>
	<p>登录次数：18 </p>
	<p>上次登录IP：222.35.131.79.1  上次登录时间：2014-6-14 11:19:55</p>
	<table class="table table-border table-bordered table-bg mt-20">
		<thead>
			<tr>
				<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($sysinfo as $key=>$value)
			<tr>
				<th width="30%">{{$key}}</th>
				<td><span id="lbServerName">{{$value}}/</span></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
@section('title','后台首页')