<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use OpenAI\Laravel\Facades\OpenAI;

class OpenaiController extends Controller
{
    public function openaiget() {
        return view('main');
    }
    public function openai() {
        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => '당신은 세계 최고의 의사입니다.
                나이와 성별, 부위, 증상을 알면 가능성이 가장 높은 예상 질병을 알 수 있습니다.
                먼저 예상 질병을 알려주고 해당 예상 질병에 맞는 증상을 알려주세요.
                마지막으로는 예상 질병에 맞는 병원을 추천해주는데 병원은 `을 씌워서 알려주세요.
                
                출력 문장은 예를 들어
                해당 부위와 증상으로 예상할 수 있는 질병은 "예상 질병"입니다.
                "예상 질병"은 "증상"입니다.
                진료 과목: ``
                
                이런 식으로 간략하게 알려주세요.
                증상은 한 줄정도 설명해주세요.'],
                ['role' => 'user', 'content' => '36세 여성의 발목에서 뻐근함과 통증이 있습니다.'],
            ],
            'temperature' => 1,
        ]);

        $response = $result->choices[0]->message->content;
    
        dd($response);

        return view('main');
    }
}
