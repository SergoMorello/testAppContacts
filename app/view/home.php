@extends('lay.html')

@section('title',config()->APP_NAME)

@section('content')
	@include('inc.menu')
	<div class="container">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Обратная связь</h5>
				<h6 class="card-subtitle mb-2 text-muted">Тестовое задание</h6>
				<form method="post" action="{{route('contact-submit')}}" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Имя</label>
						@if($errors->has('name'))
							<div class="alert alert-danger" role="alert">
								{{$errors->all()['name']}}
							</div>
						@endif
						<input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Вася" value="{{old('name')}}">
					</div>

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Номер телефона</label>
						@if($errors->has('phone'))
							<div class="alert alert-danger" role="alert">
								{{$errors->all()['phone']}}
							</div>
						@endif
						<input type="phone" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="+79001234567" value="{{old('phone')}}">
					</div>

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Email</label>
						@if($errors->has('email'))
							<div class="alert alert-danger" role="alert">
								{{$errors->all()['email']}}
							</div>
						@endif
						<input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{old('email')}}">
					</div>

					<div class="mb-3">
						<label for="formFile" class="form-label">Прикрепленные файлы</label>
						<input class="form-control" name="files[]" type="file" id="formFile" multiple>
					</div>

					<div class="mb-3">
						<button type="submit" class="btn btn-primary mb-3">Отправить</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection