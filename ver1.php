<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f8f9fa; 
    }

    #contact-container {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    #contact-form-container {
      width: 50%;
      display: flex;
      flex-direction: column;
      text-align: center;
      justify-content: center;
    }

    #contact-image-container {
      position: relative;
      width: 50%;
      text-align: left;
      padding-left: 20px; 
    }

    #contact-image {
      width: 100%;
      max-width: 400px;
      height: auto;
      position: relative;
    }

    #contact-form {
      width: 100%;
    }
  </style>
</head>
<body>

<div class="container-fluid" id="contact-container">
  <div class="row">
    <div class="col-md-6" id="contact-image-container">
      <img src="img-1.jpg" alt="Contact Image" id="contact-image" class="img-fluid">
    </div>
    <div class="col-md-6" id="contact-form-container">
      <div id="message-heading">
        <h2>Send Us A Message</h2>
      </div>
      <form id="contact-form" action="process-form.php" method="post">
        <div class="form-group">
          <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
        </div>
        <div class="form-group">
          <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
        </div>
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
          <input type="tel" name="phone_number" class="form-control" placeholder="Phone Number" required>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="message" rows="4" placeholder="Message" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

      <?php
          
          if (isset($_GET['status'])) {
              $status = $_GET['status'];

              
              if ($status === 'success') {
                  echo '<script>alert("Data saved successfully!");</script>';
              } elseif ($status === 'error') {
                  $errorMessage = urldecode($_GET['message']);
                  echo '<script>alert("Error: ' . $errorMessage . '");</script>';
              }
          }
      ?>

    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
