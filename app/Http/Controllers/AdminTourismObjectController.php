<?php

namespace App\Http\Controllers;

use App\Http\Requests\TourismObject\TourismObjectStoreRequest;
use App\Http\Requests\TourismObject\TourismObjectUpdateRequest;
use App\Models\TourismObject;
use Illuminate\Http\Request;

class AdminTourismObjectController extends Controller
{
  public function index()
  {
    $this->authorize('viewAny', TourismObject::class);

    return view('dashboard.tourism-object.index', [
      'title' => 'Data UMKM',
      'objects' => TourismObject::all()
    ]);
  }

  public function create()
  {
    $this->authorize('create', TourismObject::class);

    return view('dashboard.tourism-object.create', [
      'title' => 'Tambah UMKM',
    ]);
  }

  public function store(TourismObjectStoreRequest $request)
  {
    $this->authorize('create', TourismObject::class);

    $validate = $request->validated();

    TourismObject::create($validate);

    return redirect('/dashboard/tourism-objects')
      ->with('Berhasil', 'Data Berhasil Ditambahkan!');
  }

  public function edit(TourismObject $tourismObject)
  {
    $this->authorize('update', TourismObject::class);

    return view('dashboard.tourism-object.edit', [
      'title'  => "Edit $tourismObject->name",
      'object' => $tourismObject
    ]);
  }

  public function update(TourismObjectUpdateRequest $request, TourismObject $tourismObject)
  {
    $this->authorize('update', TourismObject::class);

    $validate = $request->validated();

    TourismObject::where('id', $tourismObject->id)
      ->update($validate);

    return redirect('/dashboard/tourism-objects')
      ->with('Berhasil', 'Data Berhasil Diperbarui!');
  }

  public function destroy(TourismObject $tourismObject)
  {
    $this->authorize('delete', TourismObject::class);

    TourismObject::destroy($tourismObject->id);

    return redirect('/dashboard/tourism-objects')
      ->with('Berhasil', 'Data Berhasil Dihapus!');
  }
}
