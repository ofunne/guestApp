@extends('layouts.app')

@section('content')
<div class="container">
    <div class="well">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                    <h2>{{App\Guest::count()}}</h2>
                    <h4>GUESTS</h4>
            </div>
        </div>
    </div>
    @if(count($guests) > 0)
		@foreach($guests as $guest)
			<div class="well">
				<div class="row">
					<div class="col-md-12 col-sm-12">
                        <h3><a href="/guests/{{$guest->id}}">{{$guest->fullname}}</a></h3>
                        <small>{{$guest->email}}</small>
                        <p>{{$guest->comment}}</p>
                        <span class="float-left"><a href="/{{$guest->id}}/edit" class="btn btn-sm btn-warning">Edit</a></span>

                        <form action="route('welcome.destroy', [$guest->id])" method="POST">
                            @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">DElete</button>
                        </form>
                        
                        <span class="float-right">
                            {!!Form::open(array('url' => '/'. $guest->id, 'class' => ''))!!}
                            {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                            {!!Form::close()!!}
                        </span>       
					</div>
				</div>				
            </div>
            <hr>
		@endforeach
		{{$guests->links()}}
	@else
		<p>No guests found</p>
	@endif
</div>
@endsection
