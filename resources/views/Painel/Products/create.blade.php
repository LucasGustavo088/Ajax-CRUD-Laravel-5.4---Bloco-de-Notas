@extends('painel/templates/template1')

@push('bootstrap')
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
@endpush

<div class="container">
	<div class="col-lg-6 col-lg-offset-3">
		<h1 class="text-center title-pg">FormData</h1>
		@if( isset($errors) && count($errors) > 0)
			<div class="alert alert-danger">
				@foreach( $errors->all() as $error)
					<p>{{$error}}</p>
				@endforeach
			</div>
		@endif
		<form action="{{route('produtos.store')}}" method="post" class="form">
			<input type="hidden" name="_token" value="{{csrf_token()}}" >
			{!!csrf_field()!!}
			<input class="form-control" type="text" name="name" placeholder="Nome" value="{{old('name')}}"><br>
			<input value="{{old('number')}}" class="form-control" type="number" name="number" placeholder="Número"><br>
			<div class="checkbox">
			    <label>
			      <input name="active" type="checkbox" id="checkboxSuccess" value="1">
			      Ativo
			    </label>
			  </div>
			<select value="{{old('category')}}" name="category" id="" class="form-control"><br>
				<option>Escolha a categoria</option>
				@foreach($categories as $category)
					<option value="{{$category}}">{{$category}}</option>
				@endforeach
			</select><br>
			<textarea name="description" id="" cols="75" rows="10" placeholder="Descrição">{{old('description')}}</textarea><br>
			<button class="btn btn-primary text-left">Enviar</button>	
		</form>
	</div>
</div>	