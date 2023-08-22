<footer class="footer-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-copyright">
                            <p>2020 @<a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#">Aazztech</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-menu text-right">
                            <ul>
                                <li>
                                    <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#">About</a>
                                </li>
                                <li>
                                    <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#">Team</a>
                                </li>
                                <li>
                                    <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <!-- ends: .Footer Menu -->
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <div id="overlayer" style="display: none;">
        <span class="loader-overlay" style="display: none;">
            <div class="atbd-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </span>
    </div>
    <div class="overlay-dark-sidebar"></div>
    <div class="customizer-overlay"></div>

   


    <script src="{{ asset('form_files/js') }}"></script>
    <!-- inject:js-->
    <script src="{{ asset('form_files/plugins.min.js.download') }}"></script>
    <script src="{{ asset('form_files/script.min.js.download') }}"></script><div class="daterangepicker ltr show-ranges opensright"><div class="ranges"><ul><li data-range-key="Today">Today</li><li data-range-key="Yesterday">Yesterday</li><li data-range-key="Last 7 Days">Last 7 Days</li><li data-range-key="This Month">This Month</li><li data-range-key="Last Month">Last Month</li><li data-range-key="Custom Range">Custom Range</li></ul></div><div class="drp-calendar left"><div class="calendar-table"></div><div class="calendar-time" style="display: none;"></div></div><div class="drp-calendar right"><div class="calendar-table"></div><div class="calendar-time" style="display: none;"></div></div><div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button> </div></div>
  
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
  




    <!-- endinject-->
    <script>
        $('#datatable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
           'excel', 'pdf'
        ]
    } );

    function ekleModal()
    {
        $('#ekleGüncelleModal').modal();
    }
    </script>

</body></html>