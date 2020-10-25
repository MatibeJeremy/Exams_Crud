<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\exam;
use Facade\FlareClient\Http\Response;
use App\Http\Resources\examResource;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{

    /**
     * ExamController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exam = exam::all();
        $exams = ['exams' => $exam];
        return view('layouts.index', $exams );
    }

    /***
     * List all Exams with Logical Category
     * @return Response
     */
    public function filterL(){
        $exams = exam::where('category', 'logical')->get();

        $data = array($exams);

        return view('layouts.filter', ['exams'=>$exams]);
    }

    /***
     * List all Exams with Technical Category
     * @return Response
     */
    public function filterT(){
        $exams = exam::where('category', 'technical')->get();

        $data = array($exams);

        return view('layouts.technical', ['exams'=>$exams]);
    }

    /**
     * Used when you want to show a single resource
     * @return mixed
     */
    public function show($id){
        $exam = exam::where('id', $id)->get();

        return response()->json([
            'data'=> $exam,
            'message'=>'Loaded request successfully.',
            'status'=>'success'
        ], 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request){
        $exam_input = $request->all();
        $validator = Validator::make($exam_input, [
            'question' => 'required',
            'option_1' => 'required',
            'option_2' => 'required',
            'option_3' => 'required',
            'option_4' => 'required',
            'category' => 'required',
        ]);

        //check if request is valid
        if ($validator->fails()){
            return response()->json([
                'error' => [
                    'message' => $validator->messages()->first(),
                    'status' => 'Fail'
                ]
            ], 422);
        }

         // create exam
         $exam = new exam();
         $exam->question = $exam_input['question'];
         $exam->option_1 = $exam_input['option_1'];
         $exam->option_2 = $exam_input['option_2'];
         $exam->option_3 = $exam_input['option_3'];
         $exam->option_4 = $exam_input['option_4'];
         $exam->category = $exam_input['category'];

         $exam->save();

         return view('home');
    }

    /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return Response
        */
        public function edit(Request $request, Exam $exam)
        {
            request()->validate([
                'question' => 'required',
                'option_1' => 'required',
                'option_2' => 'required',
                'option_3' => 'required',
                'option_4' => 'required',
                'category' => 'required',
            ]);

            $exam->update($request->all());


            return ('home');
        }


    /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return mixed
        */
    public function destroy($id){
        exam::destroy($id);

        return view('home');
    }


}
