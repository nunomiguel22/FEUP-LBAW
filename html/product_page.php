<!DOCTYPE html>         
<html>


<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Page Game Shop</title>

  <!-- Bootstrap and dependencies -->
  <script src="/bootstrap/jquery-3.3.1.slim.min.js"></script>
  <script src="/bootstrap/popper.min.js"></script>
  <script src="/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">

  <!-- FontAwesome -->
  <link rel="stylesheet" href="/fontawesome/css/all.min.css">

  <!-- Stylesheet -->
  <link rel="stylesheet" href="/css/style.css">
</head>


<body>

<!-- Header Area -->

 <?php
    include_once 'navbar_logged.php';
  ?>

  <!-- Breadcrumbs -->
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="/index.php"> Home </a></li>
      <li class="breadcrumb-item active" aria-current="page"> Product </li>
    </ol>
  </div>

  <!-- header Area -->

  <!-- Main Area -->
  <div class="container" style="padding-top:30px;">
    <div class="row">
        <div class="col">
            <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/img/CP2077.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/CP2077C1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/CP2077C2.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <h3>CyberPunk 2077</h3>  
                <br>  
                <br> 
                <br>
                <br>
                <p style="font-size:115%;">Cyberpunk 2077 é uma história de ação/aventura no mundo aberto de Night City, uma megalópole obcecada com poder, glamour e alterações de corpos. Aqui serás V, um mercenário exilado que persegue um implante essencial para obter a imortalidade. Poderás personalizar o cyberware, 
                habilidades e estilo da tua personagem e explorar uma vasta cidade onde as escolhas que tomares irão moldar a história e o mundo que te rodeia.
                </p>
            </div>
            <div class="row align-items-center" style="padding-top:25px; padding-left:70px;">
                <div class="col-6">
                    <button type="button" class="btn btn-primary">Add to cart</button>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-primary">Add to wishlist</button>
                </div>
            </div>
        </div>
    </div>
  </div>

  <div class="container" style="padding-top:50px;">
    <div class="row">
      <div class="col">
        <hr style="background:white;">
      </div>
      <span><i class="fas fa-book"></i> Reviews </span>
      <div class="col">
        <hr style="background:white;">
      </div>
    </div>
  </div>

  <div class="container" style="padding-top:50px;">
    <div class="card mb-5">
      <div class="card-header">
        The_User
      </div>
      <div class="card-body">
        <p class="card-text"> 
          A imagem do artigo colocado inicialmente no website da Worten não correspondia à realidade. A imagem presente era da edição em steelcase e a edição em causa que é tipo digipack. 
        Fiquei um pouco desiludido quando vi que a edição física não correspondia à imagem publicada pela Worten. Mas de resto, tudo bem.</p>
      </div>
    </div>

    <div class="card mb-5">
      <div class="card-header">
        Maria Ines
      </div>
      <div class="card-body">
        <p class="card-text"> 
          A imagem do artigo colocado inicialmente no website da Worten não correspondia à realidade. A imagem presente era da edição em steelcase e a edição em causa que é tipo digipack. 
        Fiquei um pouco desiludido quando vi que a edição física não correspondia à imagem publicada pela Worten. Mas de resto, tudo bem.</p>
      </div>
    </div>

    <div class="card mb-5">
      <div class="card-header">
        Teresa Pinto
      </div>
      <div class="card-body">
        <p class="card-text"> 
          A imagem do artigo colocado inicialmente no website da Worten não correspondia à realidade. A imagem presente era da edição em steelcase e a edição em causa que é tipo digipack. 
        Fiquei um pouco desiludido quando vi que a edição física não correspondia à imagem publicada pela Worten. Mas de resto, tudo bem.</p>
      </div>
    </div>

    <div class="card mb-5">
      <div class="card-header">
        Gonçalo Gonçalves
      </div>
      <div class="card-body">
        <p class="card-text"> 
          A imagem do artigo colocado inicialmente no website da Worten não correspondia à realidade. A imagem presente era da edição em steelcase e a edição em causa que é tipo digipack. 
        Fiquei um pouco desiludido quando vi que a edição física não correspondia à imagem publicada pela Worten. Mas de resto, tudo bem.</p>
      </div>
    </div>
  </div>

  <section class="contact-form-section mb-5">
			<div class="container">
			    <form id="contact-form" class="contact-form p-5 col-lg-9 mx-lg-auto" novalidate="novalidate">
			        <h3 class="text-center">Write a review</h3>
			        <div class="mb-3 text-center">In order to help others, please leave a review.</div>
			        <div class="form-row">                                                           
		                <div class="form-group col-md-6">
		                    <label class="sr-only" for="cname">Name</label>
		                    <input type="text" class="form-control" id="cname" name="name" placeholder="Name" minlength="2" required="">
		                </div>    
		                
		                <div class="form-group col-12">
		                    <label class="sr-only" for="cmessage">Your message</label>
		                    <textarea class="form-control" id="creview" name="review" placeholder="Enter your review" rows="10" required=""></textarea>
		                </div>
		                 <div class="form-group col-12">
		                    <button type="submit" class="btn btn-block btn-primary py-2">Add review</button>
		                </div>                           
		            </div><!--//form-row-->
		        </form>
		    </div><!--//container-->
	</section>

  <!-- Main Area -->


   <!-- FOOTER -->
  <?php
    include_once 'footer.php';
  ?>
  <!-- FOOTER -->


</body>


</html>



