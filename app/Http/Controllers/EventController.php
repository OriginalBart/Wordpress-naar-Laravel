<?php

namespace App\Http\Controllers;


use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;


class EventController extends Controller
{
    public function index()
    {

        return view('dashboard.event.calender');
    }

    public function event_list()
    {
        return view('dashboard.event.list');
    }

    public function save_event(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'event_title' => 'required|string|max:150',
            'event_start_date' => 'required|string|max:15',
            'stage_id' => 'max:150',
            'location' => 'max:150',

        ]);


        $feed_back = array();
        if ($validator->passes()) {

            if ($request['set_end_date_data'] == "No") {
                $request['event_end_date'] = $request['event_start_date'];
            }
            $request['event_start_date'] = implode("-", array_reverse(explode("/", $request['event_start_date'])));
            $request['event_end_date'] = implode("-", array_reverse(explode("/", $request['event_end_date'])));
            Event::create($request->all());

            $feed_back['type'] = 'alert-success';
            $feed_back['message'] = 'Added new records';
            $feed_back['error'] = array();

        } else {
            $feed_back['type'] = 'alert-danger';
            $feed_back['error'] = $validator->errors()->all();

        }
//    dd($feed_back);
        return json_encode($feed_back);


    }

    public function all_event()
    {
        $all_event = Event::all()->toArray();


        $event_data = array();
        foreach ($all_event as $key => $event_val) {
            $event_data[$key]['title'] = $event_val['event_title'];
            $event_data[$key]['stage_id'] = $event_val['stage_id'];
            $event_data[$key]['location'] = $event_val['location'];
            $event_data[$key]['start'] = $event_val['event_start_date'] . ' ' . date('H:i:s', strtotime($event_val['event_start_time']));
            $event_data[$key]['end'] = $event_val['event_end_date'] . ' ' . date('H:i:s', strtotime($event_val['event_end_time']));

            $event_data[$key]['start_formate'] = implode("/", array_reverse(explode("-", $event_val['event_start_date']))) . ' ' . date('h:i:s A', strtotime($event_val['event_start_time']));
            $event_data[$key]['end_formate'] = implode("/", array_reverse(explode("-", $event_val['event_end_date']))) . ' ' . date('h:i:s A', strtotime($event_val['event_end_time']));


            $event_data[$key]['events_id'] = $event_val['id'];
            $event_data[$key]['event_description'] = $event_val['event_description'];
            $event_data[$key]['created_at'] = date('d/m/Y', strtotime($event_val['created_at']));
            $event_data[$key]['location'] = $event_val['location'];

        }

        echo json_encode($event_data);

    }

    public function single_event($id)
    {
        $single_event = Event::where('id', $id)->first();
        if ($single_event) {
            $single_event = $single_event->toArray();
        }
        if (isset($single_event['event_start_date'])) {
            $single_event['event_start_date'] = implode("/", array_reverse(explode("-", $single_event['event_start_date'])));


        }
        if (isset($single_event['event_end_date'])) {
            $single_event['event_end_date'] = implode("/", array_reverse(explode("-", $single_event['event_end_date'])));
        }
        echo json_encode($single_event);


    }

    public function update_event(Request $request)
    {


        if ($request['id'] > 0) {

            $validator = Validator::make($request->all(), [
                'event_title' => 'required|string|max:150',
                'event_start_date' => 'required|string|max:15',
                'stage_id' => 'max:150',
                'location' => 'max:150',

            ]);


            $feed_back = array();
            if ($validator->passes()) {

                if ($request['set_end_date_data'] == "No") {
                    $request['event_end_date'] = $request['event_start_date'];
                }
                $request['event_start_date'] = implode("-", array_reverse(explode("/", $request['event_start_date'])));
                $request['event_end_date'] = implode("-", array_reverse(explode("/", $request['event_end_date'])));

                $event = Event::findOrFail($request['id']);
                $input = $request->all();
                $event->fill($input)->save();


                $feed_back['type'] = 'alert-success';
                $feed_back['message'] = 'Record successfully updated';
                $feed_back['error'] = array();

            } else {
                $feed_back['type'] = 'alert-danger';
                $feed_back['error'] = $validator->errors()->all();

            }

            return json_encode($feed_back);


        }

    }

    public function delete_event($id)
    {
        $feed_back['type'] = 'alert-danger';
        $feed_back['message'] = 'Something Wrong';

        $event = Event::find($id);
        if ($event != null) {
            $event->delete();
            $feed_back['type'] = 'alert-success';
            $feed_back['message'] = 'Record successfully deleted';

        } else {
            $feed_back['type'] = 'alert-danger';
            $feed_back['message'] = 'Something Wrong';
        }


        echo json_encode($feed_back);
    }


    public function StageReq(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('bands')
                ->where('stage_id', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row) {
                $output .= '
       <li><a href="#">' . $row->stage_id . '</a></li>
       ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
