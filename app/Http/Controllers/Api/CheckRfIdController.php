<?php

namespace App\Http\Controllers\Api;

use App\Events\ActionEvent;
use App\Events\ShowPersonEvent;
use App\Http\Controllers\Controller;
use App\Traits\Turnstile\QR;
use Illuminate\Http\Request;
use DateTime;

class CheckRfIdController extends BaseController
{
    // use QR;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $now = new DateTime();
        $now->modify('+4 hours');


        $data = $now->format('d-m-Y H:i:s');

        event(
            new ShowPersonEvent(
                ['date' => $data]
            )
        );

        return $data ? $this->sendResponse($data, 'QR code is valid') : $this->sendError('QR code is invalid', $data);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
