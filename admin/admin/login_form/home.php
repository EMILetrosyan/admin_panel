<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>


	


<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>

<!-- Required meta tags -->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>

/*nav bar header*/ 
header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px 120px;
    background: #11141a;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 100;
}
 
.logo {
    font-size: 25px;
    color: #fff;
    text-decoration: none;
    font-weight: 600;
}
 
nav a {
    font-size: 18px;
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    margin-left: 35px;
    transition: .3s;
}
 
nav a:hover,
nav a.active {
    color: #0ef;
}

/*BETA MODAL POPUP */
/* Базовые стили слоя затемнения и модального окна */
		.overlay {
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		z-index: 1;
		visibility: hidden;
		/* фон затемнения */
		background-color: rgba(0, 0, 0, 0.7);
		opacity: 0;
		position: fixed; /* фиксированное поцизионирование */
		cursor: default; /* тип курсара */
		-webkit-transition: opacity .5s;
		-moz-transition: opacity .5s;
		-ms-transition: opacity .5s;
		-o-transition: opacity .5s;
		transition: opacity .5s;
		}
		.overlay:target {
		visibility: visible;
		opacity: 1;
		}
		.is-image {
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		display:block;
		margin: 10&;
		width: 100%;
		height: auto;
		/* скругление углов встроенных картинок */
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		-ms-border-radius: 4px;
		border-radius: 4px;
		}
		/* встроенные элементы м-медиа, фреймы */
		embed, iframe {
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		display:block;
		margin: auto;
		min-width: 320px;
		max-width: 600px;
		width: 100%;
		}
		
		/*** Формируем стили модального окна ***/
		.popup {
		top: 0;
		right: 0;
		left: 0;
		font-size: 14px;
		z-index: 10;
		display: block;
		visibility: hidden;
		margin: 0 auto;
		width: 90%;
		min-width: 320px;
		max-width: 600px;
		/* фиксированное позиционирование, окно стабильно при прокрутке */
		position: fixed;
		padding: 15px;
		border: 1px solid #383838;
		/* скругление углов */
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		-ms-border-radius: 4px;
		border-radius: 4px;
		background-color: #FFFFFF;
		/* внешняя тень блока */
		-webkit-box-shadow: 0 0 6px rgba(0, 0, 0, 0.8);
		-moz-box-shadow: 0 0 6px rgba(0, 0, 0, 0.8);
		-ms-box-shadow: 0 0 6px rgba(0, 0, 0, 0.8);
		-o-box-shadow: 0 0 6px rgba(0, 0, 0, 0.8);
		box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.8);
		/* полная прозрачность окна, появление при клике */
		opacity: 0;
		/* эффект перехода (появление) */
		-webkit-transition: all ease .5s;
		-moz-transition: all ease .5s;
		-ms-transition: all ease .5s;
		-o-transition: all ease .5s;
		transition: all ease .5s;
		}
		/* активируем появление окна и затемнение фона */
		.overlay:target+.popup {
		top: 20%; /* положение окна от верха страницы при появлении */
		visibility: visible;
		opacity: 1; /* убираем прозрачность */
		}
		/* формируем кнопку закрытия */
		.close {
		position: absolute;
		top: -10px;
		right: -10px;padding: 0;
		width: 20px;
		height: 20px;
		border: 2px solid #ccc;
		-webkit-border-radius: 15px;
		-moz-border-radius: 15px;
		-ms-border-radius: 15px;
		-o-border-radius: 15px;
		border-radius: 15px;
		background-color: rgba(61, 61, 61, 0.8);
		-webkit-box-shadow: 0px 0px 10px #000;
		-moz-box-shadow: 0px 0px 10px #000;
		box-shadow: 0px 0px 10px #000;
		text-align: center;
		text-decoration: none;
		font-weight: bold;
		line-height: 20px;
		/* задаём значения и эффект перехода при наведении */
		-webkit-transition: all ease .8s;
		-moz-transition: all ease .8s;
		-ms-transition: all ease .8s;
		-o-transition: all ease .8s;
		transition: all ease .8s;
		}
		.close:before {
		color: rgba(255, 255, 255, 0.9);
		content: "X";
		text-shadow: 0 -1px rgba(0, 0, 0, 0.9);
		font-size: 12px;
		}
		.close:hover {
		background-color: rgba(252, 20, 0, 0.8);
		/* крутим кнопку при наведении */
		-webkit-transform: rotate(360deg);
		-moz-transform: rotate(360deg);
		-ms-transform: rotate(360deg);
		-o-transform: rotate(360deg);
		transform: rotate(360deg);
		}
		/* опционально при добавлении вложений */
	
		
		/* button */
		
		.button {
		
		font-size: 20px;
		color: white;
		width: 270px;
		text-decoration: none;
		padding: 10px 5px;
		border-radius: 10px;
		-moz-border-radius: 10px;
		-webkit-border-radius: 10px;
		font-family: Helvetica, Arial, sans-serif;
		transition: all 0.3s;
		-moz-transition: all 0.3s;
		-webkit-transition: all 0.3s;
		cursor: pointer;
		
		}
		.button-blue {
		background-color: #0600FF;
		}
		.button:hover {
		background-color: #5555ff;
		box-shadow:0 0 10px 10px #b7b7ff inset;
		}
		.button:active {
		background-color: #0000ff;
		box-shadow:0 0 0 0 #ffffff;
		}



		/* опционально при добавлении вложений */
	
		
		/* button */
		
		
		







