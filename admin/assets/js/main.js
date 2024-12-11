$(document).ready(function() {
    $('#order-select').select2({
        placeholder: "請輸入關鍵字",
        allowClear: true
    });
});

// 等待頁面加載完成後執行
document.addEventListener("DOMContentLoaded", function() {
    // 使用 setTimeout 來確保 select2 已經初始化完成
    setTimeout(function() {
        // 選擇 select2 的搜尋欄位
        const searchField = document.querySelector(".select2-search__field");
        if (searchField) {
            // 設置預設文字
            searchField.placeholder = "請輸入關鍵字";
        }
    }, 100); // 調整延遲時間以符合初始化速度
});
// 監聽 select2 打開事件
$(document).ready(function() {
    // 假設你的 select 元素是 #mySelect
    $('#order-select').on('select2:open', function() {
        // 選擇 select2 的搜尋欄位
        const searchField = document.querySelector(".select2-search__field");
        if (searchField) {
            // 設置預設文字
            searchField.placeholder = "請輸入想要更改的序號";
        }
    });
});

// 清除 URL 参数
window.addEventListener('load', function() {
    // 检查 URL 是否包含 action=edit_success
    const url = new URL(window.location.href);
    if (url.searchParams.get('action') === 'edit_success') {
        url.searchParams.delete('action'); // 移除 action 參數
        window.history.replaceState({}, document.title, url); // 更新 URL，不刷新页面
    }
    if (url.searchParams.get('action') === 'add_success') {
        url.searchParams.delete('action'); // 移除 action 參數
        window.history.replaceState({}, document.title, url); // 更新 URL，不刷新页面
    }
    if (url.searchParams.get('action') === 'delete_success') {
        url.searchParams.delete('action'); // 移除 action 參數
        window.history.replaceState({}, document.title, url); // 更新 URL，不刷新页面
    }
});