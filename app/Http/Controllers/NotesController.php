<?php

namespace App\Http\Controllers;

use App\Note;

use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse as JsonResponse;

class NotesController extends Controller
{

    public function create(Request $request): JsonResponse
    {
        /**
         * @var Note $note
         */
        $note = app()->make(Note::class);
        foreach ($request->all() as $property => $value) {
            $note->$property = $value;
        }
        try {
            $note->save();
            return response()->json($note, 200)->header('function', __FUNCTION__);
        } catch (\Exception $e) {

            echo $e->getMessage();//TODO: remove

            return response()->json(['error' => '404 Bad Request'], 400);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function read(Request $request): JsonResponse
    {
        return $this->getReadJsonResponse($request->all());
    }

    public function readId(Request $request, int $id): JsonResponse
    {
        $arrParam = $request->all();
        $arrParam['id'] = $id;
        return $this->getReadJsonResponse($arrParam);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        /**
         * @var Note $note
         */
        $noteObj = app()->make(Note::class);
        //$cNote = $noteObj::where('note_id','=',$id)->get();
        $cNote = $noteObj::whereId($id)->get();
        if (count($cNote) == 0) {
            return response()->json('Not Found', 404);
        }
        $note = $cNote[0];
        foreach ($request->all() as $property => $value) {
            if ($property != 'id') {
                $note->$property = $value;
            }
        }
        try {
            $note->save();
            return response()->json($note, 200)->header('function', __FUNCTION__);
        } catch (\Exception $e) {
            return response()->json(['error' => '404 Bad Request'], 400);
        }
    }

    public function getReadJsonResponse(array $arrParam): JsonResponse
    {
        /**
         * @var Note $note
         */
        $note = app()->make(Note::class);
        $note = $note::select('notes.id AS note_id','notes.*','users.*');

        foreach ($arrParam as $property => $value) {
            if (is_numeric($value)) {
                $note = $note->where('notes.' . $property, '=', $value);
            } else {
                $note = $note->where('notes.' . $property, 'LIKE', "%$value%");
            }
        }
        //$note = $note->join('users', 'notes.user_id', '=', 'users.user_id');
        $note = $note->join('users', 'notes.user_id', '=', 'users.id');
        try {
            return \Response::json($note->paginate(10), 200);
        } catch (\Exception $e) {
            return response()->json(['error' => '404 Bad Request'], 400);
        }
    }

    public function delete(Request $request, int $id): JsonResponse
    {
        /**
         * @var Note $note
         */
        $noteObj = app()->make(Note::class);
        //$cNote = $noteObj::where('note_id','=',$id)->get();
        $cNote = $noteObj::whereId($id)->get();
        if (count($cNote) == 0) {
            return response()->json('Not Found', 404);
        }
        $note = $cNote[0];
        try {
            $note->delete();
            return response()->json($note, 200);
        } catch (\Exception $e) {
            return response()->json('Bad Request: ' . $e->getMessage(), 400);
        }
    }
}
