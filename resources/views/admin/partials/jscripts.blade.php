<script>
	var default_name  = @yield('default_name', '"default"');
	var default_url   = @yield('default_url', '"default"');
	var default_token = @yield('default_token', '"default"');
	var id;
	var n_libros = 0;
	$(document).on('click', '.'+default_name ,function(e){
	    $('.'+default_name+'.selected').each(function(){
	        $(this).removeClass('selected');
	    });
	    
	    id = $(this).attr('id');
	    $(this).addClass('selected');
	    $('#eliminar').addClass('red').removeClass('disabled');
	    $('#ver').addClass('blue-grey').removeClass('disabled');
	    $('#editar').addClass('blue').removeClass('disabled');
	    $('#editar').attr('href', "{!!url('/admin/" + default_url + "/"+id+"/edit')!!}");

	});

	$(document).on('click','#eliminar_registro',function(e){
	    if( $(this).hasClass('disabled') )
	        e.preventDefault();
	    else{
	        var form = $('#form-delete');
	        var url = form.attr('action').replace(default_token, id);
	        var data = form.serialize();
	        $('#eliminar').addClass('disabled').removeClass('red');
	        $('#ver').addClass('disabled').removeClass('blue-grey');
	        $('#editar').addClass('disabled').removeClass('blue');
	        $.post(url, data, function(result){
	            alert(result.message);
	            if(result.id === 0)
	        		$('#'+ id).fadeOut();
	        }).fail(function(){
	            alert('El '+ default_name +' no fue eliminado');
	            row.show();
	        });
	    }
	});

	$(document).on('click','#editar',function(e){
	    if( $(this).hasClass('disabled') )
	        e.preventDefault();
	});

	$(document).on('click', '.paginate_button', function(e){
	    $('#eliminar').addClass('disabled').removeClass('red');
	    $('#editar').addClass('disabled').removeClass('blue');
	    $('#ver').addClass('disabled').removeClass('blue-grey');    
	    $('.'+default_name+'.selected').each(function(){
	        $(this).removeClass('selected');
	    });
	});
	$(document).ready(function(){
	    $('#example').dataTable( {
	        "order": [[ 3, "desc" ]],
	        "language": {
	            "url": "{{asset('/js/dataTables.spanish.lang')}}"
	        }
	    } );
	});
</script>