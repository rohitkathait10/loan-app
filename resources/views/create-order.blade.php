<!DOCTYPE html>
<html>
<head>
    <title>Create Order</title>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<h2>Create Order</h2>

<label>Customer ID:</label>
<input type="text" id="customer_id" required>

<button id="createOrderBtn">Create Order</button>

<br><br>
<div id="response"></div>

<script>
    $('#createOrderBtn').click(function () {

        let customer_id = $('#customer_id').val();

        $.ajax({
            url: '/api/create-order',
            type: 'POST',
            contentType: "application/json",
            data: JSON.stringify({
                customer_id: customer_id
            }),

            success: function (res) {

                $('#response').html(`
                    <h3>Scan & Pay</h3>

                    <img src="${res.qr_url}" width="250" alt="QR Code" />

                    <br><br>

                    <a href="${res.upi_link}">
                        <button>Pay Using UPI App</button>
                    </a>

                    <br><br>

                    <h3>Submit Payment Details</h3>

                    <label>UTR Number:</label><br>
                    <input type="text" id="utr_input" placeholder="Enter UTR Number" style="width:250px;"><br><br>

                    <label>Upload Payment Screenshot:</label><br>
                    <input type="file" id="screenshot_input" accept="image/*"><br><br>

                    <button id="submitPaymentBtn">Submit Payment</button>

                    <br><br>

                    <div id="paymentResponse"></div>

                    <br><br>
                    <pre>${JSON.stringify(res, null, 2)}</pre>
                `);

                // Handle submit payment button click
                $(document).on('click', '#submitPaymentBtn', function () {

                    let utr = $('#utr_input').val();
                    let screenshot = $('#screenshot_input')[0].files[0];

                    let formData = new FormData();

                    // Required fields for verifyPayment API
                    formData.append("customer_id", $('#customer_id').val());
                    formData.append("order_id", res.order_id);
                    formData.append("utr", utr);

                    if (screenshot) {
                        formData.append("payment_screenshot", screenshot);
                    }

                    $.ajax({
                        url: "/api/verify-payment",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,

                        success: function (paymentRes) {
                            $('#paymentResponse').html(
                                `<p style="color:green;">Payment details submitted successfully.</p>`
                            );
                        },

                        error: function (err) {
                            $('#paymentResponse').html(
                                `<p style="color:red;">Error: ${err.responseJSON?.message || "Something went wrong"}</p>`
                            );
                        }
                    });

                });

            },

            error: function (err) {
                $('#response').html("<pre>" + JSON.stringify(err.responseJSON, null, 2) + "</pre>");
            }
        });

    });
</script>

</body>
</html>
