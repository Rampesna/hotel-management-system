<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\WaitingPayment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class WaitingPaymentsController extends Controller
{
    public function index(Request $request)
    {
        setlocale(LC_ALL, 'tr_TR.UTF-8');
        setlocale(LC_TIME, 'Turkish');

        $waitingPayments = WaitingPayment::with(['reservation']);

        return Datatables::of($waitingPayments)->
        filterColumn('start_date', function ($waitingPayments, $date) {
            return $waitingPayments->whereIn('reservation_id', Reservation::where('start_date', '>=', $date)->pluck('id'));
        })->
        filterColumn('end_date', function ($waitingPayments, $date) {
            return $waitingPayments->whereIn('reservation_id', Reservation::where('end_date', '<=', $date)->pluck('id'));
        })->
        filterColumn('paid', function ($waitingPayments, $id) {
            return $id == 2 ? $waitingPayments : $waitingPayments->where('paid', $id);
        })->
        filterColumn('customer_name', function ($waitingPayments, $keyword) {
            return $waitingPayments->whereIn('reservation_id', Reservation::where('customer_name', 'like', '%' . $keyword . '%')->pluck('id'));
        })->
        editColumn('price', function ($waitingPayment) {
            return number_format(abs($waitingPayment->reservation->debtControl()), 2) . ' TL';
        })->
        editColumn('paid_date', function ($receipt) {
            return $receipt->paid_date ? date('d.m.Y, H:i', strtotime($receipt->paid_date)) : '';
        })->
        editColumn('customer_name', function ($waitingPayment) {
            return ucwords($waitingPayment->reservation->customer_name);
        })->
        editColumn('paid', function ($waitingPayment) {
            return '<span class="btn btn-pill btn-sm btn-' . ($waitingPayment->paid == 1 ? 'success' : 'warning') . '" style="font-size: 11px; height: 20px; padding-top: 2px">' . ($waitingPayment->paid == 1 ? 'Ödendi' : 'Bekliyor') . '</span>';
        })->
        editColumn('start_date', function ($waitingPayment) {
            return date('d.m.Y, H:i', strtotime($waitingPayment->reservation->start_date));
        })->
        editColumn('end_date', function ($waitingPayment) {
            return date('d.m.Y, H:i', strtotime($waitingPayment->reservation->end_date));
        })->
        rawColumns(['paid'])->
        make(true);
    }
}