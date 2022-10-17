{include file="header.tpl"}


<h1>Carga de funciones</h1>
<!--formulario de ingreso de categorias-->
<form action='editadoCategoria/{$categoria->id}' method='POST'>
    <div class="mb-3">
        <label>Categoria</label>
        <input type="text" class="form-control" name="puesto" value="{$categoria->puesto}" required>
    </div>
    <div class="mb-3">
        <label>Descripcion</label>
        <input type="text" class="form-control" name="descripcion" value="{$categoria->descripcion}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Sueldo</label>
        <input type="number" class="form-control" name="sueldo" value="{$categoria->sueldo}" required>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Cargar datos</button>
    </div>
</form>


{include file="footer.tpl"}