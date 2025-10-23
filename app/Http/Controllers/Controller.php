<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::findByUsername($username);
        if ($user && $user['password'] === $password) {
            session(['user' => $user]);
            return redirect()->route('dashboard', ['username' => $username]);
        }

        return redirect()->route('login')->with('error', 'Username atau password salah.');
    }

    public function formEditProfil(Request $request)
    {
        $user = session('user');
        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        return view('editProfil', compact('user'));
    }


    public function editProfil(Request $request)
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Sesi login tidak ditemukan.');
        }

        $user['nama'] = $request->input('nama');
        $user['email'] = $request->input('email');
        $user['no_hp'] = $request->input('no_hp');
        $user['username'] = $request->input('username');

        session(['user' => $user]);

        return redirect()->route('profil', ['username' => $user['username']])
            ->with('success', 'Profil berhasil diperbarui!');
    }


    public function logout()
    {
        session()->flush();
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }

    public function showDashboard(Request $request)
    {
        $user = session('user');
        $username = $request->query('username');
        return view('dashboard', compact('username'));
    }


    public function showProfil(Request $request)
    {
        $user = session('user');
        $username = $request->query('username');

        return view('profil', compact('user', 'username'));
    }

    public function showPengelolaan()
    {
        if (!session()->has('dataPupuk')) {
        session([
            'dataPupuk' => [
                [
                    'id' => 1,
                    'nama_pupuk' => 'Urea 46%',
                    'penjelasan' => 'Nitrogen tinggi untuk pertumbuhan daun',
                    'jumlah' => 120,
                    'harga' => 120000
                ],
                [
                    'id' => 2,
                    'nama_pupuk' => 'SP-36',
                    'penjelasan' => 'Sumber fosfor untuk akar kuat',
                    'jumlah' => 80,
                    'harga' => 130000
                ],
            ]
        ]);
    }

    $dataPupuk = session('dataPupuk');
    return view('pengelolaan', compact('dataPupuk'));
    }

    public function tambahPupuk(Request $request)
    {
        $data = session('dataPupuk', []);

        $data[] = [
            'id' => count($data) + 1,
            'nama_pupuk' => $request->input('nama_pupuk'),
            'penjelasan' => $request->input('penjelasan'),
            'jumlah' => $request->input('jumlah'),
            'harga' => $request->input('harga'),
        ];

        session(['dataPupuk' => $data]);
        return redirect()->route('pengelolaan')->with('success', 'Pupuk berhasil ditambahkan!');
    }

    public function formEditPupuk($id)
    {
        $dataPupuk = session('dataPupuk', []);

        $pupuk = collect($dataPupuk)->firstWhere('id', $id);
        if (!$pupuk) {
            return redirect()->route('pengelolaan')->with('error', 'Data pupuk tidak ditemukan.');
        }

        return view('editPupuk', compact('pupuk'));
    }


    public function editPupuk(Request $request, $id)
    {
        $dataPupuk = session('dataPupuk', []);

        foreach ($dataPupuk as &$pupuk) {
            if ($pupuk['id'] == $id) {
                $pupuk['nama_pupuk'] = $request->input('nama_pupuk');
                $pupuk['penjelasan'] = $request->input('penjelasan');
                $pupuk['jumlah'] = $request->input('jumlah');
                $pupuk['harga'] = $request->input('harga');
                break;
            }
        }

        session(['dataPupuk' => $dataPupuk]);

        return redirect()->route('pengelolaan')->with('success', 'Data pupuk berhasil diperbarui!');
    }

    public function hapusPupuk($id)
    {
        $data = session('dataPupuk', []);
        $data = array_filter($data, fn($p) => $p['id'] != $id);
        session(['dataPupuk' => array_values($data)]);
        return redirect()->route('pengelolaan')->with('success', 'Data pupuk dihapus.');
    }

    public function formTambahPupuk()
    {
        return view('tambahPupuk');
    }

    
}
