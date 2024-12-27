<?php include('../includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check-in Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Visitor Check-in</h4>
                    </div>
                    <div class="card-body">
                        <form id="checkinForm">
                            <div class="row g-3">
                                <!-- ID/Passport Section -->
                                <div class="col-12 mb-3">
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-outline-primary" id="scanBtn">
                                            Scan ID/Passport
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary" id="manualBtn">
                                            Manual Entry
                                        </button>
                                    </div>
                                </div>

                                <!-- Personal Information -->
                                <div class="col-md-6">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="fullName" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">ID/Passport Number</label>
                                    <input type="text" class="form-control" name="idNumber" required>
                                </div>

                                <!-- Additional Information -->
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" name="phone" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Type</label>
                                    <select class="form-select" name="type" id="visitorType">
                                        <option value="visitor">Visitor</option>
                                        <option value="client">Client</option>
                                    </select>
                                </div>

                                <!-- Visitor Specific Fields -->
                                <div id="visitorFields">
                                    <div class="col-12">
                                        <label class="form-label">Department</label>
                                        <select class="form-select" name="department">
                                            <option>IT</option>
                                            <option>Finance</option>
                                            <option>HR</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Reason for Visit</label>
                                        <textarea class="form-control" name="reason" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary w-100">Register Check-in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
