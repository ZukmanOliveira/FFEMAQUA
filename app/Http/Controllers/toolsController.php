<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\toolsModel;
use App\Models\tagsModel;
use App\Models\ToolsTags;
use App\Http\Controllers\Controller;
use App\Http\Requests\ToolsStoreRequest;
use TheSeer\Tokenizer\TokenCollection;

use function PHPUnit\Framework\isEmpty;

class toolsController extends Controller
{
  /**
   * Get List Tools
   * @OA\Get (
   *     path="/api/tools",
   *     tags={"Tools"},
   *     @OA\Response(
   *         response=200,
   *         description="success",
   *         @OA\JsonContent(
   *             )
   *         )
   *     )
   * 
   */
  public function index(Request $request, toolsModel $tools)
  {
    $tools = toolsModel::with('tags')->get();
      return response()->json($tools, 200);
  }
 /**
   * Create tool
   * @OA\Post (
   *     path="/api/tools",
   *     tags={"Tools"},
   *     @OA\RequestBody(
   *         @OA\MediaType(
   *             mediaType="application/json",
   *             @OA\Schema(
   *                 @OA\Property(
   *                      type="object",
   *                      @OA\Property(
   *                          property="title",
   *                          type="string"
   *                      ),
   *                      @OA\Property(
   *                          property="link",
   *                          type="string"
   *                      ),
   *                      @OA\Property(
   *                          property="description",
   *                          type="string"
   *                      ),
   *                       @OA\Property(
   *                          property="tags",
   *                          type= "string"
   *                      )
   *                 ),    
   *             )
   *         )
   *      ),
   *      @OA\Response(
   *          response=200,
   *          description="success",
   *      ),
   * )
   */

  public function store(Request $request, toolsModel $tools, ToolsStoreRequest $validation)
  {
    $validation->validated();

    $toolsTags = $tools->create([
      'title' => $request->title,
      'description' =>$request->description,
      'link' => $request->link,
    ]);

    $tags = new tagsModel();

    $tagsArray = implode(',',$request->tags);
    $tags = $tags->create(['tags'=>$tagsArray]);

    $toolsTags->tags()->attach($tags->id);

    $toolsTags = toolsModel::with('tags')->find($toolsTags->id);

    return response()->json($toolsTags, 200);
  }

  
  // FILTRO POR TAGS//
  /**
   * Get Detail Todo
   * @OA\Get (
   *     path="/api/tools/{tags}",
   *     tags={"Tools"},
   *     @OA\Parameter(
   *         in="path",
   *         name="tags",
   *         required=true,
   *         @OA\Schema(type="string")
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="success",
   *        
   *     )
   * )
   */
  public function show(Request $request, toolsModel $tools)
  { 
    $tags = request()->segment(count(request()->segments()));
  
    $toolsTags = toolsModel::whereHas('tags', function($query) use ($tags){
        $query->where('tags','LIKE','%'.$tags.'%');
    })->with('tags')
      ->get();

    if($toolsTags->isEmpty()){
      return response()->json($tags. ' Tag não existe', 404);
    }
      return response()->json($toolsTags,200);
  }

  /**
   * Delete tool
   * @OA\Delete (
   *     path="/api/tools/{id}",
   *     tags={"Tools"},
   *     @OA\Parameter(
   *         in="path",
   *         name="id",
   *         required=true,
   *         @OA\Schema(type="string")
   *     ),
   *     @OA\Response(
   *         response=200,
   *         description="success",
   *         @OA\JsonContent(
   *             @OA\Property(property="msg", type="string", example="delete success")
   *         )
   *     )
   * )
   */
  public function destroy($id)
  {
    if (toolsModel::where('id', $id)->exists()) {
      $tool = toolsModel::find($id);
      $tool->delete();

      return response()->json([
        "message" => "deletado com sucesso"
      ], 202);
    } else {
      return response()->json([
        "message" => "Ferramenta não existe"
      ], 404);
    }
  }
}
