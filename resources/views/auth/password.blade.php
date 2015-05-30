@extends('templates.layout')

@section('collection_container_head') @parent @stop

@section('collection_container_body') 
    <ul class="collection with-header">
        <li class="collection-header center-align"><h5>Reset password</h5></li>
        <li class="collection-item">
				@if (session('status'))
					<div class="green-text center-align">
						{{ session('status') }}
					</div>
				@endif

				@if (count($errors) > 0)
					<div class="red-text center-align">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
					<div class="row">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="input-field col s12">
							<input type="email" class="validate" name="email" value="{{ old('email') }}">
							<label for="email">E-Mail Address</label>
						</div>

						<div class="input-field col s12 center-align">
							<button type="submit" class="btn">
								Send Password Reset Link
							</button>
						</div>
					</div>
				</form>
		</li>
	</ul>
@stop

@section('collection_container_foot') @parent @stop