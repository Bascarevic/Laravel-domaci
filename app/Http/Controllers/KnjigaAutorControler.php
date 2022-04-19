<?php

namespace App\Http\Controllers;

use App\Http\Resources\KnjigaResource;
use App\Models\Autor;
use App\Models\Knjiga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KnjigaAutorControler extends Controller
{
    public function index($autor_id)
    {
        $knjige = Knjiga::get()->where('autor_id', $autor_id);
        if(is_null($knjige)){
            return response()->json('Ne postoji knjiga tog autora', 404);
        }
        return response()->json($knjige);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'naslov' => 'required|string',
            'zanr' => 'required|string',
            'godina_izdanja' => 'required|integer',
            'izdavac' => 'required|string',
            'ime' => 'required|string',
            'prezime' => 'required|string',
            'godina_rodjenja' => 'required|integer',
            'drzava_id' => 'required|integer',

        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

    //   $autor = Autor::get()->where('ime', $request->autor);
      $autor = Autor::where('ime', $request->ime)->first();
     //  $autor = Autor::find($request->autor);
     
        if(is_null($autor)){
            $autor=Autor::create([
                'ime' => $request->ime,
                'prezime' => $request->prezime,
                'godina_rodjenja' => $request->godina_rodjenja,
                'drzava_id' => $request->drzava_id
            ]);
        }

        

        $knjiga = Knjiga::create([
            'naslov' => $request->naslov,
            'zanr' => $request->zanr,
            'godina_izdanja' => $request->godina_izdanja,
            'izdavac' => $request->izdavac,
            'autor_id' => $autor->id
        ]);

        return response()->json(['Post is created successfully.', new KnjigaResource($knjiga)]);
    }

    public function update(Request $request, Knjiga $knjiga)
    {
        $validator = Validator::make($request->all(),[
            'naslov' => 'required|string',
            'zanr' => 'required|string',
            'godina_izdanja' => 'required|integer',
            'izdavac' => 'required|string',
            'ime' => 'required|string',
            'prezime' => 'required|string',
            'godina_rodjenja' => 'required|integer',
            'drzava_id' => 'required',

        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $autor = Autor::create([
            'ime' => $request->ime,
            'prezime' => $request->prezime,
            'godina_rodjenja' => $request->godina_rodjenja,
            'drzava_id' => $request->drzava_id
        ]);

        $knjiga = Knjiga::create([
            'naslov' => $request->naslov,
            'zanr' => $request->zanr,
            'godina_izdanja' => $request->godina_izdanja,
            'izdavac' => $request->izdavac,
            'autor_id' => $autor->id
        ]);

        $autor->save();
        $knjiga->save();

        return response()->json('Knjiga je uspesno azurirana.');
    }

    public function destroy(Knjiga $knjiga)
    {
        $knjiga->delete();
        return response()->json('Obrisana je knjiga!');
    }
}
