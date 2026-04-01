@extends('layouts.app')

@section('content')
    <div class="container">

        <!-- Tiêu đề -->
        <div class="bg-primary text-white p-4 rounded-3 shadow-sm mb-4">
            <h1 class="mb-0 fs-3 fw-bold">Chỉnh Sửa Thông Tin Sinh Viên</h1>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">

                <form method="POST" action="{{ route('students.update', $student) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Họ và tên</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}"
                            required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control"
                            value="{{ old('email', $student->email) }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Ngành học</label>
                        <input type="text" name="major" class="form-control"
                            value="{{ old('major', $student->major) }}">
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary px-4">
                            Cập nhật thông tin
                        </button>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary px-4">
                            Hủy
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
