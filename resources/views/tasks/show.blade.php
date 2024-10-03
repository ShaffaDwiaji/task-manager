@extends('layouts.main')

@section('title', 'Detail Tugas')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Detail Tugas</h1>
            <div>
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')">Hapus</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $task->title }}</h5>
            <p class="card-text">{{ $task->description }}</p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Status:</strong> 
                    <span class="badge {{ $task->status == 'completed' ? 'bg-success' : 'bg-warning' }}">
                        {{ ucfirst($task->status) }}
                    </span>
                </li>
                <li class="list-group-item"><strong>Deadline:</strong> {{ $task->due_date->format('d/m/Y') }}</li>
                <li class="list-group-item"><strong>Dibuat pada:</strong> {{ $task->created_at->format('d/m/Y H:i') }}</li>
                <li class="list-group-item"><strong>Terakhir diperbarui:</strong> {{ $task->updated_at->format('d/m/Y H:i') }}</li>
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Kembali ke Daftar Tugas</a>
        </div>
    </div>
@endsection
