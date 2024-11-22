@extends('layouts.main')

@section('title', 'Detail Tugas')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1>Detail Tugas</h1>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Kembali</a>
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
            <li class="list-group-item"><strong>Deadline:</strong>
                {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') : 'Tidak ada deadline' }}
            </li>
            <li class="list-group-item"><strong>Dibuat pada:</strong> 
                {{ $task->created_at ? $task->created_at->format('d/m/Y') : 'Tanggal tidak tersedia' }}
            </li>
            <li class="list-group-item"><strong>Terakhir diperbarui:</strong> 
                {{ $task->updated_at ? $task->updated_at->format('d/m/Y') : 'Belum diperbarui' }}
            </li>
        </ul>
    </div>
</div>

@endsection
