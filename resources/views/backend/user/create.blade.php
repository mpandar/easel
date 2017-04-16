@extends('canvas::backend.layout')

@section('title')
    <title>{{ \Canvas\Models\Settings::blogTitle() }} | 新增用户</title>
@stop

@section('content')
    <section id="main">
        @include('canvas::backend.shared.partials.sidebar-navigation')
        <section id="content">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <ol class="breadcrumb">
                            <li><a href="{!! route('canvas.admin') !!}">首页</a></li>
                            <li><a href="{!! route('canvas.admin.user.index') !!}">用户</a></li>
                            <li class="active">新增用户</li>
                        </ol>
                        @include('canvas::backend.shared.partials.errors')
                        @include('canvas::backend.shared.partials.success')
                        <h2>创建一个用户</h2>
                    </div>
                    <div class="card-body card-padding">
                        <form class="keyboard-save" role="form" method="POST" id="createUser" action="{!! route('canvas.admin.user.store') !!}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                            @include('canvas::backend.user.partials.form.create')

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-icon-text"><i class="zmdi zmdi-floppy"></i> 保存</button>
                                &nbsp;
                                <a href="{!! route('canvas.admin.user.index') !!}"><button type="button" class="btn btn-link">取消</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
@stop

@section('unique-js')
    {!! JsValidator::formRequest('Canvas\Http\Requests\UserCreateRequest', '#createUser') !!}
    @include('canvas::backend.shared.components.show-password', ['inputs' => 'input[name="password"]'])
@stop