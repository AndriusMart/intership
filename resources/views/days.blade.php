@extends('layouts.app')


@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Count days between dates</h2>
                        <p>Date format YYYY-MM-DD</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('calcDays') }}" method="get" enctype="multipart/form-data">
                            <label>Satrt date:</label>
                            <input type="text" class="form-control" name="startDate" value="YYYY-MM-DD">
                            <label>End date:</label>
                            <input type="text" class="form-control" name="endDate" value="YYYY-MM-DD">
                            @csrf
                            <button type="submit" class="btn btn-secondary mt-4">count</button>
                        </form>
                    </div>
                    <div class="d-flex justify-content-center">
                        @if($days== null)
                        <h4> Type in dates</h4>
                        @else
                        <h3>{{ $days}}</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
