@extends('layouts.main')

@section('title', 'Buat Tugas Baru')

@section('content')
    <h1 class="mb-4">Buat Tugas Baru</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Tugas</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder='Masukkan judul task' value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder='Masukkan deskripsi task' rows="3">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="due_date" class="form-label">Tanggal Deadline</label>
            <input type="date" class="form-control @error('due_date') is-invalid @enderror" id="due_date" name="due_date" placeholder='Masukkan deadline task' value="{{ old('due_date') }}">
            @error('due_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                <option value="" disabled selected>Pilih Status</option>
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ old ('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category Id</label>
            <input type="text" class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" value="{{ old('category_id') }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Tugas</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
