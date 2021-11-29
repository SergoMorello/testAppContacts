@extends('lay.html')

@section('title',config()->APP_NAME)

@section('content')
	@include('inc.menu')
	<div class="container">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">{{$contact->email}}</h5>
				<h6 class="card-subtitle mb-2 text-muted">{{$contact->name}}</h6>
                <h6 class="card-subtitle mb-4 text-muted">{{$contact->phone}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">Прикреплённые файлы:</h6>
				@if($files->count())  
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $key=>$file)
                                <tr>
                                <th scope="row">{{($key+1)}}</th>
                                <td>{{$file->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
			</div>
		</div>
	</div>
@endsection