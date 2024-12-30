<?php
ob_start();
?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }
    .content {
            padding: 20px;
            width: 100%;
    }
    .table td,
    .table th {
        vertical-align: middle;
    }

    .btn-add-category {
        background-color: #28a745;
        color: white;
        font-weight: bold;
        border-radius: 5px;
    }

    .btn-add-category:hover {
        background-color: #218838;
    }
</style>

<body>
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Loại sản phẩm</h1>
        </div>
        
        <div class=" row mb-3" >
            <form method="GET" class="d-flex col-11">
                <input type="text" name="search" class="form-control me-2" placeholder="Tìm kiếm" 
                    value="<?= htmlspecialchars($searchKeyword ?? '') ?>">
                <button type="submit" class="btn btn-primary" style="width:120px">Tìm kiếm</button>
            </form>
            <a href="/admin/categories/create" class="btn btn-add-category col-1 "  >Bổ sung</a>
        </div>
        <!-- Bảng hiển thị danh mục -->
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 120px;">Ảnh</th>
                    <th>Mã loại</th>
                    <th>Tên loại</th>
                    <th>Mô tả</th>
                    <th style="width: 150px;" class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td>
                                <?php if (!empty($category['photo_url'])): ?>
                                    <img src="<?="/src/assets/images/". htmlspecialchars($category['photo_url']) ?>" alt="Photo" style="width: 100px; height: auto;">
                                <?php else: ?>
                                    <span>No photo</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($category['category_id'] ?? ''); ?></td>
                            <td><?= htmlspecialchars($category['category_name'] ?? ''); ?></td>
                            <td><?= htmlspecialchars($category['category_decs'] ?? ''); ?></td>
                            <td class="text-center">
                                <a href="/admin/categories/update/<?= htmlspecialchars($category['category_id']); ?>" class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="/admin/categories/delete/<?= htmlspecialchars($category['category_id']); ?>"
                                class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xóa sản phẩm?')">
                                <i class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Không tìm thấy loại hàng.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$content = ob_get_clean();
?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>