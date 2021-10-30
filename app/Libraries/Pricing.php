<?php

namespace App\Libraries;

class Pricing
{
    public function priceCalculator($clientPlace, $recepientPlace){

        switch(strtolower($clientPlace)){
            case 'baao'://pickup point pricing to recepients
                switch(strtolower($recepientPlace)){
                    case 'bula':
                        return 40;
                        break;
                    case 'iriga city':
                    case 'iriga':
                        return 25;
                        break;
                    case 'nabua':
                        return 30;
                        break;
                    case 'bato':
                        return 35;                                    
                    case 'balatan':
                        return 55;
                        break;
                    case 'buhi':
                        return 45;
                        break; 
                    default:
                        return 15;
                }
                break;
            case 'bula'://pickup point pricing to recepients
                switch(strtolower($recepientPlace)){
                    case 'baao':
                        return 40;
                        break;
                    case 'iriga city':
                    case 'iriga':
                        return 55;
                        break;
                    case 'nabua':
                        return 35;
                        break;
                    case 'bato':
                        return 45;                                    
                    case 'balatan':
                        return 45;
                        break;
                    case 'buhi':
                        return 65;
                        break; 
                    default:
                        return 15;
                }
                break;
            case 'iriga'://pickup point pricing to recepients
                switch(strtolower($recepientPlace)){
                    case 'baao':
                        return 25;
                        break;
                    case 'bula':
                        return 55;
                        break;
                    case 'nabua':
                        return 25;
                        break;
                    case 'bato':
                        return 30;                                    
                    case 'balatan':
                        return 45;
                        break;
                    case 'buhi':
                        return 35;
                        break; 
                    default:
                        return 15;
                }
                break;
            case 'nabua'://pickup point pricing to recepients
                switch(strtolower($recepientPlace)){
                    case 'baao':
                        return 25;
                        break;
                    case 'bula':
                        return 35;
                        break;
                    case 'iriga city':
                    case 'iriga':
                        return 25;
                        break;
                    case 'bato':
                        return 25;                                    
                    case 'balatan':
                        return 40;
                        break;
                    case 'buhi':
                        return 40;
                        break; 
                    default:
                        return 15;
                }
                break;            
            case 'bato'://pickup point pricing to recepients
                switch(strtolower($recepientPlace)){
                    case 'baao':
                        return 35;
                        break;
                    case 'bula':
                        return 45;
                        break;
                    case 'iriga city':
                    case 'iriga':
                        return 30;
                        break;
                    case 'nabua':
                        return 25;                                    
                    case 'balatan':
                        return 45;
                        break;
                    case 'buhi':
                        return 55;
                        break; 
                    default:
                        return 15;
                }
                break;            
            case 'balatan'://pickup point pricing to recepients
                switch(strtolower($recepientPlace)){
                    case 'baao':
                        return 55;
                        break;
                    case 'bula':
                        return 45;
                        break;
                    case 'iriga city':
                    case 'iriga':
                        return 45;
                        break;
                    case 'nabua':
                        return 40;                                    
                    case 'bato':
                        return 45;
                        break;
                    case 'buhi':
                        return 70;
                        break; 
                    default:
                        return 15;
                }
                break;            
            case 'buhi'://pickup point pricing to recepients
                switch(strtolower($recepientPlace)){
                    case 'baao':
                        return 45;
                        break;
                    case 'bula':
                        return 60;
                        break;
                    case 'iriga city':
                    case 'iriga':
                        return 35;
                        break;
                    case 'nabua':
                        return 40;                                    
                    case 'bato':
                        return 55;
                        break;
                    case 'balatan':
                        return 70;
                        break; 
                    default:
                        return 15;
                }
                break;            
        }
             
    }

}