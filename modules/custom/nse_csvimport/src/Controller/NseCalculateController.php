<?php
namespace Drupal\nse_csvimport\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\PhpBridgeSessionStorage;
use Symfony\Component\HttpFoundation\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class NseCalculateController extends ControllerBase
{
    public function nseResult(string $type = 'All')
    {
        //get form state values through session
        $session = new Session(new PhpBridgeSessionStorage());
        $session->start();

        // echo "hiii"; exit();

        $from = $session->get('from');
        $to = $session->get('to');
        //echo $from; echo $to."<br>";

        //get database connection
        $conn = \Drupal::database();

        //get the previous date of selected from date

        $selectquery = $conn->select("nse_client", "nc");
        $selectquery->fields("nc", ["Date"]);
        $or_group = $selectquery
            ->orConditionGroup()
            ->condition("nc.Date", $from, "<");
        $selectquery->condition($or_group);
        $result = $selectquery->execute();
        $record = $result->fetchAll();

        foreach ($record as $row => $content) {
            $FromDate = $content->Date;
        }
       // echo  $FromDate;exit();
        


        //if want all data
        if ($type == "All") {
        
            $query = \Drupal::database();
            // $query->('nse_client', 'c');
            $select = $query->select('nse_client', 'c');
            $select->Join('nse_dii', 'd', 'c.Date = d.Date');
            $select->Join('nse_fii', 'f', 'd.Date = f.Date');
            $select->Join('nse_pro', 'p', 'd.Date = p.Date');

            $select->fields('c', array('date' => 'Date', 'c_FI_Long' => 'FI_Long', 'c_FI_Short' => 'FI_Short', 'c_OI_Call_Long' => 'OI_Call_Long', 'c_OI_Put_Long' => 'OL_Put_Long', 'c_OI_Call_Short' => 'OI_Call_Short', 'c_OI_Put_Short' => 'OI_Put_Short'))
                ->fields('d', array('d_FI_Long' => 'FI_Long', 'd_FI_Short' => 'FI_Short'))
                ->fields('f', array('f_FI_Long' => 'FI_Long', 'f_FI_Short' => 'FI_Short', 'f_OI_Call_Long' => 'OI_Call_Long', 'f_OI_Put_Long' => 'OL_Put_Long', 'f_OI_Call_Short' => 'OI_Call_Short', 'f_OI_Put_Short' => 'OI_Put_Short'))
                ->fields('p', array('p_FI_Long' => 'FI_Long', 'p_FI_Short' => 'FI_Short', 'p_OI_Call_Long' => 'OI_Call_Long', 'p_OI_Put_Long' => 'OL_Put_Long', 'p_OI_Call_Short' => 'OI_Call_Short', 'p_OI_Put_Short' => 'OI_Put_Short'))
                ->condition('c.Date', array($FromDate, $to), 'BETWEEN');

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
            $fii_call_long = [];
            $fii_put_short = [];
            $fiibullish = [];
            $fii_put_long = [];
            $fii_call_short = [];
            $fiibearish = [];

            //variables for client option
            $client_call_long = [];
            $client_put_short = [];
            $clientbullish = [];
            $client_put_long = [];
            $client_call_short = [];
            $clientbearish = [];

            foreach ($records as $row => $content) {
                $previousValue = null;
                $Date = $content->Date;
                $FI_Long = $content->FI_Long;
                $FI_Short = $content->FI_Short;
                $c_OI_Call_Long = $content->OI_Call_Long;
                $c_OL_Put_Long = $content->OL_Put_Long;
                $c_OI_Call_Short = $content->OI_Call_Short;
                $c_OI_Put_Short = $content->OI_Put_Short;

                $d_FI_Long = $content->d_FI_Long;
                $d_FI_Short = $content->d_FI_Short;

                $f_FI_Long = $content->f_FI_Long;
                $f_FI_Short = $content->f_FI_Short;
                $f_OI_Call_Long = $content->f_OI_Call_Long;
                $f_OL_Put_Long = $content->f_OL_Put_Long;
                $f_OI_Call_Short = $content->f_OI_Call_Short;
                $f_OI_Put_Short = $content->f_OI_Put_Short;

                $p_FI_Long = $content->p_FI_Long;
                $p_FI_Short = $content->p_FI_Short;
                $p_OI_Call_Long = $content->p_OI_Call_Long;
                $p_OL_Put_Long = $content->p_OL_Put_Long;
                $p_OI_Call_Short = $content->p_OI_Call_Short;
                $p_OI_Put_Short = $content->p_OI_Put_Short;

                $previousValue[] = $records[$row - 1];

                if ($i == 0) {
                    //it will get skip the previous of from date
                } else {
                    foreach ($previousValue as $contentPrev) {
                        $DatePrev = $contentPrev->Date;
                        $FI_LongPrev = $contentPrev->FI_Long;
                        $FI_ShortPrev = $contentPrev->FI_Short;
                        $c_OI_Call_LongPrev = $contentPrev->OI_Call_Long;
                        $c_OL_Put_LongPrev = $contentPrev->OL_Put_Long;
                        $c_OI_Call_ShortPrev = $contentPrev->OI_Call_Short;
                        $c_OI_Put_ShortPrev = $contentPrev->OI_Put_Short;

                        $d_FI_LongPrev = $contentPrev->d_FI_Long;
                        $d_FI_ShortPrev = $contentPrev->d_FI_Short;

                        $f_FI_LongPrev = $contentPrev->f_FI_Long;
                        $f_FI_ShortPrev = $contentPrev->f_FI_Short;
                        $f_OI_Call_LongPrev = $contentPrev->f_OI_Call_Long;
                        $f_OL_Put_LongPrev = $contentPrev->f_OL_Put_Long;
                        $f_OI_Call_ShortPrev = $contentPrev->f_OI_Call_Short;
                        $f_OI_Put_ShortPrev = $contentPrev->f_OI_Put_Short;

                        $p_FI_LongPrev = $contentPrev->p_FI_Long;
                        $p_FI_ShortPrev = $contentPrev->p_FI_Short;
                        $p_OI_Call_LongPrev = $contentPrev->p_OI_Call_Long;
                        $p_OL_Put_LongPrev = $contentPrev->p_OL_Put_Long;
                        $p_OI_Call_ShortPrev = $contentPrev->p_OI_Call_Short;
                        $p_OI_Put_ShortPrev = $contentPrev->p_OI_Put_Short;

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
                        $f_call_long = $f_OI_Call_Long - $f_OI_Call_LongPrev;
                        $f_put_short = $f_OI_Put_Short - $f_OI_Put_ShortPrev;
                        $fii_call_long[] = $f_call_long;
                        $fii_put_short[] = $f_put_short;
                        $fiibullish[] = $f_call_long + $f_put_short;

                        //echo "<br>prev".$f_OI_Call_ShortPrev."today".$f_OI_Call_Short;
                        $fi_call_short = $f_OI_Call_Short - $f_OI_Call_ShortPrev;
                        $fi_put_long = $f_OL_Put_Long - $f_OL_Put_LongPrev;
                        $fii_call_short[] = $fi_call_short;
                        $fii_put_long[] = $fi_put_long;
                        $fiibearish[] = $fi_call_short + $fi_put_long;

                        //Client Options Calculation
                        // echo "<br>prev".$f_OI_Call_LongPrev."<br>today".$f_OI_Call_Long;
                        $c_call_long = $c_OI_Call_Long - $c_OI_Call_LongPrev;
                        $c_put_short = $c_OI_Put_Short - $c_OI_Put_ShortPrev;
                        $client_call_long[] = $c_call_long;
                        $client_put_short[] = $c_put_short;
                        $clientbullish[] = $c_call_long + $c_put_short;

                        //echo "<br>prev".$f_OI_Call_ShortPrev."today".$f_OI_Call_Short;
                        $c_call_short = $c_OI_Call_Short - $c_OI_Call_ShortPrev;
                        $c_put_long = $c_OL_Put_Long - $c_OL_Put_LongPrev;
                        $client_call_short[] = $c_call_short;
                        $client_put_long[] = $c_put_long;
                        $clientbearish[] = $c_call_short + $c_put_long;

                        // Pro Options Calculation
                        // echo "<br>prev".$f_OI_Call_LongPrev."<br>today".$f_OI_Call_Long;
                        $p_call_long = $p_OI_Call_Long - $p_OI_Call_LongPrev;
                        $p_put_short = $p_OI_Put_Short - $p_OI_Put_ShortPrev;
                        $pro_call_long[] = $p_call_long;
                        $pro_put_short[] = $p_put_short;
                        $probullish[] = $p_call_long + $p_put_short;

                        //echo "<br>prev".$f_OI_Call_ShortPrev."today".$f_OI_Call_Short;
                        $p_call_short = $p_OI_Call_Short - $p_OI_Call_ShortPrev;
                        $p_put_long = $p_OL_Put_Long - $p_OL_Put_LongPrev;
                        $pro_call_short[] = $p_call_short;
                        $pro_put_long[] = $p_put_long;
                        $probearish[] = $p_call_short + $p_put_long;

                        // dump($c_OI_Call_Short);die();
                    }
                    // dump($records);die();
                }
                $i++;
            }

        } elseif ($type == "Client") {
            //else if need only client data

            $selectquery = $conn->select("nse_client", "nc");
            $selectquery->fields("nc", ["Client_id",
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
            $clientDiff = array();
            $date = array();
            foreach ($record1 as $row => $content) {
                $previousValue = null;
                $Date = $content->Date;
                $FI_Long = $content->FI_Long;
                $FI_Short = $content->FI_Short;

                $previousValue[] = $record1[$row - 1];
                if ($i == 0) {
                    //echo "style='display:none;'";
                } else {
                    foreach ($previousValue as $contentPrev) {
                        $DatePrev = $contentPrev->Date;
                        $FI_LongPrev = $contentPrev->FI_Long;
                        $FI_ShortPrev = $contentPrev->FI_Short;
                        $ClientPrev = $FI_LongPrev / ($FI_LongPrev + $FI_ShortPrev) * 100;
                        $date[] = $content->Date;

                        $netdiff = $FI_Long - $FI_LongPrev;

                        //Client LS = OI Long Client/ OI short client
                        $ClientLS = $FI_Long / $FI_Short;
                        //echo "<br>Client LS".$Date.":". $ClientLS ;

                        //Client% = OI Long Client/ (OI Long Client+ OI short Client) *100
                        $Client = $FI_Long / ($FI_Long + $FI_Short) * 100;
                        //echo "<br>Client%".$Date.":".$Client ;

                        //Client DIFF = today (Client%) – yesterday (Client%)
                        $clientdiff = $Client - $ClientPrev;

                        //echo "<br>Difference is :".$clientDiff;
                        $clientDiff[] = round($clientdiff, 2);

                        //echo "<br>________________________________________________________";
                    }
                }
                $i++;
            }
        } elseif ($type == "DII") {
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
        } else {
            echo "in else";
        }
       
        // echo "<pre>";
        // print_r($rows);
        //  exit();


        $rows = array();

        foreach ($date as $id => $key) {

            $date = date('d-m-y', strtotime($key));

            $netdiffN = $netdiff[$id];
            $netdiffshortN = $netdiffshort[$id];
            $fiiDiffN = $fiiDiff[$id];
            $diiDiffN = $diiDiff[$id];
            $clientDiffN = $clientDiff[$id];
            $proDiffN = $proDiff[$id];
            // $fii_call_longN = $fii_call_long[$id];
            // $fii_put_shortN = $fii_put_short[$id];
            //$fiibullishN = number_format($fiibullish[$id],2);
            $fiibullishN= preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $fiibullish[$id]);
            // $fii_call_shortN = $fii_call_short[$id];
            // $fii_put_longN = $fii_put_long[$id];
            //$fiibearishN = number_format($fiibearish[$id],2);
            $fiibearishN= preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $fiibearish[$id]);

            // $client_call_longN = $client_call_long[$id];
            // $client_put_shortN = $client_put_short[$id];
            //$clientbullishN = number_format($clientbullish[$id],2);
            
            $clientbullishN =preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $clientbullish[$id]);
            
            
            // $client_call_shortN = $client_call_short[$id];
            // $client_put_longN = $client_put_long[$id];
            // $clientbearishN = number_format($clientbearish[$id],2);
            $clientbearishN = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $clientbearish[$id]);

            // $pro_call_longN = $pro_call_long[$id];
            // $pro_put_shortN = $pro_put_short[$id];
            //$probullishN = number_format($probullish[$id],2);
            $probullishN = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $probullish[$id]);
            // $pro_call_shortN = $pro_call_short[$id];
            // $pro_put_longN = $pro_put_long[$id];
            //$probearishN = number_format($probearish[$id],2);
            $probearishN = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $probearish[$id]);

            $rows[] = array(
                'date' => $date,
                'netdiff' => $netdiffN,
                'netdiffshort' => $netdiffshortN,
                'fiiDiff' => $fiiDiffN,
                'diiDiff' => $diiDiffN,
                'clientDiff' => $clientDiffN,
                'proDiff' => $proDiffN,

                // 'fii_call_long' => $fii_call_longN,
                // 'fii_put_short' => $fii_put_shortN,
                'bullish' => $fiibullishN,
                // 'fii_call_short' => $fii_call_shortN,
                // 'fii_put_long' => $fii_put_longN,
                'bearish' => $fiibearishN,

                // 'client_call_long' => $client_call_longN,
                // 'client_put_short' => $client_put_shortN,
                'clientbullish' => $clientbullishN,
                // 'client_call_short' => $client_call_shortN,
                // 'client_put_long' => $client_put_longN,
                'clientbearish' => $clientbearishN,

                'probullish' => $probullishN,
                'probearish' => $probearishN,
            );
        }

        return [
            '#theme' => 'listpage',
            '#items' => $rows,
            '#attached' => [
                'library' => [
                    'nse_csvimport/custom',
                ],
            ],
        ];
        
        //exit();

        
    }



    public function downloadCsv(string $type = 'All')
    {	
       //get form state values through session
       $session = new Session(new PhpBridgeSessionStorage());
       $session->start();

       // echo "hiii"; exit();

       $from = $session->get('from');
       $to = $session->get('to');
       //echo $from; echo $to; exit();

       //get database connection
       $conn = \Drupal::database();

       //get the previous date of selected from date

       $selectquery = $conn->select("nse_client", "nc");
       $selectquery->fields("nc", ["Date"]);
       $or_group = $selectquery
           ->orConditionGroup()
           ->condition("nc.Date", $from, "<");
       $selectquery->condition($or_group);
       $result = $selectquery->execute();
       $record = $result->fetchAll();

       foreach ($record as $row => $content) {
           $FromDate = $content->Date;
       }
       
       


       //if want all data
       if ($type == "All") {
       
           $query = \Drupal::database();
           // $query->('nse_client', 'c');
           $select = $query->select('nse_client', 'c');
           $select->Join('nse_dii', 'd', 'c.Date = d.Date');
           $select->Join('nse_fii', 'f', 'd.Date = f.Date');
           $select->Join('nse_pro', 'p', 'd.Date = p.Date');

           $select->fields('c', array('date' => 'Date', 'c_FI_Long' => 'FI_Long', 'c_FI_Short' => 'FI_Short', 'c_OI_Call_Long' => 'OI_Call_Long', 'c_OI_Put_Long' => 'OL_Put_Long', 'c_OI_Call_Short' => 'OI_Call_Short', 'c_OI_Put_Short' => 'OI_Put_Short'))
               ->fields('d', array('d_FI_Long' => 'FI_Long', 'd_FI_Short' => 'FI_Short'))
               ->fields('f', array('f_FI_Long' => 'FI_Long', 'f_FI_Short' => 'FI_Short', 'f_OI_Call_Long' => 'OI_Call_Long', 'f_OI_Put_Long' => 'OL_Put_Long', 'f_OI_Call_Short' => 'OI_Call_Short', 'f_OI_Put_Short' => 'OI_Put_Short'))
               ->fields('p', array('p_FI_Long' => 'FI_Long', 'p_FI_Short' => 'FI_Short', 'p_OI_Call_Long' => 'OI_Call_Long', 'p_OI_Put_Long' => 'OL_Put_Long', 'p_OI_Call_Short' => 'OI_Call_Short', 'p_OI_Put_Short' => 'OI_Put_Short'))
               ->condition('c.Date', array($FromDate, $to), 'BETWEEN');

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
           $fii_call_long = [];
           $fii_put_short = [];
           $fiibullish = [];
           $fii_put_long = [];
           $fii_call_short = [];
           $fiibearish = [];

           //variables for client option
           $client_call_long = [];
           $client_put_short = [];
           $clientbullish = [];
           $client_put_long = [];
           $client_call_short = [];
           $clientbearish = [];

           foreach ($records as $row => $content) {
               $previousValue = null;
               $Date = $content->Date;
               $FI_Long = $content->FI_Long;
               $FI_Short = $content->FI_Short;
               $c_OI_Call_Long = $content->OI_Call_Long;
               $c_OL_Put_Long = $content->OL_Put_Long;
               $c_OI_Call_Short = $content->OI_Call_Short;
               $c_OI_Put_Short = $content->OI_Put_Short;

               $d_FI_Long = $content->d_FI_Long;
               $d_FI_Short = $content->d_FI_Short;

               $f_FI_Long = $content->f_FI_Long;
               $f_FI_Short = $content->f_FI_Short;
               $f_OI_Call_Long = $content->f_OI_Call_Long;
               $f_OL_Put_Long = $content->f_OL_Put_Long;
               $f_OI_Call_Short = $content->f_OI_Call_Short;
               $f_OI_Put_Short = $content->f_OI_Put_Short;

               $p_FI_Long = $content->p_FI_Long;
               $p_FI_Short = $content->p_FI_Short;
               $p_OI_Call_Long = $content->p_OI_Call_Long;
               $p_OL_Put_Long = $content->p_OL_Put_Long;
               $p_OI_Call_Short = $content->p_OI_Call_Short;
               $p_OI_Put_Short = $content->p_OI_Put_Short;

               $previousValue[] = $records[$row - 1];

               if ($i == 0) {
                   //it will get skip the previous of from date
               } else {
                   foreach ($previousValue as $contentPrev) {
                       $DatePrev = $contentPrev->Date;
                       $FI_LongPrev = $contentPrev->FI_Long;
                       $FI_ShortPrev = $contentPrev->FI_Short;
                       $c_OI_Call_LongPrev = $contentPrev->OI_Call_Long;
                       $c_OL_Put_LongPrev = $contentPrev->OL_Put_Long;
                       $c_OI_Call_ShortPrev = $contentPrev->OI_Call_Short;
                       $c_OI_Put_ShortPrev = $contentPrev->OI_Put_Short;

                       $d_FI_LongPrev = $contentPrev->d_FI_Long;
                       $d_FI_ShortPrev = $contentPrev->d_FI_Short;

                       $f_FI_LongPrev = $contentPrev->f_FI_Long;
                       $f_FI_ShortPrev = $contentPrev->f_FI_Short;
                       $f_OI_Call_LongPrev = $contentPrev->f_OI_Call_Long;
                       $f_OL_Put_LongPrev = $contentPrev->f_OL_Put_Long;
                       $f_OI_Call_ShortPrev = $contentPrev->f_OI_Call_Short;
                       $f_OI_Put_ShortPrev = $contentPrev->f_OI_Put_Short;

                       $p_FI_LongPrev = $contentPrev->p_FI_Long;
                       $p_FI_ShortPrev = $contentPrev->p_FI_Short;
                       $p_OI_Call_LongPrev = $contentPrev->p_OI_Call_Long;
                       $p_OL_Put_LongPrev = $contentPrev->p_OL_Put_Long;
                       $p_OI_Call_ShortPrev = $contentPrev->p_OI_Call_Short;
                       $p_OI_Put_ShortPrev = $contentPrev->p_OI_Put_Short;

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
                       $f_call_long = $f_OI_Call_Long - $f_OI_Call_LongPrev;
                       $f_put_short = $f_OI_Put_Short - $f_OI_Put_ShortPrev;
                       $fii_call_long[] = $f_call_long;
                       $fii_put_short[] = $f_put_short;
                       $fiibullish[] = $f_call_long + $f_put_short;

                       //echo "<br>prev".$f_OI_Call_ShortPrev."today".$f_OI_Call_Short;
                       $fi_call_short = $f_OI_Call_Short - $f_OI_Call_ShortPrev;
                       $fi_put_long = $f_OL_Put_Long - $f_OL_Put_LongPrev;
                       $fii_call_short[] = $fi_call_short;
                       $fii_put_long[] = $fi_put_long;
                       $fiibearish[] = $fi_call_short + $fi_put_long;

                       //Client Options Calculation
                       // echo "<br>prev".$f_OI_Call_LongPrev."<br>today".$f_OI_Call_Long;
                       $c_call_long = $c_OI_Call_Long - $c_OI_Call_LongPrev;
                       $c_put_short = $c_OI_Put_Short - $c_OI_Put_ShortPrev;
                       $client_call_long[] = $c_call_long;
                       $client_put_short[] = $c_put_short;
                       $clientbullish[] = $c_call_long + $c_put_short;

                       //echo "<br>prev".$f_OI_Call_ShortPrev."today".$f_OI_Call_Short;
                       $c_call_short = $c_OI_Call_Short - $c_OI_Call_ShortPrev;
                       $c_put_long = $c_OL_Put_Long - $c_OL_Put_LongPrev;
                       $client_call_short[] = $c_call_short;
                       $client_put_long[] = $c_put_long;
                       $clientbearish[] = $c_call_short + $c_put_long;

                       // Pro Options Calculation
                       // echo "<br>prev".$f_OI_Call_LongPrev."<br>today".$f_OI_Call_Long;
                       $p_call_long = $p_OI_Call_Long - $p_OI_Call_LongPrev;
                       $p_put_short = $p_OI_Put_Short - $p_OI_Put_ShortPrev;
                       $pro_call_long[] = $p_call_long;
                       $pro_put_short[] = $p_put_short;
                       $probullish[] = $p_call_long + $p_put_short;

                       //echo "<br>prev".$f_OI_Call_ShortPrev."today".$f_OI_Call_Short;
                       $p_call_short = $p_OI_Call_Short - $p_OI_Call_ShortPrev;
                       $p_put_long = $p_OL_Put_Long - $p_OL_Put_LongPrev;
                       $pro_call_short[] = $p_call_short;
                       $pro_put_long[] = $p_put_long;
                       $probearish[] = $p_call_short + $p_put_long;

                       // dump($c_OI_Call_Short);die();
                   }
                   // dump($records);die();
               }
               $i++;
           }

       } elseif ($type == "Client") {
           //else if need only client data

           $selectquery = $conn->select("nse_client", "nc");
           $selectquery->fields("nc", ["Client_id",
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
           $clientDiff = array();
           $date = array();
           foreach ($record1 as $row => $content) {
               $previousValue = null;
               $Date = $content->Date;
               $FI_Long = $content->FI_Long;
               $FI_Short = $content->FI_Short;

               $previousValue[] = $record1[$row - 1];
               if ($i == 0) {
                   //echo "style='display:none;'";
               } else {
                   foreach ($previousValue as $contentPrev) {
                       $DatePrev = $contentPrev->Date;
                       $FI_LongPrev = $contentPrev->FI_Long;
                       $FI_ShortPrev = $contentPrev->FI_Short;
                       $ClientPrev = $FI_LongPrev / ($FI_LongPrev + $FI_ShortPrev) * 100;
                       $date[] = $content->Date;

                       $netdiff = $FI_Long - $FI_LongPrev;

                       //Client LS = OI Long Client/ OI short client
                       $ClientLS = $FI_Long / $FI_Short;
                       //echo "<br>Client LS".$Date.":". $ClientLS ;

                       //Client% = OI Long Client/ (OI Long Client+ OI short Client) *100
                       $Client = $FI_Long / ($FI_Long + $FI_Short) * 100;
                       //echo "<br>Client%".$Date.":".$Client ;

                       //Client DIFF = today (Client%) – yesterday (Client%)
                       $clientdiff = $Client - $ClientPrev;

                       //echo "<br>Difference is :".$clientDiff;
                       $clientDiff[] = round($clientdiff, 2);

                       //echo "<br>________________________________________________________";
                   }
               }
               $i++;
           }
       } elseif ($type == "DII") {
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
       } else {
           echo "in else";
       }

            // Start using PHP's built in file handler functions to create a temporary file.
            $handle = fopen('php://temp', 'w+');

            // Set up the header that will be displayed as the first line of the CSV file.
            // Blank strings are used for multi-cell values where there is a count of
            // the "keys" and a list of the keys with the count of their usage.
            $header = [
              'Date',
              'Net Diff Long',
              'Net Diff Short',
              'FII Diff',
              'DII Diff',
              'Client Diff',
              'Pro Diff',
              'FII Bullish',
              'FII Bearish',
              'Client Bullish',
              'Client Bearish',
              'Pro Bullish',
              'Pro Bearish',
              
            ];
            // Add the header as the first line of the CSV.
            fputcsv($handle, $header);
     
       $rows = array();

       foreach ($date as $id => $key) {

           $date = date('d-m-y', strtotime($key));

           $netdiffN = $netdiff[$id];
           $netdiffshortN = $netdiffshort[$id];
           $fiiDiffN = $fiiDiff[$id];
           $diiDiffN = $diiDiff[$id];
           $clientDiffN = $clientDiff[$id];
           $proDiffN = $proDiff[$id];
           // $fii_call_longN = $fii_call_long[$id];
           // $fii_put_shortN = $fii_put_short[$id];
           //$fiibullishN = number_format($fiibullish[$id],2);
           $fiibullishN= preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $fiibullish[$id]);
           // $fii_call_shortN = $fii_call_short[$id];
           // $fii_put_longN = $fii_put_long[$id];
           //$fiibearishN = number_format($fiibearish[$id],2);
           $fiibearishN= preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $fiibearish[$id]);

           // $client_call_longN = $client_call_long[$id];
           // $client_put_shortN = $client_put_short[$id];
           //$clientbullishN = number_format($clientbullish[$id],2);
           
           $clientbullishN =preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $clientbullish[$id]);
           
           
           // $client_call_shortN = $client_call_short[$id];
           // $client_put_longN = $client_put_long[$id];
           // $clientbearishN = number_format($clientbearish[$id],2);
           $clientbearishN = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $clientbearish[$id]);

           // $pro_call_longN = $pro_call_long[$id];
           // $pro_put_shortN = $pro_put_short[$id];
           //$probullishN = number_format($probullish[$id],2);
           $probullishN = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $probullish[$id]);
           // $pro_call_shortN = $pro_call_short[$id];
           // $pro_put_longN = $pro_put_long[$id];
           //$probearishN = number_format($probearish[$id],2);
           $probearishN = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $probearish[$id]);
            $rows= [
                $date,
                $netdiffN,
                $netdiffshortN, 
                $fiiDiffN,
                $diiDiffN,
                $clientDiffN,
                $proDiffN,
                $fiibullishN,
                $fiibearishN,
                $clientbullishN,
                $clientbearishN,
                $probullishN,
                $probearishN,
                
            ];
            fputcsv($handle, $rows);
           
       }

      // Reset where we are in the CSV.
      rewind($handle);
          
      // Retrieve the data from the file handler.
      $csv_data = stream_get_contents($handle);

      // Close the file handler since we don't need it anymore.  We are not storing
      // this file anywhere in the filesystem.
      fclose($handle);
      

      // This is the "magic" part of the code.  Once the data is built, we can
      // return it as a response.
      $response = new Response();

      // By setting these 2 header options, the browser will see the URL
      // used by this Controller to return a CSV file called "article-report.csv".
      $response->headers->set('Content-Type', 'text/csv');
      $response->headers->set('Content-Disposition', 'attachment; filename="export.csv"');

      // This line physically adds the CSV data we created 
      $response->setContent($csv_data);

      return $response;
       
    }
}
