@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Add New Employee</h1>

            <div>
                {!! Form::open(['action' => ['EmployeesController@update', $employee->id], 'method' => 'POST']) !!}

                    {{ Form::hidden('_method', 'PUT') }}

                    <div class="form-group">
                        {!! Form::label('first_name', 'First Name:') !!}
                        {!! Form::text('first_name', $employee->first_name, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('last_name', 'Last Name:') !!}
                        {!! Form::text('last_name', $employee->last_name, ['class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('company_id', 'Company ID:') !!}
                        {!! Form::text('company_id', $employee->company_id, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::email('email', $employee->email, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('phone', 'Phone:') !!}
                        {!! Form::text('phone', $employee->phone, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Update Employee', ['class'=>'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection