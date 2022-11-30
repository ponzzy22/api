<?php

namespace App\Http\Resources\Anggota;

use Illuminate\Http\Resources\Json\JsonResource;

class HonorerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'jabatan' => $this->jabatan,
            'pegawai_email' => $this->pegawai_email,
            'nip' => $this->nip,
            'pin' => $this->pin,
            'gol' => $this->gol,
            'tmt_gol' => $this->tmt_gol,
            'jenis_jabatan' => $this->jenis_jabatan,
            'opd' => $this->opd,
            'kec' => $this->kec,
            'masa_kerja' => $this->masa_kerja,
            'thn' => $this->thn,
            'jurusan_pendidikan' => $this->jurusan_pendidikan,
            'tahun_lulus' => $this->tahun_lulus,
            'kontrol_ijazah' => $this->kontrol_ijazah,
            'tempat_lahir' => $this->tempat_lahir,
            'agama' => $this->agama,
            'user_id' => $this->user_id,
            'user_id' => $this->user_id,
            'status' => $this->status,
        ];
    }
}
