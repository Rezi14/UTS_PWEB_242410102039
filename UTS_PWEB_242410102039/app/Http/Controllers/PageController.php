<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class PageController extends Controller
{

    public function datakamar(){
        return [
            ['id' => 101, 'tipe_kamar' => 'Standard', 'harga' => 500000, 'status' => 'Tersedia'],
            ['id' => 102, 'tipe_kamar' => 'Standard', 'harga' => 500000, 'status' => 'Terisi'],
            ['id' => 201, 'tipe_kamar' => 'Deluxe', 'harga' => 850000, 'status' => 'Tersedia'],
            ['id' => 202, 'tipe_kamar' => 'Deluxe', 'harga' => 850000, 'status' => 'Dalam Perbaikan'],
            ['id' => 301, 'tipe_kamar' => 'Suite', 'harga' => 1500000, 'status' => 'Tersedia'],
            ['id' => 302, 'tipe_kamar' => 'Suite', 'harga' => 1500000, 'status' => 'Terisi'],
        ];
    }

    public function tamumenginap(){
        return [
            ['id' => 1, 'nama' => 'Andi', 'no_kamar' => '101', 'tipe_kamar' => 'Deluxe', 'check_in' => '2025-10-22'],
            ['id' => 2, 'nama' => 'Dono', 'no_kamar' => '204', 'tipe_kamar' => 'Suite', 'check_in' => '2025-10-23'],
        ];
    }

    public function showLogin()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        $users = [
            'rz' => '123',
        ];

        if (isset($users[$username]) && $users[$username] === $password) {

            return redirect()->route('dashboard', ['username' => $username])->with('success', 'Berhasil login!');
        }

        return back()->withErrors(['login' => 'Username atau password salah.'])->withInput();
    }


    public function showDashboard(Request $request)
    {
        $username = $request->query('username');

        if (!$username) {
            return redirect()->route('login')->withErrors(['login' => 'Anda harus login terlebih dahulu.']);
        }

        $totalkamar = count($this->datakamar());

        $daftartamu = $this->tamumenginap();

        return view('dashboard', [
            'username' => $username,
            'totalkamar' => $totalkamar,
            'daftarTamu' => $daftartamu
        ]);
    }


    public function showPengelolaan(Request $request)
    {
        $username = $request->query('username');

        if (!$username) {
            return redirect()->route('login')->withErrors(['login' => 'Anda harus login terlebih dahulu.']);
        }

        $dataKamarHotel = $this->datakamar();

        $daftartamu = $this->tamumenginap();

        return view('pengelolaan', [
            'username' => $username,
            'data' => $dataKamarHotel,
            'daftartamu' => $daftartamu
        ]);
    }

    public function showProfile(Request $request)
    {
        $username = $request->query('username');

        if (!$username) {
            return redirect()->route('login')->withErrors(['login' => 'Anda harus login terlebih dahulu.']);
        }

        return view('profile', ['username' => $username]);
    }

    public function doLogout()
    {
        session()->forget('username');
        return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
    }
}
