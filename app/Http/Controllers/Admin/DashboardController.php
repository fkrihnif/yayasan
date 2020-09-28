<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Program;
use App\DonationConfirmation;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.dashboard', [
            'activity' => Activity::count(),
            'program' => Program::count(),
            'donatur_pending' => DonationConfirmation::where('donation_status', 'SUDAH_KONFIRM')->count(),
            'donatur_pendinga' => DonationConfirmation::where('donation_status', 'BELUM_TRANSFER')->count(),
            'donatur_success' => DonationConfirmation::where('donation_status', 'SUKSES')->count()
        ]);
    }
}
