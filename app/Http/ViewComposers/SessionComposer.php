<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Sesi;

class SessionComposer
{
    public function compose(View $view)
    {
      $session = [];
      $absen = Sesi::where([["nama_sesi", "absen"],["status", "0"]])->first();
      if(count($absen) > 0){
          array_push($session, $absen->isi);
      }
      $view->with('SessionVar', $session);
    }
}
