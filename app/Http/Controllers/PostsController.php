<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleXMLElement;


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

    public function getRequestXml(Request $request)
    {
        $url = 'http://localhost:8000/public/posts';
        $headers = ['Accept: application/xml'];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        curl_close($ch);

        $parsedXml = new SimpleXMLElement($result);

        $response = [];

        foreach ($parsedXml->children() as $item) {
            array_push($response, array(
                'id' => $item->id,
                'user_id' => $item->user_id,
                'title' => $item->title,
                'status' => $item->status,
                'content' => $item->content,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at
            ));
        }

        return view('posts/getRequestXml', ['results' => $response]);
    }

    public function showRequestXmlById($id)
    {
        $url = 'http://localhost:8000/public/posts/' . $id;
        $headers = ['Accept: application/xml'];

        $ch = curl_init();

        $curlOptions = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers
        ];

        curl_setopt_array($ch, $curlOptions);

        $result = curl_exec($ch);

        curl_close($ch);

        $parsedXml = new \SimpleXMLElement($result);

        $response = [
            'id' => (int) $parsedXml->id,
            'user_id' => (int) $parsedXml->user_id,
            'status' => (string) $parsedXml->status,
            'title' => (string) $parsedXml->title,
            'content' => (string) $parsedXml->content,
            'created_at' => (string) $parsedXml->created_at,
            'updated_at' => (string) $parsedXml->updated_at,
        ];

        return view('posts/showRequestXmlById', ['results' => $response]);
    }



    // public function postRequestXml(Request $request)
    // {
    //     $url = 'http://localhost:8000/public/posts';
    //     $headers = ['Accept: application/xml', 'Content-Type: application/xml'];
    //     $data = array(
    //         'title' => 'Ini adalah Title',
    //         'content' => 'Ini adalah Content',
    //         'status' => 'published',
    //         'user_id' => "1"
    //     );

    //     $dataXML = new SimpleXMLElement('<post/>');
    //     array_walk_recursive($data, array($dataXML, 'addChild'));
    //     $dataXML = $dataXML->asXML();

    //     $ch = curl_init();

    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $dataXML);

    //     $result = curl_exec($ch);

    //     curl_close($ch);

    //     $parsedXml = new SimpleXMLElement($result);

    //     $response = [];

    //     foreach ($parsedXml->children() as $item) {
    //         array_push($response, array(
    //             'id' => $item->id,
    //             'user_id' => $item->user_id,
    //             'title' => $item->title,
    //             'status' => $item->status,
    //             'content' => $item->content,
    //             'created_at' => $item->created_at,
    //             'updated_at' => $item->updated_at
    //         ));
    //     }

    //     return view('posts/postRequestXml', ['result' => $response]);
    // }
}
