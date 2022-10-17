{include file="header.tpl"}

<h3>Busqueda</h3>
<!--formulario de busqueda-->
<div class=d-flex>

    <div class=d-flex>

        <form class="ms-4" action='mostrarbusquedaporCategoriaPuesto' method='POST'>

            <div class="mb-2">

                <label class="form-label">Buscar por Puesto</label>
                <input type="text" class="form-control" name="puestoBuscado" required>

            </div>

            <div class="mb-2">
                <button type="submit" class="btn btn-secondary">BUSCAR</button>
            </div>

        </form>

        <form class="ms-4" action='mostrarbusquedaporSueldo' method='POST'>
            <div class="mb-2">
                <label class="form-label">Buscar por Sueldo</label>
                <input type="number" class="form-control" name="sueldoBuscado" required>
            </div>

            <div class="mb-2">
                <button type="submit" class="btn btn-secondary">BUSCAR</button>
            </div>
        </form>

    </div>


    <div class="ms-5">
        <h3>Carga de funciones</h3>

        <!--formulario de ingreso de categorias-->
        <form action='agregarPuesto' method='POST'>
            <div class="mb-3">
                <label>Categoria</label>
                <input type="text" class="form-control" name="puesto" required>
            </div>
            <div class="mb-3">
                <label>Descripcion</label>
                <input type="text" class="form-control" name="descripcion" rows="4" required>

            </div>
            <div class="mb-3">
                <label class="form-label">Sueldo</label>
                <input type="number" class="form-control" name="sueldo" required>
            </div>

            <div class="mb-3">
                {if isset($smarty.session.logueado)}
                    <button type="submit" class="btn btn-secondary">Cargar datos</button>

                {/if}
            </div>
        </form>
    </div>
</div>



<h2>Detalle de las funciones de la empresa:</h2>

{if $errorBorrar}
    <div class="alert alert-danger mt-3">
        {$errorBorrar}
    </div>
{/if}

<table class='table table-dark table-striped'>
    <thead>
        <tr>
            <td> Puesto</td>
            <td> Descripción </td>
            <td> Sueldo</td>
            <td> Editar</td>
        </tr>
    </thead>
    </tr>

    {foreach from=$categorias item= $categoria}
        <tr>
            <td>{$categoria->puesto}</td>
            <td>{$categoria->descripcion}</td>
            <td>{$categoria->sueldo}</td>
            <td>
                {if isset($smarty.session.logueado)}
                    <a href='editarCategoria/{$categoria->id}' type="button" class="btn btn-primary">Editar</a>
                    <a href='deletePuesto/{$categoria->id}' type="button" class="btn btn-primary">Borrar</a>
                {/if}
            </td>
        </tr>
    {/foreach}

</table>
{include file="footer.tpl"}