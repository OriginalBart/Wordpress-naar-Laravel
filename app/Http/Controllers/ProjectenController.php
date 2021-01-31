<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projecten;
use Illuminate\Support\Facades\Validator;

class ProjectenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        // fetch all the images
        $files = Projecten::all();
        return view('dashboard.projects.index', compact('files'));
    }

    public function selectSearch(Request $request)
    {
        $projects = [];

        if ($request->has('q')) {
            $search = $request->q;
            $projects = Projecten::select("id", "stage_id")
                ->where('stage_id', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // file validation
        $validator = Validator::make($request->all(),
            ['filename' => 'required | mimes:jpeg,png,jpg,bmp|max:2048',
                'name' => 'required| max:2048',
                'price' => 'required| max:2048',
                'content' => 'required',
                'location' => 'required| max:2048',

            ]

        );

        // if validation fails
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        // if validation success
        if ($file = $request->file('filename')) {

            $name = time() . time() . '.' . $file->getClientOriginalExtension();

            $target_path = public_path('/uploads/');

            if ($file->move($target_path, $name)) {
                // save file name in the database
                $file = Projecten::create(['filename' => $name, "name" => $request->get('name'), "price" => $request->get('price'), "content" => $request->get('content'), "location" => $request->get('location'), "stage_id" => $request->get('stage_id'),]);
                $file->save();
            }


        }
//        Band::create($request->all());

        return redirect('/project')->with("success", "Alle velden zijn ingevuld hopppaa");

    }

    /**
     *
     *
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $files = Projecten::findOrFail($id);
        return view('dashboard.projects.edit', compact('files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'filename' => 'mimes:jpeg,png,jpg,bmp|max:2048',
            'name' => 'max:2048',
            'price' => ' max:2048',
            'content' => 'max:2048',
            'location' => ' max:2048',
        ]);
        Projecten::whereId($id)->update($validatedData);

        return redirect('/projecten')->with('success', 'Show is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $files = Projecten::findOrFail($id);
        $files->delete();

        return redirect('/projecten')->with('success', 'project is successfully deleted');
    }
}
