<?php

namespace App\Jobs\Admin;

use App\Models\Admin\District;
use App\Models\Admin\Farmer;
use App\Models\Admin\FarmerContour;
use App\Models\Admin\Matrix;
use App\Models\Admin\QualityIndicator;
use App\Models\Admin\Region;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class QualityIndicatorImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $rows;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($rows)
    {
        $this->rows = $rows;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      foreach ($this->rows as $row) {
        Region::findOrCreate($row['region_id'], $row['region']);
        District::findOrCreate($row['district_id'], $row['district'], $row['region_id']);
        Matrix::findOrCreate($row['massiv_id'], $row['massiv'], $row['district_id']);
        Farmer::findOrCreate($row['farmer_id'], $row['farmer'], $row['crop_area'], $row['region_id'], $row['district_id'], $row['contour_number']);
        $farmer_contour = FarmerContour::findOrCreate($row['farmer_id'], $row['contour_number'], $row['crop_area']);
        QualityIndicator::findOrCreate($row['region_id'], $row['district_id'], $row['massiv_id'], $farmer_contour['id'], $row['year'], $row['quality_indicator'], $row['salinity'], $row['groundwater'], $row['mineralisation']);
      }
    }
}
