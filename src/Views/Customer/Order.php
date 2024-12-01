<?php ob_start(); ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">My Orders</h2>
        <p>12th January of 2023, 12:00 pm</p>
    </div>
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Order ID</th>
                        <th>Shop Name</th>
                        <th>Ordered Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#231212135612</td>
                        <td>Remo barky</td>
                        <td>12/12/23</td>
                        <td>Rs.100,000.00</td>
                        <td>
                            <span class="badge bg-primary text-white status-badge">New</span>
                        </td>
                        <td class="text-end">
                            <a href="link-to-details-page" >
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>#231212135612</td>
                        <td>Remo barky</td>
                        <td>12/12/23</td>
                        <td>Rs.100,000.00</td>
                        <td>
                            <span class="badge bg-warning text-dark status-badge">On Process</span>
                        </td>
                        <td class="text-end">
                            <a href="link-to-details-page" >
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>#231212135612</td>
                        <td>Remo barky</td>
                        <td>12/12/23</td>
                        <td>Rs.100,000.00</td>
                        <td>
                            <span class="badge bg-success text-white status-badge">Successful</span>
                        </td>
                        <td class="text-end">
                            <a href="link-to-details-page" >
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>#231212135612</td>
                        <td>Remo barky</td>
                        <td>12/12/23</td>
                        <td>Rs.100,000.00</td>
                        <td>
                            <span class="badge bg-danger text-white status-badge">Lost</span>
                        </td>
                        <td class="text-end">
                            <a href="link-to-details-page" >
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php 
        $sesionRole = 'customer';
    ?>
<?php $content = ob_get_clean(); ?>

<?php include(__DIR__ . '/../../../templates/doashboard.php'); ?>