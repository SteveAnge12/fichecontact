// fich.js
function toggleDropdown(contentId, headerElement) {
    var content = document.getElementById(contentId);
    var arrow = headerElement.querySelector('.arrow');

    if (content.style.display === "block") {
        content.style.display = "none";
        arrow.classList.remove('up');
        arrow.classList.add('down');
    } else {
        content.style.display = "block";
        arrow.classList.remove('down');
        arrow.classList.add('up');
    }
}

// Fonction pour générer un numéro de ticket unique
function generateTicketNumber() {
    let lastTicketNumber = localStorage.getItem("lastTicketNumber") || "TICKET-0000";
    let ticketNumber = parseInt(lastTicketNumber.split("-")[1]) + 1;
    let newTicketNumber = "TICKET-" + ticketNumber.toString().padStart(4, '0');
    localStorage.setItem("lastTicketNumber", newTicketNumber);
    return newTicketNumber;
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('numero_ticket').value = generateTicketNumber();
    document.getElementById('heure_arrivee').value = new Date().toLocaleTimeString('fr-FR', {hour: '2-digit', minute:'2-digit'});
    document.getElementById('date').value = new Date().toISOString().split('T')[0];
    document.getElementById('heure_prise_en_charge').value = new Date().toLocaleTimeString('fr-FR', {hour: '2-digit', minute:'2-digit'});

    // Gérer la visibilité des champs "Autres"
    document.querySelectorAll('input[type="checkbox"][value="Autres"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            let extraField = this.closest('div').querySelector('.extra-field');
            if (this.checked) {
                extraField.style.display = 'block';
            } else {
                extraField.style.display = 'none';
            }
        });
    });
});

// Notification automatique pour la confirmation de soumission
if (document.querySelector('.notification')) {
    setTimeout(function() {
        document.querySelector('.notification').classList.add('fade-out');
    }, 3000); // 3 secondes avant de commencer l'animation de disparition
}
