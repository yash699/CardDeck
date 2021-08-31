<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Card {

   private $suits = array('heart','diamond','clubs','spade');
   private $ranks =array('A',2, 3, 4, 5, 6, 7, 8, 9, 10, 'J','Q', 'K');

   public function shuffle_card()
   {

      $card_array=array();
     
      foreach($this->suits as $s_key=>$s_value)
      {
         foreach($this->ranks as $r_key=>$r_value)
         {  
            $data=array('card_title'=>$s_value,'card_value'=>$r_value,'card_no'=>$r_key + 1);
            array_push($card_array, $data);
         }
      }

      return $card_array[array_rand($card_array,1)];

   }
}
?>