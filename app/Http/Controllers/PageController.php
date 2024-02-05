<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\OurWorks;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    //
    public function home()
    {

        $data['oworks'] = OurWorks::get();
        $data['letters'] = Letter::get();

        // dd($data);

        return view('home', compact('data'));
    }

    public function file($filePath)
    {
        // Проверяем, существует ли файл
        if (Storage::exists($filePath)) {
            // Получаем содержимое файла
            $fileContents = Storage::get($filePath);

            // Определяем MIME-тип файла
            $mimeType = Storage::mimeType($filePath);

            // Возвращаем ответ с файлом и его MIME-типом
            return response($fileContents)
                ->header('Content-Type', $mimeType);
        } else {
            // Если файл не найден, возвращаем 404 Not Found
            abort(404);
        }
    }
}
