@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table  class="table display">
                    <thead>
                        <tr>
                            <th>clientid</th>
                            @if ($heading)
                                @foreach ($heading as $item)
                                    <th>{{ $item }}</th>
                                @endforeach
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        @php
                            $item = json_decode(json_encode($item), true);
                        @endphp
                            <tr>
                                <td>{{ $item['clientid'] }}</td>
                                @if ($heading)
                                    @foreach ($heading as $col)
                                        <th>{{ number_format($item[$col],2) }}</th>
                                    @endforeach
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
