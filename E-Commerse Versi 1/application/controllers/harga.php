<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Harga extends CI_Controller {

    var $template = 'template/index';

    function __construct() {
        parent::__construct();
        $this->load->library('REST_Ongkir');
    }

   
    function get_cost()
    {
        
         
         $rest = new REST_Ongkir(array(
         'server' => 'http://rajaongkir.com/api/'
         ));
         
        //ganti API-Key dibawah ini sesuai dengan API Key yang anda peroleh setalah mendaftar di ongkir.info
         $result = $rest->post('cost/find', array(
         'from' => $this->input->post('code'),
         'to' => $this->input->post('code'),
         'weight' => $this->input->post('code').'000',
         'courier' => 'jne',
        'API-Key' =>'c79ca73f58a1f3f926ff2681fd52a7b9'
         ));
     
     try
     {
     $status = $result['status'];
     
         // Handling the data
         if ($status->code == 0)
         {
         $prices = $result['price'];
         $city = $result['city'];


         $data=array(
                        'origin' => $city->origin,
                        '' => 'Giestore | Produk'
                );
         
         echo 'Ongkos kirim dari ' . $city->origin . ' ke ' . $city->destination . '<br /><br />';
         
         foreach ($prices->item as $item)
         {
         echo 'Layanan: ' . $item->service . ', dengan harga : Rp. ' . $item->value . ',- <br />';
         }
         }
         else
         {
         echo 'Tidak ditemukan jalur pengiriman dari surabaya ke jakarta';
         }
         
     }
     catch (Exception $e)
     {
     echo 'Processing error.';
     }
    }


}
