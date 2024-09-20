@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
              <a  href="{{ route('emi-details') }}" class="btn btn-info">
                process
              </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Clientid</th>
                            <th scope="col">Num of Payment</th>
                            <th scope="col">First Payment Date</th>
                            <th scope="col">Last Payment Date</th>
                            <th scope="col">Load Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $item)
                            <tr>
                                <td>{{ $item->clientid }}</td>
                                <td>{{ $item->num_of_payment }}</td>
                                <td>{{ $item->first_payment_date }}</td>
                                <td>{{ $item->last_payment_date }}</td>
                                <td>{{ number_format($item->load_amount,2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
