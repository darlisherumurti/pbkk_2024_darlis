<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewBukuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'nullable|integer',
            'jumlah_halaman' => 'nullable|integer',
            'isbn' => 'required|string|unique:buku,isbn|max:13',
            'kategori' => 'required|array',
            'kategori.*' => 'exists:kategori,id',
            'deskripsi' => 'nullable|string',
        ];
    }
}
