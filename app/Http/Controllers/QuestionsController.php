<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Category;
use App\Choice;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class QuestionsController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'problem' => 'required|string|max:255',
            'category_id' => 'required',
            'choice1' => 'required|string|max:255',
            'choice2' => 'required|string|max:255',
            'choice3' => 'required|string|max:255',
            'choice4' => 'required|string|max:255',
        ]);
        
        $question = new Question;
        $question->problem = $request->problem;
        $question->user_id = Auth::user()->id;
        $question->category_id = $request->category_id;
        $question->save();

        $choice = new choice;
        $choice->choice = $request->choice1;
        $choice->is_answer = true;
        $choice->question_id = $question->id;
        $choice->save();

        $choice = new choice;
        $choice->choice = $request->choice2;
        $choice->is_answer = false;
        $choice->question_id = $question->id;
        $choice->save();

        $choice = new choice;
        $choice->choice = $request->choice3;
        $choice->is_answer = false;
        $choice->question_id = $question->id;
        $choice->save();

        $choice = new choice;
        $choice->choice = $request->choice4;
        $choice->is_answer = false;
        $choice->question_id = $question->id;
        $choice->save();

        return redirect('/')->with('flash_message', __('Registered.'));
    }

    public function new(){
        $categories = Category::all();
        return view('questions.new', ['categories' => $categories]);
    }

    public function index(){
        $questions = Question::all();
        return view('questions.index', ['questions' => $questions]);
    }

    public function destroy($id){
      if(!ctype_digit($id)){
        return redirect('/questions/new')->with('flash_message', __('Invalid operation was performed.'));
      }
      Question::find($id)->delete();
      return redirect('/mypage')->with('flash_message', __('Deleted.'));
    }  

    public function show($id){
        if(!ctype_digit($id)){
            return redirect('/')->with('flash_message', __('Invalid operation was performed.'));
        }

        $question = Question::find($id);
        $choice = Choice::where('question_id' , $question->id)->get();
        return view('questions.show', ['question' => $question, 'choice' => $choice]);
    }

    public function mypage(){
    
       $questions = Auth::user()->questions()->get();

       return view('questions.mypage', compact("questions"));
    }
}
