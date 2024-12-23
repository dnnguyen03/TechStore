<?php ob_start(); ?>


    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 p-3 border-end" style="height: 100vh; overflow-y: auto;">
                <h4 class="text-center">CusChat</h4>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Search Customer">
                </div>
                <ul class="list-group">
                    <li class="list-group-item d-flex align-items-center">
                        <div class="rounded-circle bg-secondary me-3" style="width: 40px; height: 40px;"></div>
                        <div>
                            <div class="fw-bold">Customer Name</div>
                            <div class="text-muted small">Last Message</div>
                        </div>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <div class="rounded-circle bg-secondary me-3" style="width: 40px; height: 40px;"></div>
                        <div>
                            <div class="fw-bold">Customer Name</div>
                            <div class="text-muted small">Last Message</div>
                        </div>
                    </li>
                    <!-- Thêm nhiều khách hàng nếu cần -->
                </ul>
            </div>

            <!-- Chat Panel -->
            <div class="col-md-9 d-flex flex-column" style="height: 100vh;">
                <div class="border-bottom p-3">
                    <h5 class="mb-0">Customer Name</h5>
                    <small class="text-muted">12th January of 2023, 12:00 pm</small>
                </div>
                <div class="flex-grow-1 p-3 overflow-auto" id="chat-box">
                    <!-- Tin nhắn -->
                    <div class="d-flex mb-3">
                        <div class="p-3 rounded bg-light text-dark" style="max-width: 70%;">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                    </div>
                    <div class="d-flex mb-3 justify-content-end">
                        <div class="p-3 rounded bg-warning text-white" style="max-width: 70%;">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                    </div>
                </div>
                <div class="border-top p-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Type...">
                        <button class="btn btn-warning">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        

        #chat-box {
            overflow-y: auto;
            background-color: #f8f9fa;
        }

        #chat-box .d-flex {
            align-items: flex-start;
        }

        #chat-box .justify-content-end {
            align-items: flex-end;
        }

        .rounded {
            border-radius: 12px;
        }

        .rounded-circle {
            border-radius: 50%;
        }

        .btn-warning i {
            font-size: 1.2rem;
        }
    </style>


<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '../../../../../templates/doashboard.php'); ?>