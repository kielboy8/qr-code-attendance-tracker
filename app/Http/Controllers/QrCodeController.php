<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function index(Request $request) {
        $id = request('body');
        $qrcode = base64_encode(QrCode::format('png')->size(300)->generate("This is a test content (id:" . $id . ")"));

        return response()->json(compact('qrcode'));
    }
}
