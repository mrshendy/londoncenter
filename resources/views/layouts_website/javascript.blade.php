<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{ asset('assets_website/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('assets_website/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('assets_website/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('assets_website/lib/owlcarousel/owl.carousel.min.js') }}"></script>

@if (App::getlocale() == 'ar')
    <!-- Template Javascript -->
    <script src="{{ asset('assets_website/js/mainRtl.js') }}"></script>
@endif
@if (App::getlocale() == 'en')
    <!-- Template Javascript -->
    <script src="{{ asset('assets_website/js/main.js') }}"></script>
@endif
 <script>
        $(function() {

            // Date range vars
            minDateFilter = "";
            maxDateFilter = "";

            $("#daterange").daterangepicker();
            $("#daterange").on("apply.daterangepicker", function(ev, picker) {
                minDateFilter = Date.parse(picker.startDate);
                maxDateFilter = Date.parse(picker.endDate);

                $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                    var date = Date.parse(data[1]);

                    if (
                        (isNaN(minDateFilter) && isNaN(maxDateFilter)) ||
                        (isNaN(minDateFilter) && date <= maxDateFilter) ||
                        (minDateFilter <= date && isNaN(maxDateFilter)) ||
                        (minDateFilter <= date && date <= maxDateFilter)
                    ) {
                        return true;
                    }
                    return false;
                });
                table.draw();
            });


        });
    </script>