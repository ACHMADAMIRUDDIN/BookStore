<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
 
class UserController extends Controller
{
    /**
     * Menampilkan daftar user terdaftar (dengan pencarian & pagination).
     * Hanya bisa diakses oleh Admin (dicek via middleware di routes/web.php).
     */
    public function index(Request $request): View
    {
        $keyword   = $request->query('search');
        $perPage   = 10; // jumlah baris per halaman
 
        $users = User::query()
            ->search($keyword)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage)
            ->withQueryString(); // supaya query "search" ikut terbawa saat pindah halaman
 
        return view('admin.users.index', [
            'users'   => $users,
            'keyword' => $keyword,
        ]);
    }
 
    /**
     * Menghapus user berdasarkan ID.
     * Admin tidak diperbolehkan menghapus akunnya sendiri.
     */
    public function destroy(Request $request, User $user): RedirectResponse
    {
        if ($request->user()->id === $user->id) {
            return redirect()
                ->route('admin.users.index')
                ->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }
 
        $user->delete();
 
        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User "' . $user->name . '" berhasil dihapus.');
    }
}