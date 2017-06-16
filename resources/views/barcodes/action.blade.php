<a href="{{ route('stocks.show', $stock->id) }}" rel="tooltip" title=""
   class="btn btn-simple btn-primary btn-icon view" target="_blank"
   data-original-title="View Admins"><i class="fa fa-external-link" aria-hidden="true"></i> View </a>
<a href="{{ route('stocks.show', [$stock->id, 'download' => 'pdf']) }}"  rel="tooltip" title=""
   class="btn btn-simple btn-primary btn-icon view" target="_blank"
   data-original-title="View Admins"><i class="fa fa-print" aria-hidden="true"></i> Print Barcode </a>