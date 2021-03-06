<?php

use CRM_MembershipExtras_PaymentProcessorType_ManualRecurringPayment as ManualRecurringPaymentProcessorType;

/**
 * 'Offline Recurring Contribution' payment processor.
 */
class CRM_MembershipExtras_PaymentProcessor_OfflineRecurringContribution {

  /**
   * 'Offline Recurring Contribution' Payment Processor machine name.
   */
  const NAME = 'Offline Recurring Contribution';

  /**
   * Creates 'Offline Recurring Contribution' payment processor if it does not
   * exist, and sets it as default payment processor.
   *
   * @return array
   *   The details of the created payment processor.
   */
  public function create() {
    $paymentProcessor = $this->get();
    if ($paymentProcessor !== NULL) {
      return $paymentProcessor;
    }

    $domainID = CRM_Core_Config::domainID();

    $params = [
      'domain_id' => $domainID,
      'sequential' => 1,
      'name' => self::NAME,
      'payment_processor_type_id' => ManualRecurringPaymentProcessorType::NAME,
      'is_active' => '1',
      'is_default' => '0',
      'is_test' => '0',
      'class_name' => 'Payment_Manual',
      'is_recur' => '1',
      'payment_instrument_id' => 'EFT',
    ];

    $paymentProcessor = civicrm_api3('PaymentProcessor', 'create', $params);

    civicrm_api3('setting', 'create',[
      'membershipextras_paymentplan_default_processor' => $paymentProcessor['values'][0]['id'],
    ]);

    return $paymentProcessor['values'][0];
  }

  /**
   * Returns the details of the payment processor,
   * or NULL if it does not exist.
   *
   * @return array
   */
  public function get() {
    $processor = civicrm_api3('PaymentProcessor', 'get', [
      'name' => self::NAME,
      'sequential' => 1,
    ]);

    if (empty($processor['id'])) {
      return NULL;
    }

    return $processor['values'][0];
  }

  /**
   * Removes the payment processor.
   */
  public function remove() {
    civicrm_api3('PaymentProcessor', 'get', [
      'name' => self::NAME,
      'api.PaymentProcessor.delete' => ['id' => '$value.id'],
    ]);
  }

  /**
   * Enables/Disables the payment
   * processor based on the passed
   * status.
   *
   * @param $newStatus
   *   True to enable, False to disable.
   */
  public function toggle($newStatus) {
    $paymentProcessorId = civicrm_api3('PaymentProcessor', 'getvalue', [
      'return' => 'id',
      'name' => self::NAME,
    ]);

    $paymentProcessor = new CRM_Financial_DAO_PaymentProcessor();
    $paymentProcessor->id = $paymentProcessorId;
    $paymentProcessor->find(TRUE);
    $paymentProcessor->is_active = $newStatus;
    $paymentProcessor->save();
  }

}
