@extends('tasks.layout')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> 
        @endif
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Danh sách công việc</h5>
            <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-primary">+ Thêm Task</a>
        </div>
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Công việc</th>
                        <th>Hạn chót</th>
                        <th>Trạng thái</th>
                        <th class="text-end">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Demo static -->
                    @forelse ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->due_date }}</td>
                            <td>
                                @switch($task->status)
                                    @case(0)
                                        <span class="badge bg-secondary">Chưa bắt đầu</span>
                                        @break
                                    @case(1)
                                        <span class="badge bg-warning">Đang làm</span>
                                        @break
                                    @case(2)
                                        <span class="badge bg-success">Hoàn thành</span>
                                        @break
                                    @default
                                        <span class="badge bg-secondary">Chưa bắt đầu</span>
                                @endswitch
                            </td>
                            <td class="text-end">
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-info text-white">Xem</a>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                                <button class="btn btn-sm btn-danger">Xóa</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Không có công việc nào.</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection