@extends('layouts.app')

@section('content')
    <div class="container">

        <!-- Tiêu đề -->
        <div class="bg-info text-white p-4 rounded-3 shadow-sm mb-4">
            <h1 class="mb-0 fs-3 fw-bold">Chi Tiết Sinh Viên</h1>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h4>{{ $student->name }}</h4>
                <p><strong>Email:</strong> {{ $student->email }}</p>
                <p><strong>Ngành học:</strong> {{ $student->major ?? 'Chưa cập nhật' }}</p>
                <p>
                    <strong>Tổng tín chỉ đã đăng ký:</strong>
                    <span class="badge bg-primary fs-6">{{ $student->total_credits }} / 18 tín chỉ</span>
                </p>
            </div>
        </div>

        <!-- Nút Đăng ký môn học -->
        <div class="mb-4">
            <a href="{{ route('enroll.create', $student) }}" class="btn btn-success btn-lg">
                <i class="bi bi-plus-circle"></i> Đăng ký môn học mới
            </a>
        </div>

        <!-- Danh sách môn học đã đăng ký -->
        <h5 class="mb-3">Danh sách môn học đã đăng ký</h5>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Mã môn</th>
                            <th>Tên môn học</th>
                            <th>Số tín chỉ</th>
                            <th>Ngày đăng ký</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($student->courses as $course)
                            <tr>
                                <td>{{ $course->code }}</td>
                                <td>{{ $course->name }}</td>
                                <td class="text-center">{{ $course->credits }}</td>
                                <td>{{ $course->pivot->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <form action="{{ route('enroll.destroy', [$student, $course]) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3"
                                            onclick="return confirm('Hủy đăng ký môn này?')">
                                            Hủy đăng ký
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    Sinh viên chưa đăng ký môn học nào.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Quay lại danh sách sinh viên</a>
        </div>

    </div>
@endsection
