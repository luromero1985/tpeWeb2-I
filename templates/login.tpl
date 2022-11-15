{include file="header.tpl"}

<h3>Registrese</h3>
<!--formulario de ingreso de empleados-->
<form action='login' method='POST'>

    <div class="mb-3">
        <label>Usuario</label>
        <input type="text" class="form-control" name="email" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
    </div>


    <div class="mb-3">
        <button type="submit" class="btn btn-secondary">Ingresar</button>
    </div>
    {if $error}
        <div class="alert alert-danger mt-3">
            {$error}
        </div>
    {/if}
</form>

{include file="footer.tpl"}