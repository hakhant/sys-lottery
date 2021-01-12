@extends('layouts.app')

@section('content')
    <div class="container col-md-6 mt-4">
      <h1 class="text-center mb-4">Edit lottery list</h1>
      <form action="/lotteries/{{$lottery->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
              <label for="name" class="form-label">အက်ခရာ အစ</label>
              <select name="alphabets" id="name" class="form-control">
                  @foreach($alphabets as $alphabet)
                    <option value="{{$alphabet->id}}">{{$alphabet->name}}</option>
                  @endforeach
              </select>
            </div>
            <div class="col mb-3">
              <label for="alp_end" class="form-label">အက်ခရာ အဆုံး</label>
              <input type="text" name="alp_end" class="form-control" value="{{$lottery->alp_end}}" id="alp_end">
              @error('alp_end')
                 <div class="alert alert-danger">{{$message}}</div>
              @enderror
            </div>
            {{-- Alphabet Row --}}
        </div>
        <div class="row">
            <div class="col mb-3">
              <label for="num_start" class="form-label">နံပါတ် အစ</label>
              <input type="number" name="num_start" class="form-control" value="{{$lottery->num_start}}" id="num_start">
              @error('num_start')
                 <div class="alert alert-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="col mb-3">
              <label for="num_end" class="form-label">နံပါတ် အဆုံး</label>
              <input type="number" name="num_end" class="form-control" value="{{$lottery->num_end}}" id="num_end">
              @error('num_end')
                 <div class="alert alert-danger">{{$message}}</div>
              @enderror
            </div>
            {{-- Number Row --}}
        </div>
         <div class="row">
          <div class="col mb-3">
              <label for="total_lottery" class="form-label">ထီအုပ်ရေ စုစုပေါင်း</label>
              <input type="text" name="total_lottery" class="form-control" value="{{$lottery->total_lottery}}" id="total_lottery">
            @error('total_lottery')
               <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          <div class="col mb-3">
              <label for="total_price" class="form-label">ထီ တန်ဖိုး ငွေ</label>
              <input type="text" name="total_price" class="form-control" value="{{$lottery->total_price}}" id="total_price">
            @error('total_price')
               <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          {{-- Total Lottery and Price Row --}}
         </div>
         <div class="mb-3">
              <label for="get_from" class="form-label">ရရှိခဲ့သော ရုံး</label>
              <input type="text" name="get_from" class="form-control" value="{{$lottery->get_from}}" id="get_from">
            @error('get_from')
               <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-sm btn-dark form-control">ပြင်ဆင်ရန်</button>
        </form>
    </div>
@endsection
