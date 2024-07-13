<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="UTF-8" />
	<title>Utilisateur</title>
	<link rel="stylesheet" href="/assets/styles/style.css" />
	<!-- Boxicons CDN Link -->
	<link rel="stylesheet" href="assets/styles/bootstrap.min.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src="/assets/script/header.js" defer> </script>
</head>

  <body>
	<?php require_once 'components/users.php' ?>
	<div class="dashboards">
		<div class="d-flex align-items-center justify-content-center flex-wrap flex-row gap-4">
			<a href="/medicament" class="admin medicament d-flex align-items-center justify-content-center flex-column gap-2">
				<h3>Médicaments</h3>
			</a>
			<a href="/category" class="admin category d-flex align-items-center justify-content-center flex-column gap-2">
				<h3>Catégories</h3>
			</a>
			<a href="/user" class="admin user d-flex align-items-center justify-content-center flex-column gap-2">
				<h3>Utilisateurs</h3>
			</a>
			<div class="d-flex align-items-center justify-content-center flex-column gap-2">

			</div>
			<div class="d-flex align-items-center justify-content-center flex-column gap-2">

			</div>
		</div>
	</div>
  </body>
</html>