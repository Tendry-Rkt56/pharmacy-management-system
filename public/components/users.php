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

    	<div class="sidebar sidebars">
      	<div class="logo-details">
        		<i class="bx bxs-bank"></i>
        		<span class="logo_name"> Utilisateur </span>
      	</div>
      	<ul class="nav-links">
        		<li>
          		<a href="/users" id="users-lien" class="<?php if ($uri == '/users'): ?>active<?php endif ?>">
            			<i class="bx bx-grid-alt"></i>
            			<span class="links_name users">Accueil</span>
         			</a>
        		</li>
        		<li>
          		<a href="/users/medicaments" id="users-lien" class="<?php if (str_contains($uri, '/medicament')): ?>active<?php endif ?>">
            			<i class="bx bx-box"></i>
            			<span class="links_name users">Médicaments</span>
          		</a>
        		</li>
        		<li>
          		<a href="/users/categories" id="users-lien" class="<?php if (str_contains($uri, '/categories')): ?>active<?php endif ?>">
           			<i class="bx bx-list-ul"></i>
            			<span class="links_name users">Catégories</span>
          		</a>
        		</li>
        		<li>
          		<a href="/users/listes" id="users-lien" class="<?php if (str_contains($uri, '/listes')): ?>active<?php endif ?>">
            			<i class="bx bx-pie-chart-alt-2"></i>
            			<span class="links_name users">Utilisateurs</span>
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
        		<a style="text-decoration: none;" href="/users/profil/<?=$_SESSION['user']->id?>" class="profile-details">
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
        		</a>
      	</nav>
    </section>