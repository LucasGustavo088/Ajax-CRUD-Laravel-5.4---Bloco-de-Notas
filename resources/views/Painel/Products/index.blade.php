@extends('painel/templates/template1')

@push('bootstrap')
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
@endpush


<div class="container">
<h1 class="text-center">listagem dos produtos</h1>
	<div class="col-md-10 col-lg-offset-1">
		<a type="button" href="{{route('produtos.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>  Cadastrar</a>
	</div>
	<div class="col-md-10 col-lg-offset-1">
		<table class="table table-bordered">
			<tr>
				<th>Nome</th>
				<th>Decrição</th>
				<th>Ações</th>
			</tr>
			@foreach($products as $product)
			<tr>
				<td>{{$product->name}}</td>
				<td>{{$product->description}}</td>
				<td>
					<a href="" class="edit">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
					<a href="" class="delete">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>