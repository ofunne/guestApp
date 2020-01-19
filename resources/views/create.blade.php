@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    {!! Form::open(['action' => 'GuestsController@store', 'id' => 'data_form', 'method' =>'POST']) !!}
                        @include('inc.message')                
                                
                        <div class="form-group">
                            {{Form::label('fullname', 'Fullname')}}
                            {{Form::text('fullname', '', ['id' => 'fullname', 'class' => 'form-control', 'placeholder' => ''])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('email', 'Email Address')}}
                            {{Form::text('email', '', ['id' => 'email', 'class' => 'form-control', 'placeholder' => ''])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('comment', 'Comment')}}
                            {{Form::textarea('comment', '', ['id' => 'comment', 'class' => 'form-control', 'placeholder' => ''])}}
                        </div>                   
                        <div class="col-md-12">
                            {{Form::submit('Submit', ['id' => 'action_button', 'class' => 'btn btn-success btn-block'])}}
                        </div>   
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
