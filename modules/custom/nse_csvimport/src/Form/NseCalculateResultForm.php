<?php
namespace Drupal\nse_csvimport\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class NseCalculateResultForm extends FormBase {
/**
* {@inheritdoc}
*/
public function getFormId()
{
return 'nsecalculateresultformid';
}
/**
* {@inheritdoc}
*/
public function buildForm(array $form, FormStateInterface $form_state)
{
$form['date'] = array (
  '#type' => 'date',
  '#title' => t('Select From Date'),
  '#required' => TRUE,
);
$form['another_date'] = array (
  '#type' => 'date',
  '#title' => t('Select To Date'),
  '#required' => TRUE,
);
$form['submit'] = array (
  '#type' => 'submit',
  '#value' => t('Save'),
);
return $form;
}
/**
* {@inheritdoc}
*/
public function validateForm(array &$form, FormStateInterface $form_state)
  {
    $field = $form_state->getValues();
	   
		$fields["date"] = $field['date'];
		if (!$form_state->getValue('date') || empty($form_state->getValue('date'))) {
            $form_state->setErrorByName('date', $this->t('Select Date'));
        } 
  }
/**
* {@inheritdoc}
*/
public function submitForm(array &$form, FormStateInterface $form_state)
  {
    // $conn = Database::getConnection();
		
		$field = $form_state->getValues();
	   
		$fields["date"] = $field['date'];
		$fields["another_date"] = $field['another_date'];

    $query = \Drupal::database();
      $selectquery = $query->select('nse_client','nc');
      $selectquery->fields('nc', ['Client_id','Date','FI_Long','FI_Short']);
      $or_group = $selectquery->orConditionGroup()
      ->condition('nc.date', $fields["date"], '<');
      $selectquery->condition($or_group);
      $result = $selectquery->execute();

      $record = $result->fetchAll();

      // print_r($record);exit();

      foreach($record as  $row => $content){
        $PrevDate = $content->Date;
        $PrevFI_Long = $content->FI_Long;
        $PrevFI_Short =$content->FI_Short;
        $PrevClient = $PrevFI_Long /($PrevFI_Long + $PrevFI_Short)*100;
      }

      //exit();
    $query = \Drupal::database();
      $selectquery = $query->select('nse_client','nc');
      $selectquery->fields('nc', ['Client_id','Date','FI_Long','FI_Short']);
      $or_group = $selectquery->orConditionGroup()
      // ->condition('nc.date', $fields["date"], 'IN')
      // ->condition('nc.date', $fields["another_date"], 'IN');
      ->condition('nc.date', array($fields["date"],  $fields["another_date"]), 'BETWEEN');

      $selectquery->condition($or_group);
      $result = $selectquery->execute();

      $record1 = $result->fetchAll();
      $i = 0;
      $length = count($record1);

       //dump($record1); die();

      echo "<table>
            <tr>
              <td>Date</td>
              <td>Net Diff</td>
              <td>Client LS</td>
              <td>Client%</td>
              <td>Client Diff</td>
            </tr>";
      
      foreach($record1 as  $row => $content){
          $previousValue = null;
          $Date = $content->Date;
          $FI_Long = $content->FI_Long;
          $FI_Short =$content->FI_Short;
          
          
         
            
          if($i == 0){
            //Net Diff = today (FII) – yesterday (FII)
            $netdiff = $FI_Long - $PrevFI_Long;

            //Client LS = OI Long Client/ OI short client
            $ClientLS = $FI_Long / $FI_Short;
            //echo "<br>Client LS".$Date.":". $ClientLS ;

            //Client% = OI Long Client/ (OI Long Client+ OI short Client) *100
            $Client = $FI_Long /($FI_Long + $FI_Short)*100;
            //echo "<br>Client%".$Date.":".$Client ;

            //Client DIFF = today (Client%) – yesterday (Client%)

            $clientDiff = $Client - $PrevClient;
            //echo "<br>Difference is :".$clientDiff;
          }else
          {
            $previousValue[] = $record1[$row-1];
            //dump($previousValue);
            // echo "<pre>";
            // print_r($previousValue);
            foreach($previousValue as $contentPrev)
            {
              // echo "<pre>";
              // print_r($contentPrev);
              $DatePrev = $contentPrev->Date;
              $FI_LongPrev = $contentPrev->FI_Long;
              $FI_ShortPrev =$contentPrev->FI_Short;
              $ClientPrev = $FI_LongPrev /($FI_LongPrev + $FI_ShortPrev)*100;
              
              // echo "<br>Previoues Data ".$DatePrev;
              // echo $DatePrev."<br>".$FI_LongPrev."<br>".$FI_ShortPrev;
              // echo "<br>Cureent Data".$Date;
              // echo $Date."<br>".$FI_Long."<br>".$FI_Short;
              // echo "<br>________________________________________________________";

              //Net Diff = today (FII) – yesterday (FII)
              $netdiff = $FI_Long - $FI_LongPrev;

              //Client LS = OI Long Client/ OI short client
              //echo "<br>__________".$Date."_______________";
              $ClientLS = $FI_Long / $FI_Short;
              //echo "<br>Client LS".$Date.":". $ClientLS ;

              //Client% = OI Long Client/ (OI Long Client+ OI short Client) *100
              $Client = $FI_Long /($FI_Long + $FI_Short)*100;
              //echo "<br>Client%".$Date.":".$Client ;

              //Client DIFF = today (Client%) – yesterday (Client%)
              $clientDiff = $Client - $ClientPrev;
              //echo "<br>Difference is :".$clientDiff;
              //echo "<br>________________________________________________________";
            }

           

          }

          echo"
            <tr>
              <td>".$Date."</td>
              <td>".$netdiff."</td>
              <td>".$ClientLS."</td>
              <td>".$Client."</td>
              <td>".$clientDiff."</td>
            </tr>
          ";

          $i++;

       
      }
      echo "</table>";



      exit();
      
  }
}