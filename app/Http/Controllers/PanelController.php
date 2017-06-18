<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nav;

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
            $new[] = $menu->content;
            $new[] = $menu->title;
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
        
          $img = Image::make( $request->file('image'));
       
        $size = $img->filesize();

         if($size>1000000)
         {
            return "size is too big";
         }

        $input = $request->only(['title' , 'name','content']);

       $img->resize(800,300);

       


       $image_name = time()."-".$request->file('image')->getClientOriginalName();
       $img->save('images/'.$image_name);

       $input['imagepath'] = 'images/'.$image_name;

  

        nav::create($input);    

        return redirect('/');
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
         $input = $request->only(['title' , 'name','content']);
         $id->update($input);
        
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
