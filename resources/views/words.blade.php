@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Numbers in Lithuanian words</h2>
                    <p>type positive number up to 1 bilion</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('numToWord') }}" method="get" enctype="multipart/form-data">
                        <label>Number:</label>
                        <input type="text" class="form-control" name="number" value="{{old('number')}}">
                        @csrf
                        <button type="submit" class="btn btn-secondary mt-4">count</button>
                    </form>
                </div>
                <div class="d-flex justify-content-center">
                    @if($words== null)
                    <h3> Type in number</h3>
                    @else
                    <h4> {{$words}}</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection