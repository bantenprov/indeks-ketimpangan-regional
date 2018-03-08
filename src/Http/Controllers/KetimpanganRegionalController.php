<?php

namespace Bantenprov\KetimpanganRegional\Http\Controllers;

/* Require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\BudgetAbsorption\Facades\KetimpanganRegionalFacade;

/* Models */
use Bantenprov\KetimpanganRegional\Models\Bantenprov\KetimpanganRegional\KetimpanganRegional;

/* Etc */
use Validator;

/**
 * The KetimpanganRegionalController class.
 *
 * @package Bantenprov\KetimpanganRegional
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class KetimpanganRegionalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(KetimpanganRegional $ketimpangan_regional)
    {
        $this->ketimpangan_regional = $ketimpangan_regional;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);

            $query = $this->ketimpangan_regional->orderBy($sortCol, $sortDir);
        } else {
            $query = $this->ketimpangan_regional->orderBy('id', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where('label', 'like', $value)
                    ->orWhere('description', 'like', $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        $response = $query->paginate($perPage);

        return response()->json($response)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ketimpangan_regional = $this->ketimpangan_regional;

        $response['ketimpangan_regional'] = $ketimpangan_regional;
        $response['status'] = true;

        return response()->json($ketimpangan_regional);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KetimpanganRegional  $ketimpangan_regional
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ketimpangan_regional = $this->ketimpangan_regional;

        $validator = Validator::make($request->all(), [
            'label' => 'required|max:16|unique:ketimpangan_regionals,label',
            'description' => 'max:255',
        ]);

        if($validator->fails()){
            $check = $ketimpangan_regional->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $ketimpangan_regional->label = $request->input('label');
                $ketimpangan_regional->description = $request->input('description');
                $ketimpangan_regional->save();

                $response['message'] = 'success';
            }
        } else {
            $ketimpangan_regional->label = $request->input('label');
            $ketimpangan_regional->description = $request->input('description');
            $ketimpangan_regional->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ketimpangan_regional = $this->ketimpangan_regional->findOrFail($id);

        $response['ketimpangan_regional'] = $ketimpangan_regional;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KetimpanganRegional  $ketimpangan_regional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ketimpangan_regional = $this->ketimpangan_regional->findOrFail($id);

        $response['ketimpangan_regional'] = $ketimpangan_regional;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KetimpanganRegional  $ketimpangan_regional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ketimpangan_regional = $this->ketimpangan_regional->findOrFail($id);

        if ($request->input('old_label') == $request->input('label'))
        {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16',
                'description' => 'max:255',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16|unique:ketimpangan_regionals,label',
                'description' => 'max:255',
            ]);
        }

        if ($validator->fails()) {
            $check = $ketimpangan_regional->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $ketimpangan_regional->label = $request->input('label');
                $ketimpangan_regional->description = $request->input('description');
                $ketimpangan_regional->save();

                $response['message'] = 'success';
            }
        } else {
            $ketimpangan_regional->label = $request->input('label');
            $ketimpangan_regional->description = $request->input('description');
            $ketimpangan_regional->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KetimpanganRegional  $ketimpangan_regional
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ketimpangan_regional = $this->ketimpangan_regional->findOrFail($id);

        if ($ketimpangan_regional->delete()) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
        }

        return json_encode($response);
    }
}
