<?php namespace App\Http\Controllers;

use App\Models\EBPosts;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Ramsey\Uuid\Uuid;

class EBPostsController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /ebposts
     *
     * @return Response
     */
    public function index()
    {
        $config['list'] = EBPosts::get()->toArray();
        $config['show'] = 'app.posts.show';
        $config['edit'] = 'app.posts.edit';
        $config['delete'] = 'app.posts.destroy';

        return view('home', $config);
    }

    /**
     * Show the form for creating a new resource.
     * GET /ebposts/create
     *
     * @return Response
     */
    public function create()
    {
        return view('user.post-form');
    }

    /**
     * Store a newly created resource in storage.
     * POST /ebposts
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = Input::file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //image resizer before move
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $filename);
        }

        EBPosts::create([
            'id' => Uuid::uuid4(),
            'user_id' => Auth::user()->id,
            'post_title' => $request->post_title,
            'post_url' => $request->post_url,
            'post_text' => $request->post_text,
            'image' => $filename,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     * GET /ebposts/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $data = EBPosts::find($id)->toArray();

        return view('post', $data);
    }

    /**
     * Show the form for editing the specified resource.
     * GET /ebposts/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $config = EBPosts::find($id);

        return view('user.post-form', $config);
    }

    /**
     * Update the specified resource in storage.
     * PUT /ebposts/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $data = request()->all();

        $config = EBPosts::find($id);

        $config->update($data);

        return redirect()->route('app.posts.index');

/*        $config->update([
            'post_title' => $data['post_title'],
            'post_text' => $data['post_text'],
            'image' => $data['image']

        ]);*/
    }


    /**
     * Remove the specified resource from storage.
     * DELETE /ebposts/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        EBPosts::destroy($id);

//        return json_encode(["success" => true, "id" => $id]);
        return redirect()->route('app.posts.index');
    }

}