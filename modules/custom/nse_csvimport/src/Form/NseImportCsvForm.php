<?php

namespace Drupal\nse_csvimport\Form;

use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * Class Form_NSE_ImportCSV.
 *
 * @package Drupal\nse_csvimport\Form
 */
class NseImportCsvForm extends FormBase
{

    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return 'nse_csvimportformid';
    }
    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {

        //enctype is should because we are going to add file element into form.
        $form = array(
            '#attributes' => array('enctype' => 'multipart/form-data'),
        );

        //Validation for file type. Should be of csv type only
        $validators = array(
            'file_validate_extensions' => array(
                'csv',
            ),
        );

        //add file element
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

        //submit form
        $form['actions']['#type'] = 'actions';
        $form['actions']['submit'] = array(
            '#type' => 'submit',
            '#value' => $this->t('Submit'),
            '#button_type' => 'primary',
        );
        return $form;
    }

    public function validateForm(array&$form, FormStateInterface $form_state)
    {
        if ($form_state->getValue('csv_file') == null) {
            $form_state->setErrorByName('csv_file', $this->t('upload proper File'));
        }
    }
    /**
     * {@inheritdoc}
     */

    public function submitForm(array&$form, FormStateInterface $form_state)
    {

        // Getting file name that is uploaded.
        $file = \Drupal::entityTypeManager()->getStorage('file')->load($form_state->getValue('csv_file')[0]);
        $destination = $file->get('uri')->value;
        $file_name = basename($destination);

        // Generating path to file uploaded directory
        $inputFileName = \Drupal::service('file_system')->realpath('public://content/excel_files/' . $file_name);

        $spreadsheet = IOFactory::load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet();

        $rows = array();
        foreach ($sheetData->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            $cells = [];
            foreach ($cellIterator as $cell) {
                $cells[] = $cell->getValue();
            }
            $rows[] = $cells;
        }

        //Insert value in client table
        $client[] = $rows[2];
        $dii[] = $rows[3];
        $fii[] = $rows[4];
        $pro[] = $rows[5];
        $string[] = $rows[0];

        foreach ($string as $row) {
            $string = $row[0];
            $words = explode(" ", $string);
            $date = implode(' ', array_splice($words, -2));
            $date = strtotime($date);
            $date = date('y-m-d', $date);
        }

        foreach ($client as $row) {
            //$date = date("Y-m-d");
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

            $query = \Drupal::database();
            $selectquery = $query->select('nse_client', 'nc');
            $selectquery->fields('nc', ['date']);
            $selectquery->condition('nc.date', $date);
            $result = $selectquery->countQuery()->execute()->fetchField();

            if ($result) {
                $query->update('nse_client')->fields(array(
                    'Date' => $date,
                    'FI_Long' => $FI_Long,
                    'FI_Short' => $FI_Short,
                    'FS_Long' => $FS_Long,
                    'FS_Short' => $FS_Short,
                    'OI_Call_Long' => $OI_Call_Long,
                    'OL_Put_Long' => $OL_Put_Long,
                    'OI_Call_Short' => $OI_Call_Short,
                    'OI_Put_Short' => $OI_Put_Short,
                    'OS_Call_Long' => $OS_Call_Long,
                    'OS_Put_Long' => $OS_Put_Long,
                    'OS_Call_Short' => $OS_Call_Short,
                    'OS_Put_Short' => $OS_Put_Short,
                    'TL_Contracts' => $TL_Contracts,
                    'TS_Contracts' => $TS_Contracts,

                ))->condition('Date', $date)->execute();

            } else {
                $query->insert('nse_client')->fields(array(
                    'Date' => $date,
                    'FI_Long' => $FI_Long,
                    'FI_Short' => $FI_Short,
                    'FS_Long' => $FS_Long,
                    'FS_Short' => $FS_Short,
                    'OI_Call_Long' => $OI_Call_Long,
                    'OL_Put_Long' => $OL_Put_Long,
                    'OI_Call_Short' => $OI_Call_Short,
                    'OI_Put_Short' => $OI_Put_Short,
                    'OS_Call_Long' => $OS_Call_Long,
                    'OS_Put_Long' => $OS_Put_Long,
                    'OS_Call_Short' => $OS_Call_Short,
                    'OS_Put_Short' => $OS_Put_Short,
                    'TL_Contracts' => $TL_Contracts,
                    'TS_Contracts' => $TS_Contracts,
                ))->execute();
            }
            $query = \Drupal::database();
        }

        //Insert value in Dii table

        foreach ($dii as $row) {
            //   //$date = date("Y-m-d");
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

            $query = \Drupal::database();
            $selectquery = $query->select('nse_dii', 'nd');
            $selectquery->fields('nd', ['date']);
            $selectquery->condition('nd.date', $date);
            $result = $selectquery->countQuery()->execute()->fetchField();

            if ($result) {
                $query->update('nse_dii')->fields(array(
                    'Date' => $date,
                    'FI_Long' => $FI_Long,
                    'FI_Short' => $FI_Short,
                    'FS_Long' => $FS_Long,
                    'FS_Short' => $FS_Short,
                    'OI_Call_Long' => $OI_Call_Long,
                    'OL_Put_Long' => $OL_Put_Long,
                    'OI_Call_Short' => $OI_Call_Short,
                    'OI_Put_Short' => $OI_Put_Short,
                    'OS_Call_Long' => $OS_Call_Long,
                    'OS_Put_Long' => $OS_Put_Long,
                    'OS_Call_Short' => $OS_Call_Short,
                    'OS_Put_Short' => $OS_Put_Short,
                    'TL_Contracts' => $TL_Contracts,
                    'TS_Contracts' => $TS_Contracts,
                ))->condition('Date', $date)->execute();

            } else {
                $query->insert('nse_dii')->fields(array(
                    'Date' => $date,
                    'FI_Long' => $FI_Long,
                    'FI_Short' => $FI_Short,
                    'FS_Long' => $FS_Long,
                    'FS_Short' => $FS_Short,
                    'OI_Call_Long' => $OI_Call_Long,
                    'OL_Put_Long' => $OL_Put_Long,
                    'OI_Call_Short' => $OI_Call_Short,
                    'OI_Put_Short' => $OI_Put_Short,
                    'OS_Call_Long' => $OS_Call_Long,
                    'OS_Put_Long' => $OS_Put_Long,
                    'OS_Call_Short' => $OS_Call_Short,
                    'OS_Put_Short' => $OS_Put_Short,
                    'TL_Contracts' => $TL_Contracts,
                    'TS_Contracts' => $TS_Contracts,
                ))->execute();
            }
            $query = \Drupal::database();
        }

        // //Insert value in Fii table
        foreach ($fii as $row) {
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

            $query = \Drupal::database();
            $selectquery = $query->select('nse_fii', 'nf');
            $selectquery->fields('nf', ['date']);
            $selectquery->condition('nf.date', $date);
            $result = $selectquery->countQuery()->execute()->fetchField();

            if ($result) {
                $query->update('nse_fii')->fields(array(
                    'Date' => $date,
                    'FI_Long' => $FI_Long,
                    'FI_Short' => $FI_Short,
                    'FS_Long' => $FS_Long,
                    'FS_Short' => $FS_Short,
                    'OI_Call_Long' => $OI_Call_Long,
                    'OL_Put_Long' => $OL_Put_Long,
                    'OI_Call_Short' => $OI_Call_Short,
                    'OI_Put_Short' => $OI_Put_Short,
                    'OS_Call_Long' => $OS_Call_Long,
                    'OS_Put_Long' => $OS_Put_Long,
                    'OS_Call_Short' => $OS_Call_Short,
                    'OS_Put_Short' => $OS_Put_Short,
                    'TL_Contracts' => $TL_Contracts,
                    'TS_Contracts' => $TS_Contracts,

                ))->condition('Date', $date)->execute();
            } else {
                $query->insert('nse_fii')->fields(array(
                    'Date' => $date,
                    'FI_Long' => $FI_Long,
                    'FI_Short' => $FI_Short,
                    'FS_Long' => $FS_Long,
                    'FS_Short' => $FS_Short,
                    'OI_Call_Long' => $OI_Call_Long,
                    'OL_Put_Long' => $OL_Put_Long,
                    'OI_Call_Short' => $OI_Call_Short,
                    'OI_Put_Short' => $OI_Put_Short,
                    'OS_Call_Long' => $OS_Call_Long,
                    'OS_Put_Long' => $OS_Put_Long,
                    'OS_Call_Short' => $OS_Call_Short,
                    'OS_Put_Short' => $OS_Put_Short,
                    'TL_Contracts' => $TL_Contracts,
                    'TS_Contracts' => $TS_Contracts,

                ))->execute();
            }
            $query = \Drupal::database();
        }

        // //Insert value in pro table

        foreach ($pro as $row) {

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

            $query = \Drupal::database();
            $selectquery = $query->select('nse_pro', 'np');
            $selectquery->fields('np', ['Date']);
            $selectquery->condition('np.Date', $date);
            $result = $selectquery->countQuery()->execute()->fetchField();

            if ($result) {
                $query->update('nse_pro')->fields(array(
                    'Date' => $date,
                    'FI_Long' => $FI_Long,
                    'FI_Short' => $FI_Short,
                    'FS_Long' => $FS_Long,
                    'FS_Short' => $FS_Short,
                    'OI_Call_Long' => $OI_Call_Long,
                    'OL_Put_Long' => $OL_Put_Long,
                    'OI_Call_Short' => $OI_Call_Short,
                    'OI_Put_Short' => $OI_Put_Short,
                    'OS_Call_Long' => $OS_Call_Long,
                    'OS_Put_Long' => $OS_Put_Long,
                    'OS_Call_Short' => $OS_Call_Short,
                    'OS_Put_Short' => $OS_Put_Short,
                    'TL_Contracts' => $TL_Contracts,
                    'TS_Contracts' => $TS_Contracts,

                ))->condition('Date', $date)->execute();
            } else {
                $query->insert('nse_pro')->fields(array(
                    'Date' => $date,
                    'FI_Long' => $FI_Long,
                    'FI_Short' => $FI_Short,
                    'FS_Long' => $FS_Long,
                    'FS_Short' => $FS_Short,
                    'OI_Call_Long' => $OI_Call_Long,
                    'OL_Put_Long' => $OL_Put_Long,
                    'OI_Call_Short' => $OI_Call_Short,
                    'OI_Put_Short' => $OI_Put_Short,
                    'OS_Call_Long' => $OS_Call_Long,
                    'OS_Put_Long' => $OS_Put_Long,
                    'OS_Call_Short' => $OS_Call_Short,
                    'OS_Put_Short' => $OS_Put_Short,
                    'TL_Contracts' => $TL_Contracts,
                    'TS_Contracts' => $TS_Contracts,

                ))->execute();
            }
            $query = \Drupal::database();
        }
        \Drupal::messenger()->addMessage('imported successfully');
    }
}