/*modal popup maybe*/ 
modal-container {
			background-color: #ffffff;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
			border-radius: 8px;
			padding: 20px;
			max-width: 400px;
			width: 100%;
			text-align: center;
			position: relative;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			gap: 20px;
		}

		.modal-header {
			font-size: 24px;
			font-weight: bold;
		}

		.modal-button {
			background-color: #007bff;
			color: white;
			border: none;
			border-radius: 4px;
			padding: 10px 20px;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}

		.modal-button:hover {
			background-color: #0056b3;
		}

		.overlay {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.5);
			display: none;
			justify-content: center;
			align-items: center;
		}

		.modal-show {
			display: flex;
		}





/*body card */

  .card {
    
    width: 18rem;
    border: 1px solid #ccc;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    margin: 20px;
    background-color: #fff;
    display: inline-block;
  }

  .card-img-top {
    width: 100%;
    height: auto;
  }

  .card-body {
    padding: 10px;
  }

  .card-title {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
  }

  .card-text {
    margin-bottom: 1rem;
  }

  .list-group {
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .list-group-item {
    padding: 5px 10px;
    border-top: 1px solid #ddd;
  }

  .card-link {
    display: inline-block;
    margin-right: 10px;
    color: #007bff;
    text-decoration: none;
  }

  .card {
    
    width: 18rem;
    border: 1px solid #ccc;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    margin: 20px;
    background-color: #fff;
    display: inline-block;
  }

  .card-img-top {
    width: 100%;
    height: auto;
  }

  .card-body {
    padding: 10px;
  }

  .card-title {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
  }

  .card-text {
    margin-bottom: 1rem;
  }

  .list-group {
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .list-group-item {
    padding: 5px 10px;
    border-top: 1px solid #ddd;
  }

  .card-link {
    display: inline-block;
    margin-right: 10px;
    color: #007bff;
    text-decoration: none;
  }

  .card {
    
    width: 18rem;
    border: 1px solid #ccc;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    margin: 20px;
    background-color: #fff;
    display: inline-block;
  }

  .card-img-top {
    width: 100%;
    height: auto;
  }

  .card-body {
    padding: 10px;
  }

  .card-title {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
  }

  .card-text {
    margin-bottom: 1rem;
  }

  .list-group {
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .list-group-item {
    padding: 5px 10px;
    border-top: 1px solid #ddd;
  }

  .card-link {
    display: inline-block;
    margin-right: 10px;
    color: #007bff;
    text-decoration: none;
  }

  .card {
    
    width: 18rem;
    border: 1px solid #ccc;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    margin: 20px;
    background-color: #fff;
    display: inline-block;
  }

  .card-img-top {
    width: 100%;
    height: auto;
  }

  .card-body {
    padding: 10px;
  }

  .card-title {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
  }

  .card-text {
    margin-bottom: 1rem;
  }

  .list-group {
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .list-group-item {
    padding: 5px 10px;
    border-top: 1px solid #ddd;
  }

  .card-link {
    display: inline-block;
    margin-right: 10px;
    color: #007bff;
    text-decoration: none;
  }
  .card {
    
    width: 18rem;
    border: 1px solid #ccc;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    margin: 20px;
    background-color: #fff;
    display: inline-block;
  }

  .card-img-top {
    width: 100%;
    height: auto;
  }

  .card-body {
    padding: 10px;
  }

  .card-title {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
  }

  .card-text {
    margin-bottom: 1rem;
  }

  .list-group {
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .list-group-item {
    padding: 5px 10px;
    border-top: 1px solid #ddd;
  }

  .card-link {
    display: inline-block;
    margin-right: 10px;
    color: #007bff;
    text-decoration: none;
  }

  .card {
    
    width: 18rem;
    border: 1px solid #ccc;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    margin: 20px;
    background-color: #fff;
    display: inline-block;
  }

  .card-img-top {
    width: 100%;
    height: auto;
  }

  .card-body {
    padding: 10px;
  }

  .card-title {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
  }

  .card-text {
    margin-bottom: 1rem;
  }

  .list-group {
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .list-group-item {
    padding: 5px 10px;
    border-top: 1px solid #ddd;
  }

  .card-link {
    display: inline-block;
    margin-right: 10px;
    color: #007bff;
    text-decoration: none;
  }
  .card {
    
    width: 18rem;
    border: 1px solid #ccc;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    margin: 20px;
    background-color: #fff;
    display: inline-block;
  }

  .card-img-top {
    width: 100%;
    height: auto;
  }

  .card-body {
    padding: 10px;
  }

  .card-title {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
  }

  .card-text {
    margin-bottom: 1rem;
  }

  .list-group {
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .list-group-item {
    padding: 5px 10px;
    border-top: 1px solid #ddd;
  }

  .card-link {
    display: inline-block;
    margin-right: 10px;
    color: #007bff;
    text-decoration: none;
  }

  .card {
    
    width: 18rem;
    border: 1px solid #ccc;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    margin: 20px;
    background-color: #fff;
    display: inline-block;
  }

  .card-img-top {
    width: 100%;
    height: auto;
  }

  .card-body {
    padding: 10px;
  }

  .card-title {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
  }

  .card-text {
    margin-bottom: 1rem;
  }

  .list-group {
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .list-group-item {
    padding: 5px 10px;
    border-top: 1px solid #ddd;
  }

  .card-link {
    display: inline-block;
    margin-right: 10px;
    color: #007bff;
    text-decoration: none;
  }

/*user name*/ 
.sreep{
     color:#fff;
}

.screep2{
     color:#fff;
     
}
/*second body*/
.info{
     transform:translate(0,190px);
     margin-left:120px;
}


  /*footer*/
  .footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
}
.social-icons {
    margin-top: 25px;
}
.social-icons a {
    color: white;
    text-decoration: none;
    margin: 0 10px;
    font-size: 18px;
}
   


</style>
</head>
<body>

<h1 class="screep2">Hello, <?php echo $_SESSION['name']; ?></h1>


<!-- pagination beta version -->

<!--

<div class="pagination-container">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>

-->

<!-- pagination beta version -->



<header>
        <a href="#" class="logo">EP-OPEN CODE</a>
 
        <nav>
            <a href="index.php" class="active">Home</a>
            <a href="about.php">About</a>
            <a href="#portfolio">Codes</a>
            <a  class="sreep "href="logout.php">Logout</a>
            <a class="screep2">Hello, <?php echo $_SESSION['name']; ?></a>
            <a href="../login_form/textolite/home.php">Admin Panel</a>

        </nav>
    </header>

    <div class="info">
<div class="card">
  <img class="card-img-top" src="s.png" alt="Error">
  <div class="card-body">
    <h5 class="card-title">Pagination&nbsp;</h5>
    <p class="card-text">Sorry , but this moment you can not watch this beacause , this page not work , but will open (maybe ;D )</p>
  </div>
  <ul class="list-group">
    <li class="list-group-item">language - none</li>
    <li class="list-group-item">html - none</li>
    <li class="list-group-item">css&nbsp; - none</li>
  </ul>
  <div class="card-body">
  
  <a href="#win9" class="button button-blue">OPEN</a>
  </div>
</div>
<div class="card">
  <img class="card-img-top" src="y.png" alt="Error">
  <div class="card-body">
    <h5 class="card-title">Youtube Logo</h5>
    <p class="card-text"><a href="https://codepen.io/LeonimuZ/pen/kYyKaq">Click here and look code</a>&nbsp; , its really cool  , you can only click and use it .&nbsp;</p>
  </div>
  <ul class="list-group">
    <li class="list-group-item">language - html , css</li>
    <li class="list-group-item">html - yes</li>
    <li class="list-group-item">css&nbsp; - none</li>
  </ul>
  <div class="card-body">
  <a href="#win2" class="button button-blue">OPEN</a>
    
  </div>
</div>
<div class="card">
  <img class="card-img-top" src="s.png" alt="Error">
  <div class="card-body">
    <h5 class="card-title">SOON</h5>
    <p class="card-text">Sorry , but this moment you can not watch this beacause , this page not work , but will open (maybe ;D )</p>
  </div>
  <ul class="list-group">
    <li class="list-group-item">language - none</li>
    <li class="list-group-item">html - none</li>
    <li class="list-group-item">css&nbsp; - none</li>
  </ul>
  <div class="card-body">
  <a href="#win3" class="button button-blue">OPEN</a>
   
  </div>
</div>
<div class="card">
  <img class="card-img-top" src="v.png" alt="Error">
  <div class="card-body">
    <h5 class="card-title">Vue logo&nbsp;</h5>
    <p class="card-text"><a href="https://codepen.io/rebelchris/pen/rNJQXVo">Click here and look code</a>&nbsp; , its really cool  , you can only click and use it .&nbsp;</p>
  </div>
  <ul class="list-group">
    <li class="list-group-item">language - html , css&nbsp;</li>
    <li class="list-group-item">html - yes</li>
    <li class="list-group-item">css&nbsp; - none</li>
  </ul>
  <div class="card-body">
  <a href="#win4" class="button button-blue">OPEN</a>
  
   
  </div>
</div>
<div class="card">
  <img class="card-img-top" src="t.png" alt="Error">
  <div class="card-body">
    <h5 class="card-title">Twitter</h5>
    <p class="card-text"><a href="https://codepen.io/moneyandspoils/pen/DwKyEr">Click here and look code</a>&nbsp; , its really cool  , you can only click and use it .&nbsp;</p>
  </div>
  <ul class="list-group">
    <li class="list-group-item">language - html , css&nbsp;</li>
    <li class="list-group-item">html - yes</li>
    <li class="list-group-item">css&nbsp; - none</li>
  </ul>
  <div class="card-body">
  <a href="#x" class="overlay" id="win1"></a>
		
    <a href="#win5" class="button button-blue">OPEN</a>
    
  </div>
</div>

</div>

<div class="footer">
        <p>&copy; 2023 Your Company. All rights reserved.</p>
        <div class="social-icons">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
</svg><a href="https://www.instagram.com/emil______________/">Instagram</a>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
</svg><a href="https://twitter.com/EP_my_youtube">Twitter</a>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
</svg><a href="https://www.facebook.com/emil.petrosyan.735/">Facebook</a>
        </div>
    </div>
    
 <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
   
    <br>
	<!-- Ссылки на вызов модальных окон-->
	

	<!-- Вызов окна через миниатюру изображения -->
	<!-- Модальное окно №1 -->
		<a href="#x" class="overlay" id="win1"></a>
		<div class="popup">
    
        <h1>HERE IS THE CODE</h1>
        <img src="1.png" alt="Italian Trulli">
    
			<a class="close" title="Закрыть" href="#close"></a>
		</div>

    <a href="#x" class="overlay" id="win5"></a>
		<div class="popup">
    <pre>
        <h1>     HERE IS THE CODE</h1>
        
        
        <h2>     Click here and you can <p>     look the code 👇</p> 
        <a href="#win5" class="button button-blue">Watch</a> </h2>
        
        
        </span>
        
       
       
    </pre>
			<a class="close" title="Закрыть" href="#close"></a>
		</div>

    
		<div class="popup">
    <pre>
        <h1>     HERE IS THE CODE</h1>
        
        
        <h2>     Click here and you can <p>     look the code 👇</p> 
        <a href="https://codepen.io/rebelchris/pen/rNJQXVo" class="button button-blue">Watch</a> </h2>
        
        
        </span>
        
       
       
    </pre>
			<a class="close" title="Закрыть" href="#close"></a>
		</div>

    <a href="#x" class="overlay" id="win3"></a>
		<div class="popup">
			
	
			<a class="close" title="Закрыть" href="#close"></a>
		</div>

    <a href="#x" class="overlay" id="win2"></a>
		<div class="popup">
    <pre>
        <h1>     HERE IS THE CODE</h1>
        
        
        <h2>     Click here and you can <p>     look the code 👇</p> 
        <a href="#win5" class="button button-blue">Watch</a> </h2>
        
        
        </span>
        
       
       
    </pre>
	
			<a class="close" title="Закрыть" href="#close"></a>
		</div>

  
</body>
</html>
