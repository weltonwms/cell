@extends('layouts.app_interno')
@section('content_interno')


    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Produtos com mais Saída</div>

                <div class="panel-body">
                    <canvas id="p1" ></canvas>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Produtos com Maior Lucro</div>

                <div class="panel-body">
                    <canvas id="p2" ></canvas>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script src="{{ asset('plugins/chart.min.js') }}"></script>
<script src="{{ asset('js/dash.js') }}"></script>
@endpush