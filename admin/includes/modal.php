<!-- Bootstrap 模態框 -->
<div class="modal custom-modal fade" id="delete_modal" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>確認刪除</h3> <!-- 根據情況更改標題 -->
                    <p>你確定要刪除該筆資料嗎?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="w-100 btn btn-danger" id="confirmDeleteBtn">確認</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="w-100 btn btn-primary" data-bs-dismiss="modal">取消</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  var deleteLink = ''; // 用於保存要跳轉的 href

// 當模態框顯示時，更新 confirmDeleteBtn 的跳轉連結
document.querySelectorAll('.delete-link').forEach(function(link) {
  link.addEventListener('click', function() {
    deleteLink = this.getAttribute('data-href');
  });
});

// 當點擊確定按鈕時，執行刪除操作
document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
  window.location.href = deleteLink; // 跳轉到指定的刪除 URL
});
</script>



<!-- Bootstrap 吐司模板 -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <!-- 編輯成功的吐司 -->
    <div id="editToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
        <div class="toast-header">
            <strong class="me-auto text-success">編輯成功</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            該筆資料已成功編輯。
        </div>
    </div>

    <!-- 新增成功的吐司 -->
    <div id="addToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
        <div class="toast-header">
            <strong class="me-auto text-success">新增成功</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
        該筆資料已成功新增。
        </div>
    </div>

    <!-- 刪除成功的吐司 -->
    <div id="deleteToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
        <div class="toast-header">
            <strong class="me-auto text-success">刪除成功</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
         該筆資料已成功刪除。
        </div>
    </div>
</div>

<script>
    // 當頁面加載時，檢查 URL 中是否有 action 的參數
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const action = urlParams.get('action');

        if (action === 'edit_success') {
            var editToast = new bootstrap.Toast(document.getElementById('editToast'));
            editToast.show(); // 顯示編輯成功吐司
        }

        if (action === 'add_success') {
            var addToast = new bootstrap.Toast(document.getElementById('addToast'));
            addToast.show(); // 顯示新增成功吐司
        }

        if (action === 'delete_success') {
            var deleteToast = new bootstrap.Toast(document.getElementById('deleteToast'));
            deleteToast.show(); // 顯示刪除成功吐司
        }
    });
</script>