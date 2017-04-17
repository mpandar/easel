@if (isset($tag->title))
    <hr style="width: 60%">
    <p class="tag-link"><i class="fa fa-fw fa-tag"></i> 标签<a href="#">{{ $tag->title or '' }}</a>的相关文章</p>
    <p class="tag-subtitle">" {{ $tag->subtitle }} "</p>
    <hr style="width: 60%">
@endif