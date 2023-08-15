@extends('layouts.layout');
@section('title-content')
    <h2>Thêm nhân viên</h2>
@endsection
@section('content')
    <form action="{{ route('employee.store') }}" id="myForm" method="POST">
        @csrf
        <div class="mb-3 mt-3">
            <label class="form-label">Name:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter name" name="employee_name">
            @error('employee_name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="employee_email">
            @error('employee_email')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Tel</label>
            <input type="text" class="form-control" placeholder="Enter tel" name="employee_tel">
            @error('employee_tel')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('employee.index') }}"><button type="button" class="btn btn-primary">Back</button></a>
        <button type="button" class="btn btn-primary" onclick="resetForm()">Reset</button>
    </form>
@endsection
<script>
    function resetForm() {
        document.getElementById('myForm').reset();
    }
</script>
