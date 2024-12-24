<?php ob_start(); ?>

<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Phản hồi & Đánh giá</h2>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
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
</div>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>