<?php

namespace App\Jobs;

use App\Models\BookInvitation;
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\isEmpty;

class ProcessScheduledInvitation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $contact;
    public $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $bookInvitation = BookInvitation::find($contact->invitation_id);

        $this->contact = $contact;
        $this->message = $bookInvitation->message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $hardMessage = 'Hello ' . $this->contact->name . '!, we invite you to ...';
        $response = Http::asJson()->post(env('BOT_API'), [
            "message" => isEmpty($this->message) ? $hardMessage : $this->message,
            "chatId" => $this->contact->phone
        ]);

        if ($response->status() === 201) {
            $this->contact->sended = 1;
            $this->contact->save();
        }
    }
}
