<!-- Styles pour la modal de vérification d'âge -->
<style>
    .age-modal {
        display: flex;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.95);
        backdrop-filter: blur(8px);
        justify-content: center;
        align-items: center;
    }

    .age-modal-content {
        background: white;
        padding: 40px;
        border-radius: 15px;
        text-align: center;
        max-width: 500px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.3);
    }

    .age-modal h2 {
        color: #8b4513;
        margin-bottom: 20px;
    }

    .age-modal p {
        color: #666;
        margin-bottom: 30px;
        font-size: 1.1em;
    }

    .age-modal button {
        margin: 10px;
        padding: 15px 40px;
        font-size: 1.1em;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        font-weight: bold;
        transition: all 0.3s;
    }

    .age-modal .btn-yes {
        background: #c41e3a;
        color: white;
    }

    .age-modal .btn-yes:hover {
        background: #a01829;
    }

    .age-modal .btn-no {
        background: #8bc34a;
        color: white;
    }

    .age-modal .btn-no:hover {
        background: #7cb342;
    }
</style>

<!-- Modal vérification d'âge -->
<div id="ageModal" class="age-modal" style="display: none;">
    <div class="age-modal-content">
        <h2>🍎 Bienvenue chez TechnoPomme</h2>
        <p>Avez-vous plus de 18 ans ?</p>
        <p style="font-size: 0.9em; color: #999;">Notre site contient des produits alcoolisés.</p>
        <div>
            <button class="btn-yes" onclick="confirmAge(true)">Oui, j'ai 18 ans ou plus</button>
            <button class="btn-no" onclick="confirmAge(false)">Non, j'ai moins de 18 ans</button>
        </div>
    </div>
</div>

<!-- Script de vérification d'âge -->
<script>
    // Vérification d'âge au chargement
    (function() {
        // Éviter de redéfinir si déjà défini
        if (window.ageVerificationLoaded) return;
        window.ageVerificationLoaded = true;

        window.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('ageModal');
            if (!modal) return;
            
            // Vérifie d'abord si le cookie ou la session côté serveur existe
            const serverAgeStatus = '<?= session()->get('age_verified') ?? ($_COOKIE['age_verified'] ?? '') ?>';
            
            console.log('Server age status:', serverAgeStatus);
            
            if (serverAgeStatus === 'adult') {
                // Utilisateur majeur, ne rien afficher
                modal.style.display = 'none';
            } else if (serverAgeStatus === 'under18') {
                // Utilisateur mineur, masquer les produits alcoolisés
                modal.style.display = 'none';
                if (typeof filterAlcoolProducts === 'function') {
                    filterAlcoolProducts();
                }
            } else {
                // Pas de vérification enregistrée, afficher la modal
                modal.style.display = 'flex';
            }
        });

        window.confirmAge = function(isAdult) {
            console.log('confirmAge appelée avec:', isAdult);
            
            const modal = document.getElementById('ageModal');
            
            // Envoie la confirmation au serveur via AJAX
            const formData = new FormData();
            formData.append('is_adult', isAdult ? '1' : '0');
            
            fetch('/age-verification/set-age', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            })
            .then(response => {
                console.log('Response status:', response.status);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('Response data:', data);
                if (data.success) {
                    // Stocke aussi en sessionStorage pour compatibilité
                    if (isAdult) {
                        sessionStorage.setItem('ageVerified', 'adult');
                    } else {
                        sessionStorage.setItem('ageVerified', 'under18');
                    }
                    
                    // Masquer la modal
                    modal.style.display = 'none';
                    
                    // Recharger la page pour appliquer les filtres côté serveur
                    window.location.reload();
                } else {
                    console.error('Échec de la vérification:', data);
                    alert('Erreur lors de l\'enregistrement. Veuillez réessayer.');
                }
            })
            .catch(error => {
                console.error('Erreur AJAX:', error);
                // En cas d'erreur réseau, stocker localement et continuer
                if (isAdult) {
                    sessionStorage.setItem('ageVerified', 'adult');
                    modal.style.display = 'none';
                } else {
                    sessionStorage.setItem('ageVerified', 'under18');
                    modal.style.display = 'none';
                    if (typeof filterAlcoolProducts === 'function') {
                        filterAlcoolProducts();
                    }
                }
            });
        };

        window.filterAlcoolProducts = function() {
            // Catégories sans alcool
            const nonAlcoolCategories = ['Jus', 'Vinaigres', 'Confitures', 'Coffrets'];

            // Masquer tous les produits avec alcool
            const allProducts = document.querySelectorAll('.product-container');
            allProducts.forEach(product => {
                const categoryTag = product.querySelector('.category-tag');
                if (categoryTag) {
                    const category = categoryTag.textContent.trim();
                    if (!nonAlcoolCategories.includes(category)) {
                        product.style.display = 'none';
                    }
                }
            });
        };
    })();
</script>
