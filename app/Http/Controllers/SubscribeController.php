<?php

namespace App\Http\Controllers;

use App\Subscribe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubscribeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subscribe = new Subscribe($request->all());
        $subscribe->id = Str::uuid()->toString();
        $subscribe->file = Str::uuid()->toString();
        $subscribe->expired_at = Carbon::now()->addMonth(3);
        $subscribe->save();
        return redirect()->route('subscribe.show', ['subscribe' => $subscribe->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function show(Subscribe $subscribe)
    {
        return view('subscribe.pageA', compact('subscribe'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscribe $subscribe)
    {
        $subscribe->cancel();
        $subscribe->save();
        return redirect()->route('home');
    }
}
