<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Word_temp;
use App\Word;
use Session;
class WordTempController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = Word::orderBy('id', 'desc')->paginate(5);
        return view('words.index')->withWords($words);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function create()
    {
        return view('words.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, array(
            'word' => 'required',
            'shortDesc' => 'required',
            'fullDesc' => 'required'
        ));

        $word_temp = new Word_temp;
        $word_temp->word = $request->word;
        $word_temp->shortDesc = $request->shortDesc;
        $word_temp->fullDesc = $request->fullDesc;
        $word_temp->dict_id = $request->dict_id;
        $word_temp->save();

        Session::flash('success', 'Đã thêm từ thành công, xin chờ từ được duyệt!');

        return redirect()->route('word.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $word = Word_temp::find($id);
        return view('words.show')->with('word', $word);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $word_temp = Word_temp::find($id);

        $word_temp->delete();

        Session::flash('success', 'Từ đã bị xóa!');
        return redirect()->route('words.index');
    }
}
