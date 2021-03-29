<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\PanType;
use App\Models\Reservation;
use App\Models\ReservationStatus;
use App\Models\Room;
use App\Models\RoomStatus;
use App\Models\RoomType;
use App\Models\User;
use App\Services\ReservationService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReservationsController extends Controller
{
    public function index(Request $request)
    {
        setlocale(LC_ALL, 'tr_TR.UTF-8');
        setlocale(LC_TIME, 'Turkish');

        return Datatables::of(Reservation::query())->
        filterColumn('customer_id', function ($reservation, $keyword) {
            $ids = [];
            $customers = Customer::where('name', 'like', '%' . $keyword . '%')->get();
            foreach ($customers as $customer) {
                $ids[] = $customer->id;
            }
            return $reservation->whereIn('customer_id', $ids)->where('customer_type', 'App\Models\Customer');
        })->
        filterColumn('status_id', function ($reservation, $id) {
            return $id == 0 ? $reservation : $reservation->where('status_id', $id);
        })->
        filterColumn('room_type_id', function ($reservation, $keyword) {
            $ids = [];
            $types = RoomType::where('name', 'like', '%' . $keyword . '%')->get();
            foreach ($types as $type) {
                $ids[] = $type->id;
            }
            return $reservation->whereIn('room_type_id', $ids);
        })->
        filterColumn('pan_type_id', function ($reservation, $keyword) {
            $ids = [];
            $types = PanType::where('name', 'like', '%' . $keyword . '%')->get();
            foreach ($types as $type) {
                $ids[] = $type->id;
            }
            return $reservation->whereIn('room_type_id', $ids);
        })->
        filterColumn('room_id', function ($reservation, $keyword) {
            $ids = [];
            $rooms = Room::where('number', 'like', '%' . $keyword . '%')->get();
            foreach ($rooms as $room) {
                $ids[] = $room->id;
            }
            return $reservation->whereIn('room_id', $ids);
        })->
        filterColumn('start_date', function ($reservation, $date) {
            return $reservation->where('start_date', '>=', $date);
        })->
        filterColumn('end_date', function ($reservation, $date) {
            return $reservation->where('end_date', '<=', $date);
        })->
        editColumn('id', function ($reservation) {
            return '#' . $reservation->id;
        })->
        editColumn('customer_id', function ($reservation) {
            return $reservation->customer->full_name;
        })->
        editColumn('start_date', function ($reservation) {
            return strftime('%d %B %Y, %H:%M', strtotime($reservation->start_date));
        })->
        editColumn('status_id', function ($reservation) {
            return '<span id="reservation_' . $reservation->id . '_status" class="btn btn-pill btn-sm btn-' . $reservation->status->color . '" style="font-size: 11px; height: 20px; padding-top: 2px">' . $reservation->status->name . '</span>';
        })->
        editColumn('room_type_id', function ($reservation) {
            return $reservation->roomType->name;
        })->
        editColumn('pan_type_id', function ($reservation) {
            return $reservation->panType->name;
        })->
        editColumn('room_id', function ($reservation) {
            return $reservation->room->number;
        })->
        rawColumns(['customer_id', 'status_id'])->
        make(true);
    }

    public function create(Request $request)
    {
        $reservationService = new ReservationService;
        $reservationService->setReservation(new Reservation);
        $reservation = $reservationService->save($request);
        return response()->json(Reservation::with([
            'customer',
            'status',
            'roomType',
            'roomType',
            'panType',
            'roomUseType',
            'room'
        ])->find($reservation->id), 200);
    }

    public function setStatus(Request $request)
    {
        try {
            if ($request->reservations) {
                foreach ($request->reservations as $id) {
                    $service = new ReservationService;
                    $service->setReservation(Reservation::find($id));
                    $service->setStatus($request->status_id);
                }
            }

            return response()->json('Tamamlandı', 200);
        } catch (\Exception $exception) {
            return response()->json($exception, 400);
        }
    }
}