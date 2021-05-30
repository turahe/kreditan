<?php

namespace App\Http\Controllers\Admin\Systems;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Show the notifications for the current user.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        Auth::user()->unreadNotifications->markAsRead();

        return view('admin.notifications.index');
    }

    /**
     * Mark all Notifications As Read.
     */
    public function markAllNotificationsAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();

        return response('success', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Ramsey\Uuid\Uuid $notification
     * @throws \Exception
     * @return
     */
    public function destroy($notification)
    {
        Auth::user()->notifications()->findOrFail($notification)->delete();

        if (request()->expectsJson()) {
            return  response()->json(['data' => 'Notification was deleted']);
        }

        return redirect()
            ->back()
            ->with('success', trans('messages.deleted'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyAll()
    {
        Auth::user()->notifications()->delete();

        return redirect()
            ->back()
            ->with('success', trans('messages.deleted'));
    }
}
