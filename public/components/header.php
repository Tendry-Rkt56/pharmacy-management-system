<?php
	$uri = $_SERVER['REQUEST_URI'];
     $vert = rand(0, 255);
     $rouge = rand(0, 255);
     $blue = rand(0, 255);
     $color = "rgb($rouge, $vert, $blue)";
?>
	<style>
          .randoms {
               width:100%;
               display: flex;
               align-items:center;
               justify-content:center;
          }

          .random {
               width:30px;height:30px;
               font-weight:bold;
               border-radius:50%;
               font-size:14px;
               text-align:center;
               color:white;
               opacity:0.8;
          }
     </style>

    	<div class="sidebar">
      	<div class="logo-details">
        		<i class="bx bxs-bank"></i>
        		<span class="logo_name"> Admin </span>
      	</div>
      	<ul class="nav-links">
        		<li>
          		<a href="/" class="<?php if (strlen($uri) < 1): ?>active<?php endif ?>">
            			<i class="bx bx-grid-alt"></i>
            			<span class="links_name">Accueil</span>
         			</a>
        		</li>
        		<li>
          		<a href="/medicament" class="<?php if (str_contains($uri, 'medicament')): ?>active<?php endif ?>">
            			<i class="bx bx-box"></i>
            			<span class="links_name">Médicaments</span>
          		</a>
        		</li>
        		<li>
          		<a href="/category" class="<?php if (str_contains($uri, 'category')): ?>active<?php endif ?>">
           			<i class="bx bx-list-ul"></i>
            			<span class="links_name">Catégories</span>
          		</a>
        		</li>
        		<li>
          		<a href="/user" class="<?php if (str_contains($uri, 'user')): ?>active<?php endif ?>">
            			<i class="bx bx-pie-chart-alt-2"></i>
            			<span class="links_name">Utilisateurs</span>
          		</a>
        		</li>
        		<li>
          		<a href="#" class="<?php if (strlen($uri) < -1): ?>active<?php endif ?>">
            			<i class="bx bx-coin-stack"></i>
            			<span class="links_name">Achats</span>
          		</a>
			</li>
        		<li>
          		<form action="/logout" class="mt-4 bx bx-book-alt nav" method="POST">
            			<i class=""></i>
            			<input type="submit" class="btn btn-outline-danger links_name" value="Se déconnecter">
          		</form>
			</li>
        
      	</ul>
    	</div>
     <section class="home-section">
      	<nav>
       	 	<div class="sidebar-button">
          		<i class="bx bx-menu sidebarBtn"></i>
          		<h3><span class="dashboard">PHA</span>RM</h3>
        		</div>
        		<div class="profile-details">
				<?php if (isset($_SESSION['user']))
					$user = $_SESSION['user'];
				?>
				<?php if (isset($user->image)): ?>
					<img src="/<?=$user->image?>" alt="" />
				<?php else: ?>
					<div class="randoms">
                              <span class="random d-flex align-items-center justify-content-center" style="background:<?=$color?>;"><?=substr($user->nom, 0, 1)?></span>
                         </div>
				<?php endif ?>
          		<span class="admin_name"><?=$user->nom?> <?=$user->prenom?></span>
          		<i class="bx bx-chevron-down"></i>
        		</div>
      	</nav>
    </section>