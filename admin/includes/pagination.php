<?php
    $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;
    $base_url = (isset($category_id) || ($category_id>0)) ? "?category_id=$category_id&page=" : "?page=";
?>
<nav aria-label="Page navigation example ">
        <ul class="custom-pagination pagination justify-content-end">
            <li class="page-item me-2 <?= ($current_page <= 1) ? 'disabled' : '' ?>">
                <a class="page-link text-dark px-3" href="<?= ($current_page <= 1) ? '#' : $base_url . ($current_page - 1) ?>" aria-label="Previous">
                    <i class="fa-solid fa-chevron-left text-dark"></i>
                </a>
            </li>
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="me-2 <?= ($i == $current_page) ? 'active' : '' ?>">
                    <a class="page-link  px-3" href="<?= $base_url . $i ?>"><?=$i ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item me-2 <?= ($current_page >= $total_pages) ? 'disabled' : '' ?>">
                <a class="page-link text-dark px-3" href="<?= ($current_page >= $total_pages) ? '#' : $base_url . ($current_page + 1) ?>" aria-label="Next">
                    <i class="fa-solid fa-chevron-right text-dark"></i>
                </a>
            </li>
        </ul>
</nav>