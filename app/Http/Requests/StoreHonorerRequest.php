<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHonorerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama' => 'required',
            'jabatan' => 'required',
            'jabatan_baru' => 'required',
            'pegawai_email' => 'required',
            'nip' => 'required',
            'pin' => 'required',
            'gol' => 'required',
            'tmt_gol' => 'required',
            'jenis_jabatan' => 'required',
            'opd' => 'required',
            'kec' => 'required',
            'masa_kerja' => 'required',
            'thn' => 'required',
            'jurusan_pendidikan' => 'required',
            'tahun_lulus' => 'required',
            'kontrol_ijazah' => 'required',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'user_id' => 'required',
            'status' => 'required',
        ];
    }
}
