<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\CardModel;
use App\Models\ListModel;

class ListController extends Controller
{


    public function lists()
    {

        return response()->json( ListModel::orderBy('page_order')->get() );
    }


    public function getList( $id )
    {

        return response()->json( ListModel::find( $id ) );
    }


    public function addList( Request $request )
    {

        $list = new ListModel();

        $list->name = $request->input( 'name' );
        $list->page_order = $request->input( 'page_order' );
        $list->save();

        return response()->json( $list );
    }


    public function updateList( Request $request )
    {

        $list = ListModel::find( $request->input('id') );

        $list->name = $request->input( 'name' );
        $list->page_order = $request->input( 'page_order' );
        $list->save();

        return response()->json( $list );
    }


    public function deleteList( Request $request )
    {

        ListModel::destroy( $request->input('id') );

        return response()->json( $request->all() );
    }


    public function deletelistWithcards( Request $request )
    {
        $list_id = $request->input('id');

        $collect = CardModel::where('list_id', $list_id )->get(['id']);

        CardModel::destroy( $collect->toArray() );

        ListModel::destroy( $list_id );

        return response()->json( $collect );
    }


    public function getListCards( $id )
    {
        
        return response()->json( CardModel::where('list_id', $id )->orderBy( 'list_order' )->get() );
    }








    public function cards(){

        return response()->json( CardModel::orderBy('list_id')->get() );
    }


}