<?php

namespace ZohoSubscriptions\Enums;

/**
 * Class InvoiceStatus
 */
abstract class InvoiceStatus {

  // Status.All
  const ALL = 'Status.All';

  // Status.Sent
  const SENT = 'Status.Sent';

  // Status.Draft
  const DRAFT = 'Status.Draft';

  // Status.OverDue
  const OVER_DUE = 'Status.OverDue';

  // Status.Paid
  const PAID = 'Status.Paid';

  // Status.PartiallyPaid
  const PARTIALLY_PAID = 'Status.PartiallyPaid';

  // Status.Void
  const VOID = 'Status.Void';

  // Status.Unpaid
  const UNPAID = 'Status.Unpaid';

}
