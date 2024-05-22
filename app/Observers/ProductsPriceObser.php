<?php

namespace App\Observers;

use App\Models\product;
use Carbon\Carbon;

class ProductsPriceObser
{
    public function updated(product $product): void
    {
        
       // Log::info('inside updated observer');
        if ($product->isDirty('price')) {
            $now = Carbon::now();
            $oldStatus = $product->getOriginal('price');
            $newStatus = $product->getAttribute('price');
            // $log = new CommandeLog();

            // $log->commande_id = $commande->commande_id ;
            // $log->status = $newStatus ;
            // $log->created_at = $now ;
            // $log->updated_at = $now ;
            // $log->updated_by_id  = Auth::user()->id ?? -1;
            // $log->save();


        }
        
    }
}
