<?php

namespace App\Http\Requests\Pinjamanan;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class NewPinjamanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'buku_id' => 'required|exists:buku,id',
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'keterangan' => 'required|string|max:500',
            'durasi_peminjaman' => 'required|integer|min:1',
            'tanggal_peminjaman' => 'required|date|after_or_equal:today',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'User ID is required.',
            'user_id.exists' => 'The selected user does not exist.',
            'buku_id.required' => 'Book ID is required.',
            'buku_id.exists' => 'The selected book does not exist.',
            'nama_lengkap.required' => 'Full name is required.',
            'alamat.required' => 'Address is required.',
            'keterangan.required' => 'Description is required.',
            'durasi_peminjaman.required' => 'Duration of borrowing is required.',
            'durasi_peminjaman.integer' => 'Duration must be an integer.',
            'durasi_peminjaman.min' => 'Duration must be at least 1 day.',
            'tanggal_peminjaman.required' => 'Borrowing date is required.',
            'tanggal_peminjaman.date' => 'Invalid date format for borrowing date.',
            'tanggal_peminjaman.before_or_equal' => 'Borrowing date cannot be in the future.',
        ];
    }
}
