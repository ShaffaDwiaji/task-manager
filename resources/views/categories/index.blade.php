@extends('layouts.main')

@section('title', 'Daftar Kategori')

@section('content')
    <h1 class="mb-4">Daftar Kategori</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Tambah Kategori Baru</a>

    <div class="list-group mb-4">
        @forelse ($categories as $task)
            <div class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $task->name }}</h5>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <p class="mb-1">{{ $task->slug}}</p>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <p class="mb-1">{{ $task->description}}</p>
                    </div>
                    <div>
                        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-info">Detail</a>
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
            <p class="text-muted">Belum ada kategori.</p>
        @endforelse
    </div>
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <a href="{{ route('main') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-outline-danger">Logout</button>
        </form>
    </div>
@endsection
