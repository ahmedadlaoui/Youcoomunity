<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Models\Event;


class EventController extends Controller
{
    public function index()
    {
        $current_user = Auth::id();
        $events = Event::where('user_id',$current_user)->get();
        if (empty($events)) {
            $events = [];
        }
        return view('dashboard/myevents', compact('events'));
    }
    public function getallevents(){
        $allevents = Event::All();
        if (empty($allevents)) {
            $allevents = [];
        }
        return view('welcome', compact('allevents'));
    }
    public function addevent()
    {

        $event = new Event();
        $event->title = request('title');
        $event->description = request('description');
        $event->location = request('location');
        $event->category = request('category');
        $event->imageUrl = request('imageUrl');
        $event->maxparticipants = request('maxParticipants');
        $event->time = request('date') . ' ' . request('time');
        $event->user_id = Auth::id();

        error_log($event);
        $event->save();

        return redirect()->route('events.index');
    }
    public function removeevent()
    {

        $Eventtodelete = Event::findOrFail(request('idtodelete'));
        $Eventtodelete->delete();
        return redirect()->route('events.index');
    }
    public function modifyeevent()
    {
        $id = (int)request('idtomodify');
        Event::where('id', $id)->update([
            'title' => request('newtitle'),
            'description' => request('newdescription'),
            'location' => request('newlocation'),
            'time' => request('newdate') . ' ' . request('newtime'),
            'category' => request('newcategory'),
            'maxparticipants' => request('newmaxParticipants')
        ]);
        return redirect()->route('events.index');
    }
}
