<script>
    $(document).on('click','#eliminar',function(e){
        if( $(this).hasClass('disabled') )
            e.preventDefault();
        else{
            var url  = '{!! url("json_client/' + id +'")!!}';
            $.get(url, function(result){
                $('#modal_delete_body').html('¿Seguro deseas eliminar al usuario: <strong>'+result.nombre + ' ' +  result.apellidos+'</strong>?');
                $('#modal_delete').openModal();
            }).fail(function(){
                alert('Error');
            });
        }
    });

    $(document).on('click','#ver',function(e){
        if( $(this).hasClass('disabled') )
            e.preventDefault();
        else{

            var url  = '{!! url("json_client/' + id +'")!!}';
            $.get(url, function(result){
                $('#titulo').html('<div class="valign-wrapper"><i class="mdi-social-person medium"></i>'+result.nombre + ' ' +  result.apellidos);
                $('#client_full_name').html('<strong>Nombre: </strong>'+result.nombre + ' ' +  result.apellidos);
                $('#client_email').html('<strong>Correo electrónico: </strong>'+result.email);
                $('#client_phone').html('<strong>Telefono: </strong>'+result.telefono);
                $('#client_address').html('<strong>Direccion: </strong>'+result.direccion);
                $('#modal1').openModal();
            }).fail(function(){
                alert('Error');
            });
        }
    });
</script>