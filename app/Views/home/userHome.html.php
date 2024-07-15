<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="UTF-8" />
	<title>Utilisateur</title>
	<link rel="stylesheet" href="/assets/styles/header.css" />
	<!-- Boxicons CDN Link -->
	<link rel="stylesheet" href="assets/styles/bootstrap.min.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src="/assets/script/header.js" defer></script>
</head>

  <body>
	<?php require_once 'components/users.php' ?>
	<div class="dashboards">
		<div class="cards">
     	     <a style="text-decoration: none;" href="/users/medicaments" class="card blue">
     	         <h3>Médicaments</h3>
     	         <p><?=$medicaments?></p>
     	         <span>Voir les médicaments</span>
     	     </a>
     	     <a style="text-decoration: none;" href="/users/categories" class="card light-blue">
     	         <h3>Catégories</h3>
     	         <p><?=$categories?></p>
     	         <span>Voir les catégories</span>
     	     </a>
     	     <a style="text-decoration: none;" href="/users/listes" class="card purple">
     	         <h3>Utilisateurs</h3>
     	         <p><?=$users?></p>
     	         <span>Voir les utilisateurs</span>
     	     </a>
     	     <a style="text-decoration: none;" href="/users/vente" class="card green">
     	         <h3>Ventes</h3>
			    <i style="color:white">Les 5 dérnières ventes: </i>
     	         <p class="fw-bolder"><?=number_format($achats, thousands_separator: ' ')?> Ar</p>
     	         <span>Gérer les ventes</span>
     	     </a>
     	</div>
	</div>
  </body>
</html>
