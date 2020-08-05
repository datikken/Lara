<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class AdminDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();

        return view('admin.documents.display', ['documents' => $documents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = Input::file('file');
        $file_extension = Input::file('file')->getClientOriginalExtension();
        $file_name = Input::file('file')->getClientOriginalName();
        $file_path = Storage::url($file_name);

        Storage::putFileAs('/public/documents', $file, $file_name);

        $arr = array(
            'file_name' =>$file_name,
            'file_path' => $file_path,
            'file_extension' => $file_extension,
            'created_at' => \Carbon\Carbon::now()
        );

        $document = new Document($arr);
        $document->save();

        return redirect()->route('AdminDisplayDocuments');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $documents
     * @return \Illuminate\Http\Response
     */
    public function show(Document $documents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $documents
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $documents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $documents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $documents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $documents
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::find($id);
        $file_name = $document->file_name;

        Storage::disk('local')->delete('/public/documents/' . $file_name);
        $document->delete();

        return redirect()->route('AdminDisplayDocumentUpload');
    }
}
