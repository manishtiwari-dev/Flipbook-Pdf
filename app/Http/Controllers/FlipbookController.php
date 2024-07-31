<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\PdfSlide;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class FlipbookController extends Controller
{
    public function index(Request $request)
    {

        $pdfSlide = PdfSlide::all();

        return view('pdfSlide.index', compact('pdfSlide'));
    }



    public function create(Request $request)
    {

        return view('pdfSlide.create');
    }




    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:255',
                'attachment' => 'required|mimes:pdf',
            ],
            [
                'title.required' => 'Please enter title.',
                'attachment' => 'required',


            ]
        );




        $filePdf = '';

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');

            // Get the current timestamp
            $timestamp = now()->timestamp;

            // Get the original file extension
            $extension = $file->getClientOriginalExtension();

            // Combine timestamp and extension to create a unique filename
            $fileName = $timestamp . '.' . $extension;

            // Store the file with the new filename
            $filePdf = $file->storeAs('pdfs', $fileName, 'public');
        }


        $fileImage = '';

        if ($request->hasFile('logo_image')) {
            $file = $request->file('logo_image');

            // Get the current timestamp
            $timestamp = now()->timestamp;

            // Get the original file extension
            $extension = $file->getClientOriginalExtension();

            // Combine timestamp and extension to create a unique filename
            $fileName = $timestamp . '.' . $extension;

            // Store the file with the new filename
            $fileImage = $file->storeAs('logo-images', $fileName, 'public');
        }
		
      

        if ($validator->fails()) {
            flash(($validator->messages()))->error();
            return back();
        } else {
            $slug = $this->getUniqueValue('PdfSlide', 'slug', [5, 5], $request->title);
          
         

            PdfSlide::create([
                'title' => $request->title,
                'desc' => $request->desc,
                'slug' => $slug,
                'mode' => $request->mode,
                'view_mode' => $request->view_mode,
                'initial_zoom' => $request->initial_zoom,
                'zoom_step' => $request->zoom_step,
                'double_click_zoom' => $request->double_click_zoom,
                'single_page' => $request->single_page,
                'autoplay_start' => $request->autoplay_start,
                'autoplay_interval' => $request->autoplay_interval,
//'pdf_start' => $request->pdf_start,
                'attachment' => $filePdf,
                'logo_image' => $fileImage,
            ]);


            flash(('Added successfully.'))->success();
            return redirect()->route('admin.pdfSlide.index');
        }
    }







    public function edit($id)
    {
        $pdfSlide = PdfSlide::findOrFail($id);
        return view('pdfSlide.edit', compact('pdfSlide'));
    }



    public function update(Request $request)
    {
        $id = $request->id;
        $pdfSlide = PdfSlide::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'attachment' => 'nullable|mimes:pdf|max:2048',

        ]);

        $filePdf = '';

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');

            // Get the current timestamp
            $timestamp = now()->timestamp;

            // Get the original file extension
            $extension = $file->getClientOriginalExtension();

            // Combine timestamp and extension to create a unique filename
            $fileName = $timestamp . '.' . $extension;

            // Store the file with the new filename
            $filePdf = $file->storeAs('pdfs', $fileName, 'public');
        }


        $fileImage = '';

        if ($request->hasFile('logo_image')) {
            $file = $request->file('logo_image');

            // Get the current timestamp
            $timestamp = now()->timestamp;

            // Get the original file extension
            $extension = $file->getClientOriginalExtension();

            // Combine timestamp and extension to create a unique filename
            $fileName = $timestamp . '.' . $extension;

            // Store the file with the new filename
            $fileImage = $file->storeAs('logo-images', $fileName, 'public');
        }


        $pdfSlide->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'mode' => $request->mode,
            'view_mode' => $request->view_mode,
            'initial_zoom' => $request->initial_zoom,
            'zoom_step' => $request->zoom_step,
            'double_click_zoom' => $request->double_click_zoom,
            'single_page' => $request->single_page,
            //  'table_content_show' => $request->table_content_show,
            //  'close_table_content' => $request->close_table_content,
            'autoplay_start' => $request->autoplay_start,
             'autoplay_interval' => $request->autoplay_interval,
            //  'right_to_left_mode' => $request->right_to_left_mode,
            //  'show_thumbnail' => $request->show_thumbnail,
            // 'close_thumbnail' => $request->close_thumbnail,
         //   'pdf_start' => $request->pdf_start,
            'attachment' => !empty($filePdf)  ?  $filePdf : $request->old_pdf,
            'logo_image' => !empty($fileImage)  ?  $fileImage : $request->old_image


        ]);
        flash(('Uploaded successfully.'))->success();

        return redirect()->route('admin.pdfSlide.index');
    }



    public function showBySlug($slug)
    {
        $pdfSlide = PdfSlide::where('slug', $slug)->firstOrFail();

        return view('pdfSlide.show', compact('pdfSlide'));
    }


    public   function generate_random_token($type, $size)
    {

        $token = '';

        $alphabet = range("A", "Z");
        $numeric = range("1", "100");

        switch ($type) {
            case 'numeric':
                shuffle($numeric);
                $res = array_chunk($numeric, $size, true);
                $token = substr(implode('', $res[0]), 0, $size);
                break;
            case 'alphabet':
                shuffle($alphabet);
                $res = array_chunk($alphabet, $size, true);
                $token = substr(implode('', $res[0]), 0, $size);
                break;
            case 'alpha_numeric':
                $alphabet_num = array_merge($alphabet, $numeric);
                shuffle($alphabet_num);
                $res = array_chunk($alphabet_num, $size, true);
                $token = substr(implode('', $res[0]), 0, $size);
                break;
            case 'token':
                $alphabet_num = array_merge($alphabet, $numeric);
                shuffle($alphabet_num);
                $res = array_chunk($alphabet_num, $size, true);
                $token = substr(implode('', $res[0]), 0, $size);
                break;

            default:

                break;
        }

        return $token;
    }


    public  function getUniqueValue($model, $column_name, $sizeArray, $slug = "", $status = false)
    {
        $generatedSlug = '';

        if (!empty($slug)) {
            $generatedSlug = Str::slug($slug);
        }

        $model_location = '';

        if (!empty($model_location)) {
            $model_location = "\\" . $model_location;
        }

        $modelpath = str_replace('"', "", 'App\Models' . $model_location . '\\' . $model);

        if ($status == true) {
            $generatedSlug .= '-' . $this->generate_random_token('alphabet', $sizeArray[0]) . $this->generate_random_token('alpha_numeric', $sizeArray[1]);
        }

        $available = $modelpath::where($column_name, $generatedSlug)->first();

        if (!empty($available)) {
            return getUniqueValue($model, $column_name, $sizeArray, $slug, true);
        } else {
            return $generatedSlug;
        }
    }


}
