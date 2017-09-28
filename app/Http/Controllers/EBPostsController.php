<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class EBPostsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /ebposts
	 *
	 * @return Response
	 */
	public function index()
	{
		// all posts seen to the user
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /ebposts/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return view ('user.post-form');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /ebposts
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /ebposts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /ebposts/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /ebposts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /ebposts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}