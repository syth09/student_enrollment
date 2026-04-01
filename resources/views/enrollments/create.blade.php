@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="bg-primary text-white p-4 rounded-3 shadow-sm mb-4">
            <h1 class="mb-0 fs-3 fw-bold">Đăng Ký Môn Học</h1>
            <p class="mb-0 mt-2">Sinh viên: <strong>{{ $student->name }}</strong>
                (Hiện tại: <span class="badge bg-success">{{ $student->total_credits }} / 18 tín chỉ</span>)
            </p>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('enroll.store', $student) }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Chọn môn học cần đăng ký</label>
                        <select name="course_id" class="form-select" required>
                            <option value="">-- Chọn môn học --</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">
                                    {{ $course->code }} - {{ $course->name }} ({{ $course->credits }} tín chỉ)
                                </option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-check-circle"></i> Đăng ký môn học
                        </button>
                        <a href="{{ route('students.show', $student) }}" class="btn btn-secondary px-4">
                            Quay lại
                        </a>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
