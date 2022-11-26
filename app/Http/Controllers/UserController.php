<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\JenisJabatan;

class UserController extends Controller
{
    public function viewUser()
    {
        $data = User::all();
        return view("user.view-us", ['data' => $data]);
    }

    public function inputUser()
    {
        $jenis = JenisJabatan::all();
        return view("user.input-us", ['jenis' => $jenis]);
    }

    public function saveUser(Request $x)
    {
        User::create([
            'name' => $x->name,
            'jenisJabatan_id' => $x->jenisJabatan_id,
            'email' => $x->email,
            'password' => Hash::make($x->input('password')),
            'type' => $x->type,
        ]);
        return redirect('/view-user');
    }

    public function editUser($id)
    {
        $jenis = JenisJabatan::all();
        $data = User::find($id);
        return view("user.edit-us", ['data' => $data] , ['jenis' => $jenis]);
    }

    public function updateUser(Request $x,$id)
    {
        User::where('id', $id)->update([
            'name' => $x->name,
            'jenisJabatan_id' => $x->jenisJabatan_id,
            'email' => $x->email,
            'password' => Hash::make($x->input('password')),
            'type' => $x->type,
        ]);
        return redirect()->back()->with('toast_success', 'Data Berhasil Diperbarui!');
    }

    public function hapusUser($id)
    {
        User::where('id', $id)->delete();
        return redirect('/view-user');
    }
}
