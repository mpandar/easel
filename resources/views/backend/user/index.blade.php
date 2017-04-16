@extends('canvas::backend.layout')

@section('title')
    <title>{{ \Canvas\Models\Settings::blogTitle() }} | 用户</title>
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
                            <li class="active">用户</li>
                        </ol>
                        <ul class="actions">
                            <li class="dropdown">
                                <a href="" data-toggle="dropdown">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="{!! route('canvas.admin.user.index') !!}"><i class="zmdi zmdi-refresh-alt pd-r-5"></i> 刷新用户</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        @include('canvas::backend.shared.partials.errors')
                        @include('canvas::backend.shared.partials.success')
                        <h2>用户&nbsp;
                            <a href="{!! route('canvas.admin.user.create') !!}" id="create-user"><i class="zmdi zmdi-plus-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Create a new user"></i></a>

                            <small>本页包含所有注册用户。点击 <span class="zmdi zmdi-edit text-primary"></span> 图标更新内容或删除用户。</small>
                        </h2>
                    </div>

                    <div class="table-responsive">
                        <table id="users" class="table table-condensed table-vmiddle">
                            <thead>
                            <tr>
                                <th data-column-id="id" data-type="numeric" data-order="asc">ID</th>
                                <th data-column-id="display_name">姓名</th>
                                <th data-column-id="email">邮箱</th>
                                <th data-column-id="role">角色</th>
                                <th data-column-id="posts">文章</th>
                                <th data-column-id="commands" data-formatter="commands" data-sortable="false">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->display_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->isAdmin($user->role) ? '<span class="label label-primary">Administrator</span>' : '<span class="label label-default">User</span>' }}</td>
                                    <td>{{ $user->postCount($user->id) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </section>
@stop

@section('unique-js')
    @include('canvas::backend.user.partials.datatable')

    @if(Session::get('_new-user'))
        @include('canvas::backend.shared.notifications.notify', ['section' => '_new-user'])
        {{ \Session::forget('_new-user') }}
    @endif

    @if(Session::get('_delete-user'))
        @include('canvas::backend.shared.notifications.notify', ['section' => '_delete-user'])
        {{ \Session::forget('_delete-user') }}
    @endif
@stop
