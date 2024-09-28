
<?php

include 'conn.php';
// Prepare and bind

$stmt = $conn->prepare("INSERT INTO bookings (student_name, student_number, section, contact_number, booking_start_date, booking_end_date) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $studentName, $studentNumber, $section, $contact, $bookingDate, $bookingEndDate);

// Get form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentName = $_POST['studentName'];
    $studentNumber = $_POST['studentNumber'];
    $section = $_POST['section'];
    $contact = $_POST['contact'];
    $bookingDate = $_POST['bookingDate'];
    $bookingEndDate = $_POST['bookingEndDate'];

    // Execute the statement
    if ($stmt->execute()) {
        echo "New booking created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Close connections
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Title</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <div class="flex items-center w-full p-1 pl-6" style="display: flex; align-items: center; padding: 3px; width: 40px; background-color: transparent; height: 4rem;">
        <div class="flex items-center justify-center" style="display: flex; align-items: center; justify-content: center;">
            <img src="https://elc-public-images.s3.ap-southeast-1.amazonaws.com/bcp-olp-logo-mini2.png" alt="Logo" style="width: 30px; height: auto;">
        </div>
      </div>

      <div style="display: flex; flex-direction: column; align-items: center; padding: 16px;">
        <div style="display: flex; align-items: center; justify-content: center; width: 96px; height: 96px; border-radius: 50%; background-color: #334155; color: #e2e8f0; font-size: 48px; font-weight: bold; text-transform: uppercase; line-height: 1;">
            LC
        </div>
        <div style="display: flex; flex-direction: column; align-items: center; margin-top: 24px; text-align: center;">
            <div style="font-weight: 500; color: #fff;">
                Name
            </div>
            <div style="margin-top: 4px; font-size: 14px; color: #fff;">
                ID
            </div>
        </div>
    </div>

    <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <hr class="sidebar-divider">

        <li class="nav-heading">Library Management System</li>

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#system-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Library Management</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="system-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
            <li>
              <a href="LibraryDash.php">
                <i class="bi bi-circle"></i><span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="forms-elements.php" class="active">
                <i class="bi bi-circle"></i><span>Add Booking</span>
              </a>
            </li>
            <li>
              <a href="tables-data.php">
                <i class="bi bi-circle"></i><span>Booking Approval</span>
              </a>
            </li>
            <li>
              <a href="modules.html">
                <i class="bi bi-circle"></i><span>Database</span>
              </a>
            </li>
          </ul>
        </li><!-- End System Nav -->

      <hr class="sidebar-divider">

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
        <div class="pagetitle">
            <h1>Form Elements</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Forms</li>
                    <li class="breadcrumb-item active">Elements</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                                <form method="POST" action="forms-elements.php">
                                  <div class="row mb-3">
                                      <label for="studentName" class="col-sm-4 col-form-label">Student Name</label>
                                      <div class="col-sm-8">
                                          <input type="text" name="studentName" class="form-control" id="studentName" required>
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="studentNumber" class="col-sm-4 col-form-label">Student Number</label>
                                      <div class="col-sm-8">
                                          <input type="text" name="studentNumber" class="form-control" id="studentNumber" required>
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="section" class="col-sm-4 col-form-label">Section</label>
                                      <div class="col-sm-8">
                                          <input type="text" name="section" class="form-control" id="section" required>
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="contact" class="col-sm-4 col-form-label">Contact Number</label>
                                      <div class="col-sm-8">
                                          <input type="text" name="contact" class="form-control" id="contact" required>
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="bookingDate" class="col-sm-4 col-form-label">Booking Start Date</label>
                                      <div class="col-sm-8">
                                          <input type="date" name="bookingDate" class="form-control" id="bookingDate" required>
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="bookingEndDate" class="col-sm-4 col-form-label">Booking End Date</label>
                                      <div class="col-sm-8">
                                          <input type="date" name="bookingEndDate" class="form-control" id="bookingEndDate" required>
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <div class="col-sm-8 offset-sm-4">
                                          <button type="submit" class="btn btn-primary">Submit Form</button>
                                      </div>
                                  </div>
                              </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>