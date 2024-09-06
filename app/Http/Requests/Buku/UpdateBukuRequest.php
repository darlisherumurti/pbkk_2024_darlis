<?php

namespace App\Http\Requests\Buku;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBukuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user() && Auth::user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $bukuId = $this->route('buku')->id;

        return [
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'nullable|integer',
            'jumlah_halaman' => 'nullable|integer',
            'isbn' => [
                'required',
                'string',
                'max:13',
                Rule::unique('buku', 'isbn')->ignore($bukuId),
            ],
            'kategori' => 'required|array',
            'kategori.*' => 'exists:kategori,id',
            'deskripsi' => 'nullable|string',
        ];
    }
}
