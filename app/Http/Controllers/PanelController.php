<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nav;
use App\post;
use Intervention\Image\ImageManagerStatic as Image; 

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = nav::all();
        $data = array( );



        foreach ( $menus as $menu)
        {
            unset($new);
            $new[] = $menu->id;
            $new[] = $menu->post->content;
            $new[] = $menu->post->title;
            $new[] = $menu->name;
            $data[]=$new;
        }
          



         return view('layouts.adminPanel',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
   {        


    }

      public function delete(nav $id,request $request)
    {        

            
        $id->delete();
        $id->post->delete();
        return redirect('/giris/admin');
    


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




        $this->validate(request(), [

                    'title' => 'required',
                    'content' => 'required',
                    'image' => 'required',
                    'name' => 'required | min:2'

            ]);
        
          $img = Image::make( $request->file('image'));
       
        $size = $img->filesize();

         if($size>1000000)
         {
            return "size is too big";
         }

        $post = $request->only(['title' ,'content']);
        $menuname= $request->only('name');

       $img->resize(800,300);

       


       $image_name = time()."-".$request->file('image')->getClientOriginalName();
       $img->save('images/'.$image_name);

       $post['imagepath'] = 'images/'.$image_name;

       
         $newnav  = new nav;
         $newnav->name = $menuname['name'];
         $newnav->save();


         $newnav->post()->create( $post );


          // $post['nav_id']=$newnav->id;

          // $newpost = new post($post);
          // $newpost->save();


        return back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,nav $id)
    {
         $post = $request->only(['title','content']);
         $menuname = $request->only(['name']);     
         $id->update($menuname);

         $updatePost = post::where('nav_id','=',$id->id)->get()->first();
         $updatePost->update($post);
        


        return redirect('/');
         }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
