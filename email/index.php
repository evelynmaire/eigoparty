<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/811496156b.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-envelope"></i> SJHS Email</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="#">New Message
                <span class="visually-hidden">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Inbox</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Junk</a>
            </li>
          </ul>
          <form class="d-flex">
        <input class="form-control me-sm-2 lightsearchbar" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8 email">
            <?php
              if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $to = "eviesensei@gmail.com";
                $subject = $_POST["subject"];
                $message = $_POST["message"];
                $from = $_POST["firstname"] . " " . $_POST["lastname"];
                $headers = "From: " . $from . "\r\n";
                $headers .= "Reply-To: " . $from . "\r\n";

                // Check if a file is uploaded
                if ($_FILES["attachment"]["name"] !== "") {
                  $file_name = $_FILES["attachment"]["name"];
                  $temp_name = $_FILES["attachment"]["tmp_name"];
                  $file_type = $_FILES["attachment"]["type"];

                  // Read the file content
                  $file_content = file_get_contents($temp_name);

                  // Add the file as an attachment
                  $attachment = chunk_split(base64_encode($file_content));
                  $headers .= "MIME-Version: 1.0\r\n";
                  $headers .= "Content-Type: application/octet-stream; name=\"" . $file_name . "\"\r\n";
                  $headers .= "Content-Transfer-Encoding: base64\r\n";
                  $headers .= "Content-Disposition: attachment; filename=\"" . $file_name . "\"\r\n\r\n";
                  $headers .= $attachment . "\r\n";
                }

                // Send the email
                $success = mail($to, $subject, $message, $headers);

                // Display a success or error message
                if ($success) {
                  echo "Email sent successfully.";
                } else {
                  echo "An error occurred while sending the email.";
                }
              }
              ?>


              <form action="https://submit-form.com/HaEqo9gv">                
                <fieldset>
                  <div class="mb-3 row form-group">
                    <label for="emailcc" class="form-label col-sm-2 col-form-label">To: </label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="emailto" id="firstnsame" aria-describedby="emailHelp" placeholder="" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <hr>
                  </div>
                  <div class="mb-3 row form-group">
                    <label for="emailcc" class="form-label col-sm-2 col-form-label">Cc: </label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="emailcc" id="lastname" aria-describedby="emailHelp" placeholder="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <hr>
                  </div>
                  <div class="mb-3 row form-group">
                    <label for="subject" class="form-label col-sm-2 col-form-label">Subject: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="subject" id="subject" aria-describedby="emailHelp" placeholder="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <hr>
                  </div>
                  <div class="mb-3 row form-group">
                    <label for="message" class="form-label col-sm-2 col-form-label">Message: </label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="message" id="message" rows="10"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <hr>
                  </div>
                  <div class="mb-3 row form-group">
                    <div class="col-sm-10">
                      <input class="form-control" name="attachment" type="file" id="attachment">
                    </div>
                    <button type="submit" class="col-sm-2 btn btn-primary">Send <i class="fa-solid fa-paper-plane"></i></button>
                  </div> 
                </fieldset>
              </form>
      
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
