@extends('layouts.layout');
@section('title-content')
    <h2 class="">Danh sách nhân viên</h2>
@endsection
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('employee.create') }}"> Add new</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Tel</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            @if (isset($employee) && count($employee) > 0)
                <tbody>
                    @foreach ($employee as $emp)
                        <tr>
                            <td>{{ $emp->id }}</td>
                            <td>{{ htmlspecialchars_decode($emp->employee_name) }}</td>
                            <td>{{ $emp->employee_email }}</td>
                            <td>{{ $emp->employee_tel }}</td>
                            <td>
                                <form action="" method="Post">
                                    <a class="btn btn-primary" href="{{ route('employee.edit', $emp->id) }}">Edit</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @else
                <div class="alert alert-danger" role="alert">
                    Không tìm thấy tên
                </div>
            @endif
        </table>
        <div class="pagination">
            <ul class="pagination">
                <li>{{ $employee->links() }}</li>
            </ul>
        </div>

    </div>
@endsection
