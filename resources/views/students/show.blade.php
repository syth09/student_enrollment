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

        {{-- Tiêu đề --}}
        <div class="bg-info text-white p-4 rounded-3 shadow-sm mb-4">
            <h1 class="mb-0 fs-3 fw-bold">Chi Tiết Sinh Viên</h1>
        </div>

        {{-- Thông tin sinh viên --}}
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="p-1 fw-bold fs-4">{{ $student->name }}</h4>
                <p class="p-1 "><strong>Email:</strong> {{ $student->email }}</p>
                <p class="p-1 "><strong>Ngành:</strong> {{ $student->major ?? 'Chưa cập nhật' }}</p>
                <p class="p-1 "><strong>Tổng tín chỉ đã đăng ký:</strong>
                    <span class="badge bg-primary fs-6">{{ $student->total_credits }} / 18 tín chỉ</span>
                </p>
            </div>
        </div>

        <a href="{{ route('enroll.create', $student) }}" class="btn btn-success mb-3">
            Đăng ký môn học
        </a>

        <div class="card shadow-sm mb-4">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light border-bottom">
                        <h5 class="p-3 fw-bold fs-4">Danh sách môn học đã đăng ký</h5>
                        <tr>
                            <th>Mã môn</th>
                            <th>Tên môn học</th>
                            <th>Số tín chỉ</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($student->courses as $course)
                            <tr>
                                <td>{{ $course->code }}</td>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->credits }}</td>
                                <td>
                                    <form action="{{ route('enroll.destroy', [$student, $course]) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hủy đăng ký môn này?')">Hủy đăng ký</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Sinh viên chưa đăng ký môn nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <a href="{{ route('students.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
    </div>
@endsection
