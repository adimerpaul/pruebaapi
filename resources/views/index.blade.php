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
        <div class="col-6 pt-5">
            <input type="text" id="filtro" class="form-control" placeholder="Filtrar por nombre">
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-primary mt-5" id="buscar">Buscar</button>
        </div>
        <div class="col-4">
            <button type="button" class="btn btn-success mt-5" data-toggle="modal" data-target="#activoCreate">Agregar Activo</button>
        </div>
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
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Activo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="editar">Editar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="activoCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Activo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreCreate">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input type="text" class="form-control" id="descripcionCreate">
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stockCreate">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="crear">Crear</button>
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

    $('#buscar').click(function(){
        getActivos();
    });

    function getActivos(){
        axios.get('/api/activos', {
            params: {
                filtro: document.getElementById('filtro').value
            }
        })
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
                            <button type="button" class="btn btn-primary" data-id="${activo.id}" data-nombre="${activo.nombre}" data-descripcion="${activo.descripcion}" data-toggle="modal" data-target="#modalEditar">Editar</button>
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
    });
    $('#modalEditar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        activoId = button.data('id');
        var nombre = button.data('nombre');
        var descripcion = button.data('descripcion');
        document.getElementById('nombre').value = nombre;
        document.getElementById('descripcion').value = descripcion;
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
    $('#editar').click(function(){
        var nombre = document.getElementById('nombre').value;
        var descripcion = document.getElementById('descripcion').value;

        if(nombre == '' || descripcion == ''){
            alert('Todos los campos son requeridos');
            return false;
        }

        axios.put('/api/activos/'+activoId, {
            nombre: nombre,
            descripcion: descripcion
        })
        .then(function (response) {
            getActivos();
            $('#modalEditar').modal('hide');
        })
        .catch(function (error) {
            alert(error.response.data.message)
        });
    });
    $('#crear').click(function(){
        var nombre = document.getElementById('nombreCreate').value;
        var descripcion = document.getElementById('descripcionCreate').value;
        var stock = document.getElementById('stockCreate').value;

        if(nombre == '' || descripcion == '' || stock == ''){
            alert('Todos los campos son requeridos');
            return false;
        }

        axios.post('/api/activos', {
            nombre: nombre,
            descripcion: descripcion,
            stock: stock
        })
        .then(function (response) {
            getActivos();
            $('#activoCreate').modal('hide');
        })
        .catch(function (error) {
            alert(error.response.data.message)
        });
    });
}
</script>
</body>
</html>
