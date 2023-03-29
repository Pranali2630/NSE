<?php
    namespace Drupal\nse_csvimport\Controller;

    use Drupal\Core\Controller\ControllerBase;
    use Drupal\Core\Database\Database;
    use Drupal\Core\Url;
    use Drupal\Core\Routing;
    use Drupal\redirect\Entity\Redirect;
    use Symfony\Component\HttpFoundation\Session\Session;
    use Symfony\Component\HttpFoundation\Session\Storage\PhpBridgeSessionStorage;
    use Drupal\user\PrivateTempStoreFactory;

    class NseCalculateController extends ControllerBase
    {
        public function nseResult(string $type ='All' ) {
            //get form state values through session
            $session = new Session(new PhpBridgeSessionStorage());
            $session->start();

            // echo "hiii"; exit();    

            $from = $session->get('from');
            $to = $session->get('to');
    // echo $from; echo $to; exit();

            //get database connection
            $conn = \Drupal::database();
    
            //get the previous date of selected from date
    
            $selectquery = $conn->select("nse_client", "nc");
             
            $selectquery->fields("nc", ["Date"]);
            $or_group = $selectquery
                ->orConditionGroup()
                ->condition("nc.date", $from, "<");
            $selectquery->condition($or_group);
            $result = $selectquery->execute();
            $record = $result->fetchAll();
            // dump($record); exit();
            // print_r($from); exit();    
            
            foreach ($record as $row => $content) {
                $FromDate = $content->Date;
            }
    
            //if want all data
            if ($type == "All") {
                $query = \Drupal::database();
                  // $query->('nse_client', 'c');
                $select = $query->select('nse_client','c');
                $select->Join('nse_dii', 'd', 'c.Date = d.Date');
                $select->Join('nse_fii', 'f', 'd.Date = f.Date');
                $select->Join('nse_pro', 'p', 'd.Date = p.Date');
    
                $select->fields('c', array('date'=>'Date', 'c_FI_Long'=>'FI_Long', 'c_FI_Short'=>'FI_Short'))
                ->fields('d', array('d_FI_Long'=>'FI_Long', 'd_FI_Short'=>'FI_Short'))
                ->fields('f', array('f_FI_Long'=>'FI_Long', 'f_FI_Short'=>'FI_Short', 'f_OI_Call_Long'=>'OI_Call_Long', 'f_OI_Put_Long'=>'OL_Put_Long', 'f_OI_Call_Short'=>'OI_Call_Short', 'f_OI_Put_Short'=>'OI_Put_Short'))
                ->fields('p', array('p_FI_Long'=>'FI_Long', 'p_FI_Short'=>'FI_Short'))
                ->condition('c.date', array($FromDate,  $to), 'BETWEEN');
    
                $result = $select->execute();
                $records = $result->fetchAll();

                // echo "<pre>";
                // print_r($records);
                // exit();

                $i = 0;
                $clientDiff = [];
                $diiDiff = [];
                $fiiDiff = [];
                $netdiff = [];
                $netdiffshort = [];
                $proDiff = [];
                $date = [];
                $fii_call_long=[];
                $fii_put_short=[];
                $bullish=[];
                $fii_put_long=[];
                $fii_call_short=[];
                $bearish=[];
    
                foreach ($records as $row => $content) {
                    $previousValue = null;
                    $Date = $content->Date;
                    $FI_Long = $content->FI_Long;
                    $FI_Short = $content->FI_Short;
                    $d_FI_Long = $content->d_FI_Long;
                    $d_FI_Short = $content->d_FI_Short;
                    $f_FI_Long = $content->f_FI_Long;
                    $f_FI_Short = $content->f_FI_Short;
                    $f_OI_Call_Long = $content->OI_Call_Long;
                    $f_OL_Put_Long = $content->OL_Put_Long;
                    $f_OI_Call_Short = $content->OI_Call_Short;
                    $f_OI_Put_Short = $content->OI_Put_Short;
                    $p_FI_Long = $content->p_FI_Long;
                    $p_FI_Short = $content->p_FI_Short;
    
                    $previousValue[] = $records[$row - 1];
    
                    if ($i == 0) {
                        //it will get skip the previous of from date
                    } else {
                        foreach ($previousValue as $contentPrev) {
                            $DatePrev = $contentPrev->Date;
                            $FI_LongPrev = $contentPrev->FI_Long;
                            $FI_ShortPrev = $contentPrev->FI_Short;
                            $d_FI_LongPrev = $contentPrev->d_FI_Long;
                            $d_FI_ShortPrev = $contentPrev->d_FI_Short;
                            $f_FI_LongPrev = $contentPrev->f_FI_Long;
                            $f_FI_ShortPrev = $contentPrev->f_FI_Short;
                            $f_OI_Call_LongPrev = $contentPrev->OI_Call_Long;
                            $f_OL_Put_LongPrev = $contentPrev->OL_Put_Long;
                            $f_OI_Call_ShortPrev = $contentPrev->OI_Call_Short;
                            $f_OI_Put_ShortPrev = $contentPrev->OI_Put_Short;
                            $p_FI_LongPrev = $contentPrev->p_FI_Long;
                            $p_FI_ShortPrev = $contentPrev->p_FI_Short;

                            $ClientPrev =
                                ($FI_LongPrev / ($FI_LongPrev + $FI_ShortPrev)) *
                                100;
                                $DiiPrev =
                                ($d_FI_LongPrev / ($d_FI_LongPrev + $d_FI_ShortPrev)) *
                                100;
                                $FiiPrev =
                                ($f_FI_LongPrev / ($f_FI_LongPrev + $f_FI_ShortPrev)) *
                                100;
                                $ProPrev =
                                ($p_FI_LongPrev / ($p_FI_LongPrev + $p_FI_ShortPrev)) *
                                100;
                            $date[] = $content->Date;
    
                            // $netdiff = $FI_Long - $FI_LongPrev;
    
                            //Client LS = OI Long Client/ OI short client
                            $ClientLS = $FI_Long / $FI_Short;
                            //echo "<br>Client LS".$Date.":". $ClientLS ;
    
                            //Client% = OI Long Client/ (OI Long Client+ OI short Client) *100
                            $Client = ($FI_Long / ($FI_Long + $FI_Short)) * 100;
                            //echo "<br>Client%".$Date.":".$Client ;
    
                            //Client DIFF = today (Client%) – yesterday (Client%)
                            $clientdiff = $Client - $ClientPrev;
                            $clientDiff[] = round($clientdiff, 2);

                            //Dii Calculations
                            $DiiLS = $d_FI_Long / $d_FI_Short;
    
                            //Client% = OI Long Client/ (OI Long Client+ OI short Client) *100
                            $Dii = ($d_FI_Long / ($d_FI_Long + $d_FI_Short)) * 100;
    
                            //Client DIFF = today (Client%) – yesterday (Client%)
                            $diidiff = $Dii - $DiiPrev;
                            $diiDiff[] = round($diidiff, 2);

                            //FII Calculations
                            $FiiPrev =
                                ($f_FI_LongPrev / ($f_FI_LongPrev + $f_FI_ShortPrev)) * 100;
    //  $previousValue
                            $netdiff[] = $f_FI_Long - $f_FI_LongPrev;
                            $netdiffshort[] = $f_FI_Short - $f_FI_ShortPrev;
                            // $date[] = $content->Date;
                            // print_r($netdiffshort); 
    
                            //Client LS = OI Long Client/ OI short client
                            $FiiLS = $f_FI_Long / $f_FI_Short;
                            //echo "<br>Client LS".$Date.":". $ClientLS ;
    
                            //Client% = OI Long Client/ (OI Long Client+ OI short Client) *100
                            $Fii = ($f_FI_Long / ($f_FI_Long + $f_FI_Short)) * 100;
                            //echo "<br>Client%".$Date.":".$Client ;
    
                            //Client DIFF = today (Client%) – yesterday (Client%)
                            $fiidiff = $Fii - $FiiPrev;
                            $fiiDiff[] = round($fiidiff, 2);

                            //Pro Calculations
                            $ProPrev =
                            ($p_FI_LongPrev / ($p_FI_LongPrev + $p_FI_ShortPrev)) *
                            100;
                        // $date[] = $content->Date;

                        // echo "<br>Previoues Data ".$DatePrev;
                        // echo $DatePrev."<br>".$FI_LongPrev."<br>".$FI_ShortPrev;
                        // echo "<br>Cureent Data".$Date;
                        // echo $Date."<br>".$FI_Long."<br>".$FI_Short;

                        // $netdiff[] = $p_FI_Long - $p_FI_LongPrev;

                        //Client LS = OI Long Client/ OI short client
                        //echo "<br>__________".$Date."_______________";
                        $ProLS = $p_FI_Long / $p_FI_Short;
                        //echo "<br>Client LS".$Date.":". $ClientLS ;

                        //Client% = OI Long Client/ (OI Long Client+ OI short Client) *100
                        $Pro = ($p_FI_Long / ($p_FI_Long + $p_FI_Short)) * 100;
                        //echo "<br>Client%".$Date.":".$Client ;

                        //Client DIFF = today (Client%) – yesterday (Client%)
                        $prodiff = $Pro - $ProPrev;
                        $proDiff[] = round($prodiff, 2);


                        //FII Options Calculation
                        // echo "<br>prev".$f_OI_Call_LongPrev."<br>today".$f_OI_Call_Long;
                        $f_call_long=$f_OI_Call_Long-$f_OI_Call_LongPrev;
                        $f_put_short=$f_OI_Put_Short-$f_OI_Put_ShortPrev;
                        $fii_call_long[]=$f_call_long;
                        $fii_put_short[]=$f_put_short;
                        $bullish[] = $f_call_long+$f_put_short;

                        //echo "<br>prev".$f_OI_Call_ShortPrev."today".$f_OI_Call_Short;
                        $fi_call_short=$f_OI_Call_Short-$f_OI_Call_ShortPrev;
                        $fi_put_long=$f_OL_Put_Long-$f_OL_Put_LongPrev;
                        $fii_call_short[]=$fi_call_short;
                        $fii_put_long[]=$fi_put_long;
                        $bearish[] = $fi_call_short+$fi_put_long;
                       
                        


                // dump($records);die();
            }
        }
        $i++;
    } 
    //     echo "<pre>";
    // print_r($records);
    // echo "<pre>";
    // print_r($netdiff);
    // echo "<pre>";
    // print_r($fii_call_short);
    // echo "<pre>";
    // print_r($fii_put_long);
    // echo "<pre>";
    // print_r($bearish);
     
    // exit();
    
}elseif ($type == "Client") {
                //else if need only client data
    
                $selectquery = $conn->select("nse_client", "nc");
                $selectquery->fields("nc", [ "Client_id",
                    "Date",
                    "FI_Long",
                    "FI_Short",
                ]);
                $or_group = $selectquery
                    ->orConditionGroup()
                    ->condition("nc.date", [$FromDate, $to], "BETWEEN");
                $selectquery->condition($or_group);
    
                $result = $selectquery->execute();
                $records = $result->fetchAll();
                // dump($records); exit();
            // echo $records; exit();    
            $clientDiff=array();
    $date=array();
    foreach($record1 as  $row => $content){
        $previousValue = null;
        $Date = $content->Date;
        $FI_Long = $content->FI_Long;
        $FI_Short =$content->FI_Short;
        
          $previousValue[] = $record1[$row-1];
          if($i == 0)
          { 
            //echo "style='display:none;'";
          }
          else
          {
            foreach($previousValue as $contentPrev)
            {
              $DatePrev = $contentPrev->Date;
              $FI_LongPrev = $contentPrev->FI_Long;
              $FI_ShortPrev =$contentPrev->FI_Short;
              $ClientPrev = $FI_LongPrev /($FI_LongPrev + $FI_ShortPrev)*100;
              $date[]= $content->Date;
                          
              $netdiff = $FI_Long - $FI_LongPrev;

              //Client LS = OI Long Client/ OI short client
              $ClientLS = $FI_Long / $FI_Short;
              //echo "<br>Client LS".$Date.":". $ClientLS ;

              //Client% = OI Long Client/ (OI Long Client+ OI short Client) *100
              $Client = $FI_Long /($FI_Long + $FI_Short)*100;
              //echo "<br>Client%".$Date.":".$Client ;

              //Client DIFF = today (Client%) – yesterday (Client%)
              $clientdiff = $Client - $ClientPrev;
             
              //echo "<br>Difference is :".$clientDiff;
              $clientDiff[]=round($clientdiff,2);

              //echo "<br>________________________________________________________";
            }
        }
        $i++;
    }
}elseif ($type == "DII") {
                $selectqueryDii = $conn->select("nse_dii", "nd");
                $selectqueryDii->fields("nd", [
                    "DII_id",
                    "Date",
                    "FI_Long",
                    "FI_Short",
                ]);
                $or_groupDii = $selectqueryDii
                    ->orConditionGroup()
                    ->condition("nd.date", $from, "<")
                    ->condition("nd.date", [$from, $to], "BETWEEN");
                $selectqueryDii->condition($or_groupDii);
                $resultDii = $selectqueryDii->execute();
                $recordDii = $resultDii->fetchAll();
                $j = 0;
    
                $diiDiff = [];
                $date = [];
    
                foreach ($recordDii as $row => $content) {
                    $previousValue = null;
                    $Date = $content->Date;
                    $FI_Long = $content->FI_Long;
                    $FI_Short = $content->FI_Short;
    
                    $previousValue[] = $recordDii[$row - 1];
                    //dump($previousValue);
                    // echo "<pre>";
                    //print_r($previousValue);
    
                    if ($j == 0) {
                        //if for from value to avoid previous from data
                    } else {
                        foreach ($previousValue as $contentPrev) {
                            // echo "<pre>";
                            // print_r($contentPrev);
                            $DatePrev = $contentPrev->Date;
                            $FI_LongPrev = $contentPrev->FI_Long;
                            $FI_ShortPrev = $contentPrev->FI_Short;
                            $DiiPrev =
                                ($FI_LongPrev / ($FI_LongPrev + $FI_ShortPrev)) *
                                100;
                            $date[] = $content->Date;
    
                            //Client LS = OI Long Client/ OI short client
                            $DiiLS = $FI_Long / $FI_Short;
    
                            //Client% = OI Long Client/ (OI Long Client+ OI short Client) *100
                            $Dii = ($FI_Long / ($FI_Long + $FI_Short)) * 100;
    
                            //Client DIFF = today (Client%) – yesterday (Client%)
                            $diidiff = $Dii - $DiiPrev;
    
                            $diiDiff[] = round($diidiff, 2);
                        }
                    }
                    $j++;
                }
            } elseif ($type == "FII") {
                $selectqueryfii = $conn->select("nse_fii", "nf");
                $selectqueryfii->fields("nf", [
                    "FII_id",
                    "Date",
                    "FI_Long",
                    "FI_Short",
                ]);
                $or_groupfii = $selectqueryfii
                    ->orConditionGroup()
                    // ->condition('nf.date', $from, '<')
                    ->condition("nf.date", [$FromDate, $to], "BETWEEN");
                $selectqueryfii->condition($or_groupfii);
                $resultfii = $selectqueryfii->execute();
                $recordFii = $resultfii->fetchAll();
                // dump($recordFii);exit();
    
                $j = 0;
                $fiiDiff = [];
                $netdiff = [];
                $netdiffshort = [];


                $date = [];
    
                foreach ($recordFii as $row => $content) {
                    $previousValue = null;
                    $Date = $content->Date;
                    $FI_Long = $content->FI_Long;
                    $FI_Short = $content->FI_Short;
    
                    $previousValue[] = $recordFii[$row - 1];
    
                    if ($j == 0) {
                        //echo "style='display:none;'";
                    } else {
                        foreach ($previousValue as $contentPrev) {
                            $DatePrev = $contentPrev->Date;
                            $FI_LongPrev = $contentPrev->FI_Long;
                            $FI_ShortPrev = $contentPrev->FI_Short;
                            $FiiPrev =
                                ($FI_LongPrev / ($FI_LongPrev + $FI_ShortPrev)) *
                                100;
    
                            $netdiff[] = $FI_Long - $FI_LongPrev;
                            $netdiffshort[] = $FI_Short - $FI_ShortPrev;


                            $date[] = $content->Date;
    
                            //Client LS = OI Long Client/ OI short client
                            $FiiLS = $FI_Long / $FI_Short;
                            //echo "<br>Client LS".$Date.":". $ClientLS ;
    
                            //Client% = OI Long Client/ (OI Long Client+ OI short Client) *100
                            $Fii = ($FI_Long / ($FI_Long + $FI_Short)) * 100;
                            //echo "<br>Client%".$Date.":".$Client ;
    
                            //Client DIFF = today (Client%) – yesterday (Client%)
                            $fiidiff = $Fii - $FiiPrev;
                            $fiiDiff[] = round($fiidiff, 2);
                            // dump($fiiDiff);
                        }
                    }
                    $j++;
                }
            } elseif ($type == "Pro") {
                $selectquerypro = $conn->select("nse_pro", "np");
                $selectquerypro->fields("np", [
                    "Pro_id",
                    "Date",
                    "FI_Long",
                    "FI_Short",
                ]);
                $or_grouppro = $selectquerypro
                    ->orConditionGroup()
                    // ->condition('np.date', $from, '<')
                    ->condition("np.date", [$FromDate, $to], "BETWEEN");
                $selectquerypro->condition($or_grouppro);
                $resultpro = $selectquerypro->execute();
                $recordPro = $resultpro->fetchAll();
    
                $j = 0;
                $proDiff = [];
                foreach ($recordPro as $row => $content) {
                    $previousValue = null;
                    $Date = $content->Date;
                    $FI_Long = $content->FI_Long;
                    $FI_Short = $content->FI_Short;
    
                    $previousValue[] = $recordPro[$row - 1];
                    //dump($previousValue);
                    // echo "<pre>";
                    //print_r($previousValue);
    
                    if ($j == 0) {
                        //echo "style='display:none;'";
                    } else {
                        foreach ($previousValue as $contentPrev) {
                            // echo "<pre>";
                            // print_r($contentPrev);
                            $DatePrev = $contentPrev->Date;
                            $FI_LongPrev = $contentPrev->FI_Long;
                            $FI_ShortPrev = $contentPrev->FI_Short;
                            $ProPrev =
                                ($FI_LongPrev / ($FI_LongPrev + $FI_ShortPrev)) *
                                100;
                            $date[] = $content->Date;
    
                            // echo "<br>Previoues Data ".$DatePrev;
                            // echo $DatePrev."<br>".$FI_LongPrev."<br>".$FI_ShortPrev;
                            // echo "<br>Cureent Data".$Date;
                            // echo $Date."<br>".$FI_Long."<br>".$FI_Short;
    
                            // $netdiff[] = $FI_Long - $FI_LongPrev;
    
                            //Client LS = OI Long Client/ OI short client
                            //echo "<br>__________".$Date."_______________";
                            $ProLS = $FI_Long / $FI_Short;
                            //echo "<br>Client LS".$Date.":". $ClientLS ;
    
                            //Client% = OI Long Client/ (OI Long Client+ OI short Client) *100
                            $Pro = ($FI_Long / ($FI_Long + $FI_Short)) * 100;
                            //echo "<br>Client%".$Date.":".$Client ;
    
                            //Client DIFF = today (Client%) – yesterday (Client%)
                            $prodiff = $Pro - $ProPrev;
                            $proDiff[] = round($prodiff, 2);
                        }
                    }
                    $j++;
                }
            }else{
                echo "in else";
            }
    $rows=array();
    
    foreach ($date as $id => $key)
    
    {
    
    $date=date('d-m-y',strtotime($key));
    
    $netdiffN = $netdiff[$id];
    $netdiffshortN = $netdiffshort[$id];
    $fiiDiffN=$fiiDiff[$id];
    $diiDiffN = $diiDiff[$id];
    $clientDiffN = $clientDiff[$id];
    $proDiffN = $proDiff[$id];
    $fii_call_longN=$fii_call_long[$id];
    $fii_put_shortN=$fii_put_short[$id];
    $bullishN = $bullish[$id];
    $fii_call_shortN=$fii_call_short[$id];
    $fii_put_longN=$fii_put_long[$id];
    $bearishN = $bearish[$id];
    $rows[] = array(
        'date'=>$date, 
        'netdiff'=>$netdiffN,
        'netdiffshort' =>$netdiffshortN, 
        'fiiDiff'=>$fiiDiffN,
        'diiDiff'=>$diiDiffN, 
        'clientDiff'=>$clientDiffN, 
        'proDiff'=>$proDiffN,
        'fii_call_long'=>$fii_call_longN,
        'fii_put_short'=>$fii_put_shortN,
        'bullish'=>$bullishN,
        'fii_call_short'=>$fii_call_shortN,
        'fii_put_long'=>$fii_put_longN,
        'bearish'=>$bearishN
);
    }
    // echo "<pre>";
    // print_r($rows);
    //  exit();
    
     return [
        '#theme' => 'listpage',
        '#items' => $rows,
        '#attached' => [
            'library' => [
              'nse_csvimport/custom',
            ],
          ]
      ];
    }
    }
    