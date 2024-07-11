<?php
     if (session_status() == PHP_SESSION_NONE) session_start();
     $uri = $_SERVER['REQUEST_URI'];
?>
<header>
     <div class="logo">
          <h3><span>PH</span>ARM</h3>
     </div>
     <nav>
          <ul>
               <li><a <?php if (str_contains($uri, '/medicament')): ?> style="color:blue" <?php endif ?>href="/medicament">Les médicaments</a></li>
               <li><a <?php if (str_contains($uri, '/category')):?>  style="color:blue"<?php endif ?>href="/category">Les catégories</a></li>
               <li><a <?php if (str_contains($uri, '/user')):?>  style="color:blue"<?php endif ?>href="/user">Les utilisateurs</a></li>
          </ul>
     </nav>
</header>