{include file="header.tpl"}
<!--tabla de empleados-->

<h2>Personal de la empresa:</h2>


<h3>Busqueda</h3>
<!--formulario de ingreso de empleados-->
<div class=d-flex>

    <form class="ms-4" action='mostrarbusquedaporDNI' method='POST'>

        <div class="mb-2">

            <label class="form-label">Buscar por DNI</label>
            <input type="number" class="form-control" name="dniBuscado" required>

        </div>

        <div class="mb-2">
            <button type="submit" class="btn btn-secondary">BUSCAR</button>
        </div>

    </form>

    <form class="ms-4" action='mostrarbusquedaporNombre' method='POST'>
        <div class="mb-2">
            <label class="form-label">Buscar por nombre</label>
            <input type="text" class="form-control" name="nombreBuscado" required>
        </div>

        <div class="mb-2">
            <button type="submit" class="btn btn-secondary">BUSCAR</button>
        </div>
    </form>

    <form class="ms-4" action='mostrarbusquedaporPuesto' method='POST'>
        <div class="mb-2">
            <label class="form-label">Buscar por categoria</label>
            <input type="text" class="form-control" name="puestoBuscado" required>
        </div>

        <div class="mb-2">
            <button type="submit" class="btn btn-secondary">BUSCAR</button>
        </div>
    </form>
</div>


<div>
    {if isset($smarty.session.logueado)}
        <a href='mostrarFormularioEmpleado' type="button" class="btn btn-primary  mb-4">Agregar</a>
    {/if}
</div>


<table class='table table-dark table-striped'>
    <thead>
        <tr>

            <td> Nombre y apellido </td>
            <td> DNI</td>
            <td> Telefono </td>
            <td> Mail</td>
            <td> Puesto</td>
            <td> Edición</td>
        </tr>
    </thead>
    </tr>

    {foreach from =$empleados item= $empleado}
        <tr>
            <td>{$empleado->nombre}</td>
            <!--accedemos a las propiedades del objeto con ->  -->
            <td>{$empleado->dni}</td>
            <td>{$empleado->celular}</td>
            <td>{$empleado->mail}</td>
            <td>{$empleado->puesto}</td>
            <td>
                {if isset($smarty.session.logueado)}
                    <a href='editarEmpleado/{$empleado->id}' type="button" class="btn btn-primary">Editar</a>
                    <a href='deleteEmpleado/{$empleado->id}' type="button" class="btn btn-primary">Borrar</a>

                {/if}
            </td>

        </tr>
    {/foreach}

</table>

{include file="footer.tpl"}