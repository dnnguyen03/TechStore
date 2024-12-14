
  <style>
    .modal-dialog {
      max-width: 900px; /* Tăng kích thước modal */
    }

    .info-section {
      background: #f8f9fa;
      padding: 15px 20px;
      border-bottom: 1px solid #ddd;
      position: relative;
    }

    .modal-header .btn-close {
      position: absolute;
      top: 15px;
      right: 15px;
      z-index: 1;
    }

    .right-column {
      background: #fff;
      padding: 15px;
      height: 350px; /* Chiều cao giới hạn */
      overflow-y: auto; /* Cho phép cuộn */
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      position: relative;
    }

    .chat-message {
      margin-bottom: 10px;
      padding: 8px 12px;
      border-radius: 12px;
      max-width: 70%;
      display: inline-block;
      clear: both;
    }

    .message-left {
      background: #f0f0f0;
      float: left;
      text-align: left;
    }

    .message-right {
      background: #ffc107;
      color: #fff;
      float: right;
      text-align: right;
    }

    .message-input {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-top: 10px;
    }

    .message-input input {
      flex: 1;
      border-radius: 20px;
      padding: 15px;
      border: 1px solid #ddd;
    }

    .message-input button {
      border-radius: 50%;
      padding: 10px 15px;
    }
  </style>

  <!-- Modal -->
  <div class="modal fade" id="complaintModal" tabindex="-1" aria-labelledby="complaintModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Nội dung Modal -->
          <div class="info-section">
            <h5 class="fw-bold text-dark">This shop is fake</h5>
            <div class="row align-items-center">
              <div class="col-md-4">
                <p><strong>Complaint ID:</strong> #123456789</p>
              </div>
              <div class="col-md-4">
                <p><strong>Sent date:</strong> 12/12/2023</p>
              </div>
              <div class="col-md-4">
                <p><strong>Kind of:</strong> Shop</p>
              </div>
            </div>
          </div>

          <div class="row mt-4">
            <div class="col-md-6">
              <div class="left-column">
                <h6>Additional Information</h6>
                <p>Any extra content or information can be displayed here.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="right-column">
                <!-- Tin nhắn -->
                <div class="chat-message message-left">
                  Hello, I have an issue with your shop.
                </div>
                <div class="chat-message message-right">
                  Hi! Can you please explain the issue in detail?
                </div>
                <div class="chat-message message-left">
                  The shop is fake, and I want a refund.
                </div>
                <div class="chat-message message-right">
                  We’ll investigate the issue and get back to you.
                </div>
                <div class="chat-message message-left">
                  Thank you. Please handle this quickly.
                </div>
                <div class="chat-message message-right">
                  You’re welcome. We’ll get back to you soon.
                </div>
                <!-- Thêm nhiều tin nhắn nếu cần -->
              </div>
              <!-- Input -->
              <div class="message-input mt-3">
                <input type="text" class="form-control" placeholder="Type a message...">
                <button class="btn btn-warning">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                    <path d="M15.854.146a.5.5 0 0 1 0 .708L6.683 10H11a.5.5 0 0 1 .354.854l-10 10a.5.5 0 0 1-.708-.708l10-10H6a.5.5 0 0 1-.354-.854L15.146.146a.5.5 0 0 1 .708 0z"/>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

