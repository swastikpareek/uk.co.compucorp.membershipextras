<?php

/*
 * Metadata for Payment Plan Settings
 */
return [
  'membershipextras_paymentplan_use_membership_latest_price' => [
    'group_name' => 'MembershipExtras: Payment Plan',
    'group' => 'membershipextras_paymentplan',
    'name' => 'membershipextras_paymentplan_use_membership_latest_price',
    'title' => 'Use latest price when auto renew membership?',
    'type' => 'Integer',
    'html_type' => 'checkbox',
    'quick_form_type' => 'Element',
    'default' => FALSE,
    'is_required' => FALSE,
  ],
  'membershipextras_paymentplan_default_processor' => [
    'name' => 'membershipextras_paymentplan_default_processor',
    'group_name' => 'MembershipExtras: Payment Plan',
    'group' => 'membershipextras_paymentplan',
    'type' => 'Integer',
    'quick_form_type' => 'Element',
    'add' => '4.7',
    'pseudoconstant' => [
      'name' =>  'paymentProcessor',
    ],
    'title' => 'Offline payment processor for back office',
    'html_type' => 'select',
    'is_required' => TRUE,
    'description' => 'Select the payment processor that should be used when creating payment plans via CiviCRM admin interface such as new/ renew membership.',
    'help_text' => 'Select the payment processor that should be used when creating payment plans via CiviCRM admin interface such as new/ renew membership.',
  ],
  'membershipextras_paymentplan_days_to_renew_in_advance' => [
    'name' => 'membershipextras_paymentplan_days_to_renew_in_advance',
    'group_name' => 'MembershipExtras: Payment Plan',
    'group' => 'membershipextras_paymentplan',
    'type' => 'Integer',
    'quick_form_type' => 'Element',
    'add' => '4.7',
    'title' => 'Days to renew in advance',
    'html_type' => 'text',
    'is_required' => FALSE,
    'description' => 'Number of days in advance of membership end date should an offline auto-renew membership get renewed.',
    'help_text' => 'Number of days in advance of membership end date should an offline auto-renew membership get renewed.',
  ],
];
