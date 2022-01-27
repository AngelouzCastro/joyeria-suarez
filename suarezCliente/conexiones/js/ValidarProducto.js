function ValidarProducto()
{
    
    if (document.altaProducto.descripcion.value.trim() == "")
    {
        alert("falta de llenar de descripcion");
        return false;
    }
    else if (document.altaProducto.caracteristicas.value.trim() == "")
    {
        alert("falta de llenar el campo de caracteristicas");
        return false;
    }
    else if (document.altaProducto.precio.value.trim() == "")
    {
        alert("falta de llenar el campo de precio");
        return false;
    }
    else if (document.altaProducto.precio.value <= 0)
    {
        alert("precio invalido");
        return false;
    }
    else if(document.altaProducto.image.value == "")
    {
        alert("no se ha selecionado ninguna imagen");
        return false;
    }
    else
    {
        alert("articulo registrado");
        return true;
    }
    
}

function validar(){
    
    var c =true;
    var o = document.getElementById('image');
    var uploadFile = o.files[0];
    if (!(/\.(jpg|png|gif)$/i).test(uploadFile.name) ) {
        alert('Ingrese un archivo con alguna de las siguientes extensiones .jpeg/.jpg/.png/.gif ');
        c= false;
    }
     return c;
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