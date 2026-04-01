@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="bg-success text-white p-4 rounded-3 shadow-sm mb-4">
            <h1 class="mb-0 fs-3 fw-bold">Thêm Môn Học Mới</h1>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('courses.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Mã môn học</label>
                        <input type="text" name="code" class="form-control" value="{{ old('code') }}" required
                            placeholder="Ví dụ: CS101">
                        @error('code')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tên môn học</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Số tín chỉ</label>
                        <input type="number" name="credits" class="form-control" value="{{ old('credits') }}"
                            min="1" max="10" required>
                        @error('credits')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Lưu môn học</button>
                    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Hủy</a>
                </form>
            </div>
        </div>

    </div>
@endsection
