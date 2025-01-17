@extends('layouts.master')
@section('title', 'Fişler')
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))
@php(setlocale(LC_TIME, 'Turkish'))

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    Detaylı Arama
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="start_date">Başlangıç Tarihi</label>
                                <input type="datetime-local" id="start_date" value="{{ date('Y-m-d') . 'T00:00' }}" name="start_date" class="form-control receiptsFilterer">
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="end_date">Bitiş Tarihi</label>
                                <input type="datetime-local" id="end_date" value="{{ date('Y-m-d') . 'T23:59' }}" name="end_date" class="form-control receiptsFilterer">
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="min_price">Min. Ücret</label>
                                <input type="text" id="min_price" name="min_price" class="form-control decimal receiptsFilterer">
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="max_price">Max. Ücret</label>
                                <input type="text" id="max_price" name="max_price" class="form-control decimal receiptsFilterer">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 text-right">
                            <button class="btn btn-sm btn-primary" id="clearFilterReceiptsButton">Temizle</button>
                            <button class="btn btn-sm btn-success" id="filterReceiptsButton">Filtrele</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="receipts">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tarih</th>
                            <th>İşlem</th>
                            <th>Tutar</th>
                            <th>Ödeme Türü</th>
                            <th>İşlemi Yapan</th>
                            <th>Açıklama</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Tarih</th>
                            <th>İşlem</th>
                            <th>Tutar</th>
                            <th>Ödeme Türü</th>
                            <th>İşlemi Yapan</th>
                            <th>Açıklama</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('management.receipt.components.style')
@stop

@section('page-script')
    @include('management.receipt.components.script')
@stop
