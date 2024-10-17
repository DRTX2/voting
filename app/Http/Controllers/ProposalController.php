<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->input('category');
        $proposals = Proposal::when($category, function($query, $category) {
            return $query->where('category', $category);
        })->get();
        /**
         * Esta parte realiza una consulta al modelo Proposal. El método when aplica una condición al realizar la consulta. Si existe un valor en la variable $categoria, se agrega un filtro usando where para obtener solo las propuestas que coincidan con la categoría proporcionada. Si no hay valor en $categoria, se omite el filtro y se devuelven todas las propuestas. 
         * */ 
        return view('proposals.index', compact('proposals'));
    }
}
