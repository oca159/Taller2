<script>
    $(document).on('click','#ver',function(e){
        if( $(this).hasClass('disabled') )
            e.preventDefault();
        else{
            var user_email = '#'+id+' > .user_email';

            var url  = '{!! url("json_usuario_prestamo/' + $(user_email).html() +'")!!}';
            $.get(url, function(result){
                console.log(result);
                $('#lista_libros').html('');
                var html_li = '<li>'+
                  '<div class="collapsible-header"><i class="mdi-social-group"></i>Usuario</div>'+
                  '<div class="collapsible-body">'+
                    '<p>'+
                        '<strong>Nombre: </strong>'+result[0].nombre + '<br>'+
                        '<strong>Apellidos: </strong>'+result[0].apellidos + '<br>'+
                        '<strong>Telefono: </strong>'+result[0].telefono + '<br>'+
                        '<strong>Direccion: </strong>'+result[0].direccion + '<br>'+
                    '</p>'+
                  '</div>'+
                '</li>';
                $('#lista_libros').append(html_li);
            }).fail(function(){
                alert('Error');
            });
            
            var url  = '{!! url("json_libros_prestamo/' + id +'")!!}';
            $.get(url, function(result){
                for (var i = result.length - 1; i >= 0; i--) {
                    var html_li = '<li>'+
                      '<div class="collapsible-header"><i class="mdi-image-photo-library"></i>'+ result[i][0].titulo +'</div>'+
                      '<div class="collapsible-body">'+
                        '<p>'+
                            '<strong>Codigo: </strong>'+ result[i][0].codigo +'<br>'+
                            '<strong>Titulo: </strong>'+ result[i][0].titulo +'<br>'+
                            '<strong>Autor: </strong>'+ result[i][0].autor +'<br>'+
                            '<strong>Editorial: </strong>'+ result[i][0].editorial +'<br>'+
                            '<strong>Edicion: </strong>'+ result[i][0].edicion +'<br>'+
                            '<strong>Idioma: </strong>'+ result[i][0].idioma +'<br>'+
                        '</p>'+
                      '</div>'+
                    '</li>';
                    $('#lista_libros').append(html_li);
                }

                $('#modal1').openModal();
            }).fail(function(){
                alert('Error');
            });
        }
    });

    $(document).on('click','#extender',function(e){
        if( $(this).hasClass('disabled') )
            e.preventDefault();
        else{
            var url  = '{!! url("extender_prestamo/' + id +'")!!}';
            $.get(url, function(result){
                alert(result);
                window.location.replace('{!! url("/admin/prestamos/lista") !!}');
            }).fail(function(){
                alert('Error');
            });
        }
    });

    $(document).on('click','#entregar',function(e){
        if( $(this).hasClass('disabled') )
            e.preventDefault();
        else{
            var url  = '{!! url("entregar_prestamo/' + id +'")!!}';
            $.get(url, function(result){
                alert(result);
                window.location.replace('{!! url("/admin/prestamos/lista") !!}');
            }).fail(function(){
                alert('Error');
            });
        }
    });
</script>