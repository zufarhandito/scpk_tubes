<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Baby;
 
 
class FuzzysController extends Controller
{  

    public function calculate($id)
    {
 
        $data = Baby::find($id);  
            $age    = $data->age;
            $gender = $data->gender;
            $height = $data->height;
            $weight = $data->weight;

 
        //fase1
        if($age <= 6){
            $fase1 = 1;
        }else if($age >= 6 && $age <= 12){
            $fase1 = (12 - $age) / 6;
        }else{
            $fase1 = 0;
        };
 

        //fase2
        if($age <= 6){
            $fase2= 0;
        }else if($age >= 6 && $age <= 12){
            $fase2= ($age-6 ) / 6;
        }elseif(12<=$age && $age<=24){
            $fase2= (24-$age)/12;
        }            

        //fase3
        if($age <= 12){
            $fase3= 0;
        }else if(12<=$age && $age <= 24){
            $fase3= ($age-12 ) / 12;
        }elseif(24<=$age && $age<=36){
            $fase3 =(36-$age)/12;
        };            
       
        //fase4
        if($age <= 24){
            $fase4= 0;
        }else if(24<=$age && $age <= 36){
            $fase4= ($age-24 ) / 12;
        }elseif(36<=$age && $age<=48){
            $fase4 =(48-$age)/12;
        };         
       

        //fase5
        if($age <= 36){
            $fase5 =0;
        }else if(36<=$age && $age <= 48){
            $fase5 =($age-36 ) / 12;
        }else{
            $fase5= 1;
        };            

 
        //beratRingan
        if($gender == 'Laki-Laki'){
            if($weight <= 7){
                $beratRingan= 1;
            }else if(7<=$weight && $weight <= 13){
                $beratRingan =(13-$weight ) / 6;
            }else{
                $beratRingan =0;
            }
        }else{
            if($weight <= 7){
                $beratRingan= 1;
            }else if(7<=$weight && $weight <= 13){
                $beratRingan= (13-$weight ) / 6;
            }else{
                $beratRingan= 0;
            }                
        }          
 

        //beratSedang
        if($gender == 'Laki-Laki'){
            if($weight <= 7 || $weight >=19){
                $beratSedang= 0;
            }else if(7<=$weight && $weight <= 13){
                $beratSedang =($weight-7 ) / 5;
            }elseif(13<=$weight && $weight <= 19){
                $beratSedang= (19-$weight)/6;
            }  
        }else{
            if($weight <= 7 || $weight >=19){
                $beratSedang =0;
            }else if(7<=$weight && $weight <= 13){
                $beratSedang= ($weight-7 ) / 5;
            }elseif(13<=$weight && $weight <= 19){
                $beratSedang =(19-$weight)/6;
            }                
        }        
        
        //beratBerat
        if($gender == 'Laki-Laki'){
            if($weight <= 13){
                $beratBerat =0;
            }else if(12<=$weight && $weight <= 19){
                $beratBerat= ($weight-13 ) / 6;
            }else{
                $beratBerat =1;
            }
        }else{
            if($weight <= 12){
                $beratBerat= 0;
            }else if(12<=$weight && $weight <= 18){
                $beratBerat =($weight-12 ) / 6;
            }else{
                $beratBerat =1;
            }              
        }  
        
        
       //$tinggiRendah
        if($gender == 'Laki-Laki'){
            if($height <= 49){
                $tinggiRendah= 1;
            }else if(49<=$height && $height <= 75){
                $tinggiRendah= (75- $height) / 26;
            }else{
                $tinggiRendah= 0;
            }
        }else{
            if($height <= 48){
                $tinggiRendah= 1;
            }else if(48<=$height && $height <= 74){
                $tinggiRendah= (74- $height) / 26;
            }else{
                $tinggiRendah =0;
            }              
        };         
    
        //tinggiSedang
        if($gender == 'Laki-Laki'){
            if($height <= 49 || $height >= 101 ){
                $tinggiSedang= 0;
            }else if(49<=$height && $height <= 75){
                $tinggiSedang =($height- 49) / 26;
            }elseif(75<=$height && $height <= 101){
                $tinggiSedang =(101-$height)/26;
            }
        }else{
            if($height <= 48 || $height >=100){
                $tinggiSedang= 0;
            }else if(48<=$height && $height <= 74){
                $tinggiSedang=($height-48 ) / 26;
            }elseif(74<=$height && $height <= 100){
                $tinggiSedang =(100-$height)/26;
            }          
        };          

            
        //tinggiTinggi
        if($gender == 'Laki-Laki'){
            if($height <= 75){
                $tinggiTinggi =0;
            }else if(75<=$height && $height <= 101){
                $tinggiTinggi= ($height-75 ) / 26;
            }else{
                $tinggiTinggi= 1;
            }
        }else{
            if($height <= 74){
                $tinggiTinggi= 1;
            }else if(74<=$height && $height <= 100){
                $tinggiTinggi= ($height-74 ) / 26;
            }else{
                $tinggiTinggi= 1;
            }              
        }          
       
        function giziBuruk($alfa){
            return 48-($alfa*5);
        }
 
        function giziKurang($alfa){
            return min(($alfa*5)+43, 53-($alfa*5));
        }
       
        function giziNormal($alfa){
            return min(($alfa*12)+48, 70-($alfa*17));
        }            
 
        function giziLebih($alfa){
            return min(53+($alfa*17), 83-($alfa*13));
        }
       
        function Obesitas($alfa){
            return 70+($alfa*13);
        }    
   
        //fase 1
        $alfa[0] =min($fase1, $beratRingan, $tinggiRendah);
        $z[0]=giziNormal($alfa[0]);
 
        $alfa[1]=min($fase1, $beratRingan, $tinggiSedang);
        $z[1]=giziNormal($alfa[1]);
 
        $alfa[2]=min($fase1, $beratRingan, $tinggiTinggi);
        $z[2]=giziKurang($alfa[2]);
 
        $alfa[3]=min($fase1, $beratSedang, $tinggiRendah);
        $z[3]=giziLebih($alfa[3]);
 
        $alfa[4]=min($fase1, $beratSedang, $tinggiSedang);
        $z[4]=giziLebih($alfa[4]);
 
        $alfa[5]=min($fase1, $beratSedang, $tinggiTinggi);
        $z[5]=giziLebih($alfa[5]);
 
        $alfa[6]=min($fase1, $beratBerat, $tinggiRendah);
        $z[6]=giziLebih($alfa[6]);
 
        $alfa[7]=min($fase1, $beratBerat, $tinggiSedang);
        $z[7]=giziLebih($alfa[7]);
 
        $alfa[8]=min($fase1, $beratBerat, $tinggiTinggi);
        $z[8]=obesitas($alfa[8]);
 
 
        //fase2
        $alfa[9]=min($fase2, $beratRingan, $tinggiRendah);
        $z[9]=giziKurang($alfa[9]);
 
        $alfa[10]=min($fase2, $beratRingan, $tinggiSedang);
        $z[10]=giziKurang($alfa[10]);
 
        $alfa[11]=min($fase2, $beratRingan, $tinggiTinggi);
        $z[11]=giziKurang($alfa[11]);
 
        $alfa[12]=min($fase2, $beratSedang, $tinggiRendah);
        $z[12]=giziNormal($alfa[12]);
 
        $alfa[13]=min($fase2, $beratSedang, $tinggiSedang);
        $z[13]=giziNormal($alfa[13]);
 
        $alfa[14]=min($fase2, $beratSedang, $tinggiTinggi);
        $z[14]=giziNormal($alfa[14]);
 
        $alfa[15]=min($fase2, $beratBerat, $tinggiRendah);
        $z[15]=giziLebih($alfa[15]);
 
        $alfa[16]=min($fase2, $beratBerat, $tinggiSedang);
        $z[16]=giziLebih($alfa[16]);
 
        $alfa[17]=min($fase2, $beratBerat, $tinggiTinggi);
        $z[17]=obesitas($alfa[17]);
 
       
        //fase3
        $alfa[18]=min($fase3, $beratRingan, $tinggiRendah);
        $z[18]=giziBuruk($alfa[18]);
 
        $alfa[19]=min($fase3, $beratRingan, $tinggiSedang);
        $z[19]=giziBuruk($alfa[19]);
 
        $alfa[20]=min($fase3, $beratRingan, $tinggiTinggi);
        $z[20]=giziBuruk($alfa[20]);
 
        $alfa[21]=min($fase3, $beratSedang, $tinggiRendah);
        $z[21]=giziNormal($alfa[21]);
 
        $alfa[22]=min($fase3, $beratSedang, $tinggiSedang);
        $z[22]=giziNormal($alfa[22]);
 
        $alfa[23]=min($fase3, $beratSedang, $tinggiTinggi);
        $z[23]=giziNormal($alfa[23]);
 
        $alfa[24]=min($fase3, $beratBerat, $tinggiRendah);
        $z[24]=giziLebih($alfa[24]);
 
        $alfa[25]=min($fase3, $beratBerat, $tinggiSedang);
        $z[25]=giziLebih($alfa[25]);
 
        $alfa[26]=min($fase3, $beratBerat, $tinggiTinggi);
        $z[26]=obesitas($alfa[26]);
       
 
       
       
        //fase4
        $alfa[27]=min($fase4, $beratRingan, $tinggiRendah);
        $z[27]=giziKurang($alfa[27]);
 
        $alfa[28]=min($fase4, $beratRingan, $tinggiSedang);
        $z[28]=giziKurang($alfa[28]);
 
        $alfa[29]=min($fase4, $beratRingan, $tinggiTinggi);
        $z[29]=giziKurang($alfa[29]);
 
        $alfa[30]=min($fase4, $beratSedang, $tinggiRendah);
        $z[30]=giziNormal($alfa[30]);
 
        $alfa[31]=min($fase4, $beratSedang, $tinggiSedang);
        $z[31]=giziNormal($alfa[31]);
 
        $alfa[32]=min($fase4, $beratSedang, $tinggiTinggi);
        $z[32]=giziNormal($alfa[32]);
 
        $alfa[33]=min($fase4, $beratBerat, $tinggiRendah);
        $z[33]=giziLebih($alfa[33]);
 
        $alfa[34]=min($fase4, $beratBerat, $tinggiSedang);
        $z[34]=giziLebih($alfa[34]);
 
        $alfa[35]=min($fase4, $beratBerat, $tinggiTinggi);
        $z[35]=giziNormal($alfa[35]);
 
 
 
        //fase5
        $alfa[36]=min($fase5, $beratRingan, $tinggiRendah);
        $z[36]=giziBuruk($alfa[36]);
 
        $alfa[37]=min($fase5, $beratRingan, $tinggiSedang);
        $z[37]=giziBuruk($alfa[37]);
 
        $alfa[38]=min($fase5, $beratRingan, $tinggiTinggi);
        $z[38]=giziBuruk($alfa[38]);
 
        $alfa[39]=min($fase5, $beratSedang, $tinggiRendah);
        $z[39]=giziKurang($alfa[39]);
 
        $alfa[40]=min($fase5, $beratSedang, $tinggiSedang);
        $z[40]=giziKurang($alfa[40]);
 
        $alfa[41]=min($fase5, $beratSedang, $tinggiTinggi);
        $z[41]=giziKurang($alfa[41]);
 
        $alfa[42]=min($fase5, $beratBerat, $tinggiRendah);
        $z[42]=giziLebih($alfa[42]);
 
        $alfa[43]=min($fase5, $beratBerat, $tinggiSedang);
        $z[43]=giziLebih($alfa[43]);
 
        $alfa[44]=min($fase5, $beratBerat, $tinggiTinggi);
        $z[44]=giziNormal($alfa[44]);


        // return dd($z);

        $temp1 = 0;
        $temp2 = 0;
        $hasil = 0;

        for($i=0; $i < 18; $i++){
            $temp1 = $temp1 + $alfa[$i] * $z[$i];
            $temp2 = $temp2 + $alfa[$i];
        }

        $hasil = $temp1 / $temp2;
        return $hasil;

            
    }
 
 
 
}