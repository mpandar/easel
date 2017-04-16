<div class="card">
    <div class="card-header">
        <h2>最近更新
            <small>最近更新的4篇文章：</small>
        </h2>

        <br>

        @foreach ($data['recentPosts'] as $post)
            <a href="{!! route('canvas.admin.post.edit', $post->id) !!}">{{ $post->title }}</a> <small>{{ $post->created_at->format('M d, Y') }} at {{ $post->created_at->format('g:i A') }}</small>
            <hr>
        @endforeach
    </div>
</div>