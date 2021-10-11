<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {
        return 'Hello, from lumen! We got your request from endpoint:' . $request->path();
    }

    public function tambahUser()
    {
        User::create([
            'name' => 'Wafi',
            'email' => 'wafimakarim@gmail.com',
            'password' => '12345'
        ]);
        return 'YEAY BERHASIL!!';
    }

    public function hello()
    {
        $data['status'] = 'Success';
        $data['message'] = 'Hello, from lumen!';
        return (new Response($data, 201))
        ->header('Content-Type', 'application/json');
    }

    public function updateDataNama(Request $request, $id)
    {
        $post = User::whereId($id)->update([
            'name' => $request->input('name')
        ]);

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Nama Berhasil Update!',
                'data' => $post
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal Update!',
            ], 400);
         }

        }

    public function updateDataEmail(Request $request, $id)
    {
            $post = User::whereId($id)->update([
                'email' => $request->input('email')
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Email Berhasil Update!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal Update!',
                ], 400);
             }
    
    }

    public function updateDataPassword(Request $request, $id)
    {
            $post = User::whereId($id)->update([
                'password'=> $request->input('password')
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Password Berhasil Update!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal Update!',
                ], 400);
        }
    
    } 

    public function updateDataSemua(Request $request, $id)
    {
            $post = User::whereId($id)->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password'=> $request->input('password')
            ]);
    
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Update!',
                    'data' => $post
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal Update!',
                ], 400);
        }
    
    } 
}