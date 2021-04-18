<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkshopRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
                'kode' => 'required',
                'nama' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required',
                'tanggal_pelaksanaan' => 'required',
                'jam_pelaksanaan' => 'required',
                'jumlah_peserta' => 'required',
                'poster' => 'mimes:jpg,png'
        ];
    }
}
