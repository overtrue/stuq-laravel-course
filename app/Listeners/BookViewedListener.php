<?php

namespace App\Listeners;

use App\Events\BookViewed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookViewedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BookViewed  $event
     * @return void
     */
    public function handle(BookViewed $event)
    {
        $event->book->views_count++;
        $event->book->save();
    }
}
