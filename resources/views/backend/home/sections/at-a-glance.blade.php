<div class="card">
    <div class="card-header">
        <h2>总览
            <small>网站快照：</small>
        </h2>
        <br>
        <ul class="getting-started">
            <li>
                <i class="zmdi zmdi-collection-bookmark"></i> <a href="{!! route('canvas.admin.post.index') !!}">{!! count($data['posts']) !!}{!! str_plural(' 文章', count($data['posts'])) !!}</a>
            </li>
            <li>
                <i class="zmdi zmdi-labels"></i> <a href="{!! route('canvas.admin.tag.index') !!}">{!! count($data['tags']) !!}{!! str_plural(' 标签', count($data['tags'])) !!}</a>
            </li>
            <li>
                <i class="zmdi zmdi-accounts-alt"></i> <a href="{!! route('canvas.admin.user.index') !!}">{!! count($data['users']) !!}{!! str_plural(' 用户', count($data['users'])) !!}</a>
            </li>
            <li>
                @if($data['status'] === Canvas\Helpers\CanvasHelper::MAINTENANCE_MODE_DISABLED)
                    <i class="zmdi zmdi-globe-alt"></i> <a href="{!! route('canvas.admin.tools') !!}"><span class="label label-success">状态: {!! strtoupper('Active') !!}</span></a>
                @else
                    <i class="zmdi zmdi-globe-alt"></i> <a href="{!! route('canvas.admin.tools') !!}"><span class="label label-warning">状态: {!! strtoupper('Maintenance Mode') !!}</span></a>
                @endif
            </li>
            <li>
                @if(isset($data['disqus']) && strlen($data['disqus']))
                    <i class="zmdi zmdi-disqus"></i> <a href="{!! route('canvas.admin.settings') !!}"><span class="label label-success">Disqus: {!! strtoupper('Enabled') !!}</span></a>
                @else
                    <i class="zmdi zmdi-disqus"></i> <a href="{!! route('canvas.admin.settings') !!}"><span class="label label-danger">Disqus: {!! strtoupper('Disabled') !!}</span></a>
                @endif
            </li>
            <li>
                @if(isset($data['analytics']) && strlen($data['analytics']))
                    <i class="zmdi zmdi-trending-up"></i> <a href="{!! route('canvas.admin.settings') !!}"><span class="label label-success">Google Analytics: {!! strtoupper('Enabled') !!}</span></a>
                @else
                    <i class="zmdi zmdi-trending-up"></i> <a href="{!! route('canvas.admin.settings') !!}"><span class="label label-danger">Google Analytics: {!! strtoupper('Disabled') !!}</span></a>
                @endif
            </li>
        </ul>
    </div>
</div>
