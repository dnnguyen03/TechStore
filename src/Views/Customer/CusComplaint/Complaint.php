<?php ob_start(); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Phản hồi & Đánh giá</h2>

</div>
<div class="card">
    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th>Mã phản hồi</th>
                    <th>Nội dung</th>
                    <th>Ngày gửi</th>
                    
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($complaints as $complaint): ?>
                    <tr>
                        <td># <?= $complaint['report_id'] ?></td>
                        <td><?= $complaint['title'] ?></td>
                        <td><?= $complaint['date_report'] ?></td>
                        
                       
                        <td class="text-end">
                            <a href="/chats">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </td>
                    </tr>
                 
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>
