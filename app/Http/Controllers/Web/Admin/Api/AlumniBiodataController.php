<?php

namespace App\Http\Controllers\Web\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\AlumniBiodata;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AlumniBiodataController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $alumniBiodata = AlumniBiodata::with('user:id,email')->select([
            'id',
            'full_name',
            'nis_nisn',
            'major',
            'phone_number',
            'user_id'
        ]);

        return DataTables::of($alumniBiodata)
            ->addColumn('telepon', function ($row) {
                return $row->phone_number ?? 'Tidak ada data';
            })
            ->addColumn('email', function ($row) {
                return $row->user ? $row->user->email : 'Tidak ada email';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
