<?php 
     require_once 'components/date.php';   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <link rel="stylesheet" href="/assets/styles/details.css">
    <link rel="stylesheet" href="/assets/styles/style.css">
    <link rel="stylesheet" href="/assets/styles/bootstrap.min.css">
    <script src="/components/header.js" defer></script>
</head>
<body>
     <?php require_once 'components/header.php'?>
     <div class="invoice-box">
          <header>
              <h1>FACTURE</h1>
              <div class="invoice-info">
                 <div class="invoice-number">Facture n°<?=$achat->id?></div>
                      <?php
                           $dateTime = new DateTime($achat->createdAt);
                           $formattedDate = $dateTime->format('j F Y');
                           $formattedDate = strtr($formattedDate, $months);
                      ?>
                 <div class="invoice-date"><?=$formattedDate?></div>
              </div>
          </header>
          <section class="address-info">
              <div class="from">
                 <h2><?=$achat->nom?> <?=$achat->prenom?></h2>
                 <?=$achat->email?><br>
                 <?=$achat->adresse?></p>
              </div>
          </section>
          <section class="invoice-details">
              <table>
                  <thead>
                      <tr>
                          <th>MEDICAMENT</th>
                          <th>PRIX</th>
                          <th>QUANTITÉ</th>
                          <th>TOTAL</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach($details as $detail): ?>
                           <tr>
                                <td><?=$detail->nom?></td>
                                <td><?=$detail->prix?></td>
                                <td><?=$detail->nombre?></td>
                                <td class="fw-bolder"><?=number_format($detail->prix * $detail->nombre, thousands_separator:' ')?></td>
                           </tr>
                      <?php endforeach ?>
                  </tbody>
              </table>
          </section>
          <section class="totals">
              <p class="total">TOTAL : <span><?=number_format($achat->total, thousands_separator:' ')?> Ar</span></p>
          </section>
          <footer>
              <p class="thanks">MERCI DE VOTRE CONFIANCE</p>
          </footer>
     </div>
    <script>
        const invoiceDetails = document.querySelector('.invoice-details');
        invoiceDetails.scrollBarWidth = "1px"
    </script>
</body>
</html>