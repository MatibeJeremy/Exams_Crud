<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\exam;

class ExamController extends Controller
{
    /**
     * @var
     */
    protected $user;

    /**
     * TransactionController constructor.
     */
    public function __construct()
    {
        $this->user = auth()->user();

    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.index');
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
         $exam->question = $exam_input['amount'];
         $exam->option_1 = $exam_input['option_1'];
         $exam->option_2 = $exam_input['option_2'];
         $exam->option_3 = $exam_input['option_3'];
         $exam->option_4 = $exam_input['option_4'];
         $exam->category = $exam_input['category'];

         return response()->json([
            'data' => $exam,
            'message' => 'Successfully made exam.',
            'status' => 'Success'
        ], 201);
    }

    /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return Response
        */
        public function edit($id)
        {
            $exam = exam::where('id', '=', $id)->first();

            $$exam->update($request->all());

            return response()->json([
                'message'=>'Updated exam successfully.',
                'status'=>'success'
            ], 200);


        }

    /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return mixed
        */
    public function destroy($id){
        exam::destroy($id);

        return response()->json([
            'message'=>'Deleted exam successfully.',
            'status'=>'success'
        ], 200);
    }


}
