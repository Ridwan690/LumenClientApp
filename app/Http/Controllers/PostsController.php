<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function getRequestJson(Request $request)
    {
        $url = 'http://localhost:8000/public/posts';
        $headers = ['Accept: application/json'];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        curl_close($ch);

        $response = json_decode($result, true);

        return view('posts/getRequestJson', ['results' => $response]);
    }

    public function postRequestJson(Request $request)
    {

        $url = 'http://localhost:8000/public/posts';
        $headers = ['Accept: application/json', 'Content-Type: application/json'];
        // $data = array(
        //     'title' => 'Ini adalah Title',
        //     'content' => 'Ini adalah Content',
        //     'status' => 'published',
        //     'user_id' => "1"
        // );

        // $dataJSON = json_encode($data);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, $dataJSON);

        $result = curl_exec($ch);

        curl_close($ch);

        $response = json_decode($result, true);
        //dd($response);
        
        return view('posts/postRequestJson', ['result' => $response]);
    }
}
