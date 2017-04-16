@extends('canvas::backend.layout')

@section('title')
    <title>{{ \Canvas\Models\Settings::blogTitle() }} | 文章</title>
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
                            <li class="active">文章</li>
                        </ol>
                        <ul class="actions">
                            <li class="dropdown">
                                <a href="" data-toggle="dropdown">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="{!! route('canvas.admin.post.index') !!}"><i class="zmdi zmdi-refresh-alt pd-r-5"></i> 刷新文章</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        @include('canvas::backend.shared.partials.errors')
                        @include('canvas::backend.shared.partials.success')
                        <h2>文章&nbsp;
                            <a href="{!! route('canvas.admin.post.create') !!}" id="create-post"><i class="zmdi zmdi-plus-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Create a new post"></i></a>

                            <small>本页面包含你全部的文章，点击 <span class="zmdi zmdi-edit text-primary"></span> 图标更新文章内容或 <span class="zmdi zmdi-search text-primary"></span> 图标预览该文章。</small>
                        </h2>
                    </div>

                    <div class="table-responsive">
                        <table id="posts" class="table table-condensed table-vmiddle">
                            <thead>
                                <tr>
                                    <th data-column-id="id" data-type="numeric" data-order="desc">ID</th>
                                    <th data-column-id="title">标题</th>
                                    <th data-column-id="author">作者</th>
                                    <th data-column-id="published">状态</th>
                                    <th data-column-id="slug">Slug</th>
                                    <th data-column-id="date" data-type="date" data-formatter="humandate">日期</th>
                                    <th data-column-id="edit_url" data-sortable="false" data-visible="false">编辑</th>
                                    <th data-column-id="view_url" data-sortable="false" data-visible="false">查看</th>
                                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->getAuthor($post->user_id) }}</td>
                                        <td>{{ $post->is_published == 1 ? '<span class="label label-primary">Published</span>' : '<span class="label label-default">Draft</span>' }}</td>
                                        <td>{{ $post->slug }}</td>
                                        @if($post->updated_at != $post->created_at)
                                            <td>{{ $post->updated_at->format('Y/m/d') . "<br/>" }} Last updated</td>
                                        @else
                                            <td>{{ $post->created_at->format('Y/m/d') . "<br/>" }} Published</td>
                                        @endif
                                        <td>{!! route('canvas.admin.post.edit', $post->id) !!}</td>
                                        <td>{!! route('canvas.blog.post.show', $post->slug) !!}</td>
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
    @if(Session::get('_delete-post'))
        @include('canvas::backend.shared.notifications.notify', ['section' => '_delete-post'])
        {{ \Session::forget('_delete-post') }}
    @endif
    @if(Session::get('_update-post'))
        @include('canvas::backend.shared.notifications.notify', ['section' => '_update-post'])
        {{ \Session::forget('_update-post') }}
    @endif
    @include('canvas::backend.post.partials.datatable')
@stop
