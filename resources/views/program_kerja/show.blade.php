@extends('layouts.frontend')

@section('content')
    <section class="ui container page">

        <div class="ui grid">
            <div class="column ten wide">
                <h2 class="">{!! $programKerja->present('name') !!}</h2>

                <table class="ui definition table small">
                    <tbody>
                    <tr><td style="width: 150px">Fase Sekarang</td><td>{!! $programKerja->present('label') !!}</td></tr>
                    <tr><td>Periode</td><td>{{ $programKerja->present('periode') }}</td></tr>
                    <tr><td>Instansi Terkait</td><td>{{ $programKerja->present('instansi_terkait') }}</td></tr>
                    <tr><td>Deskripsi</td><td>{{ $programKerja->present('description') }}</td></tr>
                    <tr>
                        <td>Fase Terkait</td>
                        <td>
                            <div class="ui list divided middle aligned relaxed">
                                @foreach($related as $item)
                                    <div class="item">
                                        {!! $item->present('label') !!}
                                        <a href="{{ $item->present('url') }}">{{ $item->present('periode') }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>

                {!! Votee::render($programKerja, ['class' => 'fluid']) !!}
                {!! Mural::render($programKerja, 'default') !!}

            </div>
            <div class="column six wide">

            </div>
        </div>

    </section>
@endsection
