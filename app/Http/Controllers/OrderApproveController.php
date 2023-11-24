<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class OrderApproveController extends Controller
{
        /**
     * Approve an order.
     *
     * @param  int     $order_id  The ID of the order to approve.
     * @param  string  $token     The unique token associated with the order.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($order_id, $token)
    {
        try {
            DB::transaction(function () use ($order_id, $token) {
                $order = Order::findOrFail($order_id);

                if ($order->validation_token !== $token) {
                    Log::error('Tokens komen niet overeen: ' . $token);
                    Alert::toast('Tokens komen niet overeen', 'error');

                    return redirect()->route('order.index', $order_id);
                }

                $order->update([
                    'approved_at' => Carbon::now()
                ]);

                Log::info('Order goedgekeurd');
                Alert::toast('Order goedgekeurd', 'success');
            });
        } catch (ModelNotFoundException $e) {
            Log::error('Order not found: ' . $e->getMessage());
            Alert::toast('Order niet gevonden', 'error');
        } catch (QueryException $e) {
            Log::error('Database error when approving order: ' . $e->getMessage());
            Alert::toast('Er is een fout opgetreden tijdens het goedkeuren van de order', 'error');
        }

        return redirect()->route('orders.index', $order_id);
    }
}
