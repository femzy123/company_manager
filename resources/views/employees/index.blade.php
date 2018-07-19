@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h1>Employees</h1>
            <a class="btn btn-success pull-right" href="/employees/create">Add New Company</a>
        </div>
        <div class="table-responsive">
                <br>
                <table class="table table-hover">
                    <thead class="">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @if($employees)

                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->company->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td><div>
                                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-info pull-left">Edit</a>
                                            {!! Form::open(['action' => ['EmployeesController@destroy', $employee->id], 'method' => 'POST']) !!}

                                                {{ Form::hidden('_method', 'DELETE') }}

                                                {{ Form::Submit('Delete', ['class' => 'btn btn-danger']) }}

                                            {!! Form::close() !!}
                                        </div>
                                        

                                    </td>
                                </tr>
                            @endforeach
                        @endif          
                    </tbody>
                </table>
                {{$employees->links()}}
        </div>
    </div>
@endsection