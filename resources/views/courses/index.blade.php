@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- Thông báo thành công --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Trở lại danh sách sinh viên --}}
        <div class="mb-3">
            <a href="{{ route('students.index') }}" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left"></i> Quay lại danh sách sinh viên
            </a>
        </div>

        {{-- Tiêu đề --}}
        <div class="bg-success text-white p-4 rounded-3 shadow-sm mb-4">
            <h1 class="mb-0 fs-3 fw-bold">Quản Lý Môn Học</h1>
        </div>

        <!-- Filter - Thêm mới - Tìm kiếm -->
        <div class="row mb-4 align-items-end g-3">

            <!-- Nút Thêm & Lọc -->
            <div class="col-md-2">
                <div class="d-flex flex-column gap-2">
                    <a href="{{ route('courses.create') }}" class="btn btn-success">
                        <i class="bi bi-plus-lg"></i> Thêm môn học mới
                    </a>
                </div>
            </div>

            <!-- Tìm kiếm + Sắp xếp -->
            <div class="col-md-9">
                <form method="GET" action="{{ route('courses.index') }}" id="mainFilter">
                    <div class="row g-2">
                        <!-- Ô tìm kiếm -->
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Tìm kiếm theo tên môn học..." value="{{ request('search') }}">
                                <button class="btn btn-success" type="submit">
                                    <i class="bi bi-search"></i> Tìm
                                </button>
                            </div>
                        </div>

                        <!-- Sắp xếp -->
                        <div class="col-md-4">
                            <select name="sort" class="form-select" onchange="this.form.submit()">
                                <option value="name_asc" {{ request('sort', 'name_asc') == 'name_asc' ? 'selected' : '' }}>
                                    Tên A → Z
                                </option>
                                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>
                                    Tên Z → A
                                </option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Bảng danh sách môn học --}}
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light border-bottom">
                        <tr>
                            <th>Mã môn</th>
                            <th>Tên môn học</th>
                            <th class="text-end">Số tín chỉ</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courses as $course)
                            <tr>
                                <td>{{ $course->code }}</td>
                                <td>{{ $course->name }}</td>
                                <td class="text-end fw-bold">{{ $course->credits }}</td>
                                <td class="text-center">
                                    <a href="{{ route('courses.show', $course) }}"
                                        class="btn btn-info btn-sm rounded-pill px-2">Chi tiết</a>
                                    <a href="{{ route('courses.edit', $course) }}"
                                        class="btn btn-warning btn-sm rounded-pill px-3">Sửa</a>
                                    <form action="{{ route('courses.destroy', $course) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3"
                                            onclick="return confirm('Xác nhận xóa môn học này?')">
                                            Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">Chưa có môn học nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{ $courses->links() }}

    </div>
@endsection
