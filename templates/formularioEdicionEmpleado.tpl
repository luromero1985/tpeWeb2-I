{include file="header.tpl"}


<h1>Edición de empleados</h1>
<!--formulario de ingreso de empleados-->
<form action='empleadoEditado/{$empleado->id}' method='POST'>

    <div class="mb-3">
        <label>Nombre y Apellido</label>
        <input type="text" class="form-control" name="nombre" value="{$empleado->nombre}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">DNI</label>
        <input type="number" class="form-control" name="dni" value="{$empleado->dni}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input type="text" class="form-control" name="celular" value="{$empleado->celular}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">mail</label>
        <input type="text" class="form-control" name="mail" value="{$empleado->mail}" required>
    </div>

    <div class="mb-3">
        <select class="form-select" aria-label="Default select example" name="id_categoria_fk">

            <!--para que traiga el parámetro de la segunda tabla al formulario edicion empleado-->
            {foreach from =$categorias item =$categoria}
                <option {if ($empleado->id_categoria_fk==$categoria->id)} selected {/if} value="{$categoria->id}" required>
                    {$categoria->puesto}</option>
            {/foreach}

        </select>
    </div>




    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Cargar datos</button>
    </div>

</form>

{include file="footer.tpl"}