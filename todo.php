<?php
class todo{
    public function varmi(){
        $dosyayolu = 'icerik.json';
        if (!file_exists($dosyayolu)){
            touch($dosyayolu);
        }else{
            return $dosyayolu;
        }
    }
    public function ekle($yapilacakIs){

        $veri = json_decode($this->oku());
        $dosya = $this->dosya("w");
        $veri[count($veri)] = $yapilacakIs;
        fwrite($dosya, json_encode($veri));

    }
    public function oku(){
        $dosya = $this->dosya("r");
        $oku = (fgets($dosya));
        return $oku;
    }

    public function dosya($deger){
        if ($this->varmi()){
            $dosyayolu = $this->varmi();
            $yol = fopen($dosyayolu,$deger);
            return $yol;
        }
    }

    public function sil($id){
        $oku = json_decode($this->oku());
        unset($oku[$id]);
        $dosya = $this->dosya("w");
        fwrite($dosya, json_encode($oku));

    }

    public function yonlendir($adres){
        return header("location:$adres");
    }
}