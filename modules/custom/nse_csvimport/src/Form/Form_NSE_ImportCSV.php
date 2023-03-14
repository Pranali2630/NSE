<?php
namespace Drupal\nse_csvimport\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
// use Symfony\Component\HttpFoundation\RedirectResponse;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

/**
 * Class employeeForm.
 *
 * @package Drupal\nse_csvimport\Form
 */
class Form_NSE_ImportCSV extends FormBase {
/**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'nse_csvimportformid';
  }
   /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {

      
  
        $form = array(
          '#attributes' => array('enctype' => 'multipart/form-data'),
        );


        
        //$form['file_upload_details'] = array(
          //'#markup' => t('<b>The File</b>'),
       // );
      
        $validators = array(
          'file_validate_extensions' => array(     
          //  'xlsx',
            'csv',
          ),
        );
        $form['csv_file'] = array(
          '#type' => 'managed_file',
          '#name' => 'csv_file',
          '#title' => t('Import Daily NSE data Sheet which will only CSV file'),
          '#required' => true,
          '#size' => 20,
          '#description' => t('Please upload the CSV File only.'),
          '#upload_validators' => $validators,
          '#upload_location' => 'public://content/excel_files/',
        );   
        $form['actions']['#type'] = 'actions';
        $form['actions']['submit'] = array(
          '#type' => 'submit',
          '#value' => $this->t('Submit'),
          '#button_type' => 'primary',
        );
        return $form;
      }
      public function validateForm(array &$form, FormStateInterface $form_state) {    
        if ($form_state->getValue('csv_file') == NULL) {
          $form_state->setErrorByName('csv_file', $this->t('upload proper File'));
        }
      }
      /**
       * {@inheritdoc}
      */
    public function submitForm(array &$form, FormStateInterface $form_state){

        $file = \Drupal::entityTypeManager()->getStorage('file')->load($form_state->getValue('csv_file')[0]);
        $destination = $file->get('uri')->value;
        $file_name = basename($destination);
        $inputFileName = \Drupal::service('file_system')->realpath('public://content/excel_files/'.$file_name);
		
              $spreadsheet = IOFactory::load($inputFileName);
              
              $sheetData = $spreadsheet->getActiveSheet();
              
              $rows = array();
              foreach ($sheetData->getRowIterator() as $row) {
                //echo "<pre>";print_r($row);exit;
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE); 
                $cells = [];
                foreach ($cellIterator as $cell) {
                  $cells[] = $cell->getValue();
                }
                    $rows[] = $cells;
              }

              
              // echo "<pre>";
              // print_r($rows);
              // exit();
              // echo "herre";

             // echo $client_FI_Long = $rows[2][1];

           //Insert value in client table

              $client[] = $rows[2];
              $dii[] = $rows[3];
              $fii[] = $rows[4];
              $pro[] = $rows[5];

              // $string[] = $rows[0];
              // foreach($string as $row){
              //   $string = $row[0];
              //   $words = explode(" ", $string ); 
              //   $date = implode(' ',array_splice($words, -2 )); 
              // }
              
             
              //print_r($client);
              //exit();
              foreach($client as $row){
            
                // echo "<pre>";
                // print_r($row);

                $date = date("Y-m-d");
                $FI_Long = $row[1];
                $FI_Short = $row[2];
                $FS_Long = $row[3];
                $FS_Short = $row[4];
                $OI_Call_Long = $row[5];
                $OL_Put_Long = $row[6];
                $OI_Call_Short = $row[7];
                $OI_Put_Short = $row[8];
                $OS_Call_Long = $row[9];
                $OS_Put_Long = $row[10];
                $OS_Call_Short = $row[11];
                $OS_Put_Short = $row[12];
                $TL_Contracts = $row[13];
                $TS_Contracts = $row[14];
                
                
                //echo $FI_Short = $row[2][2];
        
          
                $query=\Drupal::database();
                $query->insert('nse_client') -> fields(array(
                  'Date' => $date,
                  'FI_Long' => $FI_Long,
                  'FI_Short' =>  $FI_Short,
                  'FS_Long' => $FS_Long,
                  'FS_Short' =>  $FS_Short,
                  'OI_Call_Long' =>  $OI_Call_Long,
                  'OL_Put_Long' =>  $OL_Put_Long,
                  'OI_Call_Short' =>  $OI_Call_Short,
                  'OI_Put_Short' =>  $OI_Put_Short,
                  'OS_Call_Long' => $OS_Call_Long,
                  'OS_Put_Long' =>  $OS_Put_Long,
                  'OS_Call_Short' => $OS_Call_Short,
                  'OS_Put_Short' =>  $OS_Put_Short,
                  'TL_Contracts' => $TL_Contracts,
                  'TS_Contracts' =>  $TS_Contracts,
                    
          
                ))->execute();
          
                $query=\Drupal::database();
          
              }

