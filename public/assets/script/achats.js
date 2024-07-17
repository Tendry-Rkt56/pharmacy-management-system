document.addEventListener("DOMContentLoaded", function() {
    const port = window.location.port
    const saleForm = document.getElementById("saleForm");
    const medicamentContainer = document.getElementById("medicamentContainer");
    const salesList = document.getElementById("salesList");
    const premier = document.querySelector(".premier");
    const price = document.querySelector(".premier-1");
    const nombre = document.querySelector(".premier-2");
    const suggestions = document.querySelector(".suggestions");

    premier.addEventListener('input', (e) => {
         fetchSuggestions(premier.value, suggestions, price, premier, nombre);
    })
    // /  // Ajouter un groupe de médicaments initial
    // /  addMedicamentGroup();

    // Ajouter un groupe de médicaments supplémentaire
    document.getElementById("addMedicament").addEventListener("click", addMedicamentGroup);
 
     function addMedicamentGroup() {
         const group = document.createElement("div");
         group.classList.add("medicament-group");
 
         const medicamentInput = document.createElement("input");
         medicamentInput.type = "text";
         medicamentInput.classList.add("medicament");
         medicamentInput.placeholder = "Nom du médicament";
 
         const prixInput = document.createElement("input");
         prixInput.type = "number";
         prixInput.classList.add("prix");
         prixInput.placeholder = "Prix";
         prixInput.readOnly = true;
         
         const nombreInput = document.createElement("input");
         nombreInput.type = "number";
         nombreInput.classList.add("prix");
         nombreInput.placeholder = "Nombre";
         nombreInput.readOnly = false;
 
         const suggestionsList = document.createElement("ul");
         suggestionsList.classList.add("suggestions");
 
         group.appendChild(medicamentInput);
         group.appendChild(prixInput);
         group.appendChild(nombreInput);
         group.appendChild(suggestionsList);
 
         medicamentContainer.appendChild(group);
 
         medicamentInput.addEventListener("input", function() {
             fetchSuggestions(medicamentInput.value, suggestionsList, prixInput, medicamentInput, nombreInput);
         });
     }
 
    function fetchSuggestions(query, suggestionsList, prixInput, medicamentInput, nombre) {
        fetch(`http://localhost:${port}/API/medicament?value=` + query)
            .then(response => response.json())
            .then(data => {
                console.log(data)
                suggestionsList.innerHTML = ''; // Clear previous suggestions
                data.forEach(medicament => {
                   const suggestionItem = document.createElement("li");
                   suggestionItem.textContent = medicament.nom;
                   suggestionItem.addEventListener("click", function() {
                       suggestionsList.innerHTML = '';
                       prixInput.value = medicament.prix;
                       suggestionItem.textContent = medicament.nom;
                       medicamentInput.value = medicament.nom
                       nombre.setAttribute('name', 'medicament-'+medicament.id)
                   });
                   suggestionsList.appendChild(suggestionItem);
                });
            })
            .catch(error => {
                console.error('Error fetching suggestions:', error);
            });
    } 
 
    // saleForm.addEventListener("submit", function(event) {
    //     event.preventDefault();

    //     const medicamentGroups = document.querySelectorAll(".medicament-group");

    //     const allInput = []

    //     medicamentGroups.forEach(element => {
    //         const medicamentInput = element.querySelector('.medicament')
    //         allInput.push(medicamentInput)
    //     })

    // });
 });