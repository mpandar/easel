@extends('canvas::backend.layout')

@section('title')
    <title>{{ \Canvas\Models\Settings::blogTitle() }} | 编辑用户</title>
@stop

@section('content')
    <section id="main">
        @include('canvas::backend.shared.partials.sidebar-navigation')
        <section id="content">
            <div class="container container-alt">
                <div class="block-header">
                    <h2>User Profile</h2>
                    <ul class="actions">
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="{!! route('canvas.admin.user.edit', $data['id']) !!}"><i class="zmdi zmdi-refresh-alt pd-r-5"></i> 刷新用户</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="card" id="profile-main">
                    @include('canvas::backend.user.partials.sidebar')
                    <div class="pm-body clearfix">
                        <ul class="tab-nav tn-justified">
                            <li class="{{ Route::is('canvas.admin.user.edit') ? 'active' : '' }}">
                                <a href="{{ route('canvas.admin.user.edit', $data['id']) }}">基本信息</a>
                            </li>
                            <li class="{{ Route::is('canvas.admin.user.privacy') ? 'active' : '' }}">
                                <a href="{!! route('canvas.admin.user.privacy', $data['id']) !!}">隐私</a>
                            </li>
                        </ul>
                        @include('canvas::backend.user.partials.form.edit')
                    </div>
                </div>
            </div>
        </section>
    </section>
    @include('canvas::backend.user.partials.modals.delete')
@stop

@section('unique-js')
    @include('canvas::backend.user.partials.editor')

    @include('canvas::backend.shared.components.profile-datetime-picker', ['format' => 'YYYY-MM-DD'])

    @if(Session::get('_updateUser'))
        @include('canvas::backend.shared.notifications.notify', ['section' => '_updateUser'])
        {{ \Session::forget('_updateUser') }}
    @endif

    @if(Session::get('_updatePassword'))
        @include('canvas::backend.shared.notifications.notify', ['section' => '_updatePassword'])
        {{ \Session::forget('_updatePassword') }}
    @endif
@stop