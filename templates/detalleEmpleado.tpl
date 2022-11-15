{include file="header.tpl"}



<h1>Detalle de: {$empleado->nombre}</h1>

<table class='table table-dark table-striped'>

    <tr>
        <td>Nombre y apellido</td>
        <td>{$empleado->nombre}</td>
    </tr>

    <tr>
        <td>DNI</td>
        <td>{$empleado->dni}</td>
    </tr>

    <tr>
        <td>Teléfono</td>
        <td>{$empleado->celular}</td>
    </tr>

    <tr>
        <td>Correo electrónico</td>
        <td>{$empleado->mail}</td>
    </tr>
    {foreach from =$categorias item= $categoria}
        {if ($empleado->id_categoria_fk==$categoria->id)} 
            <tr>
                <td>Puesto</td>
                <td>{$categoria->puesto}</td>
            </tr>
            <tr>
            <td>Sueldo</td>
            <td>{$categoria->sueldo}</td>
            </tr>

        {/if}

    {/foreach}
</table>

<div>
    <td>
        <a href='empleados' type="button" class="btn btn-primary">Volver</a>
    </td>
</div>



{include file="footer.tpl"}