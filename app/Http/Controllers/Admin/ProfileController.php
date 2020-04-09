<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;
use App\ProfiHistory;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        
        $profiles = new Profile;
        $form = $request->all();
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $profiles->image_path = basename($path);
        } else {
                $profiles->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $profiles->fill($form);
        $profiles->save();
        
        return redirect('admin/profile/create');
    }
    
    public function edit(Request $request)
    {
        $profiles = Profile::find($request->id);
        if (empty($profiles)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profiles_form' => $profiles]);
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title !='') {
            $posts = Profile::where('name', $cond_title)->get();
        } else {
            $posts = Profile::all();
        }
        return view('admin.profile.index', ['posts' => $posts, 
        'cond_title' => $cond_title]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request,Profile::$rules);
        $profiles = Profile::find($request->id);
        $profiles_form = $request->all();
        if ($request->remove == 'true') {
            $profiles_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $profiles_form['image_path'] = basename($path);
        } else {
            $profiles_form['image_path'] = $profiles->image_path;
        }

        unset($profiles_form['_token']);
        unset($profiles_form['image']);
        unset($profiles_form['remove']);
        $profiles->fill($profiles_form)->save();
        
        $profi_history = new ProfiHistory;
        $profi_history->profile_id = $profiles->id;
        $profi_history->edited_at = Carbon::now();
        $profi_history->save();
        
        return redirect('admin/profile/');
    }
    
    public function delete(Request $request)
    {
        $profiles = Profile::find($request->id);
        $profiles->delete();
        return redirect('admin/profile/');
    }
}

//ProfileControllerを編集して、admin/profile/create
//から送信されてきたフォーム情報をデータベースに
//保存するようにしましょう。(ヒント: NewsController 参照)