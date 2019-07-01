<?php  
/**  
 * @file  
 * Contains Drupal\welcome\Form\MessagesForm.  
 */  
namespace Drupal\form_add_html_attributes\Form;  
use Drupal\Core\Form\ConfigFormBase;  
use Drupal\Core\Form\FormStateInterface;  

class AddHtmlAttributeForm extends ConfigFormBase {  
  
  /**  
   * {@inheritdoc}  
   */  
  protected function getEditableConfigNames() {  
    return [  
      'form_add_html_attributes.adminsettings',  
    ];  
  }  

  /**  
   * {@inheritdoc}  
   */  
  public function getFormId() {  
    return 'add_attributes_html_admin_form';  
  }

  /**  
   * {@inheritdoc}  
   */  
  public function buildForm(array $form, FormStateInterface $form_state) {  
    $config = $this->config('form_add_html_attributes.adminsettings');  

    $form['field_form_ids'] = [  
      '#type' => 'textarea',  
      '#title' => $this->t("Add Form Id's"),  
      '#description' => $this->t("Add form id's by comma(,) saperated, like form_id_1, form_id_2, form_id_3 etc."),  
      '#default_value' => $config->get('field_form_ids'),
      '#required' => TRUE,  
    ];
    
    $form['label']  = array(
        '#type' => 'label',
        '#title' => $this->t('Select Attributes'),
        '#id'         => 'lbl1',
        '#prefix'     => '<div class="caption1">',
        '#suffix'     => '</div>',
    ) ; 

    $form['autocomplete_off'] = [
      '#type' => 'checkbox',
      '#title' => $this->t("Autocomplete Off"),
      '#default_value' => $config->get('autocomplete_off'),
      '#required' => FALSE,
    ]; 

     $form['autofocus'] = [
      '#type' => 'checkbox',
      '#title' => $this->t("autofocus"),
      '#default_value' => $config->get('autofocus'),
      '#required' => FALSE,
    ];

    $form['disabled'] = [
      '#type' => 'checkbox',
      '#title' => $this->t("disabled"),
      '#default_value' => $config->get('disabled'),
      '#required' => FALSE,
    ];

    $form['novalidate'] = [
      '#type' => 'checkbox',
      '#title' => $this->t("novalidate"),
      '#default_value' => $config->get('novalidate'),
      '#required' => FALSE,
    ];

    $form['formenctype'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('formenctype="multipart/form-data"'),
      '#default_value' => $config->get('formenctype'),
      '#required' => FALSE,
    ];    

    $form['formnovalidate'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('formnovalidate'),
      '#default_value' => $config->get('formnovalidate'),
      '#required' => FALSE,
    ];    

    $form['multiple'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('multiple (file type field only)'),
      '#default_value' => $config->get('multiple'),
      '#required' => FALSE,
    ];

    $form['readonly'] = [
      '#type' => 'checkbox',
      '#title' => $this->t("readonly"),
      '#default_value' => $config->get('readonly'),
      '#required' => FALSE,
    ]; 

    $form['required_input'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('required (Input type field required only)'),
      '#default_value' => $config->get('required_input'),
      '#required' => FALSE,
    ];

    return parent::buildForm($form, $form_state);  
  }

  /**  
   * {@inheritdoc}  
   */  
  public function submitForm(array &$form, FormStateInterface $form_state) {  
    parent::submitForm($form, $form_state);  

    $this->config('form_add_html_attributes.adminsettings')  
      ->set('field_form_ids', $form_state->getValue('field_form_ids'))
      ->set('autocomplete_off', $form_state->getValue('autocomplete_off'))
      ->set('autofocus', $form_state->getValue('autofocus'))  
      ->set('disabled', $form_state->getValue('disabled'))
      ->set('novalidate', $form_state->getValue('novalidate'))
      ->set('formenctype', $form_state->getValue('formenctype'))
      ->set('formnovalidate', $form_state->getValue('formnovalidate'))
      ->set('multiple', $form_state->getValue('multiple'))
      ->set('readonly', $form_state->getValue('readonly'))
      ->set('required_input', $form_state->getValue('required_input'))
      ->save();  
  }      		
}  
