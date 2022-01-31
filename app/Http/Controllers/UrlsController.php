<?php

namespace App\Http\Controllers;

use App\Repositories\UrlRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\Http\Requests\UrlRequest;

class UrlsController extends Controller
{

    protected $urlRepo;
    public function __construct(UrlRepository $urlRepo)
    {
        $this->middleware('auth');
        $this->urlRepo = $urlRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('urls.index');
    }

    public function list()
    {
        $urls = $this->urlRepo->listUrlsByUserId(Auth::id());

        return view('urls.list', compact('urls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UrlRequest $request)
    {

        $client = new Client();

        $data = $request->all();

        $call = $client->get($data['url']);

        $data['response'] = $call->getBody()->getContents();

        $data['status_code'] = $call->getStatusCode();
        
        $data['user_id'] = Auth::id();

        $url = $this->urlRepo->createUrl($data);

        return response()->json($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url = $this->urlRepo->findUrlById($id);

        return view('urls.show',compact('url'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->urlRepo->removeUrlById($id);

        return response()->json("Url Removida.");
    }
}
