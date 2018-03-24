<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Word;
use App\Word_temp;
use Session;
class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = Word::orderBy('id', 'desc')->paginate(5);
        return view('admin.words.index')->withWords($words);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.words.create');
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
        $word = new Word;

        $word->word = $request->word;
        $word->shortDesc = $request->shortDesc;
        $word->fullDesc = $request->fullDesc;
        $word->dict_id = $request->dict_id;
        $word->voice = $request->word;
        $word->state_id = 2;
        $word->active = true;
        $word->save();

        Session::flash('success', 'Đã thêm từ thành công!');

        return redirect()->route('words.show', $word->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $word = Word::find($id);
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
        $word = Word::find($id);
        return view('admin.words.edit')->withWord($word);
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
        $word = Word::find($id);

        $this->validate($request, array(
            'word' => 'required',
            'shortDesc' => 'required',
            'fullDesc' => 'required'
        ));
        $word->word = $request->word;
        $word->shortDesc = $request->shortDesc;
        $word->fullDesc = $request->fullDesc;
        $word->dict_id = $request->dict_id;
        $word->voice = $request->word;
        $word->state_id = 2;
        $word->active = true;
        $word->save();

        Session::flash('success', 'Đã sửa từ thành công!');

        return redirect()->route('words.show', $word->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $word = Word::find($id);

        $word->delete();

        Session::flash('success', 'Từ đã bị xóa!');
        return redirect()->route('admin.words.index');
    }
    public function check()
    {
        $words_temp = Word_temp::orderBy('id', 'desc')->paginate(5);
        return view('admin.words.check')->withWords_temp($words_temp);
    }
}
