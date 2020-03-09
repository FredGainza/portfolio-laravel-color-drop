<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Ajout extends Mailable
{
    use Queueable, SerializesModels;
    public $title;
    public $content;
    public $mdpTemp;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $content, $mdpTemp)
    {
        $this->title = $title;
        $this->content = $content;
        $this->mdpTemp = $mdpTemp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('project-color@fgainza.fr', 'Color-Drop')
        ->subject($this->title)
        ->view('layouts.mailAjout');
    }
}
