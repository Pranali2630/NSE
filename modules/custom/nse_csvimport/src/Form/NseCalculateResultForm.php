<?php
namespace Drupal\nse_csvimport\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\redirect\Entity\Redirect;

use Symfony\Component\HttpFoundation\RedirectResponse;

use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\HttpFoundation\Session\Storage\PhpBridgeSessionStorage;

use Drupal\user\PrivateTempStoreFactory;

class NseCalculateResultForm extends FormBase
{
    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return "nsecalculateresultformid";
    }
    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form["date"] = [
            "#type" => "date",
            "#title" => t("Select From Date"),
            "#required" => true,
        ];
        $form["another_date"] = [
            "#type" => "date",
            "#title" => t("Select To Date"),
            "#required" => true,
        ];
        $form["submit"] = [
            "#type" => "submit",
            "#value" => t("Save"),
        ];
        return $form;
    }
    /**
     * {@inheritdoc}
     */

    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        $field = $form_state->getValues();

        $fields["date"] = $field["date"];
        if (
            !$form_state->getValue("date") ||
            empty($form_state->getValue("date"))
        ) {
            $form_state->setErrorByName("date", $this->t("Select Date"));
        }
    }
    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $field = $form_state->getValues();
        $from = $field["date"];
        $to = $field["another_date"];
        $session = new Session(new PhpBridgeSessionStorage());

        $session->start();

        $session->set('from', $from);  
        $session->get('from');   

        $session->set('to', $to);
        $session->get('to');

        $response = new RedirectResponse('nseResult');
      $response->send();

        // $getresult = NseCalculateResultForm::nseResult( $form, $form_state,"FII" );
        // $getFiiResult = NseCalculateResultForm::fiiResult($form,$form_state);
    }
}
