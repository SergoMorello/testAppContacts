@extends('lay.html')

@section('title',config()->APP_NAME)

@section('content')
	@include('inc.menu')
	<div class="container">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Список моих запросов</h5>
				<h6 class="card-subtitle mb-2 text-muted">Тестовое задание</h6>
				@if($contacts->count())  
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Телефон</th>
                            <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $key=>$contact)
                                <tr>
                                <th scope="row">{{($key+1)}}</th>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>{{$contact->email}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
			</div>
		</div>
	</div>
@endsection