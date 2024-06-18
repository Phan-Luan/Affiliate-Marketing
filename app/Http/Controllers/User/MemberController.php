<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function member(Request $request)
    {
        $type_n = $request->type_n;
        $parameter = [];

        if ($type_n && $type_n == 1) {
            if ($request->level != 'default') {
                $parameter['level'] = $request->level;
            }
            if ($request->type != 'default') {
                $parameter['type'] = $request->type;
            }
            $f1s = User::where('invite_user', users()->user()->id)->where($parameter)->orderBy('id', 'DESC')->paginate(20);
            $f1s->appends($parameter);
        } else {
            $f1s = User::where('invite_user', users()->user()->id)->orderBy('id', 'DESC')->paginate(10);
        }

        if ($type_n && $type_n == 2) {
            if ($request->level && $request->level != 'default') {
                $parameter['level'] = $request->level;
            }
            if ($request->type != 'default' && $request->type != null) {
                $parameter['type'] = $request->type;
            }
            $f2s = User::where('f2_id', users()->user()->id)->where($parameter)->orderBy('id', 'DESC')->paginate(10);
            $f2s->appends($parameter);
        } else {
            $f2s = User::where('f2_id', users()->user()->id)->orderBy('id', 'DESC')->paginate(10);
        }

        if ($type_n && $type_n == 3) {
            if ($request->level && $request->level != 'default') {
                $parameter['level'] = $request->level;
            }
            if ($request->type != 'default' && $request->type != null) {
                $parameter['type'] = $request->type;
            }
            $f3s = User::where('f3_id', users()->user()->id)->where($parameter)->orderBy('id', 'DESC')->paginate(10);
            $f3s->appends($parameter);
        } else {
            $f3s = User::where('f3_id', users()->user()->id)->orderBy('id', 'DESC')->paginate(10);
        }

        return view('user.member.member', compact('f1s', 'f2s', 'f3s'));
    }
}
