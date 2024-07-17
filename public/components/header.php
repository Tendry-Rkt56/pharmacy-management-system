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
            <div class="logo">
               <h2>ADMIN</h2>
            </div>
            <nav>
               <ul>
                   <li class="lien <?php if(strlen($uri) == 1): ?>active<?php endif ?>"><a href="/">Accueil</a></li>
               	    <li class="lien <?php if(str_contains($uri, '/medicament')): ?>active<?php endif ?>"><a href="/medicament">Médicaments</a></li>
               	    <li class="lien <?php if(str_contains($uri, '/category')): ?>active<?php endif ?>"><a href="/category">Catégories</a></li>
               	    <li class="lien <?php if(str_contains($uri, '/user')): ?>active<?php endif ?>"><a  href="/user">Utilisateurs</a></li>
               	    <li class="lien <?php if(str_contains($uri, '/ventes')): ?>active<?php endif ?>"><a href="/ventes">Ventes</a></li>
				    <li>
					    <form action="/logout" method="POST">
						    <input type="submit" value="Déconnexion" class="btn btn-danger">
					    </form>
				    </li>
               	</ul>
            </nav>
     </div>	
     <section class="home-section">
      	<nav>
       	 	<div class="sidebar-button">
          		<i class="bx bx-menu sidebarBtn"></i>
          		<h3><span class="dashboard">PHA</span>RM</h3>
        		</div>
			<div class="admins d-flex align-items-center justify-content-center flex-row gap-3">
				<a class="liens <?php if (!str_contains($uri, '/users')):?>active<?php endif ?>" href="/">Administration</a>
				<a class="liens <?php if (str_contains($uri, '/users')):?>active<?php endif ?>" href="/users">Utilisateur</a>
			</div>
        		<a style="text-decoration:none;" href="/user/<?=$_SESSION['user']->id?>" class="profile-details">
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