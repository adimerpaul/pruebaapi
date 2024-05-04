<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Examen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Activos</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Codigo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="activos">
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dar Baja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad">
                        </div>
                        <div class="mb-3">
                            <label for="motivo" class="form-label">Motivo</label>
                            <select class="form-select" id="motivo">
                                <option value="Pérdida">Pérdida</option>
                                <option value="Fin vida útil">Fin vida útil</option>
                                <option value="Deshuso">Deshuso</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="darBaja">Dar de baja</button>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
window.onload = function(){
    var activos = document.getElementById('activos');
    var activoId = null;

    getActivos();

    function getActivos(){
        axios.get('/api/activos')
        .then(function (response) {
            activos.innerHTML = '';
            response.data.forEach(activo => {
                activos.innerHTML += `
                    <tr>
                        <td>${activo.id}</td>
                        <td>${activo.nombre}</td>
                        <td>${activo.codigo}</td>
                        <td>${activo.descripcion}</td>
                        <td>${activo.stock}</td>
                        <td>
                            <button type="button" class="btn btn-danger" data-id="${activo.id}" data-toggle="modal" data-target="#exampleModal">Dar baja</button>
                        </td>
                    </tr>
                `;
            });
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        activoId = button.data('id');
        console.log(activoId);
    });
    $('#darBaja').click(function(){

        var cantidad = document.getElementById('cantidad').value;
        var motivo = document.getElementById('motivo').value;
        var fecha = document.getElementById('fecha').value;
        axios.post('/api/darBaja', {
            activoId: activoId,
            cantidad: cantidad,
            motivo: motivo,
            fecha: fecha
        })
        .then(function (response) {
            getActivos();
            $('#exampleModal').modal('hide');
        })
        .catch(function (error) {
            console.log(error);
        });
    });
}
</script>
</body>
</html>
