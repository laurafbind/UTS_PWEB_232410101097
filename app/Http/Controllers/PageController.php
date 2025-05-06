<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // login
    public function showLogin()
    {
        return view('login');
    }

    public function submitLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username !== 'laurafb' || $password !== 'laura123') {
            return redirect()->route('login')->with('error', 'Username atau password salah!');
        }
    // menyimpan username
        session()->put('username', $username);

        return redirect()->route('dashboard');
    }


    // dashboard
    public function dashboard()
    {
        $username = session('username', 'Guest');

        $data = [
            'user' => $username,
            'monthly_income' => 15000000,
            'tickets_booked' => 120,
            'tickets_completed' => 100,
            'total_tickets' => 135,
            'best_selling_tickets' => [
                ['name' => 'Paket Bali Adventure', 'sold' => 150],
                ['name' => 'Gunung Bromo Sunrise Tour', 'sold' => 120],
                ['name' => 'Explore Raja Ampat', 'sold' => 100],
                ['name' => 'Borobudur & Prambanan Tour', 'sold' => 85],
                ['name' => 'Danau Toba & Samosir Package', 'sold' => 75]
            ]
        ];

        return view('dashboard', compact('data'));
    }

    //profile
    public function profile() {
        $username =  session('username', 'Guest');

        $user = [
            'image' => 'cover3.png',
            'name' => $username,
            'email' => 'laurafb@gmail.com',
        ];

        return view('profile', compact('user'));
    }

    // pengelolaan
    public function pengelolaan()
    {
        $tickets = [
            ['id' => 'T1001', 'name' => 'Bali Adventure', 'price' => 750000, 'availability' => '20', 'location' => 'Bali, Indonesia', 'status' => 'Available', 'image' => 'holiday1.jpg'],
            ['id' => 'T1002', 'name' => 'Explore Raja Ampat', 'price' => 1250000, 'availability' => '15', 'location' => 'Papua, Indonesia', 'status' => 'Available', 'image' => 'holiday2.jpg'],
            ['id' => 'T1003', 'name' => 'Gunung Bromo Sunrise Tour', 'price' => 350000, 'availability' => '50', 'location' => 'Malang, Indonesia', 'status' => 'Available', 'image' => 'holiday3.jpg'],
            ['id' => 'T1004', 'name' => 'Komodo Island Trip', 'price' => 950000, 'availability' => '10', 'location' => 'Labuan Bajo, Indonesia', 'status' => 'Sold Out', 'image' => 'holiday4.jpg'],
            ['id' => 'T1005', 'name' => 'Jakarta City Tour','price' => 250000, 'availability' => '100', 'location' => 'Jakarta, Indonesia', 'status' => 'Available', 'image' => 'holiday5.jpg'],
            ['id' => 'T1006', 'name' => 'Danau Toba & Samosir Package', 'price' => 680000, 'availability' => '30', 'location' => 'Sumatra, Indonesia', 'status' => 'Available', 'image' => 'holiday6.jpg'],
            ['id' => 'T1007', 'name' => 'Borobudur & Prambanan Tour', 'price' => 400000, 'availability' => '60', 'location' => 'Yogyakarta, Indonesia', 'status' => 'Available', 'image' => 'holiday7.jpg'],
            ['id' => 'T1008', 'name' => 'Tanjung Puting Orangutan Expedition', 'price' => 7400000, 'availability' => '12', 'location' => 'Kalimantan, Indonesia', 'status' => 'Sold Out', 'image' => 'holiday8.jpg'],
        ];
        return view('pengelolaan', compact('tickets'));
    }

    public function destroy($id)
    {
    $tickets = session()->get('tickets', []);

    $filteredTickets = array_filter($tickets, function ($ticket) use ($id) {
        return $ticket['id'] !== $id;
    });
    session()->put('tickets', $filteredTickets);

    return redirect()->route('pengelolaan')->with('success', 'Tiket berhasil dihapus!');
    }

    // logout
        public function logout()
    {
        session()->forget('username');
        return redirect()->route('login')->with('success', 'Berhasil melakukan logout!');
    }
}

