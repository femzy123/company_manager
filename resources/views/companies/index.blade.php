@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h1>Companies</h1>
            <a class="btn btn-success pull-right" href="/companies/create">Add New Company</a>
        </div>
        <div class="table-responsive">
                <br>
                <table class="table table-hover">
                    <thead class="">
                    <tr>
                        <th>ID</th>
                        <th>Logo</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @if($companies)

                            @foreach($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td><img src="storage/logo/{{ $company->logo }}" alt="Logo" width="100px"></td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->website }}</td>
                                    <td><div>
                                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-info pull-left">Edit</a>
                                            {!! Form::open(['action' => ['CompaniesController@destroy', $company->id], 'method' => 'POST']) !!}

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
                {{$companies->links()}}
        </div>
    </div>
@endsection