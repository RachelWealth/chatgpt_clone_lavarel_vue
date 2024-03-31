<?php

namespace App\Http\Controllers;

use OpenAI\Laravel\Facades\OpenAI;
use App\Http\Requests\StoreChatRequest;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class ChatGptStoreController extends Controller
{
    public function __invoke(StoreChatRequest $request, string $id = null)
    {
        $messages = [];
        if ($id) {
            $chat = Chat::findOrFail($id);
            $messages = $chat->context;
        } else {
            $chat = new Chat();
            $chat->user_id = Auth::id();
            $chat->context = [];
            $chat->save();
        }
        $messages[] = ['role' => 'user', 'content' => $request->input('promt')];
        try {
            $response = OpenAI::chat()->create([
                'model' => "gpt-3.5-turbo",
                'messages' => $messages,
            ]);
            $messages[] = ["role" => "assistant", "content" => $response->choices[0]->message->content];
            return $messages;
        } catch (\Exception $e) {
            $response = $e->getMessage();
            $messages[] = ["role" => "assistant", "content" => $response . "\n" . "Poor you have no money to buy the API"];
        } finally {
            try {
                Chat::updateOrCreate(
                    [
                        'id' => $id,
                        'user_id' => Auth::id()
                    ],
                    ['context' => $messages]
                );
            } catch (\Exception $e) {
                echo $e->getMessage();
            } finally {
                return redirect()->route('chat.show', [$chat->id]);
            }
        }
    }
}
