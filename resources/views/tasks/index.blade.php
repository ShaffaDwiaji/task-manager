@extends('layouts.main')

@section('title', 'Daftar Tugas')

@section('content')
    <h1 class="mb-4">Daftar Tugas</h1>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Tambah Tugas Baru</a>

    <div class="list-group">
        @forelse ($tasks as $task)
            <div class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $task->title }}</h5>
                    <small>{{ $task->created_at->format('d/m/Y') }}</small>
                </div>
                <p class="mb-1">{{ Str::limit($task->description, 100) }}</p>
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <span class="badge 
                        @if($task->status == 'pending') bg-warning
                        @elseif($task->status == 'in_progress') bg-info
                        @elseif($task->status == 'completed') bg-success
                        @endif">
                        {{ ucfirst($task->status) }}
                    </span>
                    <div>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada tugas.</p>
        @endforelse
    </div>
@endsection
