<?php






?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>modeles</title>
  <link rel="stylesheet" href="switch.css" />


</head>
<body>
<div class="header">
    <img class="profile-icon" src="pro.png" alt="Profile" onclick="goToProfile()">  
<div class="slider" x-data="{start: true, end: false}" style="padding-top: 150px;">
    <div class="slider__content" x-ref="slider" x-on:scroll.debounce="$refs.slider.scrollLeft == 0 ? start = true : start = false; Math.abs(($refs.slider.scrollWidth - $refs.slider.offsetWidth) - $refs.slider.scrollLeft) < 5 ? end = true : end = false;">
      <div class="slider__item">
        <a href="temp1.php"> <img class="slider__image" src="temp11.php" alt="Image"></a>
        <div class="slider__info">
          <h2>Card 1</h2>
        </div>
      </div>
      <div class="slider__item">
        <a href="temp2.php"> <img class="slider__image" src="temp11.php" alt="Image"></a>

        <div class="slider__info">
          <h2>Card 2</h2>
        </div>
      </div>
      <div class="slider__item">
        <img class="slider__image" src="temp11.png" alt="Image">
        <div class="slider__info">
          <h2>Card 3</h2>
        </div>
      </div>
      
      </div>
      <div class="btn"></div>
      <button class="btn1 " onclick="generateCV()"> Genrate randomally

</button>
    </div>
   
  </div>
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.2/cdn.js"></script>
  <script>
    function generateCV() {
      var templates = ['temp1.php', 'temp2.php', 'temp3.php']; 
      var randomIndex = Math.floor(Math.random() * templates.length);
      var selectedTemplate = templates[randomIndex];
      window.location.href = selectedTemplate;
    }
    function goToProfile() {
      window.location.href = 'profile.php';
    }

  </script>
</body>
</html>
