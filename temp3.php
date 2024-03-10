<?php

include 'conecti.php';


function cvput($name, $education, $work, $skill1,$skill2,$skill3,$conn){

  $sql = "INSERT INTO cv1 (name, edu, work, skill1, skill2, skill3) VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$name, $education, $work, $skill1,$skill2,$skill3]);


}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $name = $_POST['name'];
  $education = $_POST['education'];
  $work = $_POST['work'];
  $skill1=$_POST['skill1'];
  $skill2=$_POST['skill2'];
  $skill3=$_POST['skill3'];


  // Create user
  cvput($name, $education, $work, $skill1,$skill2,$skill3,$conn);
  echo "User created successfully!";
}



?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CV Template</title>
    <style>
        /* Resetting default margin and padding */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Body styles */
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: linear-gradient(#30142b, #a12727);
}
.btn-warning{ 
    position: relative; 
    padding: 11px 16px; 
    font-size: 15px;
     line-height: 1.5; 
     border-radius: 3px; 
     color: #fff; 
     background-color: pink;
      border: 0;
       transition: 
       0.2s; overflow: hidden;
        } 
        .btn-warning input[type = "file"]{
             cursor: pointer; position: absolute; left: 0%; top: 0%; transform: scale(3); opacity: 0; }
              .btn-warning:hover{ background-color: blue; }



/* Container styles */
.cv-container {
  max-width: 800px;
  margin: 0 auto;
  background: linear-gradient(to bottom, #007bff, #00bfff);
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Header styles */
.header {
  text-align: center;
  margin-bottom: 20px;
}

.header input[type="text"],
.header textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}




/* Section styles */
.section {
  margin-bottom: 20px;
  
}

.section h2 {
  margin-bottom: 10px;
  color: #333;
  
}

.section input[type="text"],
.section textarea {
  width: calc(100% - 22px);
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  background-color:pink;
}

/* Button styles */
button[type="submit"] {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}




.btn{
	color:blue;
	border:none;
	height:40px;
	width: 100px;
	border-radius:7px;
	cursor: pointer;

}
.btn:hover{
	color:white;
	background-color: #3b82f6;
	box-shadow: 0 0 0 5px #3b83f65f;
    align-items: center;
}

.image{
    width:180px;
    height:180px;
    border-radius:50%;
    margin-top:40px;
    margin-bottom:30px;
}

    </style>
</head>
  <body>
  <form method="post" >
  <script>
  document.addEventListener("DOMContentLoaded", function() {
    let profilepic = document.getElementById("pdp");
    let inputfile = document.getElementById("inputfile");

    inputfile.onchange = function() {
      profilepic.src = URL.createObjectURL(inputfile.files[0]);
    };
  });
</script>
  <div class="cv-container">
      <div class="header">
        <img src="profile.png" class="image" id="pdp">
      <div class="upload"> <button type = "button" class = "btn-warning" >
         <i class = "fa fa-upload"></i> Upload Picture <input type="file" id="inputfile"> </button> 
        </div>
        <br>
        <br>
        <br>
        

      </div>
      <div class="section">
      <textarea placeholder="About me"></textarea>

        <h2>Personal Information</h2>
        <input type="text" id="name" name="name" placeholder="Your Name" />
        <input type="text" placeholder="Email" />
        <input type="text" placeholder="Phone" />
        <input type="text" placeholder="Address" />
      </div>
      <div class="section">
        <h2>Education</h2>
        <textarea name="education"  id="education" placeholder="Education"></textarea>

      </div>
      <div class="section">
        <h2>Work Experience</h2>
                <textarea  name="work"  id="work"  placeholder="Work experience"></textarea>
      </div>
      <div class="section">
        <h2>Skills</h2>
        <input type="text" name="skill1" id="skill1" placeholder="Skill 1" />
        <input type="text" name="skill2"  id="skill2"  placeholder="Skill 2" />
        <input type="text"  name="skill3"  id="skill3" placeholder="Skill 3" />
      </div>
      <button type="submit" class="btn">save</button>    

    </div>
</form>
  </body>
</html>