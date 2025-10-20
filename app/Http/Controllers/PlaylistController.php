<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::query()
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('pages.playlist', compact('playlists'));
    }
}
