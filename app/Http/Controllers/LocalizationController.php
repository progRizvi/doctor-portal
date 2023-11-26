<?php

namespace App\Http\Controllers;

use App\Models\Localization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LocalizationController extends Controller
{
    public function index()
    {
            $this->generateLang("en");
            $this->generateLang("bn");
        $words = Localization::paginate(20);
        return view('backend.pages.localization.create', compact("words"));
    }
    public function store(Request $request)
    {
        foreach ($request->except("_token") as $key => $data) {
            $word = Localization::where("word",$key)->first();
            $word->english = $data['english'];
            $word->bangla = $data['bangla'];
            $word->save();
        }
        toastr()->success("Translation Updated");
        return back();
    }

    private function generateLang($lang){
        $languageFiles = File::files(base_path("lang/$lang"));
            $file = $languageFiles[array_key_last($languageFiles)];
            $locale = pathinfo($file->getFilename(), PATHINFO_FILENAME);
            $fileContent = File::getRequire($file->getPathname());
            foreach($fileContent as $key=>$value){
                $word = Localization::where("word",$key)->first();
                if(!$word){
                    Localization::create([
                        "word"=>$key,
                        "english"=>$value,
                        "bangla"=>""
                    ]);
                }
                if($word && $lang == "bn"){
                    $word->bangla = $value;
                    $word->save();
                }
            }
    }
}
