<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax - Sistema de comentários</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

</head>
<body>
<!-- HEADER -->
<nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Lucas Barbosa</a>
    </div>
  </div><!-- /.container-fluid -->
</nav>

<br>

<!-- TO DO LIST -->
<div class="container">
	<div class="row">
		<div class="col-lg-8">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Ajax Sistema de comentários<a id="addNew" class="pull-right" href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i></a></h3>
			  </div>
			  <div class="panel-body" style="">
			    <ul class="list-group" id="items">
					@foreach($items as $item)
					<li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">{{$item->item}}<input type="hidden" id="itemId" value="{{$item->id}}">
					</li>
					@endforeach
			    </ul>
			  </div>
			</div>
		</div>
		<div class="col-lg-4">
			<input type="text" class="form-control" name="searchItem" id="searchItem" placeholder="Pesquise...">
		</div>
	</div>

	
</div>



<!-- MODALS -->

<!-- Button trigger modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="title">Adicionar novo comentário</h4>
      </div>
      <div class="modal-body">
        <p><input type="text" placeholder="Digite um comentário aqui" id="addItem" class="form-control text-left"></p>
        <input type="hidden" id="id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal" id="delete" style="display: none;">Deletar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveChanges" style="display: none;">Salvar mudanças</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="addButton" >Adicionar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

{{csrf_field()}}
	<script
	  src="https://code.jquery.com/jquery-3.2.1.min.js"
	  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	  crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script>
		$(document).ready(function(){
			
			$(document).on('click', '.ourItem', function(event) {
				var text = $(this).text();
				var id = $(this).find('#itemId').val();
				$('#title').text('Editar item');
				$('#addItem').val(text);
				$('#delete').show('400');
				$('#saveChanges').show('400');
				$('#AddButton').hide('400');
				$('#id').val(id);
				console.log(text);
			});

			$(document).on('click', '#addNew', function(event){
				$('#title').text('Adicionar um novo comentário');
				$('#addItem').val("");
				$('#delete').hide('400');
				$('#saveChanges').hide('400');
				$('#addButton').show('400');
			});


			$('#addButton').click(function(event){
				var text = $('#addItem').val();
				alert(text);
				$.post(
					'list', 
					{'text': text, '_token': $('input[name=_token]').val()}, 
					function(data){
						console.log(data);
						$('#items').load(location.href + ' #items');
					});
				$('#addItem').val("");
			});

			$('#delete').click(function(event) {
				var id = $("#id").val();
				$.post(
					'delete', 
					{'id': id, '_token': $('input[name=_token]').val()}, 
					function(data){
						console.log(data);
						$('#items').load(location.href + ' #items');
					}
				);
			});

			$('#saveChanges').click(function(){
				var id = $("#id").val();
				var valor = $('#addItem').val();
				$.post(
					'editar',
					{'id': id, 'valor': valor, '_token': $('input[name=_token]').val()},
					function(data){
						console.log(data);
						$('#items').load(location.href + ' #items');
					}
				);
			});

			$( function() {
			    var availableTags = [
			      "ActionScript",
			      "AppleScript",
			      "Asp",
			      "BASIC",
			      "C",
			      "C++",
			      "Clojure",
			      "COBOL",
			      "ColdFusion",
			      "Erlang",
			      "Fortran",
			      "Groovy",
			      "Haskell",
			      "Java",
			      "JavaScript",
			      "Lisp",
			      "Perl",
			      "PHP",
			      "Python",
			      "Ruby",
			      "Scala",
			      "Scheme"
			    ];
			    $( "#searchItem" ).autocomplete({
			      source: 'http://localhost:8000/procurar'
			    });
			  } );	
		});
	</script>	
</body>
</html>