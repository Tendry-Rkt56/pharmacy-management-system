document.addEventListener("DOMContentLoaded", function() {
    const saleForm = document.getElementById("saleForm");
    const salesList = document.getElementById("salesList");
    const medicamentsContainer = document.getElementById("medicamentsContainer");
    const addMedicamentButton = document.getElementById("addMedicament");

    const medicaments = [
        "Paracetamol",
        "Ibuprofen",
        "Amoxicillin",
        "Aspirin",
        "Ciprofloxacin",
        // Ajoutez plus de médicaments ici
    ];

    async function createAutocomplete(input, list) {
        input.addEventListener("input", async function() {
            const value = input.value.toLowerCase();
            list.innerHTML = "";
            if (value) {
                const filteredMedicaments = await recupData(value);
                filteredMedicaments.forEach(medicament => {
                    const li = document.createElement("li");
                    li.textContent = medicament.nom;
                    li.addEventListener("click", function() {
                        input.value = medicament.value
                        list.innerHTML = "";
                    });
                    list.appendChild(li);
                });
                list.style.display = "block";
            } else {
                list.style.display = "none";
            }
        });
    }

    function addMedicamentGroup() {
        const group = document.createElement("div");
        group.className = "form-group medicament-group";

        group.innerHTML = `
            <label for="medicament">Nom du médicament :</label>
            <input type="text" class="medicament" name="medicament" required>
            <ul class="medicament-list dropdown-content"></ul>
            <label for="prix">Prix :</label>
            <input type="number" class="prix" name="prix" step="0.01" required>
            <button type="button" class="remove-medicament"><i class="fas fa-minus-circle"></i></button>
        `;

        medicamentsContainer.appendChild(group);

        const medicamentInput = group.querySelector(".medicament");
        const medicamentList = group.querySelector(".medicament-list");
        const removeButton = group.querySelector(".remove-medicament");

        createAutocomplete(medicamentInput, medicamentList);

        removeButton.addEventListener("click", function() {
            medicamentsContainer.removeChild(group);
        });
    }

    addMedicamentButton.addEventListener("click", addMedicamentGroup);

    saleForm.addEventListener("submit", function(event) {
        event.preventDefault();

        const medicamentGroups = document.querySelectorAll(".medicament-group");
        let confirmationMessage = "Confirmez-vous l'enregistrement de la vente :\n";

        medicamentGroups.forEach(group => {
            const medicament = group.querySelector(".medicament").value;
            const prix = group.querySelector(".prix").value;
            confirmationMessage += `Médicament : ${medicament}, Prix : ${prix} €\n`;
        });

        if (confirm(confirmationMessage)) {
            medicamentGroups.forEach(group => {
                const medicament = group.querySelector(".medicament").value;
                const prix = group.querySelector(".prix").value;
                const li = document.createElement("li");
                li.innerHTML = `${medicament} - ${prix} € <i class="fas fa-trash-alt"></i>`;
                salesList.appendChild(li);

                li.querySelector("i").addEventListener("click", function() {
                    li.remove();
                });

                group.remove();
            });
            addMedicamentGroup(); // Ajouter un premier groupe vide
        }
    });

    // Ajouter un premier groupe vide au chargement de la page
    addMedicamentGroup();
});


async function recupData (value)
{
    try {
        await new Promise(resolve => setTimeout(resolve, 500))
        const result = await fetch('http://localhost:8090/API/medicament', {
            method: 'POST',
            headers: {
                "Content-Type" : 'application/json',
            },
            body: JSON.stringify({
                value: value,
            }),
        })
        if (result.ok) {
            const data = await result.json()
            return data
        }
        else {
            throw new Error('Erjkjfhsd')
        }
    }
    catch(error) {
        console.log(error)
    }
}
