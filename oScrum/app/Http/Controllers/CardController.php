<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\CardModel;


class CardController extends Controller
{


    public function cards(){

        return response()->json( CardModel::orderBy('list_order')->get() );
    }


    public function getCard( $id )
    {

        return response()->json( CardModel::find( $id ) );
    }


    public function addCard( Request $request )
    {

        $card = new CardModel();

        $card->title = $request->input( 'title' );
        $card->list_id = $request->input( 'list_id' );
        $card->list_order = $request->input( 'list_order' );
        $card->save();

        return response()->json( $card );
    }


    public function updateCard( Request $request )
    {

        $card = CardModel::find( $request->input('id') );

        $card->title = $request->input( 'title' );
        $card->list_id = $request->input( 'list_id' );
        $card->list_order = $request->input( 'list_order' );
        $card->save();

        return response()->json( $card );
    }


    public function deleteCard( Request $request )
    {

            CardModel::destroy($request->input('id'));
            
            return response()->json($request->all());;
    }


    public function getCardsLabels( $id )
    {
        
        //return response()->json( CardHasLabel::where('card_id', $id )->get() );
        return response()->json( [ 'Get labels from card' => 'id = '.$id.' ...to do']);
    }











}