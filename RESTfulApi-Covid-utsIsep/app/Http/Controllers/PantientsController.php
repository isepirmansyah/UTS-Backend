<?php

namespace App\Http\Controllers;

use App\Models\Pantients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PantientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = Pantients::all();
        $row = $pasien->count();

        if ($row != null) {

            $data = [
                'message' => 'Get All Resource',
                'data' => $pasien
            ];

            return response()->json($data, 200);

        } else {

            $data = [
                'message' => 'Data not empty',
            ];

            return response()->json($data, 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'numeric|required',
            'address' => 'required',
            'status' => 'required',
            'in_date_at' => 'required',
            'out_date_at' => 'required',
        ]);

        $pasien = Pantients::create($validatedData);

        $data = [
            'message' => 'Resource is added successfully',
            'data' => $pasien,
        ];

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasien = Pantients::find($id);

        if ($pasien) {
            $data = [
                'message' => 'Get Detail Resource',
                'data' => $pasien
            ];

            return response()->json($data, 200);

        } else {
            $data = [
                'message' => 'Resource not found',
            ];

            return response()->json($data, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pasien = Pantients::find($id);

        if ($pasien) {

           $input = [
                'name' => $request->get('name') ?? $pasien->name,
                'phone' => $request->get('phone') ?? $pasien->phone,
                'address' => $request->get('address')  ?? $pasien->address,
                'status' => $request->get('status')  ?? $pasien->status,
                'in_date_at' => $request->get('in_date_at')  ?? $pasien->in_date_at,
                'out_date_at' => $request->get('out_date_at')  ?? $pasien->out_date_at,
            ];

            $pasien->update($input);

            $data = [
                'message' => 'Resource is update successfully',
                'data' => $pasien,
            ];

            return response()->json($data, 200);

        } else {

            $data = [
                'message' => 'Resource not found',
            ];

            return response()->json($data, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pantients::find($id);

        if ($pasien) {

            $pasien->delete();

            $data = [
                'message' => 'Resource is delete successfully',
            ];

            return response()->json($data, 200);

        } else {

            $data = [
                'message' => 'Resource not found',
            ];

            return response()->json($data, 404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        $pasien = Pantients::where('name', $name)->get();
        $row = $pasien->count();

        if ($row != null) {

            $data = [
                'message' => 'Get searched resource',
                'data' => $pasien
            ];

            return response()->json($data, 200);

        } else {

            $data = [
                'message' => 'Resource not found',
            ];

            return response()->json($data, 404);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function positive()
    {
        $pasien = Pantients::where('status', 'positive')->get();
        $row = $pasien->count();

        if ($row != null) {

            $data = [
                'message' => 'Get positive resource',
                'total' => $row . ' Pantints Confirm positive',
                'data' => $pasien
            ];

            return response()->json($data, 200);

        } else {

            $data = [
                'message' => 'Resource not found',
            ];

            return response()->json($data, 404);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recovered()
    {
        $pasien = Pantients::where('status', 'recovered')->get();
        $row = $pasien->count();

        if ($row != null) {

            $data = [
                'message' => 'Get recovered resource',
                'total' => $row . ' Pantints Confirm recovered',
                'data' => $pasien
            ];

            return response()->json($data, 200);

        } else {

            $data = [
                'message' => 'Resource not found',
            ];

            return response()->json($data, 404);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dead()
    {
        $pasien = Pantients::where('status', 'dead')->get();
        $row = $pasien->count();

        if ($row != null) {

            $data = [
                'message' => 'Get dead resource',
                'total' => $row . ' Pantints Confirm dead',
                'data' => $pasien
            ];

            return response()->json($data, 200);

        } else {

            $data = [
                'message' => 'Resource not found',
            ];

            return response()->json($data, 404);
        }
    }
}