              //Insert value in Dii table
              foreach($dii as $row){
            
                // echo "<pre>";
                // print_r($row);

                $date = date("Y-m-d");
                $FI_Long = $row[1];
                $FI_Short = $row[2];
                $FS_Long = $row[3];
                $FS_Short = $row[4];
                $OI_Call_Long = $row[5];
                $OL_Put_Long = $row[6];
                $OI_Call_Short = $row[7];
                $OI_Put_Short = $row[8];
                $OS_Call_Long = $row[9];
                $OS_Put_Long = $row[10];
                $OS_Call_Short = $row[11];
                $OS_Put_Short = $row[12];
                $TL_Contracts = $row[13];
                $TS_Contracts = $row[14];
                
                
                //echo $FI_Short = $row[2][2];
        
          
                $query=\Drupal::database();
                $query->insert('nse_dii') -> fields(array(
                  'Date' => $date,
                  'FI_Long' => $FI_Long,
                  'FI_Short' =>  $FI_Short,
                  'FS_Long' => $FS_Long,
                  'FS_Short' =>  $FS_Short,
                  'OI_Call_Long' =>  $OI_Call_Long,
                  'OL_Put_Long' =>  $OL_Put_Long,
                  'OI_Call_Short' =>  $OI_Call_Short,
                  'OI_Put_Short' =>  $OI_Put_Short,
                  'OS_Call_Long' => $OS_Call_Long,
                  'OS_Put_Long' =>  $OS_Put_Long,
                  'OS_Call_Short' => $OS_Call_Short,
                  'OS_Put_Short' =>  $OS_Put_Short,
                  'TL_Contracts' => $TL_Contracts,
                  'TS_Contracts' =>  $TS_Contracts,
                    
          
                ))->execute();
          
                $query=\Drupal::database();
          
              }
 
              //Insert value in Fii table
              foreach($fii as $row){
            
                // echo "<pre>";
                // print_r($row);

                $date = date("Y-m-d");
                $FI_Long = $row[1];
                $FI_Short = $row[2];
                $FS_Long = $row[3];
                $FS_Short = $row[4];
                $OI_Call_Long = $row[5];
                $OL_Put_Long = $row[6];
                $OI_Call_Short = $row[7];
                $OI_Put_Short = $row[8];
                $OS_Call_Long = $row[9];
                $OS_Put_Long = $row[10];
                $OS_Call_Short = $row[11];
                $OS_Put_Short = $row[12];
                $TL_Contracts = $row[13];
                $TS_Contracts = $row[14];
                
                
                //echo $FI_Short = $row[2][2];
        
          
                $query=\Drupal::database();
                $query->insert('nse_fii') -> fields(array(
                  'Date' => $date,
                  'FI_Long' => $FI_Long,
                  'FI_Short' =>  $FI_Short,
                  'FS_Long' => $FS_Long,
                  'FS_Short' =>  $FS_Short,
                  'OI_Call_Long' =>  $OI_Call_Long,
                  'OL_Put_Long' =>  $OL_Put_Long,
                  'OI_Call_Short' =>  $OI_Call_Short,
                  'OI_Put_Short' =>  $OI_Put_Short,
                  'OS_Call_Long' => $OS_Call_Long,
                  'OS_Put_Long' =>  $OS_Put_Long,
                  'OS_Call_Short' => $OS_Call_Short,
                  'OS_Put_Short' =>  $OS_Put_Short,
                  'TL_Contracts' => $TL_Contracts,
                  'TS_Contracts' =>  $TS_Contracts,
                    
          
                ))->execute();
          
                $query=\Drupal::database();
          
              }


              //Insert value in pro table

              foreach($pro as $row){
            
                // echo "<pre>";
                // print_r($row);

                $date = date("Y-m-d");
                $FI_Long = $row[1];
                $FI_Short = $row[2];
                $FS_Long = $row[3];
                $FS_Short = $row[4];
                $OI_Call_Long = $row[5];
                $OL_Put_Long = $row[6];
                $OI_Call_Short = $row[7];
                $OI_Put_Short = $row[8];
                $OS_Call_Long = $row[9];
                $OS_Put_Long = $row[10];
                $OS_Call_Short = $row[11];
                $OS_Put_Short = $row[12];
                $TL_Contracts = $row[13];
                $TS_Contracts = $row[14];
                
                
                //echo $FI_Short = $row[2][2];
        
          
                $query=\Drupal::database();
                $query->insert('nse_pro') -> fields(array(
                  'Date' => $date,
                  'FI_Long' => $FI_Long,
                  'FI_Short' =>  $FI_Short,
                  'FS_Long' => $FS_Long,
                  'FS_Short' =>  $FS_Short,
                  'OI_Call_Long' =>  $OI_Call_Long,
                  'OL_Put_Long' =>  $OL_Put_Long,
                  'OI_Call_Short' =>  $OI_Call_Short,
                  'OI_Put_Short' =>  $OI_Put_Short,
                  'OS_Call_Long' => $OS_Call_Long,
                  'OS_Put_Long' =>  $OS_Put_Long,
                  'OS_Call_Short' => $OS_Call_Short,
                  'OS_Put_Short' =>  $OS_Put_Short,
                  'TL_Contracts' => $TL_Contracts,
                  'TS_Contracts' =>  $TS_Contracts,
                    
          
                ))->execute();
          
                $query=\Drupal::database();
          
              }
              
              //exit();
              \Drupal::messenger()->addMessage('imported successfully');
            }
          }
      // }