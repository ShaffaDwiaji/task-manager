@extends('layouts.main')

@section('title', 'Edit Tugas')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Tugas</h1>

        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('POST')

            <div class="mb-3">
                <label for="title" class="form-label">Judul Tugas</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $task->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="due_date" class="form-label">Tanggal Deadline</label>
                <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
