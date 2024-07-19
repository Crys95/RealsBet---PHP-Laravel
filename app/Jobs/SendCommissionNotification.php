<?php

namespace App\Jobs;

use App\Mail\CommissionAddedMail;
use App\Models\Affiliate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\Middleware\RateLimited;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendCommissionNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $affiliateId;

    public function __construct($affiliateId)
    {
        $affiliate = $this->affiliateId = $affiliateId;
        Log::info('Notificação de comissão enviada para: ' . $affiliate->email);
    }

    public function handle()
    {
        $affiliate = Affiliate::find($this->affiliateId);
        Mail::to($affiliate->email)->send(new CommissionAddedMail($affiliate));
    }
}

