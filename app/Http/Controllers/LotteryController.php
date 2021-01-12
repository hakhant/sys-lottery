<?php

namespace App\Http\Controllers;

use App\Models\Alphabet;
use App\Models\Lottery;
use Illuminate\Http\Request;

class LotteryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lotteries = Lottery::all();
        return view('lotteries.index',['lotteries' => $lotteries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lotteries.create',[
            'alphabets' => Alphabet::all(),
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateLottery();

        $lotteries = new Lottery(request(['alp_end','num_start','num_end','total_price','total_lottery','get_from']));

        $lotteries->save();

        $lotteries->alphabets()->attach(request('alphabets'));

        return redirect(route('lotteries.index'))->with('message', 'Successfully created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lottery  $lottery
     * @return \Illuminate\Http\Response
     */
    public function edit(Lottery $lottery, $id)
    {
        return view('lotteries.edit',[
            'alphabets' => Alphabet::all(),
            'lottery' => Lottery::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lottery  $lottery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lottery $lottery, $id)
    {
        $lottery = Lottery::findOrFail($id);

        $this->validateLottery();

        $lottery->update(request(['alp_end','num_start','num_end','total_price','total_lottery','get_from']));

        $lottery->alphabets()->sync(request('alphabets'));

        return redirect()->route("lotteries.index")->with('message', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lottery  $lottery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lottery $lottery, $id)
    {
        $lottery = Lottery::findOrFail($id);

        $lottery->delete();

        return redirect(route('lotteries.index'))->with('message','Successfully deleted');
    }

    protected function validateLottery()
    {
        return request()->validate([
            'alp_end' => 'nullable',
            'num_start' => 'required',
            'num_end' => 'required',
            'total_lottery' => "required",
            'total_price' => 'required',
            'alphabets' => 'exists:alphabets,id',
            'get_from' => 'required'
        ]);
    }


}
