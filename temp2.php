<?php

include 'conecti.php';
include 'user.php';
require_once('TCPDF-main/tcpdf.php'); 

function generatePDF($data) {
  // sna3et pdf
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

  // Set document information
  $pdf->SetCreator(PDF_CREATOR);
  $pdf->SetTitle('CV Template');

  // Add a page
  $pdf->AddPage();

  // Set font
  $pdf->SetFont('helvetica', '', 12);

  // Output the HTML content
  $html = '<h1>CV Template</h1>';
  $html .= '<p>Name: ' . $data['name'] . '</p>';
  $html .= '<p>About Me: ' . $data['about_me'] . '</p>';
  $html .= '<p>education: ' . $data['edu'] . '</p>';
  $html .= '<p>work experience: ' . $data['work'] . '</p>';
  $html .= '<p>social experience: ' . $data['social'] . '</p>';
  $html .= '<p>skills : ' . $data['skills1'] .$data['skills2'].$data['skills3'].'</p>';
  $pdf->writeHTML($html, true, false, true, false, '');

  // Save the PDF as a file
  $pdfPath = 'c:\xampp\htdocs\projet\pdf' . uniqid() . '.pdf'; // Change the directory to where you want to save the PDF
  $pdf->Output($pdfPath, 'F');

  return $pdfPath;
}













function cvput($name, $aboutme, $education, $work, $social, $skill1, $skill2, $skill3, $conn) {
  session_start();
  $userAddress = $_SESSION['adresse'];
  $sql = "INSERT INTO cv2 (mail, name, about_me, edu, work, social, skill1, skill2, skill3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$userAddress, $name, $aboutme, $education, $work, $social, $skill1, $skill2, $skill3]);
}






if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $name = $_POST['name'];
  $aboutme=$_POST['about_me'];
  $education= $_POST['edu'];
  $work= $_POST['work'];
  $social=$_POST['social'];
  $skill1=$_POST['skills1'];
  $skill2=$_POST['skills2'];
  $skill3=$_POST['skills3'];


  // Create user
  cvput($name,$aboutme,$education, $work, $social ,$skill1,$skill1,$skill1,$conn);

  $pdfPath = generatePDF($_POST);
  echo "CV saved successfully! <a href='$pdfPath'>Download PDF</a>";

}
















?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CV Template</title>
    <link rel="stylesheet" href="temp2.css" />
  </head>
  <body>
    <form method="post" action="">
      <div class="cv-container">
        <div class="header">
          <input
            type="text"
            id="name"
            name="name"
            placeholder="Your Name"
            required
          />
          <input
            type="file"
            id="profile_picture"
            name="profile_picture"
            accept="image/*"
            required
          />
        </div>
        <div class="section">
          <h2>About Me</h2>
          <textarea
            id="about_me"
            name="about_me"
            placeholder="Briefly introduce yourself"
          ></textarea>
        </div>
        <div class="section">
          <h2>Contact Information</h2>
          <input
            type="text"
            id="email"
            name="email"
            placeholder="Email"
            required
          />
          <input
            type="text"
            id="phone"
            name="phone"
            placeholder="Phone"
            required
          />
          <input
            type="text"
            id="address"
            name="address"
            placeholder="Address"
            required
          />
        </div>
        <div class="section">
          <h2>Education</h2>
          <textarea type="text" id="edu" name="edu"></textarea>
        </div>
        <div class="section">
          <h2>Work Experience</h2>
          <textarea type="text" id="work" name="work"></textarea>
        </div>
        <div class="section">
          <h2>Social Experience</h2>
          <textarea type="text" id="social" name="social"> </textarea>
        </div>

        <div class="section">
          <h2>Skills</h2>
          <input
            type="text"
            id="skill1"
            name="skills1"
            placeholder="Skill 1"
            required
          />
          <input
            type="text"
            id="skill2"
            name="skills2"
            placeholder="Skill 2"
            required
          />
          <input
            type="text"
            id="skill3"
            name="skills3"
            placeholder="Skill 3"
            required
          />
        </div>
        <button type="submit">Submit</button>
      </div>
    </form>
  </body>
</html>
