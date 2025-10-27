<?php

namespace App\Http\Controllers;

use App\Models\OpenWhenBox;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OpenWhenBoxController extends Controller
{
    /**
     * Display a listing of the open when boxes.
     */
    public function index(): View
    {
        $openWhenBoxes = OpenWhenBox::orderBy('created_at', 'desc')->get();
        
        return view('pages.open-when-box.index', compact('openWhenBoxes'));
    }

    /**
     * Display the specified open when box.
     */
    public function show(OpenWhenBox $openWhenBox): View
    {
        return view('pages.open-when-box.show', compact('openWhenBox'));
    }
}
