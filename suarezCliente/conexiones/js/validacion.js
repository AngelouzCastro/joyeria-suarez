function ValidarTienda()
{
    if(document.altaTienda.descripcion.value.trim() =="")
    {
        
        alert("falta de llenar el campo de descripcion");
        return false;
    } 
    else if (document.altaTienda.ciudad.value.trim() == "")
    {
        alert("falta de llenar el campo de ciudad");
        return false;
    }
    else if (document.altaTienda.direcion.value.trim() == "")
    {
        alert("falta de llenar el campo de direcion");
        return false;
    }
    else if (document.altaTienda.cp.value.trim() == "")
    {
        alert("falta de llenar el campo de codigo postal");
        return false;
    }
    else if (document.altaTienda.horario.value.trim() == "")
    {
        alert("falta de llenar el campo de horario");
        return false;
    }

    else
    {
        alert("registro de tienda exitoso");
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



function ValidarEnvio()
{
    if(document.altaEnvio.compania.value.trim() == "")
    {
        alert("falta de llenar el campo de compañia");
        return false;
    }
    else if(document.altaEnvio.caracteristicas.value.trim() == "")
    {
        alert("falta de llenar el campo de caracteristicas");
        return false;
    }
    else if(document.altaEnvio.precio.value.trim() == "" )
    {
        alert("falta de llenar el campo de precio");
        return false;
    }
    else
    {
        alert("registro dr servicio de envio exitoso");
        return true;
    }
}

function ValidarUsuario()
{
    if(document.singup.nombre.value.trim() == "")
    {
        alert("falta de llenar el campo de nombre");
        return false;
    }
    else if(document.singup.apellido.value.trim() == "")
    {
        alert("falta de llenar el campo de apellido");
        return false;
    }
    else if(document.singup.correo.value.trim() == "")
    {
        alert("falta de llenar el campo de correo");
        return false;
    }
    else if(document.singup.contrasena.value.trim() == "")
    {
        alert("falta de llenar el campo de contraseña");
        return false;
    }
    else if(document.singup.direcion.value.trim() == "")
    {
        alert("falta de llenar el campo de direcion");
        return false;
    }
    else if(document.singup.colonia.value.trim() == "")
    {
        alert("falta de llenar el campo de colonia");
        return false;
    }
    else if(document.singup.ciudad.value.trim() == "")
    {
        alert("falta de llenar el campo de ciudad");
        return false;
    }
    else if(document.singup.estado.value.trim() == "")
    {
        alert("falta de llenar el campo de estado");
        return false;
    }
    else if(document.singup.cp.value.trim() == "")
    {
        alert("falta de llenar el campo de codigo postal");
        return false;
    }
    else
    {
        alert("registro de usuario exitoso");
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