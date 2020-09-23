<?php

namespace App\Http\Controllers;

use App\User;
use DataTables;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $model = new User();
      return view('pages.user.form', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request);
      $this->validate($request, [
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users,email' 
          ]);

      $model = User::create($request->all());
      return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $model = User::findOrFail($id);
      return view('pages.user.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $model = User::findOrFail($id);
      return view('pages.user.form', compact('model'));
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
      $this->validate($request, [
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users,email,' . $id
      ]);

      $model = User::findOrFail($id);

      $model->update($request->all());    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $model = User::findOrFail($id);
      $model->delete();    }

    public function dataTable()
    {
      $model = User::query();/** variabel model dengan kelas user dan method query
                            *query pada variabel model menjelaskan bahwa kelas user siap menerima query2 lain. yg diproses datatable itu sendiri */
      return DataTables::of($model) /** me return datatable dengan method of. of ini untuk menggunakan data $model*/
        /** menambah colom baru untuk menhubungkan pada button action*/
        ->addColumn('action', function ($model) {
                return view('layouts._action', [
                    'model' => $model, /** melempar variabel model yang telah diolah*/
                    'url_show' => route('user.show', $model->id), /** route digunakan untuk mengakses url show*/
                    'url_edit' => route('user.edit', $model->id), /** route digunakan untuk mengakses url eedit*/
                    'url_destroy' => route('user.destroy', $model->id) /** route digunakan untuk mengakses url sdestroy*/
                  ]);
              })
              ->addIndexColumn() /** untuk idex nomer pada tabel*/
            ->rawColumns(['action']) /** memproses tag tersebut sehingga menjadi tag HTML*/
            ->make(true);/** membuat data tersebut dapat digunakan */
          }
}
