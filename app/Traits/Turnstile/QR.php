<?php
namespace App\Traits\Turnstile;

use App\Jobs\UpdateQRStatusJob;
use App\Models\QrBlackList;
use App\Models\TicketAccess;
use App\Models\TicketQr;
use App\Models\Turnstile;
use DateTime;
use Illuminate\Support\Carbon;

trait QR
{
    public function check($data)
    {

        $data_qr = explode('#', $data['qr'][0]);

        $qr_token = $data_qr[0];
        $qr_hash = count($data_qr) > 1 ? $data_qr[1] : null;
        $qr_reade_date = count($data_qr) > 3 && count($data_qr) != '_' ? $data_qr[3] : null;

        if ($qr_hash != null && $qr_hash !== '_' && hash('sha256', $qr_token) !== $qr_hash) {

            return 'invalid scan';
        }

        $new_date = new DateTime();

        $data = $qr_reade_date == null ? $new_date->format('d-m-Y H:i:s') : date('d-m-Y H:i:s', $qr_reade_date);

        return $data;

    }




}
