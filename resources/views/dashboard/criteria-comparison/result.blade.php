@extends('layouts.main2')

@section('content')
  {{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Hasil Perbandingan</h1>
  </div> --}}

  <div class="table-responsive col-lg-12">
    <div class="d-lg-flex justify-content-between gap-2">
      <h1 class="h3 mb-0 text-gray-800">Hasil Perhitungan Perbandingan Kriteria</h1>
      <a href="/dashboard/criteria-comparisons/{{ $criteria_analysis->id }}" class="btn btn-secondary mb-3">
        <span data-feather="arrow-left"></span>
        Kembali Ke Nilai Kriteria
      </a>
    </div>

    <div style="overflow-y: auto; max-height: 450px;">
      <table class="table table-bordered text-dark">
        <thead>
          <tr>
            <th scope="col"></th>
            @foreach ($criteria_analysis->preventiveValues as $preventValue)
              <th scope="col" class="text-center">{{ $preventValue->criteria->name }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
          @php($startAt = 0)
          @foreach ($criteria_analysis->preventiveValues as $preventValue)
            @php($bgYellow = 'bg-warning text-dark')
            <tr>
              <th scope="row" class="text-center">{{ $preventValue->criteria->name }}</th>
              @foreach ($criteria_analysis->preventiveValues as $preventvalue)
                @if ($criteria_analysis->details[$startAt]->criteria_id_first === $criteria_analysis->details[$startAt]->criteria_id_second)
                  @php($bgYellow = '')
                  <td class="text-center bg-danger text-white">
                    {{ floatval($criteria_analysis->details[$startAt]->comparison_result) }}
                  </td>
                @else
                  <td class="text-center {{ $bgYellow }}">
                    {{ floatval($criteria_analysis->details[$startAt]->comparison_result) }}
                  </td>
                @endif
                @php($startAt++)
              @endforeach
            </tr>
          @endforeach
          <tr>
            <th class="text-center">Jumlah</th>
            @foreach ($totalSums as $total)
              <td class="text-center bg-secondary text-white">
                {{ $total['totalSum'] }}
              </td>
            @endforeach
          </tr>
        </tbody>
      </table>

      <div class="d-sm-flex align-items-center justify-content-between align-items-center my-4">
        <h1 class="h3 mb-0 text-gray-800">Hasil dari Perhitungan Nilai Preventive</h1>
      </div>

      <table class="table table-bordered text-dark">
        <thead>
          <tr>
            <th scope="col"></th>
            @foreach ($criteria_analysis->preventiveValues as $preventValue)
              <th scope="col" class="text-center">{{ $preventValue->criteria->name }}</th>
            @endforeach
            <th scope="col" class="text-center bg-secondary text-white">Nilai Preventive</th>
          </tr>
        </thead>
        <tbody>
          @php($startAt = 0)
          @foreach ($criteria_analysis->preventiveValues as $preventValue)
            @php($bgYellow = 'bg-warning text-dark')
            <tr>
              <th scope="row" class="text-center">{{ $preventValue->criteria->name }}</th>
              @foreach ($criteria_analysis->preventiveValues as $key => $preventvalue)
                <td class="text-center">
                  @php($res = floatval($criteria_analysis->details[$startAt]->comparison_result) / $totalSums[$key]['totalSum'])
                  {{ Str::substr($res, 0, 11) }}
                </td>
                @php($startAt++)
              @endforeach
              <td class="text-center bg-secondary text-white">
                {{ $preventValue->value }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <div class="d-sm-flex align-items-center justify-content-between align-items-center my-4">
        <h1 class="h3 mb-0 text-gray-800">Hasil dari Perhitungan Konsistensi Rasio</h1>
      </div>

      <table class="table table-bordered text-dark">
        <thead>
          <tr>
            <th scope="col"></th>
            @foreach ($criteria_analysis->preventiveValues as $preventValue)
              <th scope="col" class="text-center">{{ $preventValue->criteria->name }}</th>
            @endforeach
            <th scope="col" class="text-center bg-secondary text-white">Row Total</th>
          </tr>
        </thead>
        <tbody>
          @php($startAt = 0)
          @php($rowTotals = [])
          @foreach ($criteria_analysis->preventiveValues as $preventValue)
            @php($rowTotal = 0)
            <tr>
              <th scope="row" class="text-center">{{ $preventValue->criteria->name }}</th>
              @foreach ($criteria_analysis->preventiveValues as $key => $innerPreventvalue)
                <td class="text-center">
                  @php($res = floatval($criteria_analysis->details[$startAt]->comparison_result) * $innerPreventvalue->value)
                  @php($rowTotal += floatval($res))
                  {{ Str::substr($res, 0, 11) }}
                </td>
                @php($startAt++)
              @endforeach
              @php(array_push($rowTotals, $rowTotal))
              <td class="text-center bg-secondary text-white">
                {{ $rowTotal }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <table class="table table-borderless text-dark">
        <thead style="border-bottom: 1px solid #E3E6F0;">
          <tr>
            <th scope="col"></th>
            <th scope="col" class="text-center">Row Total</th>
            <th></th>
            <th scope="col" class="text-center">Nilai Preventive</th>
            <th scope="col" class="text-center">Hasil</th>
          </tr>
        </thead>
        <tbody>
          @php($lambdaMax = null)
          @php($lambdaResult = [])
          @foreach ($rowTotals as $key =>$total)
          <tr>
            <th scope="row" class="text-center border-end border-bottom">
              {{ $criteria_analysis->preventiveValues[$key]->criteria->name }}
            </th>
            <td class="text-center border-bottom">{{ $total }}</td>
            <td class="text-center border-bottom">:</td>
            <td class="text-center border-bottom">{{ $criteria_analysis->preventiveValues[$key]->value }}</td>
            <td class="text-center border-bottom">
              @php($lambda = $total / $criteria_analysis->preventiveValues[$key]->value)
              @php($res = substr($lambda, 0, 11))
              @php(array_push($lambdaResult, $res))
              {{ $res }}
            </td>
          </tr>
          @endforeach
          <tr style="border-top: 1px solid #E3E6F0;">
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center fw-bold">Lambda Max</td>
            <td class="text-center fw-bold">
              @php($lambdaMax = array_sum($lambdaResult) / count($lambdaResult))
              {{ $lambdaMax }}
            </td>
          </tr>
        </tbody>
      </table>

      <div class="row d-lg-flex justify-content-center">
        <div class="col-12 col-lg-6">
          <table class="table table-bordered text-dark">
            <tbody>
              <tr>
                <th scope="row">Nomer dari Kriteria</th>
                <td>{{ $criteria_analysis->preventiveValues->count() }}</td>
              </tr>
              <tr>
                <th scope="row">Rata-rata</th>
                <td>{{ $lambdaMax }}</td>
              </tr>
              <tr>
                <th scope="row">Consistency Index</th>
                <td>
                  @php($CI = ($lambdaMax - $criteria_analysis->preventiveValues->count()) /  ($criteria_analysis->preventiveValues->count() - 1))
                  {{ $CI }}
                </td>
              </tr>
              <tr>
                <th scope="row">Random Index</th>
                <td>
                  @php($RI = $ruleRI[$criteria_analysis->preventiveValues->count()])
                  {{ $RI }}
                </td>
              </tr>
              <tr>
                <th scope="row">Consistency Ratio</th>
                @php($CR = $CI / $RI)
                @php($txtClass = 'text-danger fw-bold')
                @if ($CR <= 0.1)
                  @php($txtClass = 'text-success fw-bold')
                @endif
                <td class="{{ $txtClass }}">
                  {{ $CR }}
                </td>
              </tr>
              <tr>
                @if ($CR > 0.1)
                  <td class="text-center text-danger text-dark" colspan="2">
                    Nilai Rasio Konsistensi melebihi <b>0.1</b> <br>
                    Masukan Kembali Nilai Perbandingan Kriteria
                    <a href="/dashboard/criteria-comparisons/{{ $criteria_analysis->id }}" class="btn btn-danger mt-2">Masukan Kembali Nilai Perbandingan</a>
                  </td>
                @elseif(!$isAbleToRank)
                <td class="text-center text-danger text-dark" colspan="2">
                  Admin belum memasukkan alternatif <br>
                  Tunggu admin memasukkan alternatif sebelum melihat peringkatnya
                </td>
                @else
                  <th scope="row">Aksi</th>
                  <td>
                    <a href="/dashboard/final-ranking/{{ $criteria_analysis->id }}" class="btn btn-success">
                      Lihat Peringkat UMKM
                    </a>
                  </td>
                @endif
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection