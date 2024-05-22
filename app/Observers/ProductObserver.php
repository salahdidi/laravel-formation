<?php

namespace App\Observers;

use App\Models\Product;
use Carbon\Carbon;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
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

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
