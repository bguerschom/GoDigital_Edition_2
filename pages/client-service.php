<?php include('../includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Service Request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Service Request Form</h4>
                    </div>
                    <div class="card-body">
                        <form id="serviceForm">
                            <!-- Service Type Selection -->
                            <div class="mb-4">
                                <label class="form-label">Select Service Type</label>
                                <select class="form-select" id="serviceType" name="serviceType">
                                    <option value="">Choose service...</option>
                                    <option value="imei">Request Serial Number/IMEI</option>
                                    <option value="aircheck">Check if Number is on Air</option>
                                    <option value="unblock">Request to Unblock Number/MoMo</option>
                                    <option value="refund">Request Refund</option>
                                    <option value="other">Other Issues</option>
                                </select>
                            </div>

                            <!-- Dynamic Form Fields -->
                            <div id="formFields">
                                <!-- IMEI Request Form -->
                                <div class="form-section" id="imeiForm" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" name="phone_number" maxlength="10">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Date</label>
                                        <input type="date" class="form-control" name="date">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Phone Model</label>
                                        <select class="form-select" name="phone_model">
                                            <option>iPhone</option>
                                            <option>Samsung</option>
                                            <option>Techno</option>
                                            <option>Infinix</option>
                                            <option>Xiaomi</option>
                                            <option>Itel</option>
                                            <option>Nokia</option>
                                            <option>Huawei</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Air Check Form -->
                                <div class="form-section" id="aircheckForm" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label">Date of Issue</label>
                                        <input type="date" class="form-control" name="issue_date">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">IMEI Number</label>
                                        <input type="text" class="form-control" name="imei" maxlength="15">
                                    </div>
                                </div>

                                <!-- Unblock Form -->
                                <div class="form-section" id="unblockForm" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label">Phone Number to Unblock</label>
                                        <input type="tel" class="form-control" name="blocked_number" maxlength="10">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Details</label>
                                        <textarea class="form-control" name="unblock_details" rows="3"></textarea>
                                    </div>
                                </div>

                                <!-- Refund Form -->
                                <div class="form-section" id="refundForm" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label">From Phone Number</label>
                                        <input type="tel" class="form-control" name="from_number" maxlength="10">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">To Phone Number</label>
                                        <input type="tel" class="form-control" name="to_number" maxlength="10">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Date of Transaction</label>
                                        <input type="date" class="form-control" name="transaction_date">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Details</label>
                                        <textarea class="form-control" name="refund_details" rows="3"></textarea>
                                    </div>
                                </div>

                                <!-- Other Issues Form -->
                                <div class="form-section" id="otherForm" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="other_details" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Submit Request</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Hide all forms initially
            $('.form-section').hide();

            // Show relevant form based on selection
            $('#serviceType').change(function() {
                $('.form-section').hide();
                const selectedForm = '#' + $(this).val() + 'Form';
                $(selectedForm).show();
            });

            // Form submission
            $('#serviceForm').submit(function(e) {
                e.preventDefault();
                // Add your form submission logic here
                alert('Form submitted successfully!');
            });
        });
    </script>
</body>
</html>
