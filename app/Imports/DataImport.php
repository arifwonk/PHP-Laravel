<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class DataImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
            'category_id'    => $row['category_id'],
            'user_id'    => $row['user_id'],
            'kode'     => $row['kode'],
            // 'image'    => $row['image'],
            'deskripsi'    => $row['deskripsi'],
            'l_deskripsi'    => $row['l_deskripsi'],
            'qty'    => $row['qty'],
            'loc'    => $row['loc'],
            'ma'    => $row['ma'],
            'rop'    => $row['rop'],
            'mi'    => $row['mi'],
            'price'    => $row['price'],
        ]);
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required',
            // Above is alias for as it always validates in batches
            '*.category_id' => 'required',

            'user_id' => 'required',
            // Above is alias for as it always validates in batches
            '*.user_id' => 'required',

            'kode' => 'required|unique:posts',
            // Above is alias for as it always validates in batches
            '*.kode' => 'required|unique:posts',

            'deskripsi' => 'required',
            // Above is alias for as it always validates in batches
            '*.deskripsi' => 'required',

            'l_deskripsi' => 'required',
            // Above is alias for as it always validates in batches
            '*.l_deskripsi' => 'required',

            'qty' => 'required',
            // Above is alias for as it always validates in batches
            '*.qty' => 'required',

            'loc' => 'required',
            // Above is alias for as it always validates in batches
            '*.loc' => 'required',

            'ma' => 'required',
            // Above is alias for as it always validates in batches
            '*.ma' => 'required',

            'rop' => 'required',
            // Above is alias for as it always validates in batches
            '*.rop' => 'required',

            'mi' => 'required',
            // Above is alias for as it always validates in batches
            '*.mi' => 'required',

            'price' => 'required',
            // Above is alias for as it always validates in batches
            '*.price' => 'required',

        ];
    }
}