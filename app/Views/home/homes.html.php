<?php require_once 'components/date.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="UTF-8" />
	<title>Administration</title>
	<link rel="stylesheet" href="/assets/styles/style.css" />
	<!-- Boxicons CDN Link -->
	<link rel="stylesheet" href="assets/styles/bootstrap.min.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src="/assets/script/header.js" defer> </script>
</head>

  <body>
	<?php require_once 'components/header.php' ?>
	<div class="dashboards">
		<div class="cards">
     	     <a style="text-decoration: none;" href="/medicament" class="card blue">
     	         <h3>Médicaments</h3>
     	         <p><?=$medicaments?></p>
     	         <span>Gérer les médicaments</span>
     	     </a>
     	     <a style="text-decoration: none;" href="/category" class="card light-blue">
     	         <h3>Catégories</h3>
     	         <p><?=$categories?></p>
     	         <span>Gérer les catégories</span>
     	     </a>
     	     <a style="text-decoration: none;" href="/users" class="card purple">
     	         <h3>Utilisateurs</h3>
     	         <p><?=$users?></p>
     	         <span>Gérer les utilisateurs</span>
     	     </a>
     	     <div class="card green">
     	         <h3>Net Profit Margin</h3>
     	         <p>$179,000</p>
     	         <span>Saved 65%</span>
     	     </div>
     	</div>
		<div class="table-data">
			<div class="order">
				<div class="head">
					<h3>Achat récent</h3>
					<i class='bx bx-search' ></i>
					<i class='bx bx-filter' ></i>
				</div>
				<table>
					<thead>
						<tr>
							<th>User</th>
							<th>Date Order</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($achats as $achat): ?>
							<tr>
								<td>
									<?php if (isset($achat->image) && $achat->image != null): ?>	
										<img src="/<?=$achat->image?>" alt="">
									<?php else: ?>
										<img src="/image/users/default.jpg" alt="">
									<?php endif ?>
									<p><?=$achat->nom?> <?=$achat->prenom?></p>
								</td>
								<?php 
                                        	$dateTime = new DateTime($achat->createdAt);
                                        	$formattedDate = $dateTime->format('j F Y');
                                        	$formattedDate = strtr($formattedDate, $months);  
                                   	?>
								<td><?=$formattedDate?></td>
								<td>
									<span class="status <?=$achat->isEffectue == 1 ? 'completed' : 'pending'?>">
										<?=$achat->isEffectue == 0 ? 'Occured' : 'Completed'?>
									</span>
								</td>
								<td><a class="btn btn-sm btn-primary" href="/achat/details/<?=$achat->id?>">Détails</a></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
  </body>
</html>
