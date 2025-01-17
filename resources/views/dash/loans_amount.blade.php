<h1>Loans Amount</h1>
 <!-- Content Row -->
 <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Today</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($total_loans_amount_today,2)}}Tsh</div>
                </div>
                <div class="col-auto">
                    <i class="fas    fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Monthy</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($total_loans_amount_this_month,2)}}Tsh</div>
                </div>
                <div class="col-auto">
                    <i class="fas    fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Year
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{number_format($total_loans_amount_this_year,2)}}Tsh</div>
                        </div>
                        <div class="col">
                            
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas    fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                       Total</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($total_loans_amount_all_time,2)}}Tsh</div>
                </div>
                <div class="col-auto">
                    <i class="fas    fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Content Row -->
