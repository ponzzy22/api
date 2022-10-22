<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function generate_new(Request $request)
    {
        try {
            $request->validate([
                'username' => ['required', 'string', 'max:50'],
                'nip' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
                'password' => ['required', 'min:8']
            ]);

            User::create([
                'username' => $request->username,
                'nip' => $request->nip,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user = User::where('email', $request->email)->first();
            $tokenResult = $user->createToken('DISKOMINFO')->plainTextToken;

            $data = [
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ];
            return $this->sendResponse($data, 'Generate Token Berhasil Bro');
        } catch (Exception $error) {
            return $this->sendError(
                [
                    'message' => 'Ada yang salah / Ada data duplikat',
                    'error' => $error
                ],
                'Generate Token Gagal',
            );
        }
    }


    public function generate_update(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return $this->sendError('Data tidak ditemukan', 'Tidak teridentifikasi', 500);
            }

            //Jika hash tidak sesuai
            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            //hapus token
            $user->tokens()->delete();
            //buat token baru
            $tokenResult = $user->createToken('DISKOMINFO')->plainTextToken;
            return $this->sendResponse([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Authenticated');
        } catch (Exception $error) {
            return $this->sendError(
                [
                    'message' => 'Ada Kesalahan',
                    'error' => $error
                ],
                'Update token gagal',
            );
        }
    }


    public function cekuser(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return $this->sendError('User tidak Ditemukan', 'Periksa kembali email & password', 500);
            }

            //Jika hash tidak sesuai
            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            //jika berhasil maka login
            return $this->sendResponse([
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Testing User Berhasil');
        } catch (Exception $error) {
            return $this->sendError(
                [
                    'message' => 'Ada yang salah',
                    'error' => $error
                ],
                'Testing User Gagal',
            );
        }
    }


    public function cektoken(User $user)
    {
        try {

            $user = Auth::user($user);

            return $this->sendResponse($user, 'Sukses Mendapatkan Detail Token');
        } catch (Exception $error) {
            return $this->sendError(
                [
                    'message' => 'Ada Kesalahan',
                    'error' => $error
                ],
                'Indentifikasi Gagal',
            );
        }
    }
    
}
