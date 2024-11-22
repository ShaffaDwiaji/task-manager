<x-app-layout>
@extends('layouts.main')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task Manager') }}
        </h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3 justify">Tambah Tugas Baru</a>
    

    <div class="py-12">
        <div class="list-group mb-4">
            @forelse ($tasks as $task)
                <div class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $task->title }}</h5>
                        <small>{{ $task->created_at->format('d/m/Y') }}</small>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <span class="badge 
                            @if($task->status == 'pending') bg-warning
                            @elseif($task->status == 'in_progress') bg-info
                            @elseif($task->status == 'completed') bg-success
                            @endif">
                            {{ ucfirst($task->status) }}
                        </span>
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
                <p class="text-muted">Belum ada tugas.</p>
            @endforelse
        </div>
        
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="{{ route('main') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-outline-danger">Logout</button>
            </form>
        </div>
    </div>
    </x-slot>
</x-app-layout>
