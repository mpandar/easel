@extends('canvas::backend.layout')

@section('title')
    <title>{{ \Canvas\Models\Settings::blogTitle() }} | 媒体</title>
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
                            <li class="active">媒体</li>
                        </ol>
                        <ul class="actions">
                            <li class="dropdown">
                                <a href="" data-toggle="dropdown">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="{!! route('canvas.admin.upload') !!}"><i class="zmdi zmdi-refresh-alt pd-r-5"></i> 刷新媒体库</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h2>媒体库
                            <small>本页包含你上传的所有媒体文件。双击文件名查看包含的内容。
                            </small>
                        </h2>
                    </div>

                    <media-manager></media-manager>
                </div>
            </div>
        </section>
    </section>
@stop

@section('unique-js')
    <script>
        new Vue({
            el: '#main',
            created: function () {
                window.eventHub.$on('media-manager-notification', function (message, type, time) {
                    $.growl({
                        message: message
                    }, {
                        type: 'inverse',
                        allow_dismiss: false,
                        label: 'Cancel',
                        className: 'btn-xs btn-inverse',
                        placement: {
                            from: 'top',
                            align: 'right'
                        },
                        delay: time,
                        animate: {
                            enter: 'animated fadeInRight',
                            exit: 'animated fadeOutRight'
                        },
                        offset: {
                            x: 20,
                            y: 85
                        }
                    });
                });
            }
        });
    </script>
@stop
