<?php
require '../modele/crudlogiciel.php';

// Récupérer tous les logiciels
$logiciels = getAllLogiciels($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des logiciels</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div id="barre_header">
            <div id="sous_barre_header">
                <a href="index.php">
                    <img src="../imgs/logo.png" alt="logo">
                </a>
                <a href="index.php" class="titre_header">
                    <p>NOM_SITE</p>
                </a>
                <input type="text" placeholder="Rechercher un logiciel" id="searchInput">
            </div>
            <a id="img_profil" href="TODO"><img src="../imgs/profil.png" alt="img profil"></a>
        </div>
    </header>

    <main class="logiciels-container">
        <?php foreach ($logiciels as $logiciel): ?>
            <a href="logiciel.php?id=<?php echo $logiciel['id']; ?>" class="app-card">
                <div class="app-logo">
                    <img src="data:image/webp;base64,<?php echo base64_encode($logiciel['img']); ?>" 
                         alt="<?php echo htmlspecialchars($logiciel['nom']); ?>">
                </div>
                <div class="app-nom"><?php echo htmlspecialchars($logiciel['nom']); ?></div>
            </a>
        <?php endforeach; ?>
    </main>

    
    <script>
        // Recherche instantanée
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', function() {
            const filter = this.value.toLowerCase();
            document.querySelectorAll('.app-card').forEach(card => {
                const name = card.querySelector('.app-nom').textContent.toLowerCase();
                card.style.display = name.includes(filter) ? 'flex' : 'none';
            });
        });
    </script>
</body>
</html>