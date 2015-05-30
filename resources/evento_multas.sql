CREATE EVENT actualizar_multas
ON SCHEDULE EVERY 24 hour STARTS '2001-01-01 00:00:01'
DO 
	insert into multas(prestamo_id, created_at, monto, fecha_entregado) 
	select id, now(), 0, '0000-00-00' from prestamos 
	where fecha_devolucion = date_sub( date(now()), interval 1 day )
	and entregado=0
;