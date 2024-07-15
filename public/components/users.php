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

<header class="home-section">
     
 	<div class="sidebar-button">
     	<i class="bx bx-menu sidebarBtn"></i>
     	<h3><span class="dashboard">PHA</span>RM</h3>
     </div>
	<?php if (strtoupper($_SESSION['user']->roles) == "ADMIN"): ?>
		<form action="">
			<select name="" id="select" class="form-select">
				<option value="" disabled>Séléctionner en un</option>
				<option <?php if(!str_contains($uri, '/users')):?>selected<?php endif ?> value="admin">Administrateur</option>
				<option <?php if(str_contains($uri, '/users')):?>selected<?php endif ?> value="users">Utilisateur</option>
			</select>
		</form>
	<?php endif ?>
	<div class="admins d-flex align-items-center justify-content-center flex-row gap-3">
		<a class="liens <?php if($uri == "/users"):?>active<?php endif ?>" href="/users">Accueil</a>
		<a class="liens <?php if(str_contains($uri, '/medicaments')):?>active<?php endif ?>" href="/users/medicaments">Médicaments</a>
		<a class="liens <?php if(str_contains($uri, '/categories')):?>active<?php endif ?>" href="/users/categories">Catégories</a>
		<a class="liens <?php if(str_contains($uri, '/listes') || str_contains($uri, '/profil')):?>active<?php endif ?>" href="/users/listes">Utilisateurs</a>
		<a class="liens <?php if(str_contains($uri, '/vente')):?>active<?php endif ?>" href="/users/vente">Ventes</a>
	</div>
	<form action="/logout" method="POST">
			<input type="submit" class="btn btn-danger" value="Se déconnecter">
	</form>
     <a style="text-decoration:none;" href="/users/profil/<?=$_SESSION['user']->id?>" class="profile-details">
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
</header>
