@extends('layouts.main2')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pengaturan Pengguna</h1>
    <a href="/dashboard/users/create" class="btn btn-primary mb-3">
      <span data-feather="plus"></span>
      Tambah Pengguna
    </a>
  </div>

  <div class="table-responsive col-lg-10">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col" class="text-center text-dark">No</th>
          <th scope="col" class="text-center text-dark">Nama</th>
          <th scope="col" class="text-center text-dark">Username</th>
          <th scope="col" class="text-center text-dark">Level</th>
          <th scope="col" class="text-center text-dark">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @if ($users->count())
          @foreach ($users as $user)
            <tr>
              {{-- $loop->iteraion => nomor / urutan loop keberapa nya --}}
              <td class="text-center text-dark">{{ $loop->iteration }}</td>
              <td class="text-center text-dark">{{ $user->name }}</td>
              <td class="text-center text-dark">{{ $user->username }}</td>
              <td class="text-center text-dark">{{ $user->level }}</td>
              <td class="text-center text-dark">
                <a href="/dashboard/users/{{ $user->id }}/edit" class="text-decoration-none text-success">
                  <span data-feather="edit"></span>
                </a>
                <form action="/dashboard/users/{{ $user->id }}" method="POST" class="d-inline text-white">
                  @method('delete')
                  @csrf

                  <span role="button" class="text-decoration-none text-danger btnDelete" data-object="user">
                    <span data-feather="x-circle"></span>
                  </span>
                </form>
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <td colspan="4" class="text-danger text-center p-4">
              <h4>Belum ada Pengguna</h4>
            </td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
@endsection
