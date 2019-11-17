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

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function readId(Request $request, int $id): JsonResponse
    {
        $arrParam = $request->all();
        $arrParam['id'] = $id;
        return $this->getReadJsonResponse($arrParam);
    }

    /**
     * @param array $arrParam
     * @return JsonResponse
     */
    public function getReadJsonResponse(array $arrParam): JsonResponse
    {
        /**
         * @var Note $note
         */
        $note = new Note();// Or; $note = app()->make(Note::class);
        $note = $note::select('notes.id AS note_id','notes.*','users.*');
        foreach ($arrParam as $property => $value) {
            if (is_numeric($value)) {
                $note = $note->where('notes.' . $property, '=', $value);
            } else {
                $note = $note->where('notes.' . $property, 'LIKE', "%$value%");
            }
        }
        $note = $note->join('users', 'notes.user_id', '=', 'users.id');
        try {
            return \Response::json($note->paginate(10), 200);
        } catch (\Exception $e) {
            return response()->json(['error' => '404 Bad Request'], 400);
        }
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(Request $request, int $id): JsonResponse
    {
        /**
         * @var Note $note
         */
        $noteObj = app()->make(Note::class);
        $cNote = $noteObj::whereId($id)->get();
        if (count($cNote) == 0) {
            return response()->json('404 Not Found', 404);
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

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function delete(Request $request, int $id): JsonResponse
    {
        /**
         * @var Note $noteObj
         */
        $noteObj = app()->make(Note::class);//$noteObj = new Note();
        $cNote = $noteObj::whereId($id)->get();
        if (count($cNote) == 0) {
            return response()->json('404 Not Found', 404);
        }
        $note = $cNote[0];
        try {
            $note->delete();
            return response()->json($note, 200);
        } catch (\Exception $e) {
            return response()->json('400 Bad Request: ' . $e->getMessage(), 400);
        }
    }
}
