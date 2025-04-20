<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAlumniBiodataRequest;
use App\Http\Requests\Admin\UpdateAlumniBiodataRequest;
use App\Models\AlumniBiodata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AlumniBiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.alumni-biodata.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumniBiodataRequest $request)
    {
        $data = $request->validated();

        $user = $request->has('user_id') && $request->user_id
            ? User::findOrFail($request->user_id)
            : User::create([
                'name' => $data['user_name'],
                'email' => $data['user_email'],
                'password' => bcrypt($data['user_password']),
                'role' => 'alumni',
                'is_active' => true,
            ]);

        $data['user_id'] = $user->id;
        AlumniBiodata::create($data);

        return response()->json(['message' => 'Alumni berhasil dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlumniBiodata  $alumni_biodatum
     * @return \App\Models\AlumniBiodata|\Illuminate\Http\JsonResponse
     */
    public function show(AlumniBiodata $alumni_biodatum)
    {
        $alumni_biodatum->load('user', 'graduationYearGroup');

        return $alumni_biodatum;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlumniBiodata $alumni_biodatum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumniBiodataRequest $request, AlumniBiodata $alumni_biodatum)
    {
        $data = $request->validated();
        $status = true;
        $message = 'Data alumni berhasil diperbarui';

        DB::transaction(function () use ($request, $alumni_biodatum, $data, &$status, &$message) {
            try {
                $alumni_biodatum->update($data);

                $alumni_biodatum->user()->update([
                    'name' => $request->full_name,
                    'email' => $request->email,
                ]);
            } catch (\Exception $e) {
                $status = false;
                $message = 'Terjadi kesalahan saat memperbarui data alumni';

                Log::error('Error updating alumni: ' . $e->getMessage(), $e->getTrace());
            }
        });

        return response()->json([
            'success' => $status,
            'message' => $message,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlumniBiodata $alumni_biodatum)
    {
        DB::transaction(function () use ($alumni_biodatum) {
            try {
                $status = $alumni_biodatum->delete();
                Log::info('Deleted alumni: ' . $status);
            } catch (\Throwable $th) {
                Log::error('Error deleting alumni: ' . $th->getMessage(), $th->getTrace());
                throw $th;
            }
        });

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menghapus data alumni!'
        ]);
    }

}
