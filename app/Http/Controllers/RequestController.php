<?php

namespace App\Http\Controllers;
use App\Request as aRequest;
use Illuminate\Http\Request;
use App\Http\Resources\Request as RequestResource ;
use App\Http\Resources\RequestCollection;
use Illuminate\Support\Facades\Auth;
use JWTAuth;


class RequestController extends Controller
{
    private static $messages = [
        'required'=>'El campo :attribute es obligatorio',
        'numeric'=>'El parámetro ingresado en :attribute no es un número',
        'date' => 'El campo :attribute no es una fecha',
        'status'=> 'El campo :attribute no es una cadena',
    ];
    public function index()
    {
        return new RequestCollection(aRequest::all());
    }
    public function show (aRequest $arequest)
    {
        $this->authorize('view', $arequest);
        return response()->json(new RequestResource($arequest), 200);
    }

    public function requestsByUser()
    {
        $user=Auth::user();
        $requests = $user->request;
        return response()->json($requests, 200);
    }

    public function store(Request $request)
    {
        $this->authorize('create', aRequest::class);
        $request->validate([
            'date' => 'required|date',
            'subtotal' => 'required|numeric',
            'type' => 'required',
            'surcharge' => 'required|numeric',
            'total' => 'required|numeric',
        ], self::$messages);
        $request1 = new aRequest($request->all());
        $request1->save();
        return response()->json(new RequestResource($request1), 201);
    }

    public function update (Request $request, aRequest $arequest)
    {
        $this->authorize('update', $arequest);
        $request->validate([
            'subtotal' => 'required|numeric',
            'type' => 'required',
            'surcharge' => 'required|numeric',
            'total' => 'required|numeric',
        ], self::$messages);
        $arequest->update($request->all());
        return response()->json($arequest, 200);
    }

    public function updatestatus (Request $request, aRequest $arequest){
        //$this->autorize('update', $arequest);
        $request->validate([
            'status' => 'required|string'
        ], self::$messages);
        $arequest->update($request->all());
        return response()->json($arequest, 200);
    }

    public function delete(aRequest $request)
    {
        $this->authorize('delete', $request);
        $request->delete();
        return response()->json(null, 204);
    }

    public function download(){
        $data = [
            'titulo'=> 'Styde.net'
        ];

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('vista-pdf', $data);
        return $pdf->stream('archivo.pdf');
    }
}
