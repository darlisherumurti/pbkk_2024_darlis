<?php

namespace App\Http\Requests\Buku;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class NewBukuRequest extends FormRequest
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
        return [
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'image_url' => 'required|url',
            'tahun_terbit' => 'nullable|integer',
            'jumlah_halaman' => 'nullable|integer',
            'isbn' => 'required|string|unique:buku,isbn|max:13',
            'kategori' => 'required|array',
            'kategori.*' => 'exists:kategori,id',
            'deskripsi' => 'nullable|string',
        ];
    }
}
