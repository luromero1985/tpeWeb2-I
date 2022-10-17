{include file="header.tpl"}
<h1>Carga de empleados</h1>
<!--mensaje de error en caso de querer editar y falta algun campo-->

{if $completar}
    <div class="alert alert-danger mt-3">
        {$completar}
    </div>
{/if}

<!--formulario de ingreso de empleados-->
<form action='agregarEmpleado' method='POST'>

    <div class="mb-3">
        <label>Nombre y Apellido</label>
        <input type="text" class="form-control" name="nombre" required>
    </div>
    <div class="mb-3">
        <label class="form-label">DNI</label>
        <input type="number" class="form-control" name="dni" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input type="text" class="form-control" name="celular" required>
    </div>
    <div class="mb-3">
        <label class="form-label">mail</label>
        <input type="text" class="form-control" name="mail">
    </div>
    <div class="mb-3">
        <select class="form-select" name="id_categoria_fk" required>
            <option value=NULL> </option>
            {foreach from =$categorias item =$categoria}
                <option value="{$categoria->id}"> {$categoria->puesto} </option>
            {/foreach}

        </select>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Cargar datos</button>
    </div>
</form>

{include file="footer.tpl"}