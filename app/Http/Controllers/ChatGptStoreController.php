<?php

namespace App\Http\Controllers;
use OpenAI\Laravel\Facades\OpenAI;
use App\Http\Requests\StoreChatRequest;
class ChatGptStoreController extends Controller
{
    public function __invoke(StoreChatRequest $request)
    {
        $messages = [];
        $messages[]=['role'=>'user','content'=>$request->input('promt')];
        try{
            $response = OpenAI::chat()->create([
                'model'=>"gpt-3.5-turbo",
                'messages'=>$messages,
            ]);
            $messages[]=["role"=> "assistant","content"=>$response->choices[0]->message->content];
            
        }catch(\Exception $e){
            $response = $e->getMessage();
            
            $messages[]=["role"=> "assistant","content"=>$response."\n"."Poor you have no money to buy the API"];
            dd($messages);
        }
       
    }
}
