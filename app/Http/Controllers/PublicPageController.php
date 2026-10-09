<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicPageController extends Controller
{
    /**
     * Halaman Beranda Publik.
     */
    public function home()
    {
        return view('pages.home');
    }

    /**
     * Halaman Profil Instansi.
     */
    public function profil()
    {
        return view('pages.profil');
    }

    /**
     * Halaman Kontak Instansi.
     */
    public function kontak()
    {
        return view('pages.kontak');
    }
}
