<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Reservation;
use App\Models\ReservationStatusActivity;
use App\Models\Room;
use App\Models\SafeActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReservationService
{
    private $reservation;

    /**
     * @return mixed
     */
    public function getReservation()
    {
        return $this->reservation;
    }

    /**
     * @param Reservation $reservation
     */
    public function setReservation(Reservation $reservation): void
    {
        $this->reservation = $reservation;
    }

    public function save(Request $request)
    {
        if ($this->reservation->room_id) {
            if ($this->reservation->room_id != $request->room_id) {
                $this->setRoomStatus($this->reservation->room_id, 4);
            }
        }

        $this->reservation->company_id = $request->company_id;
        $this->reservation->customer_name = $request->customer_name;
        $this->reservation->start_date = $request->start_date;
        $this->reservation->end_date = $request->end_date;
        $this->reservation->room_type_id = $request->room_type_id;
        $this->reservation->pan_type_id = $request->pan_type_id;
        $this->reservation->room_id = $request->room_id;
        $this->reservation->use_type_id = $request->room_use_type_id;
        $this->reservation->status_id = $request->status_id;
        $this->reservation->price = $request->price;
        $this->reservation->description = $request->description;
        $this->reservation->save();

        $this->setReservationStatusActivity($request->status_id);
        $this->setDailyPriceSafeActivity();

        if ($request->status_id == 4) {
//            $this->setDefaultPrice();
            $this->setRoomStatus($this->reservation->room_id, 2);
        }

        if ($request->status_id == 5) {
//            $this->setDefaultPrice();
            $this->setRoomStatus($this->reservation->room_id, 1);
        }

        if ($request->company_id) {
            $this->setCompanyCustomDiscount($request->company_id);
        } else if ($safeActivity = SafeActivity::where('reservation_id', $this->reservation->id)->where('description', 'Firma İndirimi')->first()) {
            $safeActivity->delete();
        }

        return $this->reservation;
    }

    public function setCompanyCustomDiscount($companyId)
    {
        $safeActivityService = new SafeActivityService;
        $safeActivityService->setSafeActivity(SafeActivity::where('reservation_id', $this->reservation->id)->where('description', 'Firma İndirimi')->first() ?? new SafeActivity);
        $safeActivityService->save(
            auth()->user()->id(),
            1,
            $this->reservation->id,
            0,
            Company::find($companyId)->custom_discount,
            'Firma İndirimi',
            date('Y-m-d H:i:s'),
            null,
            null
        );
    }

    public function setReservationStatusActivity($statusId)
    {
        $reservationStatusActivityService = new ReservationStatusActivityService;
        $reservationStatusActivityService->setReservationStatusActivity(new ReservationStatusActivity);
        $reservationStatusActivityService->save(auth()->user()->id(), $this->reservation->id, $statusId);
    }

    public function setStatus($statusId)
    {
        $this->reservation->status_id = $statusId;
        $this->reservation->save();

        $this->setReservationStatusActivity($statusId);

        if ($statusId == 4) {
//            $this->setDefaultPrice();
            $this->setRoomStatus($this->reservation->room_id, 2);
        }

        if ($statusId == 5) {
//            $this->setDefaultPrice();
            $this->setRoomStatus($this->reservation->room_id, 4);
        }

        return $this->reservation;
    }

    public function setDefaultPrice()
    {
        $price = Carbon::createFromDate($this->reservation->start_date)->diffInDays($this->reservation->end_date) * $this->reservation->room->price;

        if ($company = Company::find($this->reservation->company_id)) {
            $price -= $price * $company->custom_discount_percent / 100;
        }

        $safeActivity = SafeActivity::where('safe_id', 1)->where('reservation_id', $this->reservation->id)->where('extra_id', null)->where('direction', 1)->first();
        if (is_null($safeActivity)) {
            $safeActivityService = new SafeActivityService;
            $safeActivityService->setSafeActivity(new SafeActivity);
            $safeActivityService->save(
                auth()->user()->id(), 1, $this->reservation->id, 1, $price
            );
        } else {
            $safeActivity->price = $price;
            $safeActivity->save();
        }
    }

    public function setDailyPriceSafeActivity()
    {
        $reservation = Reservation::find($this->reservation->id);
        $safeActivityService = new SafeActivityService;
        if ($safeActivityExistControl = SafeActivity::where('reservation_id', $this->reservation->id)
            ->whereBetween('date', [
                date('Y-m-d 00:00:00'),
                date('Y-m-d 23:59:59')
            ])
            ->where('extra_id', null)
            ->where('direction', 1)
            ->first()) {
            $safeActivityExistControl->delete();
        }
        $safeActivityService->setSafeActivity(new SafeActivity);
        $safeActivityService->save(
            auth()->user()->id(),
            1,
            $this->reservation->id,
            1,
            $reservation->price,
            null,
            date('Y-m-d')
        );
    }

    public function setRoomStatus($roomId, $status)
    {
        $roomService = new RoomService;
        $roomService->setRoom(Room::find($roomId));
        $roomService->setStatus($status);
    }
}
