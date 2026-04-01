@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- Tiêu đề chính --}}
        <div class="bg-primary text-white p-4 rounded-3 shadow-sm mb-4">
            <h1 class="mb-0 fs-3 fw-bold">Quản Lý Sinh Viên</h1>
        </div>

        <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">
            + Thêm sinh viên mới
        </a>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light border-bottom">
                        <tr>
                            <th width="60">ID</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Ngành học</th>
                            <th class="text-center">Số môn ĐK</th>
                            <th class="text-center">Tổng tín chỉ</th>
                            <th class="text-center" width="180">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->major ?? 'Chưa cập nhật' }}</td>
                                <td class="text-center">{{ $student->courses_count ?? 0 }}</td>
                                <td class="text-center fw-bold text-success">
                                    {{ $student->total_credits }} / 18
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('students.show', $student) }}"
                                            class="btn btn-info btn-sm rounded-pill px-2 py-1">
                                            Chi tiết
                                        </a>

                                        <a href="{{ route('students.edit', $student) }}"
                                            class="btn btn-warning btn-sm rounded-pill px-2 py-1">
                                            Sửa
                                        </a>

                                        <form action="{{ route('students.destroy', $student) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm rounded-pill px-2 py-1"
                                                onclick="return confirm('Xác nhận xóa sinh viên này?')">
                                                Xóa
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">Chưa có sinh viên nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Phân trang -->
        <div class="mt-3">
            {{ $students->links() }}
        </div>

    </div>
@endsection
