function editarUsuarios(idUsuario) {
    
    const queryName = 'editar_usuario_by_id'

    const nombre = document.getElementById(idUsuario + '-nombre').textContent;
    const apellido = document.getElementById(idUsuario + '-apellido').textContent;
    const email = document.getElementById(idUsuario + '-email').textContent;

    fetch(`../api/api.php?${queryName}=${idUsuario}&nombre=${nombre}&apellido=${apellido}&email=${email}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
        });
}
x