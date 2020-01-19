@extends('layouts.app')

@section('content')
<div class="container">
    <div class="well">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                    <h2>{{App\Guest::count()}}</h2>
                    <h4>GUEST(S)</h4>
            </div>
        </div>
    </div>
    @include('inc.message')
    @if(count($guests) > 0)
		@foreach($guests as $guest)
			<div class="well">
				<div class="row">
					<div class="col-md-12 col-sm-12">
                        <h3><a href="/guests/{{$guest->id}}">{{$guest->fullname}}</a></h3>
                        <small>{{$guest->email}}</small>
                        <p>{{$guest->comment}}</p>
                        @if(!Auth::guest())
                                <span class="float-left"><a href="/guests/{{$guest->id}}/edit" class="btn btn-sm btn-warning pull-left">Edit</a></span>

                                
                                <span class="float-right">
                                    {!!Form::open(['action' => ['GuestsController@destroy', $guest->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                    {!!Form::close()!!}
                                </span>  
                        @endif     
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
