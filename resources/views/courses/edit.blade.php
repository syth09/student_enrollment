@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="bg-warning text-dark p-4 rounded-3 shadow-sm mb-4">
            <h1 class="mb-0 fs-3 fw-bold">Chỉnh Sửa Môn Học</h1>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('courses.update', $course) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Mã môn học</label>
                        <input type="text" name="code" class="form-control" value="{{ old('code', $course->code) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tên môn học</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $course->name) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Số tín chỉ</label>
                        <input type="number" name="credits" class="form-control"
                            value="{{ old('credits', $course->credits) }}" min="1" max="10" required>
                    </div>

                    <button type="submit" class="btn btn-warning">Cập nhật môn học</button>
                    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Hủy</a>
                </form>
            </div>
        </div>

    </div>
@endsection
