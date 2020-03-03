<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Game extends Mailable
{
    use Queueable, SerializesModels;
    public $title;
    public $contentParent;
    public $contentEnfant;
    public $score;
    public $temps;
    public $dif;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $contentParent, $contentEnfant, $score, $temps, $dif)
    {
        $this->title = $title;
        $this->contentParent = $contentParent;
        $this->contentEnfant = $contentEnfant;
        $this->score = $score;
        $this->temps = $temps;
        $this->dif = $dif;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('project-color@fgainza.fr')
                    ->subject($this->title)
                    ->view('layouts.mail');
                    // from(getenv('APP_EMAIL'), getenv('APP_NAME'))
    }
}
