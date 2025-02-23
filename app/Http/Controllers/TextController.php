<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; 

class TextController extends Controller
{
    // Показать список текстов
    public function index()
    {
        $texts = Text::latest()->get();
        return view('texts.index', compact('texts'));
    }

    // Сохранить текст
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:2000'
        ]);

        Text::create($validated);
        return redirect()->route('texts.index');
    }

    // Экспорт в PDF
    public function exportPdf($id)
    {
        $text = Text::findOrFail($id);
        $pdf = PDF::loadView('texts.pdf', compact('text'));
        return $pdf->download("text-{$text->id}.pdf");
    }
}
