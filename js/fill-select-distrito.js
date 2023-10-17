/**
 * Este script se encarga de rellenar el input select de distritos en base a la provincia seleccionada
 * @example
 * Si la pronvia seleccinada por el usuario fue Coclé
 * en el input select de distritos se cargaran todos los distritos de Coclé
 */
const provinciaSelect = document.getElementById('id_provincia');
const distritoSelect = document.getElementById('id_distrito');

provinciaSelect.addEventListener('change', e => {
    const value = provinciaSelect.value;

    const queryName = 'distritos_by_provincia_valor'

    fetch(`../api/api.php?${queryName}=${value}`)
        .then(response => response.json())
        .then(distritos => {
            if(distritos.error) {
                distritoSelect.parentElement.innerHTML = '<p class="text-danger">'+distritos.error+'</p>';
                return;
            }
            
            distritoSelect.innerHTML = '';
            distritos.forEach( distrito => {
                distritoSelect.innerHTML += `<option value="${distrito.id_distrito}">${distrito.nom_distrito}</option>`;
            });
        });
}); 