@extends('canvas::backend.layout')

@section('title')
    <title>{{ \Canvas\Models\Settings::blogTitle() }} | 搜索</title>
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
                            <li class="active">搜索</li>
                        </ol>
                        <h2><i class="zmdi zmdi-search"></i> 关于 <em>{{ request('search') }}</em> 的搜索结果</h2>
                        <br>
                        <div class="table-responsive">
                            @include('canvas::backend.search.partials.results')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@stop
