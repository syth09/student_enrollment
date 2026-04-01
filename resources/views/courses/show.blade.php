@extends('layouts.app')

@section('content')
    <div class="container">

        <!-- Tiêu đề -->
        <div class="bg-info text-white p-4 rounded-3 shadow-sm mb-4">
            <h1 class="mb-0 fs-3 fw-bold">Chi Tiết Môn Học</h1>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="180">Mã môn học</th>
                        <td><strong>{{ $course->code }}</strong></td>
                    </tr>
                    <tr>
                        <th>Tên môn học</th>
                        <td>{{ $course->name }}</td>
                    </tr>
                    <tr>
                        <th>Số tín chỉ</th>
                        <td>
                            <span class="badge bg-primary fs-6">
                                {{ $course->credits }} tín chỉ
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Số sinh viên đã đăng ký</th>
                        <td>
                            <span class="badge bg-success fs-6">
                                {{ $course->students->count() }} sinh viên
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Ngày tạo</th>
                        <td>{{ $course->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Cập nhật lần cuối</th>
                        <td>{{ $course->updated_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Danh sách sinh viên đã đăng ký môn này -->
        <h5 class="mb-3">Danh sách sinh viên đã đăng ký môn học</h5>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Ngành học</th>
                            <th>Ngày đăng ký</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($course->students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->major ?? 'Chưa có' }}</td>
                                <td>{{ $student->pivot->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    Chưa có sinh viên nào đăng ký môn học này.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning">
                Sửa thông tin môn học
            </a>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                Quay lại danh sách môn học
            </a>
        </div>

    </div>
@endsection
