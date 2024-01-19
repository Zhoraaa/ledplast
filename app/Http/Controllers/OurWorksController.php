<?php

namespace App\Http\Controllers;

use App\Models\OurWorks;
use App\Models\OurWorksMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OurWorksController extends Controller
{
    //

    public function getAll()
    {
        $ourWorks = OurWorks::get();

        return view('oworks.list', compact('ourWorks'));
    }

    public function checkWork(Request $request)
    {
        $data = OurWorks::find($request->id);

        return view('oworks.only', compact('data'));
    }

    public function save(Request $request)
    {
        function loadMedia($imgs, $work_id)
        {
            $counter = 1;
            foreach ($imgs as $image) {
                $fileName = time() . '_' . $counter . '.' . $image->extension();
                $imagePath = $image->storeAs('public/imgs/our_works', $fileName);
                OurWorksMedia::create([
                    'work_id' => $work_id,
                    'image' => $fileName
                ]);
                $counter++;
            }
        }

        if (!$request->work_id) {
            $work_id = OurWorks::insertGetId([
                'name' => $request->name,
                'description' => $request->description,
                'cost' => $request->cost,
                'type' => $request->type
            ]);

            if ($request->hasFile('images') && is_array($request->file('images'))) {
                loadMedia($request->images, $work_id);
            }
        } else {
            // dd($request->images);
            // Обновление
            $update['updated_at'] = null;
            if ($request->hasFile('images') && is_array($request->file('images'))) {
                $oldFiles = OurWorksMedia::select('image')->where('work_id', $request->work_id)->get();

                foreach ($oldFiles as $oldFile) {
                    $filePath = 'public/imgs/OurWorks/' . $oldFile->image;
                    if (Storage::exists($filePath)) {
                        Storage::delete($filePath);
                    }
                    OurWorksMedia::where('work_id', $request->work_id)->delete();
                }

                loadMedia($request->images, $request->work_id);
            }

            $toUPD = $request->toArray();
            $OurWorks = OurWorks::find($request->work_id);
            // dd($toUPD);
            $testing = $OurWorks->toArray();

            foreach ($testing as $key => $item) {
                switch ($key) {
                    case 'id':
                    case 'image':
                    case 'created_at':
                    case 'updated_at':
                        break;
                    default:
                        if ($toUPD[$key] != $item) {
                            $update[$key] = $toUPD[$key];
                        }
                        break;
                }
            }

            // dd($update);

            $OurWorks->update($update);
            $work_id = $request->work_id;
        }

        return redirect()->route('seeOurWorks', ['id' => $work_id]);
    }

    public function editor(Request $request)
    {
        $data = OurWorks::find($request->id);

        // dd($data);

        return view("oworks.editor", compact('data'));
    }
    public function delete(Request $request)
    {
        // dd($request->id);
        $oldFiles = OurWorksMedia::select('image')->where('work_id', $request->id)->get();

        foreach ($oldFiles as $oldFile) {
            $filePath = 'public/imgs/OurWorks/' . $oldFile->image;
            // dd($filePath);
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
            OurWorksMedia::where('work_id', $request->id)->delete();
        }

        $OurWorks = DB::table("OurWorks")->where('id', $request->id)->delete();

        return redirect()->route("shop");
    }
}
