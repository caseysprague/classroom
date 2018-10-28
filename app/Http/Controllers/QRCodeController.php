<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelQRCode\Facades\QRCode;

class QRCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
            'size' => 'nullable|numeric|max:10|min:0',
        ]);

        return QRCode::url($request->input('url'))->setSize($request->input('size') ?? 5)->svg();
    }
}
