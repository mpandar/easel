<div class="card">
    <div class="card-header">
        <h2>欢迎使用Canvas!
            <small>这里是一些对你有帮助的链接：
            </small>
        </h2>
    </div>
    <div class="card-body card-padding">
        <div class="row">
            <div class="col-sm-4">
                <h5>初始化</h5>
                <br>
                <a href="{!! route('canvas.admin.profile.index') !!}" class="btn btn-primary btn-icon-text"><i class="zmdi zmdi-account"></i> 个人中心</a>
                <br>
                <br>
                <a href="{!! route('canvas.admin.settings') !!}" class="btn btn-primary btn-icon-text"><i class="zmdi zmdi-settings"></i> 系统设置</a>
                <br>
                <br>
            </div>
            <div class="col-sm-4">
                <h5>下一步</h5>
                <ul class="getting-started">
                    <li><i class="zmdi zmdi-comment-edit"></i> <a href="{!! route('canvas.admin.post.create') !!}">书写你的第一篇文章</a></li>
                    <li><i class="zmdi zmdi-plus-circle"></i> <a href="{!! route('canvas.admin.tag.create') !!}">创建一个新的标签</a></li>
                    <li><i class="zmdi zmdi-view-web"></i> <a href="{!! route('canvas.home') !!}" target="_blank">查看你的网站</a></li>
                </ul>
                <br>
            </div>
            <div class="col-sm-4">
                <h5>更多</h5>
                <ul class="getting-started">
                    <li><i class="zmdi zmdi-disqus"></i> <a href="{!! route('canvas.admin.settings') !!}">整合Disqus</a></li>
                    <li><i class="zmdi zmdi-trending-up"></i> <a href="{!! route('canvas.admin.settings') !!}">设置Google分析</a></li>
                    <li><i class="zmdi zmdi-wrench"></i> <a href="{!! route('canvas.admin.tools') !!}">高级工具</a></li></a></li>
                </ul>
                <br>
            </div>
        </div>

        @if($data['canvasVersion'] !== $data['latestRelease'])
            <hr>
            <p class="small" style="margin-bottom: 0;">
                <a href="{!! url('http://github.com/cnvs/easel/releases/tag/') . $data['latestRelease'] !!}" target="_blank"><i class="zmdi zmdi-alert-circle"></i>&nbsp;<strong>Canvas {!! $data['latestRelease'] !!}</strong></a> is available! <a href="#" data-toggle="modal" data-target="#update"><strong>Please update now.</strong></a>
            </p>
        @endif

    </div>
</div>