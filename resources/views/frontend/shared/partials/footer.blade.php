<div class="container">
    <div style="text-align: center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <hr>
                <p class="small">本网站基于<a href="https://canvas.toddaustin.io" target="_blank">Canvas</a> · <a href="{!! route('canvas.admin') !!}"><i class="fa fa-lock"></i> 登录</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- scroll to top button -->
<span id="top-link-block" class="hidden hover-button">
    <a id="scroll-to-top" href="#top">↑</a>
</span>

@if (!empty(\Canvas\Models\Settings::gaId()))
    @include('canvas::frontend.blog.partials.analytics')
@endif