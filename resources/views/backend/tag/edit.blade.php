@extends('canvas::backend.layout')

@section('title')
    <title>{{ \Canvas\Models\Settings::blogTitle() }} | Edit Tag</title>
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
                            <li><a href="{!! route('canvas.admin.tag.index') !!}">标签</a></li>
                            <li class="active">编辑标签</li>
                        </ol>
                        @include('canvas::backend.shared.partials.errors')
                        @include('canvas::backend.shared.partials.success')
                        <h2>
                            Edit <em>{{ $data['title'] }}</em>
                            <small>
                                @if(isset($data['updated_at']))
                                    最近更新 {{$data['updated_at']->format('M d, Y') }} at {{ $data['updated_at']->format('g:i A') }}
                                @else
                                    最近更新 {{ $data['created_at']->format('M d, Y') }} at {{ $data['created_at']->format('g:i A') }}
                                @endif
                            </small>
                        </h2>

                    </div>
                    <div class="card-body card-padding">
                        <form class="keyboard-save" role="form" method="POST" id="tagUpdate" action="{!! route('canvas.admin.tag.update', $data['id']) !!}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="{{ $data['id'] }}">

                            @include('canvas::backend.tag.partials.form')

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-icon-text">
                                    <i class="zmdi zmdi-floppy"></i> 保存
                                </button>&nbsp;
                                <button type="button" class="btn btn-danger btn-icon-text" data-toggle="modal" data-target="#modal-delete">
                                    <i class="zmdi zmdi-delete"></i> 删除
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
    @include('canvas::backend.tag.partials.modals.delete')
@stop

@section('unique-js')
    {!! JsValidator::formRequest('Canvas\Http\Requests\TagUpdateRequest', '#tagUpdate') !!}
    @if(Session::get('_update-tag'))
        @include('canvas::backend.shared.notifications.notify', ['section' => '_update-tag'])
        {{ \Session::forget('_update-tag') }}
    @endif
@stop
