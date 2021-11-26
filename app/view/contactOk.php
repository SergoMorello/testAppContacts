@extends('lay.html')

@section('title',config()->APP_NAME)

@section('content')
	@include('inc.menu')
	<div class="container">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Готово</h5>
				<h6 class="card-subtitle mb-2 text-muted">Тестовое задание</h6>
				Спасибо ваш запрос отправлен
			</div>
		</div>
	</div>
@endsection