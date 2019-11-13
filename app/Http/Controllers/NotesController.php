<?php

namespace App\Http\Controllers;

use App\Note;

use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse as JsonResponse;

class NotesController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function read(Request $request): JsonResponse{
        return $this->getReadJsonResponse($request->all());
    }

    public function getReadJsonResponse(array $arrParam): JsonResponse{
        /**
         * @var Note $note
         */
        $note = app()->make(Note::class);
        foreach($arrParam as $property => $value){
            if(is_numeric($value)){
                $note = $note->where('notes.'.$property , '=' , $value);
            }else{
                $note = $note->where('notes.'.$property , 'LIKE' ,"%$value%" );
            }
        }
        $note = $note->join('users','notes.user_id','=','users.user_id');
        return \Response::json($note->paginate(10),200);
    }
}
