<div class="modal fade" id="modal-delete" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">删除此文章？</h4>
            </div>
            <div class="modal-body">
                <p>你确定删除此文章？</p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('canvas.admin.post.destroy', $id) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-link" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-link btn-icon-text">
                        <i class="zmdi zmdi-delete"></i> 删除文章
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>