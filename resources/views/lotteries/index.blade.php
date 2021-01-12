@extends('layouts.app')

@section('content')
<div class="mt-5">
        @if(session('message'))
          <div class="alert alert-success">{{session('message')}}</div>
        @endif
    <a href="{{route('lotteries.create')}}" class="btn btn-sm btn-dark">ထီစာရင်းအသစ်ထည့်ရန်</a>
    <h1 class="text-center mb-4">ထီစာရင်းများ</h1>
    <table class="table table-white" style="hover{ color: white; }">
         <thead class="text-white">
            <tr>
              <th scope="col">အမှတ်စဉ်</th>
              <th scope="col">အက်ခရာ အစ</th>
              <th scope="col">အက်ခရာ အဆုံး</th>
              <th scope="col">နံပါတ် အစ</th>
              <th scope="col">နံပါတ် အဆုံး</th>
              <th scope="col">ထီအုပ်ရေစုစုပေါင်း</th>
              <th scope="col">စုစုပေါင်း ငွေ</th>
              <th scope="col">ရရှိသောရုံး</th>
              <th scope="col">စာရင်းသွင်းခဲ့သော နေ့</th>
              <th scope="col">ပြင်ဆင်ရန်</th>
              <th scope="col">ဖျက်ရန်</th>
            </tr>
          </thead>
          <tbody class="text-white">
              @foreach($lotteries as $lottery)
                <tr>
                   <td>{{$loop->iteration}}</td>
                   @foreach($lottery->alphabets as $alphabet)
                    <td>{{$alphabet->name}}</td>
                   @endforeach
                   <td>
                     @if($lottery->alp_end)
                       <span>{{$lottery->alp_end}}</span>
                     @else
                       <span>--</span>
                     @endif
                   </td>
                   <td>{{$lottery->num_start}}</td>
                   <td>{{$lottery->num_end}}</td>
                   <td>{{$lottery->total_lottery}}</td>
                   <td>
                      {{$lottery->calculate()}}
                   </td>
                   <td>{{$lottery->get_from}}</td>
                   <td>{{$lottery->created_at->isoFormat('D/M/YY')}}</td>
                   <td>
                     <a href="/lotteries/{{$lottery->id}}/edit" class="btn btn-sm btn-info">ပြင်ဆင်ရန်</a>
                   </td>
                   <td>
                    <form action="/lotteries/{{$lottery->id}}" method="POST">
                      @csrf
                      @method('DELETE')
                       <button type="submit" class="btn btn-sm btn-danger">ဖျက်ရန်</button>
                    </form>
                   </td>
                </tr>
              @endforeach
          </tbody>
    </table>
</div>
@endsection
