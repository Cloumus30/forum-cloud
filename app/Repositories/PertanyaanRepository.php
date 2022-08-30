<?php
namespace App\Repositories;

use App\Models\Pertanyaan;

Class PertanyaanRepository{
    public $pertanyaan;

    public function __construct(
        Pertanyaan $pertanyaan
    )
    {
        $this->pertanyaan = $pertanyaan;
    }

    public function listPaginate(){
        $pertanyaan = $this->pertanyaan->cursorPaginate();

        return $pertanyaan;
    }
}