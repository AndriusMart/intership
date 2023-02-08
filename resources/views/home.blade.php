@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Historical Vilnius temperature</h2>
                    <p>from 1959 to present</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('home') }}" method="get" enctype="multipart/form-data">
                        <label>Satrt date:</label>
                        <input type="text" class="form-control" name="startDate" value="YYYY-MM-DD">
                        <label>End date:</label>
                        <input type="text" class="form-control" name="endDate" value="YYYY-MM-DD">
                        @csrf
                        <button type="submit" class="btn btn-secondary mt-4">Show</button>
                    </form>
                </div>
                <h3 class="d-flex justify-content-center mb-4">From {{$startDate}} To {{$endDate}}  </h3>
                <div class="d-flex justify-content-around column">
                    <div>
                        <p>average max temp: <h4>{{$averageMax}}</h4></p>
                        <p>average min temp:<h4> {{$averageMin}}</h4></p>
                    </div>
                    <div>
                        <p>max temp:<h4> {{$max}}</h4></p>
                        <p>min temp: <h4>{{$min}}</h4></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection