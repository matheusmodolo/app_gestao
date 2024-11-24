<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal() {
        $motivo_contato = [
            '1' => 'Dúvida',
            '2' => 'Reclamação',
            '3' => 'Elogio'
        ];
        return view('site.principal' , ['motivo_contato' => $motivo_contato]);
    }
}
