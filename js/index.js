$(document).ready(function () {
    verificarlocalStorageDatos();
    let pagina = localStorage.getItem('paginaActual');
    let registros = localStorage.getItem('registros');
    $("#filas").val(registros);
  });

function cargarInformacion(id) {
    $.ajax({
        method: "POST",
        url: "controller/ctr_personaSearch.php",
        data: {
            datospersona: id
        },
        success: function(resp) {
            console.log(JSON.parse(resp));
            var data = JSON.parse(resp);
            data = data[0];
            $("#nombreid").val(data.per_nombre);
            $("#apellidosid").val(data.per_apellidos);
            $("#fechanacimientoid").val(data.per_fecha_nacimiento);
            $("#sexoid").val(data.per_sexo);
            $("#estaturaid").val(data.per_estatura);
            if (data.per_colombiano == "Si") {
                $('#colombianoid').prop('checked', true);
            } else {
                $('#colombianoid').prop('checked', false);
            }
            $("#idusuarioseleccionado").val(data.per_id);
            $("#button-crear").attr("disabled", true);
        },
    });

}

function eliminarPersona() {
    let id = $("#idusuarioseleccionado").val();
    let confirmar = confirm("Esta seguro de borrar el usuario?");
    if (confirmar) {
        window.location = "index.php?idUsuario=" + id;
    }
}

function actualizarPer() {
    var datos = new FormData($("#formulario")[0]);
    $.ajax({
        method: "POST",
        url: "controller/ctr_personaUpdate.php",
        data: datos,
        contentType: false,
        processData: false,
        cache: false,
        success: function(resp) {
            window.location = "index.php";
        },
    });
}




function paginacion(bandera){
    verificarlocalStorageDatos();

    console.log( localStorage.getItem('paginaActual') );
    if( bandera ){
        let nuevaPagina = Number(localStorage.getItem('paginaActual'))+1;
        localStorage.setItem( 'paginaActual', nuevaPagina );

        window.location = `index.php?pagina=${localStorage.getItem('paginaActual')}&registros=${localStorage.getItem('registros')}`;

    }else{
        if( Number(localStorage.getItem('paginaActual')) !=1 ){
        var nuevaPagina = Number(localStorage.getItem('paginaActual'))-1;
        localStorage.setItem( 'paginaActual',nuevaPagina );
        }else{
         localStorage.setItem( 'paginaActual',1 );
        }


        
        window.location = `index.php?pagina=${localStorage.getItem('paginaActual')}&registros=${localStorage.getItem('registros')}`;
    }

}

$( "#filas" ).change(function() {
    verificarlocalStorageDatos();

    let registros = $("#filas").val();
    let paginaActual = localStorage.getItem('paginaActual');
    localStorage.setItem('registros', registros);
    let nuevoRegistro = localStorage.getItem('registros');

    window.location = `index.php?pagina=${paginaActual}&registros=${nuevoRegistro}`;

});

function verificarlocalStorageDatos(){
    if( !localStorage.getItem('paginaActual') ){
        localStorage.setItem('paginaActual',1);
    }
    if( !localStorage.getItem('registros') ){
        localStorage.setItem('registros',5);
    }

}