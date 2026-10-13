<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\NoticeRequest;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::orderBy('created_at', 'desc')->get();
        return view('notices.index', ['notices' => $notices]);
    }

    public function create()
    {
        return view('notices.create');
    }

    public function store(NoticeRequest $request)
    {
        $notice = new Notice();
        $notice->title   = $request->input('title');
        $notice->content = $request->input('content');
        $notice->user_id = Auth::id();
        $notice->save();

        return redirect('/notices')->with('message', 'お知らせを登録しました！');
    }

    public function edit($id)
    {
        $notice = Notice::find($id);
        if ($notice->user_id !== Auth::id()) { 
            abort(403);                          
        }    
        return view('notices.edit', ['notice' => $notice]);
    }

    public function update(NoticeRequest $request, $id)
    {
        $notice = Notice::find($id);
        if ($notice->user_id !== Auth::id()) {   
            abort(403);                          
        }   
        $notice->title   = $request->input('title');
        $notice->content = $request->input('content');
        $notice->save();

        return redirect('/notices')->with('message', 'お知らせを更新しました！');
    }
    public function show($id)
    {
        $notice = Notice::find($id);
        return view('notices.show', ['notice' => $notice]);
    }

    public function destroy($id)
    {
        $notice = Notice::find($id);
        if ($notice->user_id !== Auth::id()) {   
            abort(403);                          
        }     
        $notice->delete();

        return redirect('/notices')->with('message', 'お知らせを削除しました。');
    }
}