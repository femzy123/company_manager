@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Edit Company</h1>

            <div>
                {!! Form::open(['action' => ['CompaniesController@update', $company->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                    {{ Form::hidden('_method', 'PUT') }}

                    <div class="form-group">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', $company->name, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::email('email', $company->email, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('website', 'website:') !!}
                        {!! Form::text('website', $company->website, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Update Company', ['class'=>'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection