<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar User Terdaftar') }}
        </h2>
    </x-slot>
 
<div class="users-page">
    <div class="users-header">
        <h1>Daftar User Terdaftar</h1>
        <p class="subtitle">Kelola seluruh user yang terdaftar di BookStore</p>
    </div>
 
    {{-- Notifikasi sukses / error --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif
 
    {{-- Form Pencarian --}}
    <form action="{{ route('admin.users.index') }}" method="GET" class="search-form">
        <input
            type="text"
            name="search"
            value="{{ $keyword }}"
            placeholder="Cari berdasarkan nama atau email..."
            class="search-input"
        >
        <button type="submit" class="btn btn-primary">Cari</button>
        @if($keyword)
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Reset</a>
        @endif
    </form>
 
    {{-- Tabel User --}}
    <div class="table-wrapper">
        <table class="users-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal Daftar</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                    <tr>
                        <td>{{ $users->firstItem() + $index }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d M Y, H:i') }}</td>
                        <td class="text-center">
                            <div class="action-buttons">
 
                                <form action="{{ route('admin.users.destroy', $user->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus user \'{{ $user->name }}\'? Tindakan ini tidak dapat dibatalkan.');"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-state">
                            @if($keyword)
                                Tidak ada user dengan kata kunci "{{ $keyword }}".
                            @else
                                Belum ada user yang terdaftar.
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
 
    {{-- Pagination --}}
    <div class="pagination-wrapper">
        {{ $users->links() }}
    </div>
</div>
 
<style>
    .users-page {
        max-width: 1100px;
        margin: 0 auto;
        padding: 24px;
        font-family: 'Segoe UI', Roboto, Arial, sans-serif;
        color: #1f2937;
    }
 
    .users-header h1 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 4px;
    }
 
    .users-header .subtitle {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 20px;
    }
 
    .alert {
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 16px;
        font-size: 14px;
    }
    .alert-success { background: #ecfdf5; color: #047857; border: 1px solid #a7f3d0; }
    .alert-error   { background: #fef2f2; color: #b91c1c; border: 1px solid #fecaca; }
 
    .search-form {
        display: flex;
        gap: 8px;
        margin-bottom: 20px;
    }
 
    .search-input {
        flex: 1;
        max-width: 320px;
        padding: 10px 14px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        font-size: 14px;
    }
    .search-input:focus {
        outline: none;
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.15);
    }
 
    .btn {
        padding: 10px 16px;
        border-radius: 8px;
        border: none;
        font-size: 14px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }
    .btn-primary   { background: #4f46e5; color: #fff; }
    .btn-primary:hover { background: #4338ca; }
    .btn-secondary { background: #e5e7eb; color: #374151; }
    .btn-secondary:hover { background: #d1d5db; }
    .btn-info      { background: #0ea5e9; color: #fff; }
    .btn-info:hover { background: #0284c7; }
    .btn-danger    { background: #ef4444; color: #fff; }
    .btn-danger:hover { background: #dc2626; }
    .btn-sm { padding: 6px 12px; font-size: 13px; }
 
    .table-wrapper {
        overflow-x: auto;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
    }
 
    .users-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 640px;
    }
 
    .users-table thead {
        background: #f9fafb;
    }
 
    .users-table th {
        text-align: left;
        padding: 12px 16px;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.03em;
        color: #6b7280;
        border-bottom: 1px solid #e5e7eb;
    }
 
    .users-table td {
        padding: 14px 16px;
        font-size: 14px;
        border-bottom: 1px solid #f3f4f6;
        vertical-align: middle;
    }
 
    .users-table tbody tr:hover {
        background: #fafafa;
    }
 
    .text-center { text-align: center; }
 
    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 8px;
    }
 
    .empty-state {
        text-align: center;
        padding: 32px 16px;
        color: #9ca3af;
        font-size: 14px;
    }
 
    .pagination-wrapper {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }
</style>
</x-app-layout>