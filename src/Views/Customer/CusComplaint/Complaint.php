<?php ob_start(); ?>

<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Phản hồi & Đánh giá</h2>
    </div>

    <?php if (!empty($complaints) && count($complaints) > 0): ?>
        <!-- Bảng phản hồi & đánh giá -->
        <div class="">
            <div class="p-0">
                <table class="table table-striped table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 15%;">Mã phản hồi</th>
                            <th style="width: 50%;">Nội dung</th>
                            <th style="width: 20%;">Ngày gửi</th>
                            <th style="width: 15%;" class="text-end">Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($complaints as $complaint): ?>
                            <tr>
                                <td># <?= htmlspecialchars($complaint['report_id']) ?></td>
                                <td><?= htmlspecialchars($complaint['title']) ?></td>
                                <td><?= htmlspecialchars($complaint['date_report']) ?></td>
                                <td class="text-end">
                                    <a href="/customer/chats" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php else: ?>
        <!-- Thông báo không có phản hồi -->
        <div class="alert alert-info text-center" role="alert">
            <h4 class="fw-bold">Hiện chưa có phản hồi hoặc đánh giá nào</h4>
            <p>Hãy gửi phản hồi của bạn để giúp chúng tôi cải thiện dịch vụ!</p>
            <a href="/customer/orders"  class="btn btn-primary">Gửi phản hồi</a>
        </div>
    <?php endif; ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>
