function ValidarTienda2()
{
    if(document.modificarTienda.descripcion.value.trim == "")
    {
        alert("falta de llenar el campo de id");
        return false;
    }
    else if(document.modificarTienda.descripcion.value.trim() == "")
    {
        
        alert("falta de llenar el campo de descripcion");
        return false;
    } 
    else if (document.modificarTienda.ciudad.value.trim() == "")
    {
        alert("falta de llenar el campo de ciudad");
        return false;
    }
    else if (document.modificarTienda.direcion.value.trim() == "")
    {
        alert("falta de llenar el campo de direcion");
        return false;
    }
    else if (document.modificarTienda.cp.value.trim() == "")
    {
        alert("falta de llenar el campo de codigo postal");
        return false;
    }
    else if (document.modificarTienda.horario.value.trim() == "")
    {
        alert("falta de llenar el campo de horario");
        return false;
    }
    else
    {
        alert("modificaion realizada con exito");
        return true;
    }
}

function ValidarLinea()
{
    if(document.registroLinea.linea.value.trim() == "")
    {
        alert("falta de llenar el campo de linea");
        return false;
    }
    else if(document.registroLinea.linea.value.trim().length() < 6)
    {
        alert("nombre de linea muy largo");
        return false;
    }
    else
    {
        alert("registro de linea exitosos");
        return true;
    }
}

function ValidarEnvio2()
{
    if(document.modificarServicio.compania.value.trim() == "")
    {
        alert("falta de llenar el campo de compañia");
        return false;
    }
    else if(document.modificarServicio.caracteristicas.value.trim() == "")
    {
        alert("falta de llenar el campo de caracteristicas");
        return false;
    }
    else if(document.modificarServicio.precio.value.trim() == "" )
    {
        alert("falta de llenar el campo de precio");
        return false;
    }
    else
    {
        alert("modificacion de servicio de envio exitosa");
        return true;
    }
}



function ValidarUsuarios2()
{
    if(document.modificarUsuarios.nombre.value.trim() == "")
    {
        alert("falta de llenar el campo de nombre");
        return false;
    }
    else if(document.modificarUsuarios.apellido.value.trim() == "")
    {
        alert("falta de llenar el campo de apellido");
        return false;
    }
    else if(document.modificarUsuarios.correo.value.trim() == "")
    {
        alert("falta de llenar el campo de correo");
        return false;
    }
    
    else if(document.modificarUsuarios.direcion.value.trim() == "")
    {
        alert("falta de llenar el campo de direcion");
        return false;
    }
    else if(document.modificarUsuarios.coloniaa.value.trim() == "")
    {
        alert("falta de llenar el campo de colonia");
        return false;
    }
    else if(document.modificarUsuarios.ciudad.value.trim() == "")
    {
        alert("falta de llenar el campo de ciudad");
        return false;
    }
    else if(document.modificarUsuarios.estado.value.trim() == "")
    {
        alert("falta de llenar el campo de estado");
        return false;
    }
    else if(document.modificarUsuarios.cp.value.trim() == "")
    {
        alert("falta de llenar el campo de codigo postal");
        return false;
    }
    else
    {
        alert("modificacion de usuario exitosa");
        return true;
    }
}

function ValidarLogin()
{
    if(document.loginn.usuario.value.trim()=="")
    {
        alert("no se a llenado el campo usuario");
        return false;
    }
    else if(document.loginn.contrasena.trim()=="")
    {
        alert("contraseña necesaria");
        return false;
    }
    else
    {
        alert("bienvenido");
        return true;
    }
}

function solonumeros(e)
{
    key = e.keyCode || e.which;
    teclado=String.fromCharCode(key);
    precio="0123456789";
    especiales="8-37-38-46";//array
    teclado_especial=false;
    for (var i in especiales) 
    {
        if(key == especiales[i]){
            teclado_especial = true;
        }
    }
    if(precio.indexOf(teclado) == -1 && !teclado_especial)
    {
        return false;
    }
}