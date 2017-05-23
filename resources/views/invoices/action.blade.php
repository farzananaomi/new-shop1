<a href="{{ route('invoices.show', $invoice->id) }}" rel="tooltip" title=""
   class="btn btn-simple btn-primary btn-icon view" target="_blank"
   data-original-title="View Admins"><i class="fa fa-external-link" aria-hidden="true"></i> View</a>
<a rel="tooltip" title="" class="btn btn-simple btn-warning btn-icon edit" data-original-title="Edit Admin"
   href="{{ route('invoices.edit', $invoice->id) }}">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
</a>

