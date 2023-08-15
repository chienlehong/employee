@extends('layouts.layout');
@section('title-content')
    <h2>Sửa nhân viên</h2>
@endsection
@section('content')
    <form action="{{ route('employee.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 mt-3">
            <label class="form-label">Name:</label>
            <input type="text" class="form-control" value="{{ $employee->employee_name }}" id="email"
                placeholder="Enter name" name="employee_name">
            @error('employee_name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label">Email:</label>
            <input type="email" value="{{ $employee->employee_email }}" class="form-control" id="email"
                placeholder="Enter email" name="employee_email">
            @error('employee_email')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Tel</label>
            <input type="text" value="{{ $employee->employee_tel }}" class="form-control" placeholder="Enter tel"
                name="employee_tel">
            @error('employee_tel')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('employee.index') }}"><button type="button" class="btn btn-primary">Back</button></a>
    </form>
@endsection
